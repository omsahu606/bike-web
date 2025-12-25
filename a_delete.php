<?php
	include "Conn.php";
	echo $aid=$_GET['a_id'];
	
		$query = "delete from accessories_tbl where a_id='$aid'";
		$result = mysqli_query($conn, $query);
		if ($result) 
		{
			?>
			<script type="text/javascript">
				alert("Data Deleted Successfully")
				window.open("admin.php","_self");
			</script>
			<?PHP
		} 
		else 
		{
			?>
			<script type="text/javascript">
				alert("Something is wrong")
				window.open("admin.php","_self");
			</script>
			<?PHP
		}
?>