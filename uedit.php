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
			<h3 align="center">Registration-List</h3>
			<table class="table table-striped">
				<thead>					
					<th>First-Name</th>
					<th>Last-Name</th>				
					<th>Phone-Number</th>				
					<th>Email</th>
					<th>Password</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php
					include"conn.php";
					$query1 = "select * from users_tbl";
					$res = mysqli_query($conn, $query1);
					$data = mysqli_num_rows($res);
					if($data)
					{
						while($row = mysqli_fetch_array($res))
						{
						?>
							<tr>
								
								<td><?php echo $row['fname']?></td>
								<td><?php echo $row['lname']?></td>
								<td><?php echo $row['phone']?></td>
								<td><?php echo $row['email']?></td>
								<td><?php echo $row['password']?></td>
								
								
								<td><a href="u_update.php?u_id=<?php echo $row['u_id'];?>"><button>Edit</button></a></td>
								
								<td><a href="u_delete.php?u_id=<?php echo	$row['u_id'];?>"><button>Delete</button></a></td>
							</tr>
					<?php	
					}
					
					}
					else
					{
						echo"<div class='alert alert-warning alert-dismissble fade in'>
							 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							 <strong>Success!</strong>Detail Update successfully!!!</div>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>	
</body>
</html>