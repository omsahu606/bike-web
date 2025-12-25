<?php
	include"conn.php";
	$uid=$_GET['u_id'];
	
	$query1="select *from users_tbl where u_id='$uid'";
	$res = mysqli_query($conn,$query1);
	$row = mysqli_fetch_array($res);

	if(isset($_POST['update']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		
		$errors = array();
		$filename = $_FILES["photo"]["name"];
		$filetype = $_FILES["photo"]["type"];
		$filesize = $_FILES["photo"]["size"];
		$file_tmp = $_FILES["photo"]["tmp_name"];
		$extensions = array("jpg", "jpeg", "gif", "png");
		$file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
		// Verify file extension
		if (in_array($file_ext, $extensions) == false) {
			$errors[] = "Error: Please select a valid file format.";
		}

		// Verify file size - 5MB maximum
		$maxsize = 5 * 1024 * 1024;
		if ($filesize > $maxsize) {
			$errors[] = "Error: File size is larger than the allowed limit.";
		}
		
		// Verify MYME type of the file
		if (empty($errors) == true) {
			if (file_exists("C:/xampp/htdocs/om/Bike-showroom/mimg/" .$filename)) {
				echo $filename . " already exists.";
			} 
			else 
			{
				move_uploaded_file($file_tmp, "C:/xampp/htdocs/om/Bike-showroom/mimg/" . $filename);
				echo "";
			}
		}
		
		$query1 = "update users_tbl set file='$filename',fname='$fname', lname='$lname', email='$email', password='$password' where u_id ='$uid'";
		$result1 = mysqli_query($conn, $query1);
		if ($result1) 
		{
			echo "<div class='alert alert-success alert-dismissible fade in'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>success !</strong> Details Updated successfully!!!</div>";	
			
		} 
		else 
		{
			echo "<div class='message'><p>Something is wrong</p></div><br>";
		}         	
			
	}
?>

<!DOCCTYPE html>
<html>
	<head>
	
		<link rel="stylesheet" href="CSS/bootstrap2.min.css">
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
											<h1><center>UPDATE FORM</center></h1>
						
							
							<form method="post" enctype="multipart/form-data">	
								<div class="form-group">		
									<div class="row">
										<div class="col-sm-2 thumbnail ">			
													
											<img src="../Bike-showroom/mimg/<?PHP echo $row['file']?>" class="img-thumbnail" alt="User_Image">	
											<center><label><?PHP echo $row['name']?> </label></center>
										</div>
										
										<div class="col-sm-4">
										
											<input type="file" class="#" name="photo" id="fileSelect">
																		
											<p>
												<strong>Format:</strong> Only .jpg, .jpeg, .gif, .png allowed.<br><br>
												<strong>Size:</strong> Max size of 5 MB allowed.
											</p>					
										</div>
										
										<div class="col-sm-6">
										
										</div>
									</div>
								
									<div>
										<label for="Productname">Series:-</label>
										<input type="text" class="form-control" id="username" value="<?php echo $row['fname']?>" placeholder="Enter series" name="series" Required>
									</div>
									<div>
										<label for="Productname">Pname:-</label>
										<input type="text" class="form-control" id="username" value="<?php echo $row['lname']?>" placeholder="Enter Productname" name="pname" Required>
									</div>
									<div>
										<label for="productmodel">Pmodel:-</label>
										<input type="text" class="form-control" id="username" value="<?php echo $row['email']?>" placeholder="Enter productmodel" name="pmodel" Required>
									</div>
									<div>
										<label for="producttype">Ptype:-</label>
										<input type="text" class="form-control" id="username" value="<?php echo $row['password']?>" placeholder="Enter producttype" name="ptype" Required>
									</div>
									
									
										
								</div>
							
								
								<div class="form-group">
									<div class="row">
										<div class="col-sm-12">
											<div class="col-sm-4">
												<a href="contact us.php"><input type="reset" name="reset" value="Clear" class="form-control btn btn-warning"></a>
											</div>
											<div class="col-sm-4">
												<a href="contact us.php"><center><input type="text" name="goback" value="Go Back" class="form-control btn btn-info"></center></a>
											</div>
											<div class="col-sm-4">
												<a href="u_update.php"><center><input type="submit" name="update" id="submit" value="Update" class="form-control btn btn-primary"></center></a>
											</div>
										</div>
									</div>			  
								</div>	

							
					</form>
					<!--col first ends-->
						
					
				</div>
			
			</div>
		</div>
					
	</body>
</html>





















