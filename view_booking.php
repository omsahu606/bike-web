<?php
include 'config.php';
session_start();

include("conn.php");

if (!isset($_SESSION['u_id'])) 
{
    header("location: index.php");
}

$uid = $_SESSION['u_id'];					
// ✅ Remove from booking
	if (isset($_GET['remove'])) {
		$bookid = $_GET['remove'];
		$delete = "DELETE FROM booking_tbl WHERE book_id='$bookid' AND c_id='$uid'";
		if (mysqli_query($conn, $delete)) {
			echo "<script>alert(' Bike removed from booking successfully!');window.location='view_booking.php';</script>";
		} else {
			echo "<script>alert(' Failed to remove Bike!');</script>";
		}
	}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="CSS/style2.css?v=5">
			<script src="js/jquery.min.js"></script>
			<script src="bootstrap.min.js"></script> 

<style>
    body {
      background-color: #000; /* dark background like your bike page */
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
      padding-top: 50px;
    }

    .form-box {
      background-color: #111; /* dark box */
      border: 1px solid #333;
      padding: 25px 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(255, 0, 0, 0.3);
    }

    .form-box h3 {
	  font-size: 15px;
      text-align: center;
      color: #e63946; /* red heading */
      margin-bottom: 25px;
    }

    .form-control {
      background-color: #000;
      border: 1px solid #444;
      color: #fff;
      border-radius: 4px;
    }

    .form-control:focus {
      border-color: #e63946;
      box-shadow: 0 0 5px rgba(230, 57, 70, 0.6);
    }

    label {
      color: #e63946;
      font-weight: 600;
    }

    .btn-custom {
      background-color: #e63946;
      border: none;
      color: #fff;
      width: 100%;
      font-weight: bold;
      transition: 0.3s;
    }

    .btn-custom:hover {
      background-color: #c72c3b;
      color: #fff;
    }

    .btn-reset {
      background-color: #333;
      color: #fff;
      border: none;
      width: 100%;
      margin-top: 10px;
      transition: 0.3s;
    }

    .btn-reset:hover {
      background-color: #555;
    }
	
	.overflowb {
    flex: 1;
    padding: 40px;
    background-color: #black;
    height: 100vh;
    overflow-y: scroll;
	}
  </style>
