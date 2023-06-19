<?php

if(isset($_SESSION['username']))
{
  header("localtion:login.php");
}
include 'conn.php';
$email = $password = $passworderror = $errordic = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['login'])){

  $email = $_POST["email"];
  $password = $_POST["password"];
  
  // Validate the password
  if (strlen($password) < 8) {
    //$passworderror = "Password must be at least 8 characters long.";
  } elseif (!preg_match("#[0-9]+#", $password)) {
   // $passworderror = "Password must include at least one number.";
  } elseif (!preg_match("#[a-zA-Z]+#", $password)) {
   // $passworderror = "Password must include at least one letter.";
  } 
  else {
    
       $sql = "SELECT * FROM crud2 WHERE email= '$email'";
       $result = mysqli_query($conn,$sql);
       $user = mysqli_fetch_array($result,MYSQLI_ASSOC);
       if($user == TRUE)
       {
        if(password_verify($password,$password["password"]))
        {
          session_start();
          $_SESSION["user"] = "yes";
           //header('location:insert.php');
        }else{
          echo "<div class ='alert alert-danger'>Password does not match </div>";

        }
      }
        else{
          echo "<div class ='alert alert-danger'>Email does not match </div> ";
          
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="login1.css">
  <title>Document</title>
</head>

<body><br><br>
<div class="mg">
<?php
if(isset($_SESSION['status']))
{
  ?><div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>  Thank you  !</strong><br><?= $_SESSION['status'];?>
  <span><?= $n['username']??'';  ?></span>
  <br><br>
  <a href="design2.html" class="btn btn-primary" >Next</a>
   <a href="" class="btn btn-primary active" >Registration</a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php

  unset($_SESSION['status']);
}

?>
</div>
  <section>
   
    <form action = "" method="post" class="log-form">
     <center>  <h4>   Login Here ! </h4> </center>
      <div class="group log-input">
        <input type="email"  name="email" placeholder="Email" value="">
        <span> <?= $errordic ?></span>
      </div>
      <div class="group log-input">
        <input type="password" id="password" name="password" placeholder="Password">
        <span> <?= $passworderror; ?> </span>
      </div><br>
    
      <button class="btn btn-dark"  type="submit" name="login">Login</button><br><br>
      <a href="insert.php" class="text-dark">all ready i have account !</a><br><br>

      

      

     

    </form> 
       <br><br><br> <br><br><br>
  <footer class="text-center text-white" style="background-color: #f1f1f1;">
 <div class="text-center text-white p-3" style="background-color: black;">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/"></a>
    </div>

  </footer>

</body>

</html>