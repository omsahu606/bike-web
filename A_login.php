<?php
session_start();

include("conn.php");

if (!isset($_SESSION['admin_id'])) 
{
    header("location: index.php");
}

	
	if (isset($_POST['Alogin']))
	{
		$email=$_POST['email'];
		$pass=$_POST['password'];
		
		$sql="select * from admin_tbl where email='$email' and password='$pass'";
		
		$result=mysqli_query($conn, $sql);
		$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count=mysqli_num_rows($result);
		
		$sql1="select * from admin_tbl where email='$email'";
		
		$res=mysqli_query($conn,$sql1);
		if (mysqli_num_rows($res)>0)
		{
			$row=mysqli_fetch_assoc($res);
			
			if($count== 1)
			{
				$_SESSION['admin_id']=$row['admin_id'];
				$_SESSION['name']=$row['name'];
				$_SESSION['email']=$row['email'];
				echo "<script>alert('You are Admin Login Successfully'); window.location='admin.php';</script>";
				exit();
			}
			else
			{
				echo "<div class='alert alert-Warning alert-dismissible fade in'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Warning!</strong><p>Wrong Email or Password</p></div><br>";
			}
		}
	}
?>
