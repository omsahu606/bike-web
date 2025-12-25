<?php
	include "Conn.php";
	echo $address_id=$_GET['address_id'];
	
		$query = "delete from address_tbl where address_id='$address_id'";
		$result = mysqli_query($conn, $query);
		if ($result) 
		{
			?>
			<script type="text/javascript">
				alert("Data Deleted Successfully")
				window.open("profile.php","_self");
			</script>
			<?PHP
		} 
		else 
		{
			?>
			<script type="text/javascript">
				alert("Something is wrong")
				window.open("profile.php","_self");
			</script>
			<?PHP
		}
?>