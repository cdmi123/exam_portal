<?php include_once 'header.php'; 

$user_data = mysqli_query($con,"select * from user_tbl"); 

?>

	<div class="body-wrapper">
      <div class="container-fluid">
        <div class="card" style="background: rgba(255,255,255, 0.4);">
        	<div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Forms</h5>
            <div class="row">
            	<div class="col-12">
            		<div class="card">
		              <div class="card-body">
		              		<table class="table table-borderless">
		              			<tr>
		              				<td><input type="text" name="srch" class="form-control" placeholder="Search Student" id="srch_student"></td>
		              			</tr>
		              		</table>
		              </div>
		            </div>
            	</div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
            	<div class="col-12">
            		<div class="card">
		              <div class="card-body">
		                <table class="table">
		                	<thead>
		                		<th>No</th>
		                		<th>Student Name</th>
		                		<th>Exam Topic</th>
		                	</thead>
		                	<tbody id="dis_data">
		                		<?php $id=1; while($row = mysqli_fetch_assoc($user_data)) { ?>
													<tr>	
														<td><?php echo $id++; ?></td>
														<td><?php echo strtoupper($row['name']); ?></td>
														<td>
															<select class="form-select multiple-select-field" data-placeholder="Choose anything" multiple name="crs_id[]" stu_id="<?php echo $row['id']; ?>">

																<?php

																	$crs_id = explode(',',$row['exam_id']);
																		$course_data = mysqli_query($con,"select * from course_tbl"); 
																 while($crs_data = mysqli_fetch_assoc($course_data)) { ?>
														    	<option value="<?php echo $crs_data['c_id']; ?>" <?php if(in_array($crs_data['c_id'],$crs_id)) { echo "selected"; } ?>><?php echo $crs_data['course_name'] ?></option>
														  <?php } ?>
														</select>
														</td>
													</tr>
												<?php } ?>
		                	</tbody>
		                </table>
		              </div>
		            </div>
            	</div>
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
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/select2.min.js"></script>
</body>
</html>

<script type="text/javascript">
	$(document).on('submit','#course_data',function(e){
		e.preventDefault();

		var course_data = $(this).serialize();

		$.ajax({
			type:"POST",
			url:"ajax_course.php",
			data:course_data,
			success:function(res){
				$('#dis_data').html(res);
				$('#course_data')[0].reset();
			}
		})
	})

	$(document).on('click','.course_status',function(){
		var id = $(this).attr('course_id');
		var c_status = $(this).attr('course_status');
		$.ajax({
			type:"POST",
			url:"ajax_course.php",
			data:{"c_id":id,"c_status":c_status},
			success:function(res){
				$('#dis_data').html(res);
			}
		})
	})

	$(document).on('change','.multiple-select-field',function(){
		var crs_id = $(this).val();
		var stu_id = $(this).attr('stu_id');
		
			$.ajax({
				type:"post",
				url:"add_exam.php",
				data:{"stu_id":stu_id,"crs_id":crs_id},
			})

	})

	$( '.multiple-select-field' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
	});

	$(document).on('keyup','#srch_student',function(){
		
		var srch_data = $(this).val();
		$.ajax({
			type:"POST",
			url:"ajax_srch_student.php",
			data:{"s_name":srch_data},
			success:function(res){
				$('#dis_data').html(res);
			}
		})
		
	})

</script>