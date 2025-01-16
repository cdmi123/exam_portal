
<?php 

include_once 'admin/db.php';

$topic_id = $_GET['topic_id'];
$question = mysqli_query($con,"select * from question where topic_id=$topic_id");
$t_question = mysqli_query($con,"select count(q_id) as total_question from question where topic_id=$topic_id");
$t_question = mysqli_fetch_assoc($t_question);
$time = $t_question['total_question']*2;



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CREATIVE EXAM PORTEL</title>
<!-- FontAwesome-cdn include -->
<link rel="stylesheet" href="assets/css/all.min.css">
<!-- Google fonts -->
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
<!-- Bootstrap-css include -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Animate-css include -->
<link rel="stylesheet" href="assets/css/animate.min.css">
<!-- Main-StyleSheet include -->
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
   <style type="text/css">
      #counter{
             font-size: 30px;
    font-weight: bold;
    line-height: 80px;
      }
   </style>
<div class="wrapper position-relative">
<div class="top_content_area pt-2">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6">
            <div class="logo_area ms-5">
               <a href="index-2.html">
                  <img src="assets/images/logo/creative-logo-white.svg" alt="image_not_found">
               </a>
            </div>
         </div>
         <div class="col-md-6 d-none d-md-block">
            <div class="count_box overflow-hidden rounded-pill d-flex float-end me-5">
               <div class="count_clock ps-2">
                  <img src="assets/images/counter/clock.png" alt="image_not_found">
               </div>
               <div class="count_title px-1">
                  <h4 class="pe-5">Quiz</h4>
                  <span>Time start</span>
               </div>
               <div class="count_number rounded-pill bg-white overflow-hidden text-center countdown_timer" id="counter">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container">
   <form class="multisteps_form position-relative overflow-hidden mt-5" id="wizard" method="POST" action="https://jthemes.net/themes/html/quizo/thankyou/index-3.html">
      <!-- Form-header-content -->
      <div class="form_header_content text-center pt-4">
         <h2>Exam Title</h2>
         <!-- <span>Fill out this Tirnva quiz for fun!</span> -->
      </div>

         <!------------------------- Step-1 ----------------------------->
         <?php $q_no=1; $per = 100/$t_question['total_question']; while($question_row = mysqli_fetch_assoc($question)) { $option_array = explode(',',$question_row['options']); ?>
         <div class="multisteps_form_panel step">
            <!-- Form-content -->
            <span class="question_number text-uppercase mb-3 float-end">QUESTION <?php echo $q_no; ?>/<?php echo $t_question['total_question']; ?></span>
            <div class="progress rounded-pill">
               <div class="progress-bar" role="progressbar" style="width: <?php echo $per*$q_no;?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h1 class="question_title px-5 py-3 animate__animated animate__fadeInRight animate_25ms"><?php echo $question_row['question']; ?>?</h1>
               <!-- Form-items -->
               <div class="form_items ps-5">
                  <ul class="list-unstyled p-0">

                  <?php foreach ($option_array as $key => $value) { ?>
                     
                     <li class=" step_1 ps-5 rounded-pill animate__animated animate__fadeInRight animate_50ms">
                        <input type="radio" id="opt_1" name="stp_1_select_option" value="<?php echo $value; ?>">
                        <label for="opt_1"><?php echo $value; ?></label>
                     </li>
                  <?php } ?>

                  </ul>
               </div>
         </div>
         <?php $q_no++; } ?>
      </div>
   </form>
   <!---------- Form Button ---------->
   <div class="form_btn py-5 text-center">
      <button type="button" class="f_btn disable text-uppercase rounded-pill text-white" id="prevBtn" onclick="nextPrev(-1)"><span><i class="fas fa-arrow-left"></i></span> Last Question</button>

      <button type="button" class="f_btn active text-uppercase rounded-pill text-white" id="nextBtn" onclick="nextPrev(1)"> Next Question <i class="fas fa-arrow-right"></i></button>

   </div>
</div>
<!-- jQuery-js include -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<!-- Countdown-js include -->
<!-- <script src="assets/js/countdown.js"></script> -->
<!-- Bootstrap-js include -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- jQuery-validate-js include -->
<script src="assets/js/jquery.validate.min.js"></script>
<!-- Custom-js include -->
<script src="assets/js/script.js"></script>
</body>
</html>

<script type="text/javascript">

     function countdown(minit) {

      if(localStorage.getItem('second')==null)
      {
         localStorage.setItem('second',60);
         localStorage.setItem('minit',minit);
      }
        function tick() {
          var seconds = localStorage.getItem('second');
         var minit = localStorage.getItem('minit');
            var counter = document.getElementById("counter");
            seconds--;
            localStorage.setItem('second',seconds);

            if(seconds==0)
            {
               minit--;
               localStorage.setItem('minit',minit);
               localStorage.setItem('second',60);
            }

            counter.innerHTML = minit-1+":" + (seconds < 10 ? "0" : "") + String(seconds);
            if( minit > 0 ) {
                setTimeout(tick, 1000);
            } else {
                window.location.href = "scorecard.php";
            }
        }
        tick();
    }
</script>

<?php echo "<script>countdown(".$time.");</script>"; ?>