<?php ob_start(); include_once 'header.php';



if (isset($_SESSION['running_id'])) {
    header('location:exam_page.php?topic_id='.$_SESSION['running_id']);
}

$c_id=$_GET['c_id'];
$stu_id = $_SESSION['login_id'];

$topic_data = mysqli_query($con,"SELECT * FROM `topic_tbl` WHERE course_id=$c_id");


      $student_running_exam = mysqli_query($con,"select * from user_tbl where id=$stu_id");
      $running_data = mysqli_fetch_assoc($student_running_exam);
      $running_id = $running_data['running_exam'];

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
          <h4 class="mb-3">Quizzes</h4>
           <!--  Row 1 -->
          <div class="row g-3 disp_exam_data">

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
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>
</body>
</html>

<script type="text/javascript">
  $(document).on('click','.start_exam',function(){
    var topic_id = $(this).attr('topic_id');
    var user_id = $(this).attr('user_id');
    var c_id = $(this).attr('c_id');

      $.ajax({
        type:"get",
        url:"ajax_exam.php",
        data:{"user_id":user_id,"topic_id":topic_id,"c_id":c_id},

        success:function(res){
          $('.disp_exam_data').html(res);
          
          window.location.href = "exam_page.php?topic_id="+topic_id;

        }
      })
  })
</script>