</head>
	<body>
		<!--======= HEADER =========-->
		<header>
		   <nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<div class="imagelogo">
							<img src="image/royal.png" alt="logo">
						</div>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="index2.php">HOME</a></li>
							<li><a href="models.php">Models</a></li>
							<li><a href="book_testdrive.php">Book </a></li>
							<li><a href="Assessories.php">Assessories </a></li>
							<li><a href="enqueryform.php">Enquery</a></li>
							<li><a href="gallery.php">Gallary</a></li>
							<li><div class="dropdown">
									<a "dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"><?php echo $_SESSION['fname'];?></i><span Class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="profile.php">Profile</a></li>
										<li><a href="logout.php">Log-Out</a></li>					
									</ul>
								</div>
							</li>
							<li><a href="view_booking.php"><i class="fa fa-bike">My Bike</i></a></li>
							<li><a href="view wishlist.php"><i class="fa fa-regular fa-heart">Wishlist</i></a></li>
							<li><a href="cart.php"><i class="fa-shopping-cart">Cart</i></a></li>
							
						</ul>
					</div>
				</div>
			</nav>	
		</header>	
	<div class="container">
	<h1 style="text-transform:uppercase">Book mybike</h1>
		<div class="row">
			<?php 
					$uid = $_SESSION['u_id'];
					$query1="select *from users_tbl where u_id='$uid'";
							$res = mysqli_query($conn,$query1);
							$u_row = mysqli_fetch_array($res);

							if(isset($_POST['update']))
							{
								$fname=$_POST['fname'];
								$lname=$_POST['lname'];
								$phone=$_POST['phone'];
								
								$query1 = "update users_tbl set fname='$fname', lname='$lname', phone='$phone' where u_id ='$uid'";
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
		<div class= "col-sm-4">
			<div class="form-box">
					<h3>Customer Info</h3>
					<h3><b>Email</b>-<?PHP echo $u_row['email']?></h3>
					<form  method="post">
					  <div class="form-group">
						<label for="fname">First Name</label>
						<input type="text" id="fname" name="fname" class="form-control" placeholder="Enter first name" value="<?PHP echo $u_row['fname']?>" required>
					  </div>
					  <div class="form-group">
						<label for="lname">Last Name</label>
						<input type="text" id="lname" name="lname" class="form-control"  value="<?PHP echo $u_row['lname']?>"  required>
					  </div>
					  <div class="form-group">
						<label for="phone">Phone</label>
						<input type="tel" id="phone" name="phone" class="form-control" value="<?PHP echo $u_row['phone']?>" required>
					  </div>
					  <button type="submit" name="update" class="btn btn-custom">Update</button>
					</form>
				<br>
				<a href="profile.php">
				<button type="submit" class="btn btn-custom">Add Address</button> </a>
				<?php
										$cid = $_SESSION['u_id'];
										
										$sql2="select * from address_tbl where u_id = '$cid'";
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
		</div>
			<div class="col-sm-8 overflowb">
				<?php
					$cart=" SELECT users_tbl.u_id,users_tbl.email,booking_tbl.book_id,booking_tbl.p_id,booking_tbl.c_id,product_tbl.pname,product_tbl.description,product_tbl.price,product_tbl.ptype,product_tbl.re_year,product_tbl.file FROM booking_tbl	JOIN product_tbl ON booking_tbl.p_id = product_tbl.p_id JOIN users_tbl ON booking_tbl.c_id = users_tbl.u_id WHERE booking_tbl.c_id = '$uid'";
					$cart_result= $conn->query($cart);
					if($cart_result->num_rows > 0){	
					
						while($b_row = $cart_result->fetch_assoc()){
					?>
		
				
				<br>
				<br>
				<br>
				
						<div class ="thumbnail-om">
							<img src="../Bike-showroom/mimg/<?PHP echo $b_row['file']?>"alt="Fjords">
						</div>
						<br>
						<br>
						<?php echo"<a href='view_booking.php?remove={$b_row['book_id']}' class='btn btn-sm btn-danger'>Remove</a></td>" ?>
				
						<h1><?PHP echo $b_row['pname']?></h1></a>
							<h5>Description-<?PHP echo $b_row['description']?></h5>
							<h5>4.1
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<a href="#"><b>4,009 reting | search this page</b></a>
							</h5><br><hr>
							<h4>-10% ₹<h5>Price-<?PHP echo $b_row['price']?></h5></h4>
							<h5>EX Showroom Price<s>220000</s></h5><hr>
							<h5>Price-<?PHP echo $b_row['re_year']?></h5>
			
				
					<?php	
								}
								
								}
						else {
							echo '<h2 class="empty-msg">Your wishlist is empty!</h2>';
							}
					?>
			</div>
		</div>
		
	</div>
	<br>
	<br>
	<br>
			<!-- foter-->
	<footer>
			<footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-sm-4 col-sm-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span>Arang Raipur,chhattisgarh</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>9111215500</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span>mail@omsahup606.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-sm-4 col-sm-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html"><img src="image/21c7f9dda00d469bbc966e42d0c1fff5.png" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p>ROYAL-ENFILED</p>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                                <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-4 col-sm-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="#">Models</a></li>
                                <li><a href="#">Book</a></li>
                                <li><a href="#">assesiries</a></li>
								<li><a href="#">Contact us</a></li>
                                <li><a href="#">Gallary</a></li>
                                <li><a href="#">Our Services</a></li> 
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-6 text-center text-sm-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2025, All Right Reserved <a href="#">OM</a></p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-sm-6 d-none d-sm-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="index2.php">Home</a></li>
                                <li><a href="models.php">Models</a></li>
                                <li><a href="book_testdrive.php">Book</a></li>
                                <li><a href="Assessories.php">assesiries</a></li>
                                <li><a href="enqueryform.php">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </footer>
		<!-- footer-->
	</body>
</html>