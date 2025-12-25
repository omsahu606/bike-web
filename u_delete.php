<?php
	include "conn.php";
	$uid = $_GET['u_id'];

	$query = "DELETE FROM users_tbl WHERE u_id='$uid'";
	$result = mysqli_query($conn, $query);

	if ($result) {
		?>
		<script type="text/javascript">
			alert("Data Deleted Successfully");
			window.open("admin.php", "_self");
		</script>
		<?php
	} else {
		?>
		<script type="text/javascript">
			alert("Something is wrong");
			window.open("admin.php", "_self");
		</script>
		<?php
	}
?>

	