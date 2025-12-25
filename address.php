<?php
		session_start();
		include "Conn.php";
			
			if(!isset($_SESSION['u_id'])){
				
				header("location: profile.php");
			}
			
			$cid = $_SESSION['u_id'];
			
			if($_SERVER["REQUEST_METHOD"]=="POST"){
					$fname = $_POST['fname'];
					$email = $_POST['email'];
					$house = $_POST['house_no'];
					$state = $_POST['state'];
					$city = $_POST['city'];
					$pincode = $_POST['pincode'];
					$brief_add = $_POST['brief_add'];
					
					
					$sql="insert into address_tbl (u_id, fname,email , house_no , state,city,pincode,brief_add) values('$cid','$fname','$email','$house','$state','$city','$pincode','$brief_add')";
					
					if($conn->query($sql)){
						echo"<input type='button'  onclick='alert('Data entered Successfuly')' >";
						header("location: profile.php");
						
					}else{
							echo"<input type='button'  onclick='alert('Something is Wrong')' >";
							header("location: profile.php");
							
					}
				
			}
			
			
?>