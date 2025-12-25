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
			<h3 align="center">MODEL-LIST</h3>
			<table class="table table-striped">
				<thead>						
					<th>img</th>			
					<th>Aname</th>
					<th>Price</th>
					<th>Action</th>
					<th>Delete</th>
				</thead>
				<tbody>
				<?php
					include"conn.php";
					$query1 = "select * from accessories_tbl";
					$res = mysqli_query($conn, $query1);
					$data = mysqli_num_rows($res);
					if($data)
					{
						while($row = mysqli_fetch_array($res))
						{
						?><?php
	include "conn.php";
?>

			
			<tbody>
				<?php
					$query = "select * from accessories_tbl";
					$res = mysqli_query($conn, $query);
					$data=(mysqli_num_rows($res));
					
					if($data)
					{
						while($row=mysqli_fetch_array($res))
						
						{
					?>
						<tr>	
							<td><img src="../Bike-showroom/mimg/sefty/<?PHP echo $row['file']?>" class="display img-thumbnail" alt="User_Image"></td>
							<td><?php echo $row['aname']?></td>																					
							<td><?php echo $row['price']?></td>													
							<td><a href="a_update.php?a_id=<?php echo $row['a_id'];?>"><button><i class="fa fa-edit">Edit</i></button></a></td>
							<td><a href="a_delete.php?a_id=<?php echo $row['a_id'];?>"><button><i class="del-icon fa fa-minus-circle"></i> Delete</button></a></td>
						</tr>
					
						<?php
						}
				
					}
					else
					{
						echo"<div class='alert alert-warning alert-dismissible fade in'>
						<a href='#' class='close' data-dismiss ='alert' aria-lable='close'>&times;</a>
						<strong>success!</strong>details Updated successfully</div>";
					}
					
				?>
			</tbody>						

		</table>
	</body>
</html>
							
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