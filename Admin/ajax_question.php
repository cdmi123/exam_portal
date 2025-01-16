<?php 

include_once 'db.php';

$course_id = $_POST['course_id'];
$topic_id = $_POST['topic_id'];
$question = $_POST['question'];
$option = implode(",",$_POST['option']);
$ans = implode(",",$_POST['ans']);

mysqli_query($con,"insert into question(course_id,topic_id,question,options,ans)values('$course_id','$topic_id','$question','$option','$ans')");


 ?>