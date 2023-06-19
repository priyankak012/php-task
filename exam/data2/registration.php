<?php
include 'connection.php';

$user_id = $username = $password = $confirm_password = $email = "";
$titleerr = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if(isset($_POST['submit'])){


  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $email = $_POST['email'];

  if(empty(['title']))
  {
     $titleerr = "please enter title";
  }

  if (empty($_POST['username']) || (empty($_POST['password'])) || (empty($_POST['email'])) || empty($_POST['confirm_password'])) {
    
  } else {

    $created_at = date('Y-m-d H:i:s');
    $query = "INSERT INTO `user` (`username`,`password`,`email`,`created_at`) VALUES ('$username','$password','$email','$created_at')";
    $sql = mysqli_query($conn, $query);


    if ($sql == TRUE) {

      $_SESSION["username"] = $username;
      
    $query = "SELECT user_id FROM users";
      header('location:display.php');
     
    } else

      echo "<div class ='alert alert-primary'>Username is all ready exists !</div>";
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
  <style>
    .form {
      text-align: center;
      justify-items: center;
      margin: top 5px;
    }

    .errors {
      color: red;
    }
  </style>
  <div class="col-lg-7 mx-auto p-1 mb-2  text-black">
    <h3> User Registration </h3><br><br>

    <form name="form" method="post" function="validateForm()">

      <label>Username</label>
      <input type="text" name="username" id="username" class="form-control" value="<?= $username ?>"><br>
      <span class="error"><?= $titleerr;?></span>


      <label>Password</label>
      <input type="password" name="password" id="password" class="form-control" value=""><br>


      <label>C_Password</label>
      <input type="password" name="confirm_password" id="confirm_Password" class="form-control" require><br>

      <label>Email </label>
      <input type="email" name="email" require id="email" class="form-control" value="<?= $email ?>"><br>

      <input type="submit" name="submit" onclick="validateForm()" class="btn btn-secondary"><br><br>
      <p>i have a all ready account !</p>
      <a href="login.php" class="btn btn-dark text-white">Login </a>

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

</body>
</html>