<?php include_once 'header.php'; 

$course_data = mysqli_query($con,"select * from course_tbl where course_status=1");  

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
		                <form method="POST" id="topic_data">
		                	<div class="mb-3">
		                		<select class="form-select" id="course_id" name="course_id">
		                			<option selected disabled>Select Course</option>
		                			<?php while($row = mysqli_fetch_assoc($course_data)) { ?>
		                				<option value="<?php echo $row['c_id']; ?>"><?php echo $row['course_name']; ?></option>
		                			<?php } ?>
		                		</select>
		                  </div>
		                  <div class="mb-3">
		                    <label for="exampleInputEmail1" class="form-label">Topic Name</label>
		                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="topic_name">
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
		                		<th>Topic Name</th>
		                		<th>Status</th>
		                	</thead>
		                	<tbody id="dis_data">
		                		
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
	$(document).on('submit','#topic_data',function(e){
		e.preventDefault();

		var topic_data = $(this).serialize();

		$.ajax({
			type:"POST",
			url:"ajax_topic.php",
			data:topic_data,
			success:function(res){
				$('#dis_data').html(res);
				$('#exampleInputEmail1').val('');
			}
		})
	})

	$(document).ready(function(){
		$('#dis_data').html('<tr align="center"><td colspan="4">No Record Found...<br> Please Select Course</td></tr>');
	})

	$(document).on('change','#course_id',function(){
		var cid = $(this).val();
		// alert(cid);
		$.ajax({
			type:'POST',
			url:'ajax_topic.php',
			data:{'course_id':cid},
			success:function(res){
				$('#dis_data').html(res);
			}
		})
	})

	// $(document).on('click','.topic_status',function(){
	// 	var id = $(this).attr('topic_id');
	// 	var t_status = $(this).attr('topic_status');
	// 	$.ajax({
	// 		type:"POST",
	// 		url:"ajax_topic.php",
	// 		data:{"t_id":id,"t_status":t_status},
	// 		success:function(res){
	// 			$('#dis_data').html(res);
	// 		}
	// 	})
	// })
</script>