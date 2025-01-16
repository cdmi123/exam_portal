<?php include_once 'header.php'; 

$course_data = mysqli_query($con,"select * from course_tbl"); 

?>

	<div class="body-wrapper">
      <div class="container-fluid">
        <div class="card" style="background: rgba(255,255,255, 0.4);">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Forms</h5>
            <div class="row">
            	<div class="col-6">
            		<div class="card">
		              <div class="card-body">
		                <form method="POST" id="course_data">
		                  <div class="mb-3">
		                    <label for="exampleInputEmail1" class="form-label">Course Name</label>
		                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="course_name">
		                  </div>
		                  <div class="mb-3 form-check">
		                  </div>
		                  <button type="submit" class="btn btn-primary" name="add_course">Submit</button>
		                </form>
		              </div>
		            </div>
            	</div>
            	<div class="col-6">
            		<div class="card">
		              <div class="card-body">
		                <table class="table">
		                	<thead>
		                		<th>No</th>
		                		<th>Course Name</th>
		                		<th>Status</th>
		                	</thead>
		                	<tbody id="dis_data">
		                		<?php $id=1; while($row = mysqli_fetch_assoc($course_data)) {

		                			if($row['course_status']==1){
		                				$class = "btn btn-light-success";
		                			}else{
		                				$class = "btn btn-light-secondary";
		                			}

		                		 ?>
									<tr>	
										<td><?php echo $id++; ?></td>
										<td><?php echo strtoupper($row['course_name']); ?></td>
										<td><span class="<?php echo $class; ?> course_status" course_id="<?php echo $row['c_id']; ?>" course_status="<?php echo $row['course_status']; ?>"><?php if($row['course_status']==1) { echo "Active"; }else{ echo "Deactive"; } ?></span></td>
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
</script>