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
		<title>Document</title>
		<link rel="stylesheet" href="CSS/bootstrap2.min.css">
		<link rel="stylesheet" href="CSS/style2.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<style>
		* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
}

.contact-body{
  background: #fff;
  color: #222;
}

.contact-section {
  padding: 60px 10%;
  text-align: center;
}

.section-header .tag {
  display: inline-block;
  background: #bd686845;
  color: #e60000b3;
  font-weight: 600;
  padding: 5px 15px;
  border-radius: 20px;
  font-size: 14px;
}

.section-header h2 {
  font-size: 32px;
  color: #e6000082;
  margin-top: 15px;
}

.contact-container {
  display: flex;
  flex-wrap: wrap;
  margin-top: 40px;
  justify-content: center;
  gap: 30px;
}

.contact-info {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 25px;
  flex: 1;
  min-width: 320px;
}

.info-box {
  background: #f8f8f8;
  border-radius: 10px;
  padding: 25px;
  text-align: left;
  transition: 0.3s;
}

.info-box i {
  font-size: 28px;
  color: #e6000082;
  margin-bottom: 10px;
}

.info-box h3 {
  font-size: 18px;
  margin-bottom: 8px;
  color: #222;
}

.info-box p {
  color: #222;
  line-height: 1.5;
  font-size: 15px;
}

.contact-form {
  flex: 1;
  min-width: 320px;
  background: #f8f8f8;
  padding: 30px;
  border-radius: 10px;
  text-align: left;
}

.contact-form .form-row {
  display: flex;
  gap: 15px;
  margin-bottom: 15px;
}

.contact-form input,
.contact-form textarea {
  width: 100%;
  padding: 12px 15px;
  border: 1px solid #ddd;
  border-radius: 6px;
  font-size: 15px;
  outline: none;
}

.contact-form input:focus,
.contact-form textarea:focus {
  border-color: #3f51b5;
}

.contact-form button {
  display: block;
  width: 100%;
  background: #e527417a;
  color: #fff;
  border: none;
  padding: 12px;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  transition: 0.3s;
}

.contact-form button:hover {
  background: #e60000;
}

@media (max-width: 900px) {
  .contact-container {
    flex-direction: column;
    align-items: center;
  }

  .contact-info {
    grid-template-columns: 1fr 1fr;
  }

  .contact-form {
    width: 100%;
  }
}
		</style>
	</head>
