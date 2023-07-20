<?php
include 'data_connection.php';
session_start();

$username = $password = $email = $confirmPassword = $error = $alert = $query = '';
$usernameError = $passwordError = $confirmPasswordError = $emailError = '';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST['registration'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
      $error = "Please fill in all fields.";
    } elseif ($password !== $confirmPassword) {
      $error = "Password and Confirm Password do not match.";
    } else {

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


      $created_at = date('Y-m-d H:i:s');
      $query = "INSERT INTO `users` (`username`,`password`,`email`,`created_at`) VALUES ('$username','$hashedPassword','$email','$created_at')";
      $sql = mysqli_query($conn, $query);
      if ($sql) {
        echo "<script> alert('REGISTRATION COMPLETE!'); window.location.href='login.php';</script>";
        exit();
      } else {
        echo "<script> alert('Username already exists!'); window.location.href='registration.php';</script>";
        exit();
      }
    }
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
      color: red;
    }
  </style>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Registration</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="data_con.php">Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <h4 class="text-center text-dark my-5">User Registration</h4>
  <div class="col-lg-5 mx-auto p-5 mb-2  text-black">
    <form action="" method="post">
      <label>Username</label><br>
      <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" class="form-control" id="username"><br>
      <div id="usernameError" class="error"><?= $usernameError ?></div>
      <label>Email</label><br>
      <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" class="form-control" id="email"><br>
      <div id="emailError" class="error"><?= $emailError ?></div>
      <label>Password</label><br>
      <input type="password" name="password" class="form-control" id="password"><br>
      <div id="passwordError" class="error"><?= $passwordError ?></div>
      <label>Confirm Password</label><br>
      <input type="password" name="confirm_password" class="form-control" id="confirm_Password"><br>
      <div id="confirmPasswordError" class="error"><?= $confirmPasswordError ?></div>
      <button type="submit" name="registration" value="submit" onclick="return validateForm()">Submit</button><br><br>
      <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
  </div>
  <script>
    function validateForm() {
      var username = document.getElementById('username').value;
      var password = document.getElementById('password').value;
      var confirmPassword = document.getElementById('confirm_Password').value;
      var email = document.getElementById('email').value;

      if (username === "") {
        document.getElementById('usernameError').innerHTML = "Please enter a username.";
        return false;
      } else {
        document.getElementById('usernameError').innerHTML = "";
      }

      if (email === "") {
        document.getElementById("emailError").innerHTML = "Please enter an email.";
        return false;
      } else {
        document.getElementById("emailError").innerHTML = "";
      }

      if (password === "") {
        document.getElementById("passwordError").innerHTML = "Please enter a password.";
        return false;
      } else {
        document.getElementById("passwordError").innerHTML = "";
      }

      if (password !== confirmPassword) {
        document.getElementById("confirmPasswordError").innerHTML = "Passwords do not match.";
        return false;
      } else {
        document.getElementById("confirmPasswordError").innerHTML = "";
      }
    }
  </script>
</body>
</html>
