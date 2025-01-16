<?php 

include_once 'admin/db.php';

   $stu_id = $_GET['user_id'];
   $topic_id = $_GET['topic_id'];
   $c_id = $_GET['c_id'];
   $_SESSION['running_id'] = $topic_id;

   $student_att_exam = mysqli_query($con,"select * from user_tbl where id=$stu_id");
   $att_exam_data = mysqli_fetch_assoc($student_att_exam);
   $att_exam = explode(',',$att_exam_data['exam_attend']);

   if(!in_array($topic_id,$att_exam)){
      array_push($att_exam,$topic_id);
   }

   $topic_ids = implode(',',$att_exam);

   mysqli_query($con,"update user_tbl SET exam_attend='$topic_ids' , running_exam='$topic_id' where id=$stu_id");

      $student_running_exam = mysqli_query($con,"select * from user_tbl where id=$stu_id");
      $running_data = mysqli_fetch_assoc($student_running_exam);
      $running_id = $running_data['running_exam'];

   $topic_data = mysqli_query($con,"SELECT * FROM `topic_tbl` WHERE course_id=$c_id");
?>

 <?php while($row = mysqli_fetch_assoc($topic_data)) { $t_id = $row['t_id']; 
              $total_question_query=mysqli_query($con,"SELECT count(course_id) as total_question FROM `question` where topic_id=$t_id;");
              $q_row = mysqli_fetch_assoc($total_question_query);?>
            <div class="col-lg-4">
              <div class="col-lg-12 col-sm-6">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden rounded-3">
                  <div class="card-body p-3">
                    <h5 class="card-title fs-2 mb-2 text-secondary opacity-50 fw-semibold">Quiz</h5>
                    <div class="d-flex align-items-start justify-content-between">
                      <div class="col-8">
                        <h5 class="fs-3"><?php echo strtoupper($row['topic_name']); ?></h5>
                        <span class="fs-2"><?php echo $q_row['total_question']; ?> Ques | <?php echo $q_row['total_question']*2; ?> Mins</span>
                      </div>
                      <div class="col-4 text-end">
                      <a href="javascript:void(0)" topic_id="<?php echo $row['t_id']; ?>" user_id="<?php echo $stu_id; ?>" c_id=<?php echo $c_id; ?> class="btn btn-sm  rounded-2 start_exam <?php if($running_id==$row['t_id']) { echo "disabled btn-success"; } else{echo "btn-primary";} ?>"><?php if($running_id==$row['t_id']) { echo "Running"; }else{ echo "Start Exam"; } ?></a>
                      </div>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          <?php } ?>