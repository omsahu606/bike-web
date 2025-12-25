<?php
include 'config.php';
session_start();

include("conn.php");

if (!isset($_SESSION['u_id'])) 
{
    header("location: index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bike-Showroom</title>
		<link rel="stylesheet" href="CSS/bootstrap.min.css?v=<?=$version?>">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="CSS/style2.css">
				<script src="js/jquery.min.js"></script>
				<script src="js/bootstrap.min.js"></script> 
	</head>
	<body>
<form method="get" action="Address.php">
					<div class="section-header">
						<a href="addressform">Add Address</a>
					</div>
					
					<div class="form-group">
					  <input class="input2"  type="text" name="fname" id="first_name" value="<?php if(isset($_SESSION['fname'])){echo $_SESSION['fname'];}else{echo "First Name";}?>" >
					</div>
						<div class="form-group">
							<input type="text" name="house_no" placeholder="House No" required>
						</div>
						<div class="form-group">
							<input type="text" name="state" placeholder="State" required>
						</div>
						<div class="form-group">
							<input type="text" name="city" placeholder="City" required>
						</div>
						<div class="form-group">
							<input type="text" name="pincode" placeholder="pincode" required>
						</div>
						<div class="form-group">
							<input type="text" name="brief_add" placeholder="Near by Landmarks" required>
						</div>
						<div>
								<button type="submit">Submit</button>
						</div>
				
						
			</form>
</body>
</html>