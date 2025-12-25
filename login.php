<?php
	session_start();
	
	include "conn.php";
	
	if (isset($_POST['login']))
	{
		$email=$_POST['email'];
		$pass=$_POST['password'];
		
		$sql="select * from users_tbl where email='$email' and password='$pass'";
		
		$result=mysqli_query($conn, $sql);
		$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count=mysqli_num_rows($result);
		
		$sql1="select * from users_tbl where email='$email'";
		
		$res=mysqli_query($conn,$sql1);
		if (mysqli_num_rows($res)>0)
		{
			$row=mysqli_fetch_assoc($res);
			
			if($count== 1)
			{
				$_SESSION['u_id']=$row['u_id'];
				$_SESSION['fname']=$row['fname'];
				$_SESSION['email']=$row['email'];
				echo "<script>alert('You are Login Successfully'); window.location='index2.php';</script>";
				exit();

			}
			else
			{
				echo "<div class='message'><p>Wrong Email or Password</p></div><br>";
			}
		}
	}
?>
