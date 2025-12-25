<?php
include 'config.php';
session_start();
include("conn.php");

if (!isset($_SESSION['admin_id'])) {
    header("location: logadmin.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel | Bike Showroom</title>

<!-- Bootstrap 5 -->
<link href="css/bootstrapo.min.css" rel="stylesheet">
<link href="=font-awesome/font/font-awesome.min.css" rel="stylesheet">
<link href="font-awesome/css/fonts.googleapis.css" rel="stylesheet">

<style>
body {
  font-family: 'Poppins', sans-serif;
  background-color: #0f0f0f;
  color: #fff;
  margin: 0;
}

.sidebar {
  background: #111;
  width: 240px;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  padding-top: 30px;
  border-right: 3px solid #d40000;
}

.sidebar h3 {
  text-align: center;
  color: #d40000;
  font-weight: 700;
  margin-bottom: 30px;
}

.sidebar a {
  display: block;
  padding: 12px 20px;
  color: #ccc;
  text-decoration: none;
  transition: all 0.3s;
}

.sidebar a:hover,
.sidebar a.active {
  background-color: #d40000;
  color: #fff;
  border-radius: 6px;
}

.main-content {
  margin-left: 260px;
  padding: 30px;
}

.topbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #1a1a1a;
  padding: 15px 25px;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(255, 0, 0, 0.2);
}

.topbar h2 {
  font-weight: 600;
  color: #fff;
}

.card-custom {
  background-color: #1a1a1a;
  border: 1px solid #d40000;
  border-radius: 10px;
  text-align: center;
  padding: 25px;
  color: white;
  transition: 0.3s;
}

.card-custom:hover {
  transform: translateY(-5px);
  background-color: #d40000;
  color: #fff;
}

.card-custom i {
  font-size: 3rem;
  margin-bottom: 15px;
}

.btn-theme {
  background: #d40000;
  color: #fff;
  border: none;
  transition: 0.3s;
}

.btn-theme:hover {
  background: #b10000;
}

.btn-light, .btn-warning, .btn-danger {
  margin: 4px;
}
</style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
  <h3><i class="bi bi-speedometer2"></i> Admin</h3>
  <a href="#" class="active"><i class="bi bi-house-door"></i> Dashboard</a>
  <a href="uedit.php"><i class="bi bi-people"></i> Users</a>
  <a href="booking_edit.php"><i class="bi bi-journal-check"></i> Bookings</a>
  <a href="a_edit.php"><i class="bi bi-tools"></i> Accessories</a>
  <a href="m_edit.php"><i class="bi bi-bicycle"></i> Models</a>
  <a href="view_contactus.php"><i class="bi bi-chat-dots"></i> Contact Us</a>
  <a href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
</div>

<!-- Main Content -->
<div class="main-content">
  <div class="topbar">
    <h2>Welcome, <?php echo $_SESSION['name']; ?></h2>
    <a href="logout.php" class="btn btn-theme"><i class="bi bi-box-arrow-right"></i> Logout</a>
  </div>

  <div class="container mt-4">
    <div class="row g-4">

      <!-- Users -->
      <div class="col-md-4">
        <div class="card-custom">
          <i class="bi bi-people-fill"></i>
          <?php
            $q = mysqli_query($conn,"SELECT COUNT(*) AS total FROM users_tbl");
            $r = mysqli_fetch_array($q);
          ?>
          <h3><?php echo $r['total']; ?></h3>
          <p>Total Users</p>
          <a href="uedit.php" class="btn btn-theme btn-sm">Manage</a>
        </div>
      </div>

      <!-- Accessories -->
      <div class="col-md-4">
        <div class="card-custom">
          <i class="bi bi-tools"></i>
          <?php
            $q = mysqli_query($conn,"SELECT COUNT(*) AS total FROM product_tbl");
            $r = mysqli_fetch_array($q);
          ?>
          <h3><?php echo $r['total']; ?></h3>
          <p>Accessories</p>
          <a href="Assessoriesform.php" class="btn btn-theme btn-sm"> Add</a>
          <a href="a_edit.php" class="btn btn-theme btn-sm"> Manage</a>
        </div>
      </div>

      <!-- Models -->
      <div class="col-md-4">
        <div class="card-custom">
          <i class="bi bi-bicycle"></i>
          <?php
            $q = mysqli_query($conn,"SELECT COUNT(*) AS total FROM product_tbl");
            $r = mysqli_fetch_array($q);
          ?>
          <h3><?php echo $r['total']; ?></h3>
          <p>Models</p>
          <a href="modelform.php" class="btn btn-theme btn-sm"> Add</a>
          <a href="m_edit.php" class="btn btn-theme btn-sm"> Manage</a>
        </div>
      </div>

      <!-- Feedback -->
      <div class="col-md-4">
        <div class="card-custom">
          <i class="bi bi-envelope"></i>
          <?php
            $q = mysqli_query($conn,"SELECT COUNT(*) AS total FROM feedback_tbl");
            $r = mysqli_fetch_array($q);
          ?>
          <h3><?php echo $r['total']; ?></h3>
          <p>Contact Messages</p>
          <a href="view_contactus.php" class="btn btn-theme btn-sm">View</a>
        </div>
      </div>

      <!-- Bookings -->
      <div class="col-md-4">
        <div class="card-custom">
          <i class="bi bi-calendar2-check"></i>
          <?php
            $q = mysqli_query($conn,"SELECT COUNT(*) AS total FROM booking_tbl");
            $r = mysqli_fetch_array($q);
          ?>
          <h3><?php echo $r['total']; ?></h3>
          <p>Bookings</p>
          <a href="booking_edit.php" class="btn btn-theme btn-sm">Manage</a>
        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>
