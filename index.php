<?php
session_start();
if (isset($_SESSION['user'])) {
  header("Location: home.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login & Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <div class="form-box">
    <h2 id="formTitle">Login</h2>

    <!-- LOGIN FORM -->
    <form id="loginForm" method="POST" action="auth.php">
      <input type="hidden" name="action" value="login">
      <div class="input-group">
        <input type="email" name="email" placeholder="Email" required>
      </div>
      <div class="input-group">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" class="btn">Login</button>
      <p>New here? <a href="#" onclick="showRegister()">Create account</a></p>
    </form>

    <!-- REGISTER FORM -->
    <form id="registerForm" method="POST" action="auth.php" style="display:none;">
      <input type="hidden" name="action" value="register">
      <div class="input-group">
        <input type="text" name="name" placeholder="Full Name" required>
      </div>
      <div class="input-group">
        <input type="email" name="email" placeholder="Email" required>
      </div>
      <div class="input-group">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" class="btn">Register</button>
      <p>Already have an account? <a href="#" onclick="showLogin()">Login</a></p>
    </form>
  </div>
</div>

<script src="script.js"></script>
</body>
</html>
