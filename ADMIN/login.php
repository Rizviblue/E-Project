<?php
session_start();
include("config.php");

$error = "";

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password'])); 

    $query = "SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login - Courier System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
      margin: 0;
      padding: 0;
      background: #f5f6fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-container {
      background: #ffffff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
    .login-container h2 {
      text-align: center;
      margin-bottom: 24px;
      color: #333;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      font-weight: 600;
      margin-bottom: 6px;
    }
    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      transition: 0.3s ease;
      outline: none;
    }
    input[type="text"]:focus, input[type="password"]:focus {
      border-color: #007BFF;
    }
    .btn {
      width: 100%;
      padding: 12px;
      background: #007BFF;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .btn:hover {
      background: #0056b3;
    }
    .error {
      color: #e74c3c;
      text-align: center;
      margin-top: 10px;
    }
    .footer-note {
      text-align: center;
      margin-top: 20px;
      font-size: 0.9em;
      color: #777;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Admin Login</h2>
    <form method="post">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required placeholder="Enter your username">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required placeholder="Enter your password">
      </div>
      <button type="submit" name="login" class="btn">Login</button>
      <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
      <?php endif; ?>
    </form>
    <div class="footer-note">
      © <?= date("Y") ?> Courier Management System
    </div>
  </div>

</body>
</html>
