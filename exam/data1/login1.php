<?php
session_start();
 include 'conn.php';
  $usernameerr = $passworderr= '';
  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if(empty($username))
                {
                    $usernameerr = "please enter username";
                }
                if(empty($username))
                {
                    $passworderr = "please enter password";
                }
                $_SESSION['username'] = $username;
        
                $sql = "SELECT * FROM users WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
        
                if (mysqli_num_rows($result) == 1) {
                    $result_fetch = mysqli_fetch_assoc($result);
        
                    if (password_verify($password, $result_fetch['password'])) {
                        $userid = $result_fetch['id'];
                        $_SESSION['user_id'] = $userid;
        
                        echo "<script> alert('LOGIN COMPLETE!'); window.location.href='index.php';</script>";
                    } else {
                        echo "<script> alert('USERNAME AND PASSWORD DOES NOT MATCH!'); window.location.href='login1.php';</script>";
                    }
                }
            }
        }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<style>
    .error {
        color: red;
    }
</style>

<nav class="navbar navbar-light bg-secondary ">
    <div class="container-fluid  text-white-center"><h4>Technology Informer</h4>
    </div>
  </nav>
    <br><br><br>
<div class="col-lg-3 mx-auto p-5-mb-2 mt-5  text-black">
    <h3> login </h3><br><br>
</div>
    <form  method="post">
    <div class="col-lg-3 mx-auto p-1 mb-2  text-black">
      <label>Username</label>
      <input type="text" name="username" id="username"  class="form-control" value="">
      <span class="error"><?= $usernameerr   ?></span><br><br>

      <label>Password</label>
      <input type="password" name="password" id="password" class="form-control" value="">
      <span class="error"><?= $passworderr?></span><br><br>

    
       <input type="submit" value="Login" name="login" class="login-button btn btn-dark text-white" /><br><br>
       <p> Don't have a account ! <a href= "registration.php" class="text-dark">Registration now</p></a>
</div>
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

</form>
</body>
</html>
