<?php
session_start();

include("conn.php");

if (!isset($_SESSION['fname'])) 
{
    header("location: index.html");
}
$uid = $_SESSION['fname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="CSS/style2.css">
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
				
</head>
<body>
<div class="container">
		<h3>My Cart</h3>
		<table class="table table-striped">
			
    <?php
        $cart=" SELECT users_tbl.u_id,users_tbl.email,cart_tbl.id,cart_tbl.a_id,cart_tbl.c_id,accessories_tbl.aname,accessories_tbl.description,accessories_tbl.price,accessories_tbl.file FROM cart_tbl	JOIN accessories_tbl ON cart_tbl.a_id = accessories_tbl.a_id JOIN users_tbl ON cart_tbl.c_id = users_tbl.u_id WHERE cart_tbl.c_id = '$uid'";
			$cart_result= $conn->query($cart);
          if($cart_result->num_rows > 0){
                        
               while($c_row = $cart_result->fetch_assoc()){
              ?>
                <tr>
                  <td><img src="../Bike-showroom/mimg/<?php echo $c_row['file'];?>" alt="User_Image"></td>
                  <td><?php echo $c_row['aname'];?></td>
                  <td><?php echo $c_row['description'];?></td>
                  <td>&#x20B9;<?php echo $c_row['price'];?></td>
                  <td>
                    <a href=""><button>Remove</button></a>
                    <a href="view_product.php?a_id=<?php echo $c_row['a_id']?>"><button>Order Now</button></a>
                  </td>
                </tr>
          <?php
                  }
                  }
    ?>
		</tbody>
		</table>
	</div>
	</body>
	</html>