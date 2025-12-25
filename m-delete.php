<?php
	include "conn.php";
	echo $pid=$_GET['p_id'];
	
		$query = "delete from product_tbl where p_id='$pid'";
		$result = mysqli_query($conn,$query);
		if($result)
		{
			?>
			<script type="text/javascript">
				alert("Date Deleted Successfully")
				window.open("admin.php","_self");
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Something is wrong")
				window.open("admin.php","_self");
			</script>
			<?php
		}
?>
