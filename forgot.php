<?php
	include"conn.php";
	
	if(isset($_POST['forgot']))
	{
		$email = $_POST['email'];
		$oldpass = $_POST['oldpass'];
		
		$newpass = $_POST['newpass'];
		$pass2 = $_POST['conpass'];
		
		$sql="select *from users_tbl where email='$email' and password ='$oldpass'";
		
		$result=mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count =mysqli_num_rows($result);
		
		if($newpass==$pass2)
			{
			 $sql1 = "UPDATE users_tbl SET password='$newpass' WHERE email='$email'";
			 
						$res=mysqli_query($conn,$sql1);
						echo "<div class='alert alert-success alert-dismissible fade in'>
						 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						 <strong>success!</strong> This email is used,Try another One Please!</div>";
						 echo "<a href='login.html'><button class='btn btn-info'>Go Login page</button></a>";
			}	
			else
			{
				echo"<div class='alert alert-warning alert-dismissible fade in'>
					<strong>warning!</strong>Wrong Password,Try One Time!
					</div>";
			}
			
						 
	}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<link rel="stylesheet" href="css/bootstrap2.min.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/script.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<h1 align="center">Forgot Form</h1>
		<hr>
		<form method="POST">
						<div class="form-group">
								<label for="usr">Email:</label>
								<input type="email" class="form-control" placeholder="Email Address" name="email">
						</div>
						<div class="form-group">
								<label for="usr">Old Password:</label>
								<input type="password" class="form-control" placeholder="Enter Old Password" name="oldpass">
						</div>
						<div class="form-group">
								<label for="usr">New Password:</label>
								<input type="password" class="form-control" placeholder="Enter New Password" name="newpass">
						</div>
						<div class="form-group">
								<label for="uer">Confirm-Password:</label>
								<input type="password" class="form-control" placeholder="Confirm-Password" name="conpass">
						</div>
						
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">
										</div>
										<div class="col-sm-3">
												<center><input type="reset" name="reset" value="Clear" class="form-control btn btn-warning"></center>
										</div>
										<div class="col-sm-3">
												<center><input type="submit" name="forgot" id="submit" value="Forget Password" class="form-control btn btn-info"></center>
										</div>
										<div class="col-sm-3">
										
										</div>
									</div>
								</div>
					<div class="links">
									I have an account?<a href="login.html">Login</a>
					</div>
					
		</form>
	</div>
</body>
</html>