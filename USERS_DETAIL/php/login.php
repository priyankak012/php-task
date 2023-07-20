<?php
session_start();
include 'data_connection.php';

$usernameErr = $passwordErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username)) {
            $usernameErr = "Please enter a username";
        }
        if (empty($password)) {
            $passwordErr = "Please enter a password";
        } else {

            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);

            $fetch = mysqli_fetch_assoc($result);

            if (password_verify($password, $fetch['password'])) {
                $userId = $fetch['id'];
                $_SESSION['user_id'] = $userId;
                $_SESSION['username'] = $username;

                echo "<script>alert('login successfully'); window.location.href='data_dispay.php';</script>";
                exit;
            } else {
                echo "<script>alert('Username or password does not match.'); window.location.href='login.php';</script>";
                exit;
            }
        }
    }
    if (isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<style>
.error {
  color: darkred;
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Login</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="data_dispay.php">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="col-lg-3 mx-auto p-5-mb-2 mt-5  text-black">
  <h3>Login</h3><br><br>
</div>

<form method="post" onsubmit="return validateForm()">
  <div class="col-lg-3 mx-auto p-1 mb-2  text-black">
    <label>Username</label>
    <input type="text" name="username" id="username" class="form-control" value="">
    <span class="error" id="usernameError"><?= $usernameErr ?></span><br>

    <label>Password</label>
    <input type="password" name="password" id="password" class="form-control" value="">
    <span class="error" id="passwordError"><?= $passwordErr ?></span><br><br>

    <input type="submit" value="Login" name="login" class="login-button btn btn-dark text-white" /><br><br>

    <p>Don't have an account? <a href="registration.php">Register here</a></p>
  </div>
</form>

<script>
  function validateForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    
    if (username === '') {
      document.getElementById(usernameError).innerHTML = "Please enter a username";
      return false;
    }else
    {
      if (username === '') {
      document.getElementById(usernameError).innerHTML = "";
      return false;
    }
    }

    if (password === '') {
      document.getElementById(passwordError).innerHTML = "please enter password";
      return false;
    }else
    {
      if (password === '') {
      document.getElementById(passwordError).innerHTML = "";
      return false;
    }

    return true;
  }
}
  
</script>
</body>
</html>
