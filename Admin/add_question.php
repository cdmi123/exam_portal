<?php include_once 'header.php'; 

$course_data = mysqli_query($con,"select * from course_tbl where course_status=1");  

?>
	
	<style type="text/css">
		.nav-tabs .nav-link.active{
			border-top-left-radius: 10px;
    	border-top-right-radius: 10px;
			border-color: #0085db;
			border-bottom-color: transparent ;
		}
		.nav-tabs .nav-link{
			border-bottom-color: #0085db;
		}
	</style>

	<div class="body-wrapper">
      <div class="container-fluid">
        <div class="card" style="background: rgba(255,255,255, 0.4);">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Forms</h5>
            <div class="row">
            	<div class="col-12" >
            		<div class="p-3 bg-white rounded-3 shadow-sm">
            			<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
									  <li class="nav-item flex-grow-1" role="presentation">
									    <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
									  </li>
									  <li class="nav-item flex-grow-1" role="presentation">
									    <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
									  </li>
									  <li class="nav-item flex-grow-1" role="presentation">
									    <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
									  </li>
									</ul>
									<div class="tab-content" id="myTabContent">
									  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
									  	<div class="card border-top border-primary">
					              <div class="card-body">
					                <form method="POST" id="topic_question">
					                	<div class="mb-3">
					                		<select class="form-select" id="course_id" name="course_id">
					                			<option selected disabled>Select Course</option>
					                			<?php while($row = mysqli_fetch_assoc($course_data)) { ?>
					                				<option value="<?php echo $row['c_id']; ?>"><?php echo $row['course_name']; ?></option>
					                			<?php } ?>
					                		</select>
					                  </div>
					                  <div class="mb-3">
					                		<select class="form-select" id="topic_id" name="topic_id">
					                			<option selected disabled>Select Topic</option>
					                		</select>
					                  </div>
					                  <div class="mb-3">
					                    <label for="exampleInputEmail1" class="form-label">Write Question</label>
					                    <input type="text" class="form-control" aria-describedby="emailHelp" name="question" id="question">
					                  </div>
					                  <div class="mb-3">
					                  	<div class="row">
					                  		<div class="col-6">
					                  			<div class="d-flex align-items-center">
					                  				<input type="checkbox" name="ans[]" class="form-check" value="a" id="a">
					                  				<label for="exampleInputEmail1" class="form-label"> &nbsp&nbsp</label>

					                  				<input type="text" class="form-control" aria-describedby="emailHelp" name="option[]" placeholder="Option A" id="oa">
					                  			</div>
					                  		</div>
					                  		<div class="col-6">
					                  			<div class="d-flex align-items-center">
					                  				<input type="checkbox" name="ans[]" class="form-check" value="b" id="b">
					                  				<label for="exampleInputEmail1" class="form-label"> &nbsp&nbsp</label>
					                  				<input type="text" class="form-control"  aria-describedby="emailHelp" name="option[]" placeholder="Option B" id="ob">
					                  			</div>
					                  		</div>
					                  		<div class="col-6">
					                  			<label for="exampleInputEmail1" class="form-label"></label>
					                  			<div class="d-flex align-items-center">
					                  				<input type="checkbox" name="ans[]" class="form-check" value="c" id="c">
					                  				<label for="exampleInputEmail1" class="form-label"> &nbsp&nbsp</label>
					                  				<input type="text" class="form-control"  aria-describedby="emailHelp" name="option[]" placeholder="Option C" id="oc">
					                  			</div>
					                  		</div>
					                  		<div class="col-6">
					                  			<label for="exampleInputEmail1" class="form-label"></label>
					                  			<div class="d-flex align-items-center">
					                  				<input type="checkbox" name="ans[]" class="form-check" value="d" id="d">
					                  				<label for="exampleInputEmail1" class="form-label"> &nbsp&nbsp</label>
					                  				<input type="text" class="form-control"  aria-describedby="emailHelp" name="option[]" placeholder="Option D" id="od">
					                  			</div>
					                  		</div>
					                  	</div>
					                  </div>
					                  <button type="submit" class="btn btn-primary" name="add_course">Submit</button>
					                </form>
					              </div>
					            </div>
									  </div>
									  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
									  	<div class="card border-top border-primary">
					              <div class="card-body">
					                <form method="POST" id="topic_question">
					                	<div class="mb-3">
					                		<select class="form-select" id="course_id" name="course_id">
					                			<option selected disabled>Select Course</option>
					                			<?php while($row = mysqli_fetch_assoc($course_data)) { ?>
					                				<option value="<?php echo $row['c_id']; ?>"><?php echo $row['course_name']; ?></option>
					                			<?php } ?>
					                		</select>
					                  </div>
					                  <div class="mb-3">
					                		<select class="form-select" id="topic_id" name="topic_id">
					                			<option selected disabled>Select Topic</option>
					                		</select>
					                  </div>
					                  <div class="mb-3">
					                    <label for="exampleInputEmail1" class="form-label">Write Question</label>
					                    <input type="text" class="form-control" aria-describedby="emailHelp" name="question" id="question">
					                  </div>
					                  <div class="mb-3">
					                  	<div class="row">
					                  		<div class="col-6">
					                  			<div class="d-flex align-items-center">
					                  				<input type="checkbox" name="ans[]" class="form-check" value="a" id="a">
					                  				<label for="exampleInputEmail1" class="form-label"> &nbsp&nbsp</label>

					                  				<input type="text" class="form-control" aria-describedby="emailHelp" name="option[]" placeholder="Option A" id="oa">
					                  			</div>
					                  		</div>
					                  		<div class="col-6">
					                  			<div class="d-flex align-items-center">
					                  				<input type="checkbox" name="ans[]" class="form-check" value="b" id="b">
					                  				<label for="exampleInputEmail1" class="form-label"> &nbsp&nbsp</label>
					                  				<input type="text" class="form-control"  aria-describedby="emailHelp" name="option[]" placeholder="Option B" id="ob">
					                  			</div>
					                  		</div>
					                  		<div class="col-6">
					                  			<label for="exampleInputEmail1" class="form-label"></label>
					                  			<div class="d-flex align-items-center">
					                  				<input type="checkbox" name="ans[]" class="form-check" value="c" id="c">
					                  				<label for="exampleInputEmail1" class="form-label"> &nbsp&nbsp</label>
					                  				<input type="text" class="form-control"  aria-describedby="emailHelp" name="option[]" placeholder="Option C" id="oc">
					                  			</div>
					                  		</div>
					                  		<div class="col-6">
					                  			<label for="exampleInputEmail1" class="form-label"></label>
					                  			<div class="d-flex align-items-center">
					                  				<input type="checkbox" name="ans[]" class="form-check" value="d" id="d">
					                  				<label for="exampleInputEmail1" class="form-label"> &nbsp&nbsp</label>
					                  				<input type="text" class="form-control"  aria-describedby="emailHelp" name="option[]" placeholder="Option D" id="od">
					                  			</div>
					                  		</div>
					                  	</div>
					                  </div>
					                  <button type="submit" class="btn btn-primary" name="add_course">Submit</button>
					                </form>
					              </div>
					            </div>
									  </div>
									  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
									  	<div class="card border-top border-primary">
					              <div class="card-body">
					                <form method="POST" id="topic_question">
					                	<div class="mb-3">
					                		<select class="form-select" id="course_id" name="course_id">
					                			<option selected disabled>Select Course</option>
					                			<?php while($row = mysqli_fetch_assoc($course_data)) { ?>
					                				<option value="<?php echo $row['c_id']; ?>"><?php echo $row['course_name']; ?></option>
					                			<?php } ?>
					                		</select>
					                  </div>
					                  <div class="mb-3">
					                		<select class="form-select" id="topic_id" name="topic_id">
					                			<option selected disabled>Select Topic</option>
					                		</select>
					                  </div>
					                  <div class="mb-3">
					                    <label for="exampleInputEmail1" class="form-label">Write Question</label>
					                    <input type="text" class="form-control" aria-describedby="emailHelp" name="question" id="question">
					                  </div>
					                  <div class="mb-3">
					                  	<div class="row">
					                  		<div class="col-6">
					                  			<div class="d-flex align-items-center">
					                  				<input type="checkbox" name="ans[]" class="form-check" value="a" id="a">
					                  				<label for="exampleInputEmail1" class="form-label"> &nbsp&nbsp</label>

					                  				<input type="text" class="form-control" aria-describedby="emailHelp" name="option[]" placeholder="Option A" id="oa">
					                  			</div>
					                  		</div>
					                  		<div class="col-6">
					                  			<div class="d-flex align-items-center">
					                  				<input type="checkbox" name="ans[]" class="form-check" value="b" id="b">
					                  				<label for="exampleInputEmail1" class="form-label"> &nbsp&nbsp</label>
					                  				<input type="text" class="form-control"  aria-describedby="emailHelp" name="option[]" placeholder="Option B" id="ob">
					                  			</div>
					                  		</div>
					                  		<div class="col-6">
					                  			<label for="exampleInputEmail1" class="form-label"></label>
					                  			<div class="d-flex align-items-center">
					                  				<input type="checkbox" name="ans[]" class="form-check" value="c" id="c">
					                  				<label for="exampleInputEmail1" class="form-label"> &nbsp&nbsp</label>
					                  				<input type="text" class="form-control"  aria-describedby="emailHelp" name="option[]" placeholder="Option C" id="oc">
					                  			</div>
					                  		</div>
					                  		<div class="col-6">
					                  			<label for="exampleInputEmail1" class="form-label"></label>
					                  			<div class="d-flex align-items-center">
					                  				<input type="checkbox" name="ans[]" class="form-check" value="d" id="d">
					                  				<label for="exampleInputEmail1" class="form-label"> &nbsp&nbsp</label>
					                  				<input type="text" class="form-control"  aria-describedby="emailHelp" name="option[]" placeholder="Option D" id="od">
					                  			</div>
					                  		</div>
					                  	</div>
					                  </div>
					                  <button type="submit" class="btn btn-primary" name="add_course">Submit</button>
					                </form>
					              </div>
					            </div>
									  </div>
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
	$(document).on('change','#course_id',function(){

			var c_id = $(this).val();

			$.ajax({
				type:"post",
				url:"ajax_search.php",
				data:{"c_id":c_id},

					success:function(res)
					{
							$('#topic_id').html(res);
					}
			})
	})

	$(document).on('submit','#topic_question',function(e){
		e.preventDefault();

		var question = $(this).serialize();

		$.ajax({
				type:"post",
				url:"ajax_question.php",
				data:question,

					success:function(res)
					{
							$('#oa').val('');
							$('#ob').val('');
							$('#oc').val('');
							$('#od').val('');
							$('#a').prop('checked', false); 
							$('#b').prop('checked', false); 
							$('#c').prop('checked', false); 
							$('#d').prop('checked', false); 
					}
			})

	})
</script>