<?php
include 'config.php';
session_start();

include("conn.php");

if (!isset($_SESSION['email'])) 
{
    header("location: index.html");
}
$uid = $_SESSION['u_id'];
$email = $_SESSION['email'];

$query = "select * from users_tbl where email = '{$email}'";
			
					$res = mysqli_query($conn, $query);
					
					$data=(mysqli_num_rows($res));
					
					$row = mysqli_fetch_array($res);
					
					if($_SERVER["REQUEST_METHOD"]=="POST"){
						
						$fname=$_POST['fname'];
						
						$email=$_SESSION['email'];
						
								$sql="update users_tbl set fname='$fname'  where email = '$email'";
						
						if($conn->query($sql)===true){
							
							$_SESSION['fname'] = $fname;
							
							
						} else{
							
							echo "Error updating.".$conn->error;
							
						}
					}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSS/bootstrap.min.css?v=<?=$version?>">
    <title>Document</title>
<style>


* {
     box-sizing: border-box;
    margin: 1px;
    padding: 5px;
    font-family: 'Arial', sans-serif;
}

body {
  background: #f2f2f2;
  padding: 30px;
}

.container {
  display: flex;
  max-width: 1100px;
  margin: auto;
  background: #fff;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 0 30px rgba(0,0,0,0.1);
}

.cart {
  flex: 2;
  padding: 40px;
  background: #fff;
}

.summary {
  flex: 1;
  background: #f9f9f9;
  padding: 40px;
}

.header h2 {
  font-size: 24px;
  margin-bottom: 20px;
}

.header span {
  color: hotpink;
}

.header a {
  color: #999;
  font-size: 14px;
  text-decoration: none;
}

