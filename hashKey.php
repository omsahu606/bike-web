<?php
	?>
	<form method="post">
	<input class="form-control" type="text" name="test" placeholder="Enter Password" required>
	<input class="form-control" type="submit" name="login" value="ok" required>
	</form>
	<?php
	if(isset($_POST['login']))
	{
		$pass = $_POST['test'];
		echo "Your Real Password Is-";
	echo $pass;
	echo"<br>";
	echo"<br>";
	
	$hashpass = password_hash($pass, PASSWORD_DEFAULT);
	echo $hashpass;
	echo"<br>";
	echo"<br>";
	
	$result = password_verify($hashpass, $pass);
	echo $result;
	echo"<br>";
	echo"<br>";
		if ($result)
		{
			echo "Password id Verify";
		}
		else
		{
			echo "Password is Not Verify- Something is wrong";
		}
	}
	
	
	
?>