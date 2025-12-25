<?php
include 'config.php';
session_start();
include("conn.php");

if (!isset($_SESSION['admin_id'])) {
    header("location: logadmin.html");
    exit;
}

// Delete booking
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM booking_tbl WHERE book_id='$id'");
    header("location: booking_edit.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Manage Bike Bookings</title>

<!-- Bootstrap 5 -->
<link href="css/bootstrapo.min.css" rel="stylesheet">
<link href="=font-awesome/font/font-awesome.min.css" rel="stylesheet">
<link href="font-awesome/css/fonts.googleapis.css" rel="stylesheet">

<style>
body {
  background-color: #0f0f0f;
  color: #fff;
  font-family: 'Poppins', sans-serif;
}
.container {
  margin-top: 40px;
}
h2 {
  color: #d40000;
  font-weight: 700;
  margin-bottom: 20px;
}
.table {
  background: #1a1a1a;
  color: #fff;
  border-radius: 10px;
  overflow: hidden;
}
.table thead {
  background-color: #d40000;
  color: #fff;
  font-weight: 600;
}
.table tbody tr:hover {
  background-color: #2b2b2b;
}
img {
  width: 80px;
  height: 60px;
  border-radius: 8px;
  object-fit: cover;
  border: 2px solid #d40000;
}
.btn-edit {
  background: #ffc107;
  color: #000;
  border: none;
}
.btn-edit:hover {
  background: #e0a800;
}
.btn-delete {
  background: #d40000;
  color: #fff;
  border: none;
}
.btn-delete:hover {
  background: #a00000;
}
.btn-back {
  background: #fff;
  color: #d40000;
  font-weight: 600;
  border: none;
}
.btn-back:hover {
  background: #d40000;
  color: #fff;
}
</style>
</head>

<body>
<div class="container">
  <h2 class="text-center"><i class="bi bi-calendar2-check"></i> Manage Bike Bookings</h2>

  <table class="table table-hover text-center align-middle">
    <thead>
      <tr>
		<th>Customer ID</th>
        <th>Booking ID</th>
        <th>Bike Image</th>
        <th>Bike Name</th>
        <th>Price (₹)</th>
        <th>Booking Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    // 🔹 JOIN query to fetch booking + bike details
    $query = "
      SELECT b.book_id, b.c_id, b.reg_date_time, 
             p.p_id, p.pname AS bike_name, p.price, p.file 
      FROM booking_tbl b
      JOIN product_tbl p ON b.p_id = p.p_id
      ORDER BY b.book_id DESC
    ";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>
				<td>{$row['c_id']}</td>
                <td>{$row['book_id']}</td>
                <td><img src='mimg/{$row['file']}' alt='Bike file'></td>
                <td>{$row['bike_name']}</td>
                <td>{$row['price']}</td>
                <td>{$row['reg_date_time']}</td>
                <td>
                    <a href='#' class='btn btn-edit btn-sm'><i class='bi bi-pencil-square'></i> Edit</a>
                    <a href='booking_edit.php?delete={$row['book_id']}' class='btn btn-delete btn-sm' onclick='return confirm(\"Are you sure you want to delete this booking?\")'><i class='bi bi-trash'></i> Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No bookings found.</td></tr>";
    }
    ?>
    </tbody>
  </table>

  <div class="text-center mt-4">
    <a href="admin.php" class="btn btn-back"><i class="bi bi-arrow-left-circle"></i> Back to Dashboard</a>
  </div>
</div>
</body>
</html>
