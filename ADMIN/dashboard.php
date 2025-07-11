<?php
include("session.php");
include("config.php");

// Fetch courier status counts
$total     = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM couriers"))['count'];
$inTransit = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM couriers WHERE status='In Transit'"))['count'];
$delivered = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM couriers WHERE status='Delivered'"))['count'];
$pending   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM couriers WHERE status='Pending'"))['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Courier System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, sans-serif; }
    body { background: #f1f2f6; color: #333; }

    .navbar {
      background: #007BFF;
      padding: 16px 30px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar h1 {
      font-size: 22px;
    }

    .navbar a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .container {
      max-width: 1000px;
      margin: 30px auto;
      padding: 0 20px;
    }

    .welcome {
      margin-bottom: 25px;
      font-size: 20px;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }

    .card {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
      text-align: center;
    }

    .card h3 {
      font-size: 18px;
      color: #555;
      margin-bottom: 10px;
    }

    .card .number {
      font-size: 36px;
      font-weight: bold;
      color: #007BFF;
    }

    .links {
      margin-top: 40px;
      text-align: center;
    }

    .links a {
      margin: 0 10px;
      padding: 10px 20px;
      display: inline-block;
      background: #007BFF;
      color: white;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    .links a:hover {
      background: #0056b3;
    }

    @media(max-width: 600px) {
      .navbar h1 {
        font-size: 18px;
      }
    }
  </style>
</head>
<body>

  <div class="navbar">
    <h1>Courier Admin Dashboard</h1>
    <a href="logout.php">Logout</a>
  </div>

  <div class="container">
    <p class="welcome">Welcome, <strong><?php echo $_SESSION['admin']; ?></strong> 👋</p>

    <div class="card-grid">
      <div class="card">
        <h3>Total Couriers</h3>
        <div class="number"><?= $total ?></div>
      </div>
      <div class="card">
        <h3>In Transit</h3>
        <div class="number"><?= $inTransit ?></div>
      </div>
      <div class="card">
        <h3>Delivered</h3>
        <div class="number"><?= $delivered ?></div>
      </div>
      <div class="card">
        <h3>Pending</h3>
        <div class="number"><?= $pending ?></div>
      </div>
    </div>

    <div class="links">
      <a href="add_courier.php">Add Courier</a>
      <a href="view_couriers.php">View Couriers</a>
      <a href="create_agent.php">Add Agent</a>
      <a href="manage_customers.php">Manage Customers</a>
    </div>
  </div>

</body>
</html>
