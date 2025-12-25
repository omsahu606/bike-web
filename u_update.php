<?php
	include"conn.php";
	$uid=$_GET['u_id'];
	
	$query1="select *from users_tbl where u_id='$uid'";
	$res = mysqli_query($conn,$query1);
	$row = mysqli_fetch_array($res);
	
	if(isset($_POST['update']))
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$phone=$_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$query1 = "update users_tbl set fname='$fname',lname='$lname',phone='$phone',email='$email',password='$password' where u_id='$uid'";
		$result1 = mysqli_query($conn, $query1);
		if ($result1) 
		{
			echo "<div class='alert alert-success alert-dismissible fade in'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>success !</strong> Details Updated successfully!!!</div>";	
			header("location:admin.php");
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
					<h1 align="center">Update User Details</h1>
					<form class="form-group" method="POST">
				
						
								<div class="row">
									<div>
										<label> Fname</label>
										<input class="form-control" type="text" value="<?PHP echo $row['fname']?>" placeholder="Enter Your Fname" name="fname" required>
									</div>
									
									<div>		
										<label>Lname</label>
										<input class="form-control" type="text" value="<?PHP echo $row['lname']?>" placeholder="Enter Your Lname" name="lname" required>
									</div>
									
									<div>		
										<label>Phone-Number</label>
										<input class="form-control" type="number" value="<?PHP echo $row['phone']?>" placeholder="Enter Your Phone-Number" name="phone" required>
									</div>
									
									<div>
										<label>Email</label>
										<input class="form-control" type="email" value="<?PHP echo $row['email']?>" placeholder="Enter Your email" name="email" required>
									</div>
					
									<div>
										<label>Password</label>
										<input class="form-control" value="<?PHP echo $row['password']?>" placeholder="Enter Your Password" name="password" require>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-12">
											<div class="col-sm-4">
												<input type="reset" name="reset" value="Clear" class="form-control btn btn-warning"></a>
											</div>
											<div class="col-sm-4">
												<a href="#"><center><input type="text" name="goback" value="Go Back" class="form-control btn btn-info"></center></a>
											</div>
											<div class="col-sm-4">
												<center><input type="submit" name="update" id="submit" value="Update" class="form-control btn btn-primary"></center>
											</div>
										</div>
									</div>			  
								</div>							
					</form>
				
						
					
				</div>
			
			</div>
		</div>
					
	</body>
</html>





















