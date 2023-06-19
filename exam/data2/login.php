<?php
    include "connection.php";
    session_start();

  
    if (isset($_POST['username'])) {
        $username = ($_REQUEST['username']);   
        $username = mysqli_real_escape_string($conn, $username);
        $password = ($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        
        $query    = "SELECT * FROM `user` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            
            header("Location: detail.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
                 
        }
    } else {
        // header('location:detail.php');

    
        $query = "SELECT id FROM user WHERE  user = id";
        $qry = mysqli_query($conn,$query);

    
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

<div class="col-lg-7 mx-auto p-1 mb-2  text-black">
        <h4> User Login</h4> <br><br>
    <form class="form" method="post" name="login">
        <div class="col-lg-7 mx-auto p-1 mb-2  text-black">
        <label>Username</label><br>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"  class="form-control"><br>
        <label>Password</label><br>
        <input type="password" class="login-input" name="password" placeholder="Password" class="form-control"><br><br>
        <input type="submit" value="Login" name="submit" class="login-button"/><br><br>

        <p class="link"><a href="registration.php">New Registration</a></p>
        <p class="link"><a href="verify.html">Forget password</a></p>
       
  </form>
    </div>
    </div>

<?php
    }
?>
</body>
</html>