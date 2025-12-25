<?php
session_start();

include("conn.php");

if (!isset($_SESSION['fname'])) 
{
    header("location: index.php");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style2.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script> 
</head>
	<body>
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

		
		
		<div class="well-om">
			<div class="row">

				<div class="col-md-12">
							<?php
								$query1 = "select * from accessories_tbl";
								$res = mysqli_query($conn, $query1);
								$data=mysqli_num_rows($res);
								
								if($data)
								{
									while($row=mysqli_fetch_array($res))
									{
									
									
							?>
							<div class="col-md-4">
								<div class="thumbnail om">
									<a href="Assessories2.php?a_id=<?php echo $row['a_id'];?>" class="category-btn">
								
									<a href="Assessories2.php?a_id=<?php echo $row['a_id'];?>"><img src="../Bike-showroom/mimg/sefty/<?PHP echo $row['file']?>" alt="Fjords"></a>
									</a>
									<h2><?PHP echo $row['aname']?></h2></a>
									<h5>Description-<?PHP echo $row['description']?></h5>
									<h3>Price-<?PHP echo $row['price']?></h3>
									
									<p></p>
								</div>
							</div>
							<?php
									}
								}
								
									?>		
				</div>
			</div>	
		</div>
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
	<!-- footer-->
	</body>
</html>