<?php
include 'config.php';
session_start();

include("conn.php");

if (!isset($_SESSION['u_id'])) 
{
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<link rel="stylesheet" href="CSS/bootstrap2.min.css">
		<link rel="stylesheet" href="style2.css">
	</head>
<body class="enqueryom">

			<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname   = trim($_POST['fname']);
    $email   = trim($_POST['email']);
    $subject = trim($_POST['subject']); 
    $massage = trim($_POST['massage']); // spelling fixed

    $checkQuery = "SELECT * FROM feedback_tbl WHERE email='$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<div class='alert alert-warning'>
                <strong>Warning!</strong> You already submitted feedback using this email.
              </div>";
    } else {
        $insertQuery = "INSERT INTO feedback_tbl (fname, email, subject, massage)
                        VALUES ('$fname', '$email', '$subject', '$massage')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "<div class='alert alert-success'>
                    <strong>Success!</strong> ThankYou! Your feedback has been submitted successfully!
                  </div>";
            echo "<a href='enqueryform.php'><button class='btn btn-info'>Go Back</button></a>";
        } else {
            echo "<div class='alert alert-danger'>
                    <strong>Error!</strong>Sorry!Could not send feedback: " . mysqli_error($conn) . "
                  </div>";
        }
    }
}
?>

								
	

</body>
</html>