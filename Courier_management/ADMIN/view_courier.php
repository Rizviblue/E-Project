<?php
include("session.php");
include("config.php");

$result = mysqli_query($conn, "SELECT * FROM couriers ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Couriers - Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background: #f7f9fc;
      font-family: 'Segoe UI', sans-serif;
      padding: 30px;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
    }

    th, td {
      padding: 12px 15px;
      border-bottom: 1px solid #eee;
      text-align: center;
    }

    th {
      background-color: #007BFF;
      color: white;
      font-weight: bold;
    }

    tr:hover {
      background: #f1f1f1;
    }

    .back-btn {
      margin-top: 20px;
      text-align: center;
    }

    .back-btn a {
      padding: 10px 20px;
      background: #007BFF;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      transition: 0.3s;
    }

    .back-btn a:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>

<h2>All Couriers</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Sender</th>
    <th>Receiver</th>
    <th>From</th>
    <th>To</th>
    <th>Status</th>
    <th>Tracking No</th>
    <th>Date</th>
  </tr>

  <?php while ($row = mysqli_fetch_assoc($result)): ?>
  <tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['sender_name'] ?></td>
    <td><?= $row['receiver_name'] ?></td>
    <td><?= $row['origin'] ?></td>
    <td><?= $row['destination'] ?></td>
    <td><?= $row['status'] ?></td>
    <td><?= $row['tracking_no'] ?></td>
    <td><?= $row['date_added'] ?></td>
  </tr>
  <?php endwhile; ?>
</table>

<div class="back-btn">
  <a href="dashboard.php">⬅ Back to Dashboard</a>
</div>

</body>
</html>
