<?php include 'header.php'; ?>

<?php 

	$mysqli=new mysqli('localhost','root','','property');
	if($mysqli->connect_error){
		printf("Cannot connect to the database %s\n",$mysqli->connect_error);
		exit();
	}


	if (isset($_POST['submit'])) {
		$name=$_POST['name'];
		$charge=$_POST['charge'];
		$address=$_POST['address'];
		$access=$_POST['access'];
		$floor=$_POST['floor'];
		$utility=$_POST['utility'];
		$description=mysqli_real_escape_string($mysqli, $_POST['description']);
		
		$target_dir="uploads/";
		$target_file=$target_dir . basename($_FILES["images"]["name"]);
		$temp_file=$_FILES["images"]["name"];
		move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
		if ($_POST['name']=='' or $_POST['address']=='') {
			echo "<script>alert(\"All fields are required\")</script>";
			# code...
		}
		else{
			$query="INSERT INTO property (name,charge,address,access,floor,utility,description,images) VALUES ('$name','$charge','$address','$access','$floor','$utility','$description','$temp_file')";
			$insert=$mysqli->query($query);
			$last_id=$mysqli->insert_id;
			$c=count($_FILES['img']['name']);
			if ($insert) {
				
				if ($c < 10) {
					for ($i=0; $i < $c; $i++) { 
						$img_name=$_FILES['img']['name'][$i];
						move_uploaded_file($_FILES['img']['tmp_name'][$i], "uploads/" .$img_name);
						$query_multi="INSERT INTO details (images,proid) VALUES ('$img_name','$last_id')";
						$int=$mysqli->query($query_multi);
						header("location: manage.php");
					}
					#else {
						#echo "MAX LIMIT EXCEED";
					#}
					
				}
			}
			#if ($insert) {

        	#	echo "<script>alert(\"Record Inserted Successfully\")</script>";
        //header("location: manage_author.php");
      #	}
	      #else{
	      #  echo "<script>alert(\"No Record Inserted\")</script>";
	        //header("location: welcome.php");
	     # }

		}

		

		


		#
	}


 ?>
<div class="container">
 <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
 	<fieldset>
 		<legend>Add a Property</legend>
 		<hr>
 		<br>
 		<div class="form-group">
 			<label for="inputemail" class="col-sm-2 control-label">Name Of Property</label>
 			<div class="col-sm-10">
 				<input type="text" class="form-control" name="name" placeholder="Property Name">
 				
 			</div>
 			
 		</div>
 		<div class="form-group">
 			<label for="inputpassword" class="col-sm-2 control-label">Monthly Charge</label>
 			<div class="col-sm-10">
 				<input type="number" name="charge" class="form-control" placeholder="Monthly Charge">
 				

 			</div>
 		</div>
 		<div class="form-group">
 			<label for="textarea" class="col-sm-2 control-label">Address</label>
 				<div class="col-sm-10">
 					<textarea class="form-control" rows="1" name="address"></textarea>
 			
 				</div>

 			
 		</div>
 		<div class="form-group">
 			<label for="inputpassword" class="col-sm-2 control-label">Access</label>
 			<div class="col-sm-10">
 				<input type="text" name="access" class="form-control" placeholder="Access">
 				

 			</div>
 		</div>
 		<div class="form-group">
 			<label for="inputpassword" class="col-sm-2 control-label">Floor Space</label>
 			<div class="col-sm-10">
 				<input type="text" name="floor" class="form-control" placeholder="Floor Space">
 				

 			</div>
 		</div>
 		<div class="form-group">
 			<label for="inputpassword" class="col-sm-2 control-label">Utility</label>
 			<div class="col-sm-10">
 				<input type="text" name="utility" class="form-control" placeholder="Utility">
 				

 			</div>
 		</div>
 		<div class="form-group">
 			<label for="textarea" class="col-sm-2 control-label">Description</label>
 				<div class="col-sm-10">
 					<textarea class="form-control" name="description" rows="1" id="textarea"></textarea>
 			
 				</div>

 			
 		</div>
 		<div class="form-group">
 			<label for="textarea" class="col-sm-2 control-label">Feature Images</label>
 				<div class="col-sm-10">
 					<input type="file" name="images">
 			
 				</div>

 			
 		</div>
 		<div class="form-group">
 			<label for="textarea" class="col-sm-2 control-label">Rooms Images</label>
 				<div class="col-sm-10">
 					<input type="file" name="img[]" multiple>
 			
 				</div>

 			
 		</div>
 		<div class="form-group">
 			<div class="col-sm-10 col-sm-offset-2">
 				<button type="reset" class="btn btn-danger">Cancel</button>
 				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
 			</div>
 			
 		</div>
 		
 	</fieldset>
 	

 </form>
</div>
<?php include 'footer.php'; ?>



