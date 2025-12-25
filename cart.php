<?php
session_start();

include("conn.php");

if (!isset($_SESSION['u_id'])) 
{
    header("location: index.php");
}
$uid = $_SESSION['u_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <link rel="stylesheet" href="CSS/style2.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
	<style>	
	.itemc img {
      width: 115px;
    height: 117px;
    margin-right: 9px;
    border-radius: 10px;
	}
	.summaryc {
    flex: 2;
    background: #f9f9f9;
    padding: 40px;
	}
	.content2{
		flex: 1;
		padding:40px;
		background-color: #fff;
		height: 100vh;
		overflow-y:scroll;
	}
	*{
	margin: 5px;
    padding: 0;
    box-sizing: border-box;
	}
	.content2::{
	display:none;
	}
	.del{
	 background-color: #f51b11d1;       
	font: #ffffff;
	border: none;                  
	padding: 8px;                           
	border-radius: 6px;  
	cursor: pointer;              
	 }
	</style>			
</head>
<body>

<?php
// Fetch total amount  from cart
$totalQuery = "SELECT SUM(accessories_tbl.price) AS total_price, COUNT(cart_tbl.cart_id) AS total_items
               FROM cart_tbl
               JOIN accessories_tbl ON cart_tbl.a_id = accessories_tbl.a_id
               WHERE cart_tbl.c_id = '$uid'";
$totalResult = $conn->query($totalQuery);
$totalData = $totalResult->fetch_assoc();

$totalPrice = $totalData['total_price'] ?? 0;
$totalItems = $totalData['total_items'] ?? 0;
?>
	<div class="containerc">
		<div class="cartc">
			<div class="headerc">
				<a href="assessories.php">← Continue shopping</a>
				<h2>Shopping cart <span><?php echo $totalData['total_items'] ?> items</span></h2>
			</div>
			<div class="content2">
			<div class="itemsc">
				<div class="itemc">
					<?php
						$cart=" SELECT users_tbl.u_id,users_tbl.email,cart_tbl.cart_id,cart_tbl.a_id,cart_tbl.c_id,accessories_tbl.aname,accessories_tbl.description,accessories_tbl.price,accessories_tbl.file FROM cart_tbl	JOIN accessories_tbl ON cart_tbl.a_id = accessories_tbl.a_id JOIN users_tbl ON cart_tbl.c_id = users_tbl.u_id WHERE cart_tbl.c_id = '$uid'";
							$cart_result= $conn->query($cart);
						  if($cart_result->num_rows > 0){
										
							   while($c_row = $cart_result->fetch_assoc()){
					?>
					
						<tr>
							
							<div class="detailsc">
							<td><img src="../Bike-showroom/mimg/<?php echo $c_row['file'];?>" alt="User_Image"></td>
								<h4><td><?php echo $c_row['aname'];?></td></h4>
								<p><td><?php echo $c_row['description'];?></td></p>
							</div>
							<div class="price"><td>&#x20B9;<?php echo $c_row['price'];?></td></div>
							<td><a href="cart_delete.php?cart_id=<?php echo $c_row['cart_id'];?>"><button class="del"><i class="del-icon fa fa-minus-circle"></i> Delete</button></a></td>
						</tr>
					<?php
							  }
							  }
					?>
				</div>
				</div>
			</div>
		</div>

		<div class="summaryc">
		  <div class="Addressc">
		  <a href="profile.php">Add Address</a>
		  <h4>address</h4> 
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
			<br>
		<div class="paymentc">
			 <h4>Payment method</h4>
			 <a href="#">Edit</a> 
			
			
       <form>
			<div class="custom_select">
				<select>
				  <option value="">Credit Card<br>•••• •••• •••• 5057</option>
				  <option value="Models">UPI@ybl23</option>
				  <option value="Models">Cash on Delivery</option>
				</select>					
			</div>
			<button class="del" name="#" type="submit">Add</button>
		</form>

			  <div class="discountc">
				<h4>Do you have any discount code?</h4>
				<input type="text" placeholder="Your code here">
				<button>APPLY</button>
			  </div>

		  <div class="totalsc">
			

<div class="totalsc">
  <p>Subtotal (<?php echo $totalItems; ?> items)
     <span>₹<?php echo number_format($totalPrice, 2); ?></span>
  </p>
  <p>Shipping costs <span class="free">FREE!</span></p>
  <p>Discount <span>- ₹0.00</span></p>
  <hr>
  <p class="totalc">
    <b>Total (incl. VAT)</b>
    <span>₹<?php echo number_format($totalPrice, 2); ?></span>
  </p>

  <form action="#" method="POST">
    <input type="hidden" name="total_amount" value="<?php echo $totalPrice; ?>">
    <button class="checkoutc" type="submit">🛒 CHECKOUT</button>
  </form>
</div>
	</div>
  
</body>
</html>