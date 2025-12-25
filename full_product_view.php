<?php
	session_start();
	include("conn.php");

	if (!isset($_SESSION['u_id'])) 
	{
		header("location: index.html");
	}	
	
	if (isset($_POST['book']))
	{
		$pid=$_GET['p_id'];
		$cid=$_SESSION['u_id'];
		
		
		$sql="insert into booking_tbl(p_id,c_id) values('$pid','$cid')";
		$res = mysqli_query($conn, $sql);
		
		if($res)
			{
				echo"<div class='alert alert-success alert-dismissible fade in'>
				<a href='#' class='close' data-dismiss ='alert'  aria-lable='close'>&times;</a>
				<strong>success!</strong> You are booking successfully!!!</div>";
				
			}
			else
			{
				echo"<div class='message'><p>Somthing is Wrong</p></div><br>";
			}
	}
	
	// WISHLIST CODE (without date_time)
if (isset($_POST['wishlist'])) {
    $pid = $_GET['p_id'];
    $cid = $_SESSION['u_id'];

    // Check if already exists
    $check = "SELECT * FROM wishlist_tbl WHERE c_id='$cid' AND p_id='$pid'";
    $checkRes = mysqli_query($conn, $check);

    if (mysqli_num_rows($checkRes) > 0) {
        echo "<div class='alert alert-info alert-dismissible fade in'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Info!</strong> Product already in Wishlist!
              </div>";
    } else {
       
        $sql1 = "INSERT INTO wishlist_tbl(c_id, p_id) VALUES('$cid', '$pid')";
        $res1 = mysqli_query($conn, $sql1);

        if ($res1) {
            echo "<div class='alert alert-success alert-dismissible fade in'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong> Added to Wishlist!!!
                  </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade in'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Error!</strong> Something went wrong.
                  </div>";
        }
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/style2.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
			<script src="js/jquery.min.js"></script>
			<script src="bootstrap.min.js"></script> 


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
			<?php
						include"conn.php";
							
						$pid=$_GET['p_id'];
						
						$query1 = "select * from product_tbl where p_id='$pid'";
						$res = mysqli_query($conn, $query1);
						$data = mysqli_num_rows($res);
						if($res)
						{
							while($row = mysqli_fetch_array($res))
							{
			?>
			<div class="col-md-12">
				<div class ="thumbnail-om">
							 <!-- Wishlist Button Added -->
        <form method="post" style="display:inline;">
            <button name="wishlist" type="submit" style="background:none;border:none;">
                <i class="fa fa-regular fa-heart fa-2x" style="color:red;"></i>
            </button>
        </form>
							<img src="../Bike-showroom/mimg/<?PHP echo $row['file']?>"alt="Fjords">
							<h1><?PHP echo $row['pname']?></h1></a>
							<h5>Description-<?PHP echo $row['description']?></h5>
							<h5>4.1
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<a href="#"><b>4,009 reting | search this page</b></a>
							</h5><br><hr>
							<h4>-10% ₹<h5>Price-<?PHP echo $row['price']?></h5></h4>
							<h5>EX Showroom Price<s>220000</s></h5><hr>
							<h5>Price-<?PHP echo $row['re_year']?></h5>

								<h4><b>Bike Details</b></h4>
							
						<h5><b>Engine Type				</b>Single Cylinder, 4 Stroke, Air Cooled, Fuel Injection</h5></h5>
						<h5><b>Displacement		  		</b>349 cc</h5>
						<h5><b>Maximum Power			</b>20.2 bhp @ 6100 rpm</h5>
						<h5><b>Maximum Torque	 		</b>27 Nm @ 4000 rpm</h5>
						<h5><b>Mileage			 		</b>35 km/l (Approx.)</h5>
						<h5><b>Top Speed		 		</b>120 km/h</h5>
						<h5>Fuel Tank Capacity<b>		</b>13 Litres</h5>
						<h5>Front Brake<b>				</b>Disc with ABS</h5>
						<h5>Rear Brake<b>				</b>Disc</h5>
						<h5>Kerb Weight<b>				</b>195 kg</h5>
						<h5>Available Colors<b>			</b>Black, Silver, Red, Matte Blue</h5>
						<h5>Warranty<b>					</b>3 Years / 30,000 km (whichever is earlier)</h5>
						<div class="detailsemi">

					<div class="detailsemi">
							<!-- ====== EMI Information ====== -->
						<div class="emi-section" style="margin-top:30px;">
								<h3>EMI & Finance Details</h3>
								<p>You can book this bike with easy monthly installments (EMI). Check the sample EMI calculation below:</p>

								<table class="table table-bordered">
									<tr>
										<th>Ex-Showroom Price</th>
										<td>₹ 2,15,000</td>
									</tr>
									<tr>
										<th>Down Payment</th>
										<td>₹ 25,000</td>
									</tr>
									<tr>
										<th>Loan Amount</th>
										<td>₹ 1,90,000</td>
									</tr>
									<tr>
										<th>Interest Rate</th>
										<td>9.5% p.a.</td>
									</tr>
									<tr>
										<th>Tenure</th>
										<td>36 Months</td>
									</tr>
									<tr>
										<th>Monthly EMI (Approx.)</th>
										<td>₹ 6,080</td>
									</tr>
								</table>
						</div>
					</div>		
				</div>		
			</div>		 
				<?php	
							}
							
							}
							else
							{
								echo"<div class='alert alert-warning alert-dismissble fade in'>
									 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;<a/>
									 <strong>Success!</strong>Detail Update successfully!!!</div>";
							}
				?>
			</div>
			<form method="post">
				<button class="buttoncart" name="book" type="submit">Booking</button>
			</form>
			<br>
			<br>
			<br>
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
							<div class="colsm-4 col-sm-4 mb-30">
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
										<a href="#"><i class="fab fa-instagram instagram-bg"></i></a>
										<a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
										<a href="#"><i class="fab fa-google-plus google-bg"></i></a>
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
									<div class="subscribe-form">
										<form action="#">
											<input type="text" placeholder="Email Address">
											<button><i class="fab fa-telegram-plane"></i></button>
										</form>
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
										<li><a href="#">Home</a></li>
										<li><a href="#">Models</a></li>
										<li><a href="#">Book</a></li>
										<li><a href="#">assesiries</a></li>
										<li><a href="#">Contact us</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
			</footer>
			
	</body>
</html>