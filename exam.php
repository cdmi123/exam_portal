<?php include_once 'header.php'; 
$stu_id = $_SESSION['login_id'];
$user_data = mysqli_query($con,"select * from user_tbl where id=$stu_id");
$row_user = mysqli_fetch_assoc($user_data);

$exam_id = $row_user['exam_id'];

if($exam_id==null){
  $exam_id=0;
}

$course_data = mysqli_query($con,"select * from course_tbl where c_id in ($exam_id)");

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
        <div>
          <h4 class="mb-3">Exams</h4>
           <!--  Row 1 -->
          <div class="row g-3 ">

          <?php while($row = mysqli_fetch_assoc($course_data)) { $c_id=$row['c_id'];?>

            <?php 
              $total_question_query=mysqli_query($con,"SELECT count(course_id) as total_question FROM `question` where course_id=$c_id;");
              $q_row = mysqli_fetch_assoc($total_question_query);?>
            <div class="col-lg-4">
              <div class="col-lg-12 col-sm-6">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden rounded-3">
                  <div class="card-body p-3">
                    <h5 class="card-title fs-2 mb-2 text-secondary opacity-50 fw-semibold">Quiz</h5>
                    <div class="d-flex align-items-start justify-content-between">
                      <div class="col-8">
                        <h5 class="fs-3"><?php echo strtoupper($row['course_name']); ?></h5>
                        <span class="fs-2"><?php echo $q_row['total_question']; ?> Ques | <?php echo $q_row['total_question']*2; ?> Mins</span>
                      </div>
                      <div class="col-4 text-end">
                      <a href="topics.php?c_id=<?php echo $row['c_id']; ?>" class="btn btn-sm btn-primary rounded-2">view Topic</a>
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