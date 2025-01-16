<?php include_once 'db.php'; 

$c_id = $_POST['c_id'];

$data = mysqli_query($con,"select * from topic_tbl where course_id=$c_id");?>

	<option selected disabled>Select Topic</option>

	<?php while($row = mysqli_fetch_assoc($data)) { ?>

		<option value="<?php echo $row['t_id'] ?>"><?php echo strtoupper($row['topic_name']); ?></option>

	<?php } ?>
