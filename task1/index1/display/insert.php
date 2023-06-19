<?php

include 'conn.php';
$usernameerror = $phonenoerror = $passworderror = $confirm_passworderror = $cityerror = $gendererror = $birthdateerror = $emailerror = "";
$username = $phoneno = $password = $confirm_password = $city = $gender =$birthdate = $email = "";
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $phoneno = $_POST['phoneno'];
  $password = md5($_POST['password']);
  $confirm_password = $_POST['confirm_password'];
  $city = $_POST['city'];
  $gender = $_POST['gender'];
  $birthdate = $_POST['birthdate'];
  $email = $_POST['email'];

  // Validate each field
  if (empty($username)) {
    $usernameerror = "Username is required.";
  }elseif (!preg_match("/^[a-zA-Z ]*$/", $username)) {
    $usernameerror = "Only letters and white space allowed";
  }

  
  if (empty($phoneno)) {
    $phonenoerror = "Phone number is required.";
  }elseif (!preg_match('/^\d{10}$/', $phoneno)) {
     $phonenoerror = "Phone number only 10 digit allow !";
  }
  
  if (empty($password)) {
    $passworderror = "Password is required.";
  } elseif (strlen($password) < 8) {
    $passworderror = "Password should be at least 8 characters long.";
  }

   if($password != $confirm_password)
  {
   // $confirm_passworderror = "password do not match";
  }else
  {
    $confirm_passworderror = "password match";
  }


  if (empty($city)) {
    $cityerror = "City is required.";
  }elseif(!preg_match("/^[a-zA-Z ]*$/", $city)) {
    $cityerror = "Only letters and white space allowed";
  }
  
  if (empty($gender)) {
    $gendererror = "Gender is required";
  }
  
  if (empty($birthdate)) {
    $birthdateerror = "Birthdate is required.";
  }
  
  if (empty($email)) {
    $emailerror = "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

     $emailerror = "Invalid email format.";
  }


if(empty($username) || empty($phoneno)|| empty($password)  || empty($city) || empty($gender)|| empty($birthdate) || empty($email) && $usernameerror || $phonenoerror || $passworderror || $cityerror || $gendererror || $emailerror)
{

}else{
$created_at = date('Y-m-d H:i:s');
$sql = "INSERT INTO `crud2` (`username`,`phoneno`,`password`,`city`,`gender`,`birthdate`,`email`,`created_at`)
VALUES ('$username','$phoneno','$password','$city','$gender','$birthdate','$email','$created_at')";
$stmt = mysqli_stmt_init($conn);
$preparestmt = mysqli_stmt_prepare($stmt,$sql);
if($preparestmt)
{
  mysqli_stmt_bind_param($stmt,"ssssss",'$email','$password');
  mysqli_stmt_execute($stmt);
  echo  "<div class='alert alert-success'>Your are register successfully></div>";
  header('location:display.php');
}else
{
  die ("somethind we wong");
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
  <link rel="stylesheet" href="insert1.css">
  <title>Document</title>
</head>

<body>
  <style>
    body {
      background-image: linear-gradient(rgba(1, 1, 1, .5), ghostwhite);
    }
  </style>
  <style>
    .error {
      color: #FF0000;
    }
  </style>
    

  <br><br><br>
  <div class="col-lg-7 m-auto p-1 mb-2 bg-secondary text-black">
    <form method="post">
      <div class="conatiner"><br>
        <div class="card-header bg-dark">
          <h5 class="text-white text-center">Registration</h5>
        </div>
        <br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

          <label>Username:</label>
          <input type="text" name="username" class="form-control" value="<?= $username; ?>">
          <span class="error"><?= $usernameerror; ?></span><br><br>



          <label>Phone number:</label>
          <input type="number" name="phoneno" class="form-control" value="<?= $phoneno; ?>">
          <span class="error"><?= $phonenoerror; ?></span><br><br>

          <label>Password:</label>
          <input type="password" name="password" class="form-control" value="">
          <span class="error"><?= $passworderror; ?></span><br><br>

          <label>Confirm_Password:</label>
          <input type="password" name="confirm_password" class="form-control">
          <span class="error"><?= $confirm_passworderror; ?></span><br><br>

          <label>City:</label>
          <input type="text" name="city" class="form-control" value="<?= $city; ?>">
          <span class="error"><?= $cityerror; ?></span><br><br>


          <label>Gender:</label>
          <select id="inputState" name="gender" class="form-control" value="<?= $gender; ?>">
            <option selected>Choose...</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
          <span class="error"><?= $gendererror; ?></span><br><br>


      

          <label>Birthdate:</label>
          <input type="date" name="birthdate" class="form-control" value="<?= $birthdate; ?>">
          <span class="error"><?= $birthdateerror; ?></span><br><br>

          <label>Email:</label>
          <input type="email" name="email" class="form-control  md-4" value="<?= $email ?>">
          <span class="error"><?=  $emailerror; ?></span><br><br><br>

          
          
          <button class="btn btn-dark" type="submit" name="submit">submit</button><br><br>
         <p>already  have registration !</p>
         <a href="login.php?id=<?= $n['id'] ?>" class="btn btn-secondary text-white" id="mymodel">Login</a>
         
        </form>
      </div>
  </div><br><br><br>


  
  </form> 
       <br><br><br>
  <footer class="text-center text-white" style="background-color: #f1f1f1;">
 <div class="text-center text-white p-3" style="background-color: black;">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/"></a>
    </div>

  </footer>
</body>

</html>