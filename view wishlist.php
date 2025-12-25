<?php

session_start();

include("conn.php");

if (!isset($_SESSION['u_id'])) 
{
    header("location: index.php");
}
	$cid = $_SESSION['u_id'];

	// ✅ Remove from wishlist
	if (isset($_GET['remove'])) {
		$wid = $_GET['remove'];
		$delete = "DELETE FROM wishlist_tbl WHERE w_id='$wid' AND c_id='$cid'";
		if (mysqli_query($conn, $delete)) {
			echo "<script>alert('✅ Product removed from wishlist successfully!');window.location='view wishlist.php';</script>";
		} else {
			echo "<script>alert('❌ Failed to remove product!');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Registration_Page</title>
		<link rel="stylesheet" href="css/bootstrap2.min.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
			<h3 align="center"><i class="fa fa-regular fa-heart"></i>Wishlist View</h3>
		<table class="table table-striped">
			<thead>					
				<th>img</th>			
				<th>Pname</th>
				<th>Price</th>
				<th>Action</th>
				<th>Remove</th>
			</thead>
			<tbody>
				<?php
					// Fetch wishlist items with product details
					$query = "SELECT wishlist_tbl.w_id, product_tbl.pname, product_tbl.price, product_tbl.file, product_tbl.p_id 
						  FROM wishlist_tbl 
						  JOIN product_tbl ON wishlist_tbl.p_id = product_tbl.p_id 
						  WHERE wishlist_tbl.c_id='$cid'";
					$res = mysqli_query($conn, $query);

					if (mysqli_num_rows($res) > 0) {
						while ($row = mysqli_fetch_assoc($res)) {
									?>
										<tr>	
											<td><img src="../Bike-showroom/mimg/<?PHP echo $row['file']?>" class="display img-thumbnail" alt="User_Image"></td>
											<td><?php echo $row['pname']?></td>																					
											<td><?php echo $row['price']?></td>	
											<td><?php echo"<a href='full_product_view.php?p_id={$row['p_id']}' class='btn btn-sm btn-primary'>View Product</a></td>"?>
											<td><?php echo"<a href='view wishlist.php?remove={$row['w_id']}' class='btn btn-sm btn-danger 	 '>Remove</a></td>" ?> 
										</tr>
									
										<?php
										}
								
											}
					 else {
						echo "<div class='empty'>
								<i class='fa fa-heart-broken'></i>
								<h1>Your wishlist is empty!</h1>
								<a href='book_testdrive.php' class='btn btn-primary mt-3'>Continue Booking</a>
							  </div>";
					}
				?>
			</tbody>						
		</table>
	</div>
</body>
</html>
