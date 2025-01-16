<?php include_once 'db.php'; 

if (isset($_POST['course_name'])) {
	$course = $_POST['course_name'];
	mysqli_query($con,"insert into course_tbl(course_name)values('$course')");
}else{
	$c_id = $_POST['c_id'];
	$c_status = $_POST['c_status'];
		if ($c_status==1) {
			$c_status=0;
		}else{
			$c_status=1;
		}
	mysqli_query($con,"update course_tbl set course_status=$c_status where c_id=$c_id");
}

$data = mysqli_query($con,"select * from course_tbl"); 

$id=1; while($row = mysqli_fetch_assoc($data)) { 
			if($row['course_status']==1){
				$class = "btn btn-light-success";
			}else{
				$class = "btn btn-light-secondary";
			}
	?>
	
	<tr>	
		<td><?php echo $id++; ?></td>
		<td><?php echo strtoupper($row['course_name']); ?></td>
		<td><span class="<?php echo $class; ?> course_status" course_id="<?php echo $row['c_id']; ?>" course_status="<?php echo $row['course_status']; ?>"><?php if($row['course_status']==1) { echo "Active"; }else{ echo "Deactive"; } ?></span></td>
	</tr>

<?php } ?>