<?php
session_start();

include("conn.php");

if (!isset($_SESSION['admin_id'])) 
{
    header("location: logadmin.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Registration_Page</title>
		<link rel="stylesheet" href="css/bootstrap2.min.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-sm-12">
			<h3 align="center">Contact Us-List</h3>
			<table class="table table-striped">
				<thead>					
					<th>Name</th>
					<th>Email</th>								
					<th>Subject</th>
					<th>Massage</th>
					<th>Date</th>
				</thead>
				<tbody>
				<?php
					include"conn.php";
					$query1 = "select * from feedback_tbl";
					$res = mysqli_query($conn, $query1);
					$data = mysqli_num_rows($res);
					if($data)
					{
						while($row = mysqli_fetch_array($res))
						{
						?>
							<tr>
								
								<td><?php echo $row['fname']?></td>
								<td><?php echo $row['email']?></td>
								<td><?php echo $row['subject']?></td>
								<td><?php echo $row['massage']?></td>
								<td><?php echo $row['created_at']?></td>
								
								
							</tr>
							
					<?php	
					}
					
					}
					else
					{
						
						  echo "<div class='alert alert-warning text-center'>
								No feedback found yet.
						</div>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>	
</body>
</html>