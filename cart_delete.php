<?php
	include "Conn.php";
	echo $cartid=$_GET['cart_id'];
	
		$query = "delete from cart_tbl where cart_id='$cartid'";
		$result = mysqli_query($conn, $query);
		if ($result) 
		{
			?>
			<script type="text/javascript">
				alert("Data Deleted Successfully")
				window.open("cart.php","_self");
			</script>
			<?PHP
		} 
		else 
		{
			?>
			<script type="text/javascript">
				alert("Something is wrong")
				window.open("cart.php","_self");
			</script>
			<?PHP
		}
?>