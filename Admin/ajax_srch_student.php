<?php 


include_once 'db.php';

$name = $_POST['s_name'];
$srch_data = mysqli_query($con,"select * from user_tbl where name like '%$name%'");

 ?>

 	<?php $id=1; while($row = mysqli_fetch_assoc($srch_data)) { ?>
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

	<script type="text/javascript">
		$( '.multiple-select-field' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
	});
	</script>