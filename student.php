<?php include_once 'header.php'; 

$stu_id = $_SESSION['login_id'];

$student_exam_report = mysqli_query($con,"SELECT count(exam_report.t_id) as total_exam , topic_tbl.topic_name , exam_report.* from exam_report JOIN topic_tbl on topic_tbl.t_id=exam_report.t_id where s_id=$stu_id GROUP BY t_id;");

?>

<style type="text/css">
      .result_table{
            border-radius: 20px 0 0 0;
            overflow: hidden;
      }
      .accordion-button:after{
            display: none;
      }
      .accordion table td{
            background: transparent;
      }
      .accordion-button:not(.collapsed){
            background-color: #ccf8f1;
      }
     /* .accordion table thead th{
            padding-left: 20px;
            padding-right: 20px;
      }*/
</style>

</div>
      <div class="dark-transparent container-fluid">
            <div class="row">
                  <div class="col-12">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                              <table class="table rounded-2 result_table">
                                    <thead class="table-primary">
                                          <tr>
                                                <th width="40">No</th>
                                                <th >TopicName</th>
                                                <th width="100">Re-Exam</th>
                                                <th width="150">Total Marks</th>
                                                <th width="150">Obtained Marks</th>
                                                <th width="100">Per</th>
                                                <th width="100">Result</th>
                                          </tr>
                                    </thead>

                                    <?php $no=1; while($row = mysqli_fetch_assoc($student_exam_report)) { 
                                          $topic_id = $row['t_id'];
                                          $total_exam_query = mysqli_query($con,"select * from exam_report where t_id=$topic_id and s_id=$stu_id");

                                          $total_marks = 0;
                                          $obtain_marks = 0;

                                                while($exam_record = mysqli_fetch_assoc($total_exam_query)){
                                                      $arr = json_decode($exam_record['check_ans'],true);

                                                      $total_marks += count($arr);

                                                      foreach ($arr as $key => $value) {
                                                            if($value=="R"){
                                                                  $obtain_marks++;
                                                            }
                                                      }

                                                }

                                                $result_count = ($obtain_marks/$total_marks)*100;

                                          ?>

                                  <tr>
                                        <td colspan="7" class="p-0">
                                              <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                      <button class="accordion-button collapsed p-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $no; ?>" aria-expanded="true" aria-controls="collapse<?php echo $no; ?>">
                                                            <table class="table m-0">
                                                              <tr>
                                                                    <td width="40"><?php echo $no; ?></td>
                                                                   <td><?php echo strtoupper($row['topic_name']); ?></td>
                                                <td width="100"><?php echo $row['total_exam']; ?></td>
                                                <td width="150"><?php echo $total_marks; ?></td>
                                                <td width="150"><?php echo $obtain_marks; ?></td>
                                                <td width="100"><?php echo  number_format((float)$result_count, 2, '.', ''); ?></td>
                                                <td width="100"><?php if(number_format((float)$result_count, 2, '.', '')<35) { echo "FAIL"; } else if(number_format((float)$result_count, 2, '.', '')<55){ echo "AVERAGE"; }else{ echo "GOOD"; } ?></td>
                                                              </tr>
                                                        </table>
                                                      </button>
                                                    </h2>
                                                    <div id="collapse<?php echo $no; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                      <div class="accordion-body p-1">
                                                        <table class="table m-0">

                                                          <?php $student_exam_report1 = mysqli_query($con,"SELECT topic_tbl.topic_name , exam_report.* from exam_report JOIN topic_tbl on topic_tbl.t_id=exam_report.t_id where s_id=$stu_id and exam_report.t_id=$topic_id"); ?>

                                                          <?php $ex_no=1; while($exam_d = mysqli_fetch_assoc($student_exam_report1)) {  $total_marks = 0;
                                                            $obtain_marks = 0; 

                                                             $arr = json_decode($exam_d['check_ans'],true);

                                                      $total_marks += count($arr);

                                                              foreach ($arr as $key => $value) {
                                                                    if($value=="R"){
                                                                          $obtain_marks++;
                                                                    }
                                                              }
                                                    $result_count = ($obtain_marks/$total_marks)*100;


                                                            ?>
                                                              <tr>
                                                                    <td width="40"><?php echo $ex_no; ?></td>
                                                                    <td><?php echo strtoupper($row['topic_name']); ?></td>
                                                                    <td width="100"><?php echo $ex_no++; ?></td>
                                                                    <td width="150"><?php echo $total_marks; ?></td>
                                                                    <td width="150"><?php echo $obtain_marks; ?></td>
                                                                    <td width="100"><?php echo  number_format((float)$result_count, 2, '.', ''); ?></td>
                                                                    <td width="100"><?php if(number_format((float)$result_count, 2, '.', '')<35) { echo "FAIL"; } else if(number_format((float)$result_count, 2, '.', '')<55){ echo "AVERAGE"; }else{ echo "GOOD"; } ?></td>
                                                              </tr>
                                                            <?php } ?>
                                                        </table>
                                                      </div>
                                                    </div>
                                                  </div>
                                        </td>      
                                  </tr>
                                <?php $no++;} ?>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
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

</html>




<!-- 

 <tbody>
                                    <?php $no=1; while($row = mysqli_fetch_assoc($student_exam_report)) { 
                                          $topic_id = $row['t_id'];
                                          $total_exam_query = mysqli_query($con,"select * from exam_report where t_id=$topic_id and s_id=$stu_id");

                                          $total_marks = 0;
                                          $obtain_marks = 0;

                                                while($exam_record = mysqli_fetch_assoc($total_exam_query)){
                                                      $arr = json_decode($exam_record['check_ans'],true);

                                                      $total_marks += count($arr);

                                                      foreach ($arr as $key => $value) {
                                                            if($value=="R"){
                                                                  $obtain_marks++;
                                                            }
                                                      }

                                                }

                                                $result_count = ($obtain_marks/$total_marks)*100;

                                          ?>
                                          <tr style="background-color:green;">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo strtoupper($row['topic_name']); ?></td>
                                                <td><?php echo $row['total_exam']-1; ?></td>
                                                <td><?php echo $total_marks; ?></td>
                                                <td><?php echo $obtain_marks; ?></td>
                                                <td><?php echo  number_format((float)$result_count, 2, '.', ''); ?></td>
                                                <td><?php if(number_format((float)$result_count, 2, '.', '')<35) { echo "FAIL"; } else if(number_format((float)$result_count, 2, '.', '')<55){ echo "AVERAGE"; }else{ echo "GOOD"; } ?></td>
                                          </tr>
                                    <?php } ?>
                              </tbody>


 -->