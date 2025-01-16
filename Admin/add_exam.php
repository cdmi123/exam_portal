<?php 

include_once 'db.php';

if(empty($_POST['crs_id'])){
	$_POST['crs_id']==null;
}else{
	$crs_id = implode(",",$_POST['crs_id']);
}

$stu_id = $_POST['stu_id'];

mysqli_query($con,"update user_tbl set exam_id='$crs_id' where id=$stu_id");

 ?>