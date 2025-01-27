<?php 
include_once 'header.php'; 
unset($_SESSION['running_id']);

$stu_id = $_SESSION['login_id'];
$topic_id = $_GET['topic_id'];

mysqli_query($con,"update user_tbl SET running_exam='' where id=$stu_id");

$user_data = mysqli_query($con,"select * from user_tbl where id=$stu_id");
$row_user = mysqli_fetch_assoc($user_data);
$exam_id = $row_user['exam_id'];

$course_data = mysqli_query($con,"select * from course_tbl where c_id in ($exam_id)");

// Select Exam Score

$exam_report_query = mysqli_query($con,"select * from exam_report where t_id=$topic_id and s_id=$stu_id order by id desc limit 0,1");
$exam_data = mysqli_fetch_assoc($exam_report_query);

$ans_arry = json_decode($exam_data['check_ans'],true);
$right=0;
$wrong=0;
  foreach ($ans_arry as $key => $value) {
      if($value=="R"){
        $right++;
      }else{
        $wrong++;
      }
  }

  // Find Rank of exam

  $total_exam_query = mysqli_query($con,"select * from exam_report where t_id=$topic_id");
  $total_exam = mysqli_num_rows($total_exam_query);

  $exam_rank_query = mysqli_query($con,"SELECT * from exam_report where t_id=$topic_id ORDER BY right_ans desc;");
  $rank=0;
  while($exam_rank_data = mysqli_fetch_assoc($exam_rank_query)){

    if($stu_id!=$exam_rank_data['s_id']){
      $rank++;
    }else{
      $rank++;
      break;
    }
  } 

?>
<style>
  .dot_box{
    height:30px;
    width:30px;
    text-align: center;
    line-height: 30px;
    border-radius: 50%;
    cursor: default;
  }
</style>
    <div class="">
      <div class="container-fluid">

        <div class="row g-0 mb-4">
          <div class="col-12">
            <div class="bg-white rounded-bottom-3 p-5"> 
              <div class="row align-items-center">
                <div class="col-md-6 border-end">
                  <div class="achevement text-center">
                    <img src="./assets/images/logos/achevement.webp" style="max-width:70px;" alt="">
                    <div>
                      <p class="m-0 mt-2 fs-2">YOUR RANK</p>
                      <h3> <?php echo $rank; ?> / <?php echo $total_exam; ?></h3>
                    </div>
                    <div class="row mt-4">
                      <div class="col">
                        <p class="mb-0 fs-2">INCORRECT</p>
                        <h4><?php echo $wrong; ?></h4>
                      </div>
                      <div class="col border-start border-end">
                        <p class="mb-0 fs-2">CORRECT</p>
                        <h4><?php echo $right; ?></h4>
                      </div>
                      <div class="col">
                        <p class="mb-0 fs-2">TIME TAKEN</p>
                        <h4>00:16:39</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 border-start">
                  <h5 class="text-center">Your Answers</h5>
                  <div class="px-4">
                    <div class="row my-3 g-3 mb-4 justify-content-center">

                    <?php $q_no=1; foreach ($ans_arry as $key => $value) {

                        if($value=="R"){
                          $color = "success";
                        }else{
                          $color = "danger";
                        }

                     ?>
                      
                      <div class="col-auto">
                        <div class="dot_box text-bg-<?php echo $color; ?>"><?php echo $q_no++; ?></div>
                      </div>

                    <?php } ?>

               <!--        <div class="col-auto">
                        <div class="dot_box text-bg-success">2</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-danger">3</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">4</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-danger">5</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">6</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-danger">7</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">8</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">9</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">10</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">11</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">12</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">13</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">14</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">15</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">16</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">17</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">18</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">19</div>
                      </div>
                      <div class="col-auto">
                        <div class="dot_box text-bg-success">20</div>
                      </div> -->
                    </div>
                    <div class="d-flex gap-3 justify-content-center">
                      <a href="" class="btn btn-outline-secondary rounded-0 px-3">View Solution</a>
                      <a href="" class="btn btn-primary rounded-0 px-3">Start next quiz</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div>
          <h4 class="mb-3">Quizzes</h4>
           <!--  Row 1 -->
          <div class="row g-3 ">

          <?php while($row = mysqli_fetch_assoc($course_data)) { ?>
            <div class="col-lg-4">
              <div class="col-lg-12 col-sm-6">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden rounded-3">
                  <div class="card-body p-3">
                    <h5 class="card-title fs-2 mb-2 text-secondary opacity-50 fw-semibold">Quiz</h5>
                    <div class="d-flex align-items-start justify-content-between">
                      <div class="col-8">
                        <h5 class="fs-3"><?php echo strtoupper($row['course_name']); ?></h5>
                        <span class="fs-2">30 Ques | 30 Mins</span>
                      </div>
                      <div class="col-4 text-end">
                      <a href="" class="btn btn-sm btn-primary rounded-2">Start Quiz</a>
                      </div>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          <?php } ?>
          </div>
        </div>
     
      </div>
      <div class="dark-transparent sidebartoggler"></div>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>
</body>


<!-- Mirrored from demos.wrappixel.com/free-admin-templates/bootstrap/spike-bootstrap-free/src/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 10:47:59 GMT -->
</html>

<script type="text/javascript">
  localStorage.removeItem('second');
  localStorage.removeItem('minit');
</script>