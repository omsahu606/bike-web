<?php
session_start();

include("conn.php");


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<link rel="stylesheet" href="CSS/bootstrap2.min.css">
		<link rel="stylesheet" href="CSS/style2.css">
				<script src="js/jquery.min.js"></script>
				<script src="js/bootstrap.min.js"></script> 


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
				  <!-- Brand and toggle get grouped for better mobile display -->
				  
						<div class="collapse navbar-collapse">
						  <ul class="nav navbar-nav navbar-right">
							<li><a href="#index2.php">HOME</a></li>
							<li><a href="models.php">Models</a></li>
							<li><a href="book_testdrive.php">Book </a></li>
							<li><a href="Assessories.php">Assessories </a></li>
							<li><a href="enqueryform.php">Enquery</a></li>
							<li><a href="gallery.php">Gallary</a></li>
							<li><a href="profile.php">Profile</a></li>
							<li><a href="view_booking.php">MY BIKE</a></li>
							<li><a href="cart.php"><i class="fa-shopping-cart fa-2x">Cart</i></a></li>
						
						  </ul>
						</div>
				</div>
			</nav>	
		</header>
	 <!-- models start -->
		 <section id="models">
				<div class="row">
					<h3>Motercycle</h3>
						<div class="col-md-6">
							<a href="login.html">
								<div class="thumbnail">
									<img src="image/1920x850o.jpg"alt="Fjords">
									<p>350 Series</p>
								</div>
							</a>
						</div>
						<div class="col-md-6">
							<a href="login.html">
								<div class="thumbnail">
									<img src="image/guerilla.jpg"alt="Fjords">
									<p>450 Series</p>
								</div>
							</a>
						</div>
						<div class="col-md-6">
							<a href="models3.php">
								<div class="thumbnail">
									<img src="image/himalayano.jpg"alt="Fjords">
									<p>Himallyen</p>
								</div>
							</a>
						</div>
						<div class="col-md-6">
							<a href="login.html">
								<div class="thumbnail">
									<img src="image/Screenshoto1.jpg"alt="Fjords">
									<p>650 Series</p>
								</div>
							</a>
						</div>
				</div>
			</section>	
		
			<!-- models end -->
			
			
			<!-- foter-->
		<footer>
				<footer class="footer-section">
			<div class="container">
				<div class="footer-cta pt-5 pb-5">
					<div class="row">
						<div class="col-xl-4 col-md-4 mb-30">
							<div class="single-cta">
								<i class="fas fa-map-marker-alt"></i>
								<div class="cta-text">
									<h4>Find us</h4>
									<span>Arang Raipur,chhattisgarh</span>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-4 mb-30">
							<div class="single-cta">
								<i class="fas fa-phone"></i>
								<div class="cta-text">
									<h4>Call us</h4>
									<span>9111215500</span>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-4 mb-30">
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
						<div class="col-xl-4 col-lg-4 mb-50">
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
						<div class="col-xl-4 col-lg-4 col-md-6 mb-30">
							<div class="footer-widget">
								<div class="footer-widget-heading">
									<h3>Useful Links</h3>
								</div>
								<ul>
									<li><a href="models.html">MODELS</a></li>
									<li><a href="book.html">Book a test drive</a></li>
									<li><a href="accessories.html">Accessories</a></li>
									<li><a href="enquery.html">About us</a></li>
									<li><a href="gallery.html">Gallery us</a></li>
									
								</ul>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-6 mb-50">
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
			<div class="copyright-area">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-6 text-center text-lg-left">
							<div class="copyright-text">
								<p>@moterenfildshowroomgamil.com <a href="@moterenfildshowroomgamil.com">OM</a></p>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
							<div class="footer-menu">
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><a href="contactus.html">contactus</a></li>
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