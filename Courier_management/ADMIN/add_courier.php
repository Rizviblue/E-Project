<?php
include("session.php");
include("config.php");

$success = "";

if (isset($_POST['submit'])) {
    $sender      = trim($_POST['sender']);
    $receiver    = trim($_POST['receiver']);
    $origin      = trim($_POST['origin']);
    $destination = trim($_POST['destination']);
    $status      = $_POST['status'];
    $tracking_no = "TRK" . rand(10000, 99999);

    $sql = "INSERT INTO couriers (sender_name, receiver_name, origin, destination, status, tracking_no)
            VALUES ('$sender', '$receiver', '$origin', '$destination', '$status', '$tracking_no')";
    
    if (mysqli_query($conn, $sql)) {
        $success = "Courier added successfully!";
    } else {
        $success = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Courier - Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background: #f4f6f9;
      font-family: 'Segoe UI', sans-serif;
      padding: 40px;
    }

    .container {
      max-width: 500px;
      background: white;
      margin: auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    h2 {
      margin-bottom: 25px;
      text-align: center;
      color: #333;
    }

    .form-group {
      margin-bottom: 18px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 6px;
    }

    input, select {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    .btn {
      background: #007BFF;
      border: none;
      padding: 12px;
      color: white;
      font-weight: bold;
      width: 100%;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn:hover {
      background: #0056b3;
    }

    .success {
      color: green;
      margin-top: 15px;
      text-align: center;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Add New Courier</h2>
  <form method="post">
    <div class="form-group">
      <label>Sender Name</label>
      <input type="text" name="sender" required>
    </div>
    <div class="form-group">
      <label>Receiver Name</label>
      <input type="text" name="receiver" required>
    </div>
    <div class="form-group">
      <label>Origin</label>
      <input type="text" name="origin" required>
    </div>
    <div class="form-group">
      <label>Destination</label>
      <input type="text" name="destination" required>
    </div>
    <div class="form-group">
      <label>Status</label>
      <select name="status" required>
        <option value="In Transit">In Transit</option>
        <option value="Delivered">Delivered</option>
        <option value="Pending">Pending</option>
      </select>
    </div>
    <button type="submit" name="submit" class="btn">Add Courier</button>
    <?php if ($success): ?>
      <p class="success"><?= $success ?></p>
    <?php endif; ?>
  </form>
</div>

</body>
</html>
