<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/bootstrap2.min.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script> 
</head>



</head>
<body>

	<div class="container">
		<?php
			session_start();
			include "conn.php";
			if (isset($_POST['register']))
			{
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$phone=$_POST['phone'];
				$email=$_POST['email'];
				$pass=$_POST['password'];
				$cpass=$_POST['cpass'];
				
				
				$query = "select * from users_tbl where email='{$email}'";
				$res = mysqli_query($conn, $query);
				
				if(mysqli_num_rows($res) > 0)
				{
					echo"<div class='alert-warning alert-dismissible fade in'>
					<a href='#' class='close' data-dismiss ='alert'  aria-lable='close'>&times;</a>
					<strong>warning!</strong> This email is used, Try another one please!</div>";
				}
				else
				{
					if($pass===$cpass)
					{
						$sql="insert into users_tbl(fname,lname,phone,email,password) values('$fname','$lname','$phone','$email','$pass')";
						
						$result=mysqli_query($conn,$sql);
						
						if($result)
						{
							echo"<div class='alert alert-success alert-dismissible fade in'>
							<a href='#' class='close' data-dismiss ='alert'  aria-lable='close'>&times;</a>
							<strong>success!</strong> You are register successfully!!!</div>";
							header("location: login.html");
						}
						else
						{
							echo"<div class='message'><p>This email is used, try another One Please !</p></div><br>";
						}
					}
					else
					{
						echo"<div class='alert-warning alert-dismissible fade in'>
						<a href='#' class='close' data-dismiss ='alert'  aria-lable='close'>&times;</a>
						<strong>warning!</strong>Password does not match!</div>";
					}
				}
			}
			else
			{
		?>
		
		<h2><center>REGISTRATION FORM</center></h2>
			<div class="row">
				<form method="POST">
					<div class="form-group">
							<div>
								<label for="Username">User Name:-</label>
								<input type="text" class="form-control" id="username" placeholder="Enter Email" name="fname" Required>
							</div>
							<div>
								<label for="Email">lname:-</label>
								<input type="text" class="form-control" id="lname" placeholder="Enter Email" name="lname" Required>
							</div>
							<div>
								<label for="Phone">Phone:-</label>
								<input type="number" class="form-control" id="email" placeholder="Enter Phone Number" name="phone" Required>
							</div>
							<div>
								<label for="Email">Email:-</label>
								<input type="Email" class="form-control" id="email" placeholder="Enter Email" name="email" Required>
							</div>
							<div>
								<label for="Email">Password:-</label>
								<input type="password" class="form-control" id="Password" placeholder="Enter Password" name="password" Required>
							</div>
							<div>
								<label for="Password">Re-Password:-</label>
								<input type="password" class="form-control" id="rePassword" placeholder="Enter Password" name="cpass" Required>
							</div>
							<br>
							<center>
								<button type="submit" name="register" class="btn btn-primary">submit<value="Login"></button>
								<button type="reset" name="reset" class="btn btn-danger">Reset</button>
							</center>	
					</div>
				</form>
			</div> 
	

</div>

	<?php
	}
	?>
</body>
</html>