<?php include_once 'db.php'; 

if(isset($_POST['topic_name']))
{
	$course_id = $_POST['course_id'];
	$topic_name = $_POST['topic_name'];
	mysqli_query($con,"insert into topic_tbl (topic_name,course_id) values ('$topic_name','$course_id')");
}

if(isset($_POST['course_id']))
{
	$c_id=$_POST['course_id'];
	$topic_data = mysqli_query($con,"select * from topic_tbl where course_id=$c_id");
}

$cnt=1;
if(mysqli_num_rows($topic_data) == 0)
{
	echo "<tr align='center'><td colspan='4'>No Record Found..<br> Please Select Course..</td></tr>";
}
else
{
while($row = mysqli_fetch_assoc($topic_data)){
	if($row['topic_status']==1){
				$class = "btn btn-light-success";
			}else{
				$class = "btn btn-light-secondary";
			}
?>

	<tr>
		<td><?php echo $cnt++; ?></td>
		<td><?php echo strtoupper($row['topic_name']); ?></td>
		<td><span class="<?php echo $class; ?> topic_status" topic_id="<?php echo $row['t_id']; ?>" topic_status="<?php echo $row['topic_status']; ?>"><?php if($row['topic_status']==1) { echo "Active"; }else{ echo "Deactive"; } ?></span></td>
	</tr>

<?php } } ?>