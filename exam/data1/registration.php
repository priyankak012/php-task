<?php
session_start();
include 'conn.php';
$user_id = $username = $password = $Confirm_password = $email = "";
$usernameerr = $passwoorderr = '';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];
    
        if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
          //echo "Please fill in all fields.";
        } elseif ($password != $confirmPassword) {
          //echo "Passwords do not match.";
        } else {
        
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
          $created_at = date('Y-m-d H:i:s');
          $query = "INSERT INTO `users` (`username`,`password`,`email`,`created_at`) VALUES ('$username','$hashedPassword','$email','$created_at')";
          $sql = mysqli_query($conn, $query);
    
          if ($sql) {
            
            echo "<script> alert('REGISTRATION COMPLETE!'); window.location.href='login1.php';</script>";
          } else {
            echo "<script> alert('Username already exists!'); window.location.href='registration.php';</script>";
          }
        }
      }
    }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <br><br>
  <div class="col-lg-5 mx-auto p-5 mb-2  text-black">
    <h3> User Registration </h3><br><br>

    <form name="form" method="post" action="registration.php">

      <label>Username</label>
      <input type="text" name="username" id="username"  class="form-control" value="<?=$username ?>"><br>
     
      <label>Email </label>
      <input type="email" name="email"  id="email" class="form-control" value="<?= $email ?>"><br>


      <label>Password</label>
      <input type="password" name="password" id="password" class="form-control" value=""><br>


      <label>Confirm Password</label>
      <input type="password" name="confirm_password" id="confirm_Password" class="form-control" require><br>

     
      <input type="submit" name="submit" onclick="validateForm()" class="btn btn-secondary"><br><br>
      <p>I have a all ready account . <a href="login1.php" class="text-dark">Login !</a></p>
      

  </div>
  </form>
  
  <script>

      function validateForm() 
      {
      var username = document.getElementById('username').value;
      var password = document.getElementById('password').value;
      var Confirm_password = document.getElementById('confirm_Password').value;
      var email = document.getElementById('email').value;

      if (username == "" || password == "" || Confirm_password == "" || email == "") {
        alert('Please fill in all fields.');
        return false;
      }

      if (password !== Confirm_password) {
        alert('Password and Confirm Password do not match.');
        return false;
      }

      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        alert('Invalid email format.');
        return false;
      }
      return true;
      }
  </script>
  <footer class="text-center text-white fixed-bottom" style="background-color:black;">
  <div class="container p-3"></div>
  <div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.2);">
   <h6> © 2020 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a></h6>

  </div>
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-linkedin"></a>
</footer>

</body>
</html>