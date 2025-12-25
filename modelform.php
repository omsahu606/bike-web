<?php
			include "conn.php";
			if (isset($_POST['add']))
			{
				$series=$_POST['series'];
				$pname=$_POST['pname'];
				$pmodel=$_POST['pmodel'];
				$ptype=$_POST['ptype'];
				$desc=$_POST['description'];
				$re_year=$_POST['re_year'];
				$price=$_POST['price'];
				
					$filename = $_FILES["photo"]["name"];
					$filetype = $_FILES["photo"]["type"];
					$filesize = $_FILES["photo"]["size"];
					$file_tmp = $_FILES["photo"]["tmp_name"];
					$extensions = array("jpg", "jpeg", "gif", "png");
					$file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
					if (in_array($file_ext, $extensions) == false) 
					{
						$errors[] = "Error: Please select a valid file format.";
					}
					$maxsize = 5 * 1024 * 1024;
					if ($filesize > $maxsize) 
					{
						$errors[] = "Error: File size is larger than the allowed limit.";
					}
				if (empty($errors) == true) 
				{
						if (file_exists("C:/xampp/htdocs/om/Bike-showroom/mimg/" . $filename)) 
						{
							echo $filename . " already exists.";	
						} 
					else
					{	
						$query = "insert into product_tbl(series,pname,pmodel,ptype,description,re_year,price,file)values('$series','$pname','$pmodel','$ptype','$desc','$re_year','$price','$filename')";
						$result = mysqli_query($conn, $query);
						
						if($result)
						{	
							move_uploaded_file($file_tmp, "C:/xampp/htdocs/om/Bike-showroom/mimg/".$filename);
							echo "File uploaded successfully";		
						}
						
						else
						{
							echo"<div class='message'><p>somthing is wrong</p></div><br>";
						}
						
					}
				}
					
			}		
		?>
<!DOCTYPE html>
<html>
	<head>
	  <title>Bootstrap Example</title>
		<link rel="stylesheet" href="css/bootstrap2.min.css">
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
	</head>
	<body class="modelom" >
		<div class="container">
		
						<h1><center>MODEL INPUT FORM</center></h1>
				
							<form method="post" enctype="multipart/form-data">								
								<div class="form-group">
									<div>
										<label for="Productname">Series:-</label>
										<input type="text" class="form-control" id="username" placeholder="Enter series" name="series" Required>
									</div>
									<div>
										<label for="Productname">Pname:-</label>
										<input type="text" class="form-control" id="username" placeholder="Enter Productname" name="pname" Required>
									</div>
									<div>
										<label for="productmodel">Pmodel:-</label>
										<input type="text" class="form-control" id="username" placeholder="Enter productmodel" name="pmodel" Required>
									</div>
									<div>
										<label for="producttype">Ptype:-</label>
										<input type="text" class="form-control" id="username" placeholder="Enter producttype" name="ptype" Required>
									</div>
									<div>
										<label for="Description">Description:-</label>
										<input type="text" class="form-control" id="Description" placeholder="Enter Description" name="description" Required>
									</div>
									<div>
										<label for="release_year">re_year:-</label>
										<input type="" class="form-control" id="Mprice" placeholder="Enter release_year" name="re_year" Required>
									</div>
									<div>
										<label for="price">price:-</label>
										<input type="" class="form-control" id="Mprice" placeholder="Enter price" name="price" Required>
									</div>
									<div>
										<label for="Photo">Photo:-</label>
										<input type="file" class="form-control" id="Photo" placeholder="Enter Photo" name="photo" Required>
									</div>
									<br>
									<center>
										<input type="submit" name="add" class="btn btn-primary" value="submit">
										<button type="reset" name="reset" class="btn btn-danger">Reset</button>
									</center>	
										
										
								</div>
							</form>
							<div class="col-sm-2">
								<a href="admin.php"><center><input type="text" name="goback" value="Go Back" class="form-control btn btn-info"></center></a>
							</div>
		</div>			
	</body>
</html>