<body class="enqueryom">

		<div class="container-fluid">
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
		</div>
	<div  style="background-color: white">
		<div class="container-fluid">
		<br><br>
			<div class="col-sm-12">
				<div class="col-sm-5">
					<img src="image/enquery/1891.jpg">
				</div>
				
				<div class="col-sm-7">
					<h1><b>1891</b></h1>
					<p>November 1891, entrepreneurs Bob Walker Smith and Albert Eadie buy George Townsend & Co. of Hunt End,
					Redditch. Townsend’s is a well-respected needle manufacturer of almost 50 years standing which has rece-
					ntly begun manufacturing bicycles.</p>
				</div>
			</div>
				
			<div class="col-sm-12">
				<div class="col-sm-7">
					<h1><b>1956</b></h1>
					<p>1956 The Tiruvottiyur factory opens and Bullets begin to be manufactured under license. Init-
					ially, these machines are shipped from England in kit form then assembled in the Madras plant. A
					total of 163 Enfield India Bullets are built by the end of the year..</p>
				</div>
				<div class="col-sm-5">
					<img src="image/enquery/1956-factory.jpg">
				</div>
			</div>
			
			<div class="col-sm-12">
				<div class="col-sm-5">
					<img src="image/enquery/1977-Exportmodels.jpg">
				</div>
				
				<div class="col-sm-7">
					<h1><b>1977</b></h1>
					<p>1977 Enfield India begins exporting the 350cc Bullet to the UK and Europe. Sales grow rapidl-
					y as the bike develops a following amongst classic motorcycle enthusiasts..</p>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="col-sm-7">
					<h1><b>1989</b></h1>
					<h4>1989 A new 24 bhp 500cc Bullet is released. The bike is primarily aimed at export markets wh-
					ere it is available in Classic, Deluxe and Superstar trim..</h4>
				</div>
				<div class="col-sm-5">
					<img src="image/enquery/1989.jpg">
				</div>
			</div>
			<div class="col-sm-12">
				<div class="col-sm-5">
					<img src="image/enquery/2009.jpg">
				</div>
				
				<div class="col-sm-7">
					<h1><b>1993</b></h1>
					<p>1977 Enfield India begins exporting the 350cc Bullet to the UK and Europe. Sales grow rapidl-
					y as the bike develops a following amongst classic motorcycle enthusiasts..</p>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="col-sm-7">
					<h1><b>2009</b></h1>
					<p>1989 A new 24 bhp 500cc Bullet is released. The bike is primarily aimed at export markets wh-
					ere it is available in Classic, Deluxe and Superstar trim..</p>
				</div>
				<div class="col-sm-5">
					<img src="image/enquery/2009.jpg">
				</div>
			</div>
			<div class="col-sm-12">
				<div class="col-sm-5">
					<img src="image/enquery/2009.jpg">
				</div>
				
				<div class="col-sm-7">
					<h1><b>1993</b></h1>
					<p>1977 Enfield India begins exporting the 350cc Bullet to the UK and Europe. Sales grow rapidl-
					y as the bike develops a following amongst classic motorcycle enthusiasts..</p>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="col-sm-7">
					<h1><b>2009</b></h1>
					<p>1989 A new 24 bhp 500cc Bullet is released. The bike is primarily aimed at export markets wh-
					ere it is available in Classic, Deluxe and Superstar trim..</p>
				</div>
				<div class="col-sm-5">
					<img src="image/enquery/2009.jpg">
				</div>
			</div>
			<div class="col-sm-12">
				<div class="col-sm-5">
					<img src="image/enquery/2014.jpg">
				</div>
				
				<div class="col-sm-7">
					<h1><b>1914</b></h1>
					<p>1977 Enfield India begins exporting the 350cc Bullet to the UK and Europe. Sales grow rapidl-
					y as the bike develops a following amongst classic motorcycle enthusiasts..</p>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="col-sm-7">
					<h1><b>2015</b></h1>
					<p>2019 A new 24 bhp 500cc Bullet is released. The bike is primarily aimed at export markets wh-
					ere it is available in Classic, Deluxe and Superstar trim..</p>
				</div>
				<div class="col-sm-5">
					<img src="image/enquery/2019.jpg">
				</div>
			</div>
			<div class="col-sm-12">
				<div class="col-sm-5">
					<img src="image/enquery/2020.jpg">
				</div>
				
				<div class="col-sm-7">
					<h1><b>2020</b></h1>
					<p>2020 Enfield India begins exporting the 350cc Bullet to the UK and Europe. Sales grow rapidl-
					y as the bike develops a following amongst classic motorcycle enthusiasts..</p>
				</div>
			</div>	
		</div>							
</div>
		<div class="contact-body">
			<section class="contact-section">
				<div class="section-header">
				  <span class="tag">CONTACT</span>
				  <h2>Contact Us</h2>
				</div>
				<div class="contact-container">

					<div class="contact-info">

						<div class="info-box">
						  <i class="fa-map-marker"></i>
						  <h3>Address</h3>
						  <p>Raipur<br>CG</p>
						</div>

						<div class="info-box">
						  <i class="fa-solid fa-phone"></i>
						  <h3>Call Us</h3>
						  <p><span>+91 9111215533</span><br><span>+91 9111215533</span></p>
						</div>

						<div class="info-box">
						  <i class="fa-solid fa-envelope"></i>
						  <h3>Email Us</h3>
						  <p>om@email.com</p>
						</div>

						<div class="info-box">
						  <i class="fa-time"></i>
						  <h3>Open Hours 10AM to 6PM</h3>
						  <p>Monday - Friday</p>
						</div>

					</div>

					<div class="contact-form">
						<form action="enquery.php" method="post">
						  <div class="form-row">
							<input type="text" placeholder="Your Name" name="fname" required>
							<input type="email" placeholder="Your Email" name="email" required>
						  </div>
						  <input type="text" placeholder="Subject" name="subject" required>
						  <textarea rows="6" placeholder="Message" name="massage" required></textarea>
						  <button type="submit">Send Message</button>
						</form>
					</div>

				</div>
			</section>
		</div>
			
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