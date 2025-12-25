<?php
	include "conn.php";
	$pid = $_GET['p_id'];

	$query1 = "SELECT * FROM product_tbl WHERE p_id='$pid'";
	$res = mysqli_query($conn, $query1);
	$row = mysqli_fetch_array($res);

	if (isset($_POST['update'])) {
		$series = $_POST['series'];
		$pname = $_POST['pname'];
		$pmodel = $_POST['pmodel'];
		$ptype = $_POST['ptype'];
		$desc = $_POST['description'];
		$re_year = $_POST['re_year'];
		$price = $_POST['price'];
		
		$errors = array();
		$filename = $_FILES["photo"]["name"];
		$filetype = $_FILES["photo"]["type"];
		$filesize = $_FILES["photo"]["size"];
		$file_tmp = $_FILES["photo"]["tmp_name"];
		$extensions = array("jpg", "jpeg", "gif", "png");
		$file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

		if (!in_array($file_ext, $extensions)) {
			$errors[] = "Invalid file format.";
		}

		if ($filesize > 5 * 1024 * 1024) {
			$errors[] = "File too large (max 5MB).";
		}

		if (empty($errors)) {
			if (!file_exists("C:/xampp/htdocs/om/Bike-showroom/mimg/" . $filename)) {
				move_uploaded_file($file_tmp, "C:/xampp/htdocs/om/Bike-showroom/mimg/" . $filename);
			}
		}

		$query1 = "UPDATE product_tbl SET file='$filename', series='$series', pname='$pname', pmodel='$pmodel', 
		ptype='$ptype', description='$desc', re_year='$re_year', price='$price' WHERE p_id='$pid'";
		$result1 = mysqli_query($conn, $query1);

		if ($result1) {
			echo "<script>alert('✅ Details Updated Successfully!');</script>";
		} else {
			echo "<script>alert('❌ Something went wrong!');</script>";
		}
	}
?>
<!DOCTYPE html>
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
						<div class="col-sm-2 thumbnail">			
							<img src="../Bike-showroom/mimg/<?php echo $row['file']; ?>" class="img-thumbnail" alt="User_Image">	
							<center><label><?php echo $row['pname']; ?></label></center>
						</div>
						<div class="col-sm-4">
							<input type="file" name="photo" id="fileSelect">
							<p><strong>Format:</strong> jpg, jpeg, gif, png | <strong>Max:</strong> 5MB</p>
						</div>
					</div>

					<label>Series:</label>
					<input type="text" class="form-control" name="series" value="<?php echo $row['series']; ?>">

					<label>Product Name:</label>
					<input type="text" class="form-control" name="pname" value="<?php echo $row['pname']; ?>">

					<label>Product Model:</label>
					<input type="text" class="form-control" name="pmodel" value="<?php echo $row['pmodel']; ?>">

					<label>Product Type:</label>
					<input type="text" class="form-control" name="ptype" value="<?php echo $row['ptype']; ?>">

					<label>Description:</label>
					<input type="text" class="form-control" name="description" value="<?php echo $row['description']; ?>">

					<label>Release Year:</label>
					<input type="text" class="form-control" name="re_year" value="<?php echo $row['re_year']; ?>">

					<label>Price:</label>
					<input type="text" class="form-control" name="price" value="<?php echo $row['price']; ?>">
				</div>

				<div class="row mt-3">
					<div class="col-sm-4">
						<!-- 🔹 Clear Button -->
						<input type="button" value="Clear" class="form-control btn btn-warning" id="clearBtn">
					</div>
					<div class="col-sm-4">
						<a href="admin.php"><input type="button" value="Go Back" class="form-control btn btn-info"></a>
					</div>
					<div class="col-sm-4">
						<input type="submit" name="update" value="Update" class="form-control btn btn-primary">
					</div>
				</div>			  
			</form>	
		</div>
	</div>
</div>

<!-- ✅ Clear Button Script -->
<script>
document.getElementById("clearBtn").addEventListener("click", function() {
    // Select all text, number, and file inputs
    document.querySelectorAll("#updateForm input[type='text'], #updateForm input[type='number'], #updateForm input[type='file']").forEach(el => el.value = "");
});
</script>

</body>
</html>