.items .item {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.item img {
  width: 70px;
  height: 70px;
  margin-right: 20px;
  border-radius: 8px;
}

.details h4 {
  margin-bottom: 5px;
  font-size: 16px;
}

.details p {
  font-size: 13px;
  color: #666;
}

.price {
  margin-left: auto;
  font-weight: bold;
}

.summary h4 {
  font-size: 16px;
  margin-bottom: 8px;
}

.summary p {
  font-size: 14px;
  color: #555;
}

.summary a {
  color: hotpink;
  font-size: 14px;
  text-decoration: none;
  float: right;
}

.discount input {
  width: 70%;
  padding: 10px;
  margin-top: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
}

.discount button {
  padding: 10px 16px;
  margin-left: 10px;
  background: #444;
  color: white;
  border: none;
  border-radius: 6px;
  cursor: pointer;
}

.totals {
  margin-top: 30px;
}

.totals p {
  display: flex;
  justify-content: space-between;
  margin: 8px 0;
}

.totals hr {
  margin: 10px 0;
  border: none;
  border-top: 1px solid #ddd;
}

.totals .total {
  font-size: 18px;
  font-weight: bold;
}

.totals .free {
  color: green;
  font-weight: bold;
}

.checkout {
  margin-top: 20px;
  padding: 12px;
  width: 100%;
  background: hotpink;
  color: white;
  font-weight: bold;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(to right, #cbdcfb, #fdeecf);
  margin: 0;
  padding: 0;
}

.container {
  width: 90%;
  max-width: 900px;
  margin: 40px auto;
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 0 15px rgba(0,0,0,0.1);
  padding: 20px;
}

header.up {
  display: flex;
  justify-content: normal;
  align-items: center;
  flex-wrap: wrap;
  flex-direction: row;
  align-content: stretch;
}

header h2 {
  margin: 0;
}

.search {
  padding: 8px;
  border-radius: 10px;
  border: 1px solid #ccc;
  margin-right: 10px;
}

.user-pic {
  width: 40px;
  height: 40px;
  background: url('user.png') no-repeat center/cover;
  border-radius: 50%;
}

.profile-card {
  margin-top: 20px;
}

.profile-info {
  display: flex;
  align-items: center;
  gap: 15px;
}

.avatar {
  width: 60px;
  height: 60px;
  border-radius: 50%;
}

.profile-form {
  margin-top: 20px;
}

.form-group {
  display: flex;
  gap: 20px;
  margin-bottom: 15px;
}

input, select {
  flex: 1;
  padding: 10px;
  border: 1px solid #ddd;
}

.email-section {
  margin-top: 20px;
}

.timestamp {
  color: gray;
  font-size: 12px;
  display: block;
}

.add-email {
  color: #007bff;
  text-decoration: none;
  font-size: 14px;
}

.box1	{
width: 400px;
height: 800px;
}
.content2scroll{
		flex: 1;
		padding:40px;
		background-color: #fff;
		height: 100vh;
		overflow-y:scroll;
	}
	.content2scroll::{
	display:none;
	}
</style>

</head>
<body>
  <h1>Welcome to Bike Showroom </h1>
  <div class="container">
		<div class="col-sm-4">
		
			<div class="profile-card">
			  <div class="profile-info">
				<img src="image/contact.jpg" alt="Profile" class="avatar">
				<div>
				  <h3>OM</h3>
				  <p>om1@gmail.com</p>
				</div>
			  </div>
						<?PHP
						$query1="select *from users_tbl where u_id='$uid'";
							$res = mysqli_query($conn,$query1);
							$u_row = mysqli_fetch_array($res);

							if(isset($_POST['update']))
							{
								$fname=$_POST['fname'];
								$lname=$_POST['lname'];
								$email=$_POST['email'];
								$phone=$_POST['phone'];
								$date=$_POST['reg_date_time'];
								
								$query1 = "update users_tbl set fname='$fname', lname='$lname', email='$email', phone='$phone' , reg_date_time='$date' where u_id ='$uid'";
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
												  

				<form method="post" class="profile-form">
			  
					<div class="form-group">
					  <input type="text" placeholder="fname" value="<?PHP echo $u_row['fname']?>" name="fname">
					</div>
					<div class="form-group">
					  <input type="text" placeholder="lname" value="<?PHP echo $u_row['lname']?>" name="lname">
					</div>
					<div class="form-group">
					  <input type="text" placeholder="email" value="<?PHP echo $u_row['email']?>" name="email">
					</div>
					<div class="form-group">
					  <input type="phone" placeholder="Phone Number" value="<?PHP echo $u_row['phone']?>" name="phone">
					</div>
					
					 <input type="submit" name="update" id="submit"	 value="Update">
				</form>
			  <div class="email-section">
				  <p><strong>My Email Address</strong><br>"<?PHP echo $u_row['email']?>" <span class="timestamp">"<?PHP echo $u_row['reg_date_time']?>"</span></p>
				  <a href="#" class="add-email">+ Add Email Address</a>
				</div>
			</div>
			
			<form method="post" action="Address.php">
					<div class="section-header">
						<a href="#">Edit</a>
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
							<textarea name="brief_add" placeholder="Near by Landmarks"></textarea>
						</div>
						<div>
								<button type="submit">
										Submit
								</button>
						</div>
				
						
			</form>
			<h2>Address</h2>
			<?php
										$email = $_SESSION['email'];
										
										$sql2="select * from address_tbl where email = '$email'";
										$result=$conn->query($sql2);
										
										if($result->num_rows > 0){
											
											while($row = $result->fetch_assoc()){
			?>
													
													<h6>House No-<?PHP echo $row['house_no']?></h6></a>
													<h6>State-<?PHP echo $row['state']?></h6></a>
													<h6>City-<?PHP echo $row['city']?></h6></a>
													<h6>Pincode-<?PHP echo $row['pincode']?></h6></a>
													<h6>Landmark<?PHP echo $row['brief_add']?></h6></a>
	
							<?php			
											//short form of if else statement is '?(if)' and ':(else)'.		
													
													
													echo"<a href='address_delete.php?address_id=".$row['address_id']."'>Delete</a>";
													
							
											}
										}
								?>
		</div>
	
		<div class="col-sm-8">
			<h3 align="center">MODEL-LIST</h3>
			<table class="table table-striped">
					<thead>					
						<th>img</th>
						<th>Id</th>				
						<th>Aname</th>
						<th>Description</th>
						<th>Price</th>
					</thead>
					<tbody>
			
						<tbody>
									<?php
						$cart=" SELECT users_tbl.u_id,users_tbl.email,cart_tbl.cart_id,cart_tbl.a_id,cart_tbl.c_id,
						accessories_tbl.aname,accessories_tbl.description,accessories_tbl.price,accessories_tbl
						.file FROM cart_tbl	JOIN accessories_tbl ON cart_tbl.a_id = accessories_tbl.a_id JOIN users_tbl
						ON cart_tbl.c_id = users_tbl.u_id WHERE cart_tbl.c_id = '$uid'";
							$cart_result= $conn->query($cart);
						  if($cart_result->num_rows > 0){
										
							   while($c_row = $cart_result->fetch_assoc()){
					?>
									<tr>
										<td><img src="../Bike-showroom/mimg/<?PHP echo $c_row['file']?>" alt="Fjords"></td>
										<td><?PHP echo $c_row['a_id']?></td>
										<td><?PHP echo $c_row['aname']?></a></td>
										<td>Description-<?PHP echo $c_row['description']?></td>
										<td>Price-<?PHP echo $c_row['price']?></td>																								
									</tr>
								
									<?php
							  }
							  }
					?>
						</tbody>						
			</table>						
					</tbody>
		</div>
		</div>
                   
  </div>
</body>
</html>
