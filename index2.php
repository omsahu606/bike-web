<?php
include 'config.php';
session_start();

include("conn.php");

if (!isset($_SESSION['u_id'])) 
{
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bike-Showroom</title>
		<link rel="stylesheet" href="CSS/bootstrap2.min.css?v=<?=$version?>">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="CSS/style2.css">
				<script src="js/jquery.min.js"></script>
				<script src="js/bootstrap.min.js"></script> 
	</head>
	<body>
	<div class="container-fluid">
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
					  <li><a href="book_testdrive.php">Book</a></li>
					  <li><a href="Assessories.php">Accessories</a></li>
					  <li><a href="enqueryform.php">Enquiry</a></li>
					  <li><a href="gallery.php">Gallery</a></li>

					  <!-- Dropdown Fixed -->
					  <li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						  <i class="fa fa-user"></i> <?php echo $_SESSION['fname'];?> <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
						  <li><a href="profile.php">Profile</a></li>
						  <li><a href="logout.php">Log-Out</a></li>					
						</ul>
					  </li>

					  <li><a href="view_booking.php"><i class="fa fa-bike"></i> My Bike</a></li>
					  <li><a href="view wishlist.php"><i class="fa fa-heart"></i> Wishlist</a></li>
					  <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
					</ul>
				  </div>
				</div>
			</nav>	
		</header>

				<!-- slider start -->
				
		<div class="slider">
			  <div class="slide" style="background-image: url('image/bikewala-detail.jpg');"></div>
			  <div class="slide" style="background-image: url('assured-buyback.jpg');"></div>
			  <div class="slide" style="background-image: url('image/spare-parts.jpg');"></div> 
		</div>
				<!-- slider end -->
		 
		 <!-- models start -->
		<section id="models">
				<div class="row">
					<h3>Motercycle</h3>
					<div class="col-md-6">
						<a href="models1.php">
							<div class="thumbnail">
								<img src="image/1920x850o.jpg"alt="Fjords">
								<p>350 Series</p>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="models2.php">
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
						<a href="models4.php">
								<div class="thumbnail">
								<img src="image/Screenshoto1.jpg"alt="Fjords">
								<p>650 Series</p>
							</div>
						</a>
					</div>
				</div>
		</section>	
			<!-- models end -->
			
			<!-- book astart -->
			<section id="Book">
				<div class="image-buttono">
					<a href="book_testdrive.php"><img src="image/zigwheels-detail.jpg"alt="image"></a>
					<h3><b>Book a test drive</b></h3>
				</div><br><br>
			</section>	
			<!--book a end-->
			<!-- assesiries start-->
			
			<section id="Assesiries"> 
				<div class="row">
					<h2>Safty Where</h2>
					<div class="col-md-4">
						<div class="well-om">
							<div class="row">
								<div class="col-md-6">
									<a href="Assessories.php">
										<div class="thumbnail om">
											<img src="image/asse/sefty/1.jpg""alt="Fjords">
											<p>Glaps</p>
										</div>
									</a>
								</div>
								<div class="col-md-6">
									<a href="Assessories.php">
										<div class="thumbnail om">
											<img src="image/asse/sefty/2.jpg"alt="Fjords">
											<p>Helmets</p>
										</div>
									</a>
								</div>
								<div class="col-md-6">
									<a href="Assessories.php">
										<div class="thumbnail om">
											<img src="image/asse/sefty/3.1.jpg"alt="Fjords">
											<p>Jackets</p>
										</div>
									</a>
								</div>
								<div class="col-md-6">
									<a href="Assessories.php">
										<div class="thumbnail om">
											<img src="image/asse/sefty/4.jpg"alt="Fjords">
											<p>Jackets</p>
										</div>
									</a>
								</div>
								
							</div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="well-om">
							<div class="row">
								<div class="col-md-6">
									<a href="Assessories.php"><div class="thumbnail om">
										<img src="image/asse/sefty/5.jpg"alt="Fjords">
										<p>T-shirt</p>
										</a>
									</div>
								</div>
								<div class="col-md-6">
									<a href="Assessories.php">
										<div class="thumbnail om">
											<img src="image/asse/sefty/6.jpg"alt="Fjords">
											<p>Bag</p>
										</div>
									</a>
								</div>
								<div class="col-md-6">
									<a href="Assessories.php">
										<div class="thumbnail om">
											<img src="image/asse/sefty/7.jpg"alt="Fjords">
											<p>assesiries</p>
										</div>
									</a>
								</div>
								<div class="col-md-6">
									<a href="Assessories.php">
										<div class="thumbnail om">
											<img src="image/asse/sefty/8.jpg"alt="Fjords">
											<p>Boots</p>
										</div>
									</a>
								</div>
								
							</div>
							
							
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="well-om">
							<div class="row">
								<div class="col-md-6">
									<a href="Assessories.php">
										<div class="thumbnail om">
											<img src="image/asse/sefty/9.jpg"alt="Fjords">
											<p>Panniers</p>
										</div>
									</a>
								</div>
								<div class="col-md-6">
									<a href="Assessories.php">
									<div class="thumbnail om">
										<img src="image/asse/sefty/10.jpg"alt="Fjords">
										<p>Rails</p>
									</div>
								</div>
								<div class="col-md-6">
									<a href="Assessories.php">
									<div class="thumbnail om">
										<img src="image/asse/sefty/11.jpg"alt="Fjords">
										<p>Acjost</p>
									</div>
									</a>
								</div>
								<div class="col-md-6">
									<a href="Assessories.php">
									<div class="thumbnail om">
										<img src="image/asse/sefty/12.jpg"alt="Fjords">
										<p>Leage gard</p>
									</a>
									</div>
								</div>
								
							</div>
							
							
							<div class="catagory">
								<div class="container-fluid">
								<div class="catagory-item-container has">
								</div>
								</div>
							</div>
						</div>
					
					</div>	
				</div>
			</section>
			<!-- assesiries end-->
			
			 <!--- CATEGORY	-->
				
					<div class="category-om">
						<div class="container-fluid">
							<div class="category-item-container has-scrollbar">
								<div class="category-item">
									<div class="category-img-box">
									  <img src="image/asse/alloy/first.jpeg" alt="dress & frock" width="150">
									</div>
									<div class="category-content-box">
									  <div class="category-content-flex">
										<h3 class="category-item-title">Trend alloy wheels</h3>
										<p class="category-item-amount">(1)</p>
									  </div>
									  <a href="#" class="category-btn">Show all</a>
									</div>
								</div>
								<div class="category-item">
									<div class="category-img-box">
									  <img src="image/asse/alloy/secound.jpg" alt="winter wear" width="150">
									</div>
									<div class="category-content-box">
									  <div class="category-content-flex">
										<h3 class="category-item-title">Trend alloy wheels</h3>
										<p class="category-item-amount">(2)</p>
									  </div>
									  <a href="#" class="category-btn">Show all</a>
									</div>
								</div>
								<div class="category-item">
									<div class="category-img-box">
									  <img src="image/asse/alloy/theird.jpg" alt="glasses & lens" width="150">
									</div>
									<div class="category-content-box">
									  <div class="category-content-flex">
										<h3 class="category-item-title">Trend alloy wheels</h3>
										<p class="category-item-amount">(3)</p>
									  </div>
									  <a href="#" class="category-btn">Show all</a>
									</div>
								</div>

								<div class="category-item">
										<div class="category-img-box">
										  <img src="image/asse/alloy/five.jpg" alt="shorts & jeans" width="150">
										</div>
									<div class="category-content-box">
										<div class="category-content-flex">
											<h3 class="category-item-title">Trend alloy wheels</h3>
											<p class="category-item-amount">(4)</p>
										</div>
									  <a href="#" class="category-btn">Show all</a>
									</div>
								</div>

								<div class="category-item">
									<div class="category-img-box">
									  <img src="image/asse/alloy/forth.jpg" alt="t-shirts" width="150">
									</div>
									<div class="category-content-box">
										  <div class="category-content-flex">
											<h3 class="category-item-title">Trend alloy wheels</h3>
											<p class="category-item-amount">(5)</p>
										  </div>
											<a href="#" class="category-btn">Show all</a>
									</div>
								</div>

								<div class="category-item">
									<div class="category-img-box">
										<img src="image/asse/alloy/six.jpg" alt="jacket" width="150">
									</div>
									<div class="category-content-box">
										<div class="category-content-flex">
											<h3 class="category-item-title">Trend alloy wheels</h3>
											<p class="category-item-amount">(6)</p>
										</div>
									  <a href="#" class="category-btn">Show all</a>
									</div>
								</div>

								<div class="category-item">
									<div class="category-img-box">
									  <img src="image/asse/alloy/first.jpeg" alt="watch" width="150">
									</div>
									<div class="category-content-box">
										  <div class="category-content-flex">
											<h3 class="category-item-title">Trend alloy wheels</h3>
											<p class="category-item-amount">(7)</p>
										  </div>
									  <a href="#" class="category-btn">Show all</a>
									</div>
								</div>

								<div class="category-item">
									<div class="category-img-box">
									  <img src="image/asse/alloy/theird.jpg" alt="hat & caps" width="150">
									</div>
									<div class="category-content-box">
											<div class="category-content-flex">
												<h3 class="category-item-title">Trend alloy wheels</h3>
												<p class="category-item-amount">(8)</p>
											</div>
										  <a href="#" class="category-btn">Show all</a>
									</div>
								</div>
							</div>
						</div>
					</div><br><br>
					 <!--
					  - CATEGORY end 
					-->
					<div class="row">
						<h2>Trands</h2>
						<div class="col-md-4">
							<div class="well">
								<img src="image/fam1.jpeg"alt="Fjords">
							</div>
						</div>
						<div class="col-md-4">
							<div class="well">
								<img src="image/femm2.jpeg"alt="Fjords">
							</div>
						</div>
						<div class="col-md-4">
							<div class="well">
								<img src="image/pic3.jpg"alt="Fjords">
							</div>
						</div>
					</div>
					<br>
					<br>
					<br>
		<!-- footer-->
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
											<a href="#"><i class="fab fa-instagram instagram-bg"></i></a>
											<a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
											<a href="#"><i class="fab fa-google-plus google-bg"></i></a>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-6 mb-30">
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
								<div class="col-md-6">
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
								<div class="col-xl-6 col-lg-6 text-center text-lg-left">
									<div class="copyright-text">
										<p>Copyright &copy; 2025, All Right Reserved <a href="#">OM</a></p>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
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
	</div>
	</body>
</html>