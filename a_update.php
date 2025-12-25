<?php
	include"conn.php";
	$aid=$_GET['a_id'];
	
	$query1="select *from accessories_tbl where a_id='$aid'";
	$res = mysqli_query($conn,$query1);
	$row = mysqli_fetch_array($res);

	if(isset($_POST['update']))
	{
				$aname=$_POST['aname'];
				$desc=$_POST['description'];
				$price=$_POST['price'];
				
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
		
		$query = "update accessories_tbl set aname='$aname',description='$desc',price='$price',file='$filename' where a_id ='$aid' ";
		$result1 = mysqli_query($conn, $query);
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
					<form method="post" enctype="multipart/form-data" id="updateForm">	
								<div class="form-group">		
									<div class="row">
										<div class="col-sm-2 thumbnail ">			
													
											<img src="../Bike-showroom/mimg/<?PHP echo $row['file']?>" class="img-thumbnail" alt="User_Image">	
											<center><label><?PHP echo $row['aname']?> </label></center>
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
										<label for="Productname">Aname:-</label>
										<input type="text" class="form-control" id="accessoriesname" value="<?php echo $row['aname']?>" placeholder="Enter Productname" name="aname" Required>
									</div>
										<label for="Description">Description:-</label>
										<input type="text" class="form-control" id="Description" value="<?php echo $row['description']?>" placeholder="Enter Description" name="description" Required>
									</div>
									<div>
										<label for="price">price:-</label>
										<input type="number" class="form-control" id="Mprice" value="<?php echo $row['price']?>" placeholder="Enter price" name="price" Required>
									</div>					
				</div>
							
								
								<div class="form-group">
									<div class="row">
										<div class="col-sm-12">
											<div class="col-sm-4">
												<!-- 🔹 Clear Button -->
												<input type="button" value="Clear" class="form-control btn btn-warning" id="clearBtn">
											</div>
											<div class="col-sm-4">
												<a href="admin.php"><center><input type="text" name="goback" value="Go Back" class="form-control btn btn-info"></center></a>
											</div>
											<div class="col-sm-4">
												<center><input type="submit" name="update" id="submit" value="Update" class="form-control btn btn-primary"></center>
											</div>
										</div>
									</div>			  
								</div>		
					</form>
					<!--col first ends-->
			</div>
		</div>

<!-- ✅ Clear Button Script -->
<script>
document.getElementById("clearBtn").addEventListener("click", function() {
    // Select all text, number, and file inputs
    document.querySelectorAll("#updateForm input[type='text'], #updateForm input[type='number']").forEach(el => el.value = "");
});
</script>		
	</body>
</html>





















