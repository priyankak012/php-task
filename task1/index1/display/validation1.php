
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="col-lg-6 m-auto">
        <form method="post">
            <div class="card"><br>
                <div class="card-header bg-dark">
                    <h5 class="text-white text-center">Inser operation</h5>
                </div>
                <br>
               
                <lable>username: </lable>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"><br>
                <lable>phoneno:</lable>
                <input type="number" name="phoneno" class="form-control"value="<?php echo $phoneno;?>"><br>
                <lable>password:</lable>
                <input type="password" name="password" class="form -control" value="<?php echo $password;?>"><br>
                <lable>city:</lable>
                <input type="text" name="city" class="form-control"value="<?php echo $city;?>"><br>
                <button class="btn btn-success" type="submit" name="done">submit</button><br>

            </div>
            <?php

            if (!isset($_POST['done'])) {

                $username = $_POST['username'] ?? '';
                $phoneno = $_POST['phoneno'] ?? '';
                $password = $_POST['password'] ?? '';
                $city = $_POST['city'] ?? '';
                if (empty($username) || empty($phoneno) || empty($password) || empty($city)) {
                    die('Please fill all required fields!');
                }
                $q = "INSERT INTO `crud2` (`username`, `phoneno`,`password`,`city`) VALUES ('$username','$phoneno','$password','$city')";
                $query = mysqli_query($conn, $q);
            }
            ?>

</form>
</body>
if (!isset($_POST['done'])) {
$q = "INSERT INTO `crud2` (`username`, `phoneno`,`password`,`city`) VALUES ('$username','$phoneno','$password','$city')";
    $query = mysqli_query($conn, $q);
</html>
<?php
include "conn.php";

$usernameerr = $phonenoerr = $passworderr = $cityerr = "";
// $username = $phoneno = $password = $city = "";
if (isset($_POST["done"])) {
    $username = $_POST["username"];
    if (preg_match('/^[a-zA-Z][0-9a-zA-Z_]{2,23}[0-9a-zA-Z]$/', $username)) {
        $usernamee = "Name is required";
    } else {
        // $username = test_input($_POST["username"]);
    }
}
if (isset($_POST["done"])) {
    $phoneno = $_POST["phoneno"];
    if (strlen($phoneno) == 10) {
        $phoneno = "Name is required";
    } else {
        echo "enter 10 number<br>";
    }
}

if (isset($_POST["done"])) {

    $password = $_POST["password"];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character<br>.';
    } else {
        echo 'Strong password.<br>';
    }
}
if (isset($_POST["done"])) {
    $city = $_POST["city"];
    if (preg_match('/^[a-zA-Z][0-9a-zA-Z_]{2,23}[0-9a-zA-Z]$/', $city)) {
        $city = "Name is required";
    } else {
        echo "enter valid city<br>";
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
    <title>Document</title>
</head>

<body>
    <div class="col-lg-6 m-auto">
        <form method="post">
            <div class="card"><br>
                <div class="card-header bg-dark">
                    <h5 class="text-white text-center">Inser operation</h5>
                </div>
                <br>

                <lable>username: </lable>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"><br>
                <lable>phoneno:</lable>
                <input type="number" name="phoneno" class="form-control"><br>
                <lable>password:</lable>
                <input type="password" name="password" class="form -control" value="" require><br>
                <lable>city:</lable>
                <input type="text" name="city" class="form-control"><br>
                <button class="btn btn-success" type="submit" name="done">submit</button><br>

            </div>

            <?php

            if (!isset($_POST['done'])) {

                $username = $_POST['username'] ?? '';
                $phoneno = $_POST['phoneno'] ?? '';
                $password = $_POST['password'] ?? '';
                $city = $_POST['city'] ?? '';
                if (empty($username) || empty($phoneno) || empty($password) || empty($city)) {
                    die('Please fill all required fields!');
                }
                $q = "INSERT INTO `crud2` (`username`, `phoneno`,`password`,`city`) VALUES ('$username','$phoneno','$password','$city')";
                $query = mysqli_query($conn, $q);
            }
            ?>


        </form>
</body>

</html>
<?php
$usernameErr = $phonenoErr = $passwordErr = $cityErr = "";


 if(isset($_POST['done'])){
  if (empty($_POST["username"])) {
    $usernameErr = "userName is required";
  } 

  if (empty($_POST["phoneno"])) {
    $phonenoErr = "phoneno is required";
  }

  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  }

  if (empty($_POST["city"])) {
    $cityErr = "city is required";
  } 
}

?>
<?php
    include 'conn.php';
    $username = $_POST['username'] ?? '';
    $phoneno = $_POST['phoneno'] ?? '';
    $password = $_POST['password'] ?? '';
    $city = $_POST['city'] ?? '';
    $q = "INSERT INTO `crud2` (`username`, `phoneno`,`password`,`city`) VALUES ('$username','$phoneno','$password','$city')";
    $query = mysqli_query($conn, $q);
    ?>


 if ((empty($_POST["username"])) || (empty($_POST["phoneno"])) || (empty($_POST["password"])) || (empty($_POST["city"])));
  {
    $usernameerr= 'USERNAME IS REQUIRED';
    $phonenoerr = "PHONENO IS REQUIRED";
    $passworderr = "PASSWORD IS REQUIRED";
    $cityerr = "CITY IS REQUIRED";
}
}


<?php
include('conn.php');

$id = $_GET['id'];

//Fetching privious image to update
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $edit_query = "SELECT * FROM crud WHERE id = $id";
    $edit_query_run = mysqli_query($conn, $edit_query);
    if(mysqli_num_rows($edit_query_run) > 0){
        $edit_row = mysqli_fetch_array($edit_query_run);
      
     
    }
}else{
   echo "please edit data";
}


include "conn.php";

if(isset($_POST['done']))
{

$id = $_GET['id'];
$username = $_POST['username']?? '';
$phoneno = $_POST['phoneno']?? '';
$password = $_POST['password']?? '';
$city = $_POST['city']?? '';


$q ="UPDATE crud2 SET username='$username',phoneno ='$phoneno', password='$password',city='$city' WHERE id=$id ";
$query = mysqli_query($conn,$q);

if($query)
{
    echo "<script>
            alert('Success! Data has been successfully updated!');
            window.location.href='index.php';
            </script>";
}else
{
    echo "Data not update";
}
}

?>

<label for="inputState">Gender</label>
    <select id="inputState" name="user_gender" class="form-control">
    <option selected>Choose...</option>
    <option>Male</option>
    <option>Female</option>
    <option>Other</option>
    <span> <?php echo $gendererr; ?></span>
    </select><br><br>



<?php
    $usernameerr = $phonenoerr = $passworderr = $cityerr = $gendereer = $birthdateer = $emailerr ="";
$usernameerror = $phonenoerror = $passworderror = $cityerror = $gendereeror = $birthdateeror = $emailerror ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if(isset($_POST['submit'])){
  if (empty($username) || empty($phoneno) || empty($password) || empty($city) || empty($gender) || empty($birthdate) || empty($email))
   {
   $usernameerr = "USERNAME IS REQUIRED";
   $phonenoerr = "PHONENO IS REQUIRED";
    $passworderr = "PASSWORD IS REQUIRED";
    $cityerr = "CITY IS REQUIRED";
    $gendereer = "GENDER IS REQUIRED";
    $birthdateer =  "BIRTHDATE IS REQUIRED";
    $emailerr ="EMAIL IS REQUIRED";
   }else
   {
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $usernameerror = "Only letters and white space allowed";
    }

      if (strlen($phoneno) == 10)
       {
           $phonenoerror = "only enter 10 number digit";
       }
       
       $password = $_POST["password"];
       $uppercase = preg_match('@[A-Z]@', $password);
       $lowercase = preg_match('@[a-z]@', $password);
       $number    = preg_match('@[0-9]@', $password);
       $specialChars = preg_match('@[^\w]@', $password);
   
       if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
           echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character<br>.';
       } else {
           echo 'Strong password.<br>';
       }
       if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
        $cityerror = "Only letters and white space allowed";
      }
     

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerror = "Invalid email format";
    }
   }
  }
}

  ?>
  <?php

if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$update = true;
		$query = mysqli_query($conn, "SELECT * FROM `crud2` WHERE id=$id");
        
	     
			$n = mysqli_fetch_array($query);
			$id = $_GET['id']?? '';
            $username = $n['username'];
            $phoneno = $n['phoneno'];
            $password = $n['password'];
            $city = $n['city'];
            $gender = $n['gender'];
            $birthdate = $n['birthdate'];
            $email = $n['email'];
		}
	?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if(isset($_POST['submit'])){
  if (empty($username) || empty($phoneno) || empty($password) || empty($city) || empty($gender) || empty($birthdate) || empty($email))
   {
   $usernameerr = "USERNAME IS REQUIRED";
   $phonenoerr = "PHONENO IS REQUIRED";
    $passworderr = "PASSWORD IS REQUIRED";
    $cityerr = "CITY IS REQUIRED";
    $gendereer = "GENDER IS REQUIRED";
    $birthdateer =  "BIRTHDATE IS REQUIRED";
    $emailerr ="EMAIL IS REQUIRED";
   }else
   {
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $username_error = "Only letters and white space allowed";
    }

      if (strlen($phoneno) == 10)
       {
           $phoneno_error = "only enter 10 number digit";
       }
       
       $password = $_POST["password"];
       $uppercase = preg_match('@[A-Z]@', $password);
       $lowercase = preg_match('@[a-z]@', $password);
       $number    = preg_match('@[0-9]@', $password);
       $specialChars = preg_match('@[^\w]@', $password);
   
       if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
           echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character<br>.';
       } else {
           echo 'Strong password.<br>';
       }
       if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
        $city_error = "Only letters and white space allowed";
      }
     

    if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
      $email_error = "Invalid email format";
    }
   }
  }
}

  ?>

<?php
include 'conn.php';
$usernameerr = $phonenoerr = $passworderr = $cityerr = $gendereer = $birthdateer = $emailerr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if(isset($_POST['submit'])){
  if (empty($username) || empty($phoneno) || empty($password) || empty($city) || empty($gender) || empty($birthdate) || empty($email))
   {
   $usernameerr = "USERNAME IS REQUIRED";
   $phonenoerr = "PHONENO IS REQUIRED";
    $passworderr = "PASSWORD IS REQUIRED";
    $cityerr = "CITY IS REQUIRED";
    $gendereer = "GENDER IS REQUIRED";
    $birthdateer =  "BIRTHDATE IS REQUIRED";
    $emailerr ="EMAIL IS REQUIRED";
   
   

    if (isset($_POST['submit']))
     {

      $username = $_POST['username'];
      $phoneno = $_POST['phoneno'];
      $password = $_POST['password'];
      $city = $_POST['city'];
      $gender = $_POST['gender'];
      $birthdate = $_POST['birthdate'];
      $email = $_POST['email'];
      
      if (empty($username) || empty($phoneno) || empty($password) || empty($city) || empty($gender) || empty($birthdate)|| empty($email)){
       // echo "Please fill all required fields!";
      }else{
        $sql = "INSERT INTO `crud2` (`username`,`phoneno`,`password`,`city`,`gender`,`birthdate`,`email`)
        VALUES ('$username','$phoneno','$password','$city','$gender','$birthdate','$email')";
     $q = mysqli_query($conn, $sql);
     header('location:display.php');
      }
    }
  }
  }
}

?>

// php validation inser 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit'])) { {
                if ($username_error || $phoneno_error ||  $city_error || $email_error);

                if (preg_match('/^[a-zA-Z]+$/', $username)) {
                    echo "Valid username";
                } else {
                    $username_error = "Invalid username";
                }
                if (strlen($phoneno) == 10) {
                    $phoneno_error = "only enter 10 number digit";
                }
                if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {

                    $email_error = "Invalid email address";
                }
            }
            if (preg_match('/^[a-zA-Z]+$/', $city)) {
                echo "Valid username";
            } else {
                $city_error = "Invalid city";
            }
        }
    }

?>

<?php
$usernameerr = $phonenoerr = $passworderr = $cityerr = $gendereer = $birthdateer = $emailerr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if(isset($_POST['submit'])){
  if (empty($username) || empty($phoneno) || empty($password) || empty($city) || empty($gender) || empty($birthdate) || empty($email))
   {
   $usernameerr = "USERNAME IS REQUIRED";
   $phonenoerr = "PHONENO IS REQUIRED";
    $passworderr = "PASSWORD IS REQUIRED";
    $cityerr = "CITY IS REQUIRED";
    $gendereer = "GENDER IS REQUIRED";
    $birthdateer =  "BIRTHDATE IS REQUIRED";
    $emailerr ="EMAIL IS REQUIRED";
   }else
   {
    if ($username_error || $phoneno_error ||  $city_error || $email_error);

                if (preg_match('/^[a-zA-Z]+$/', $username)) {
                    echo "Valid username";
                } 
                
                if (strlen($phoneno) == 10) {
                    $phoneno_error = "only enter 10 number digit";
                }
                if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {

                    $email_error = "Invalid email address";
                }
            }
        }
    }
   
    if (isset($_POST['submit']))
     {

      $username = $_POST['username'];
      $phoneno = $_POST['phoneno'];
      $password = $_POST['password'];
      $city = $_POST['city'];
      $gender = $_POST['gender'];
      $birthdate = $_POST['birthdate'];
      $email = $_POST['email'];
      
      if (empty($username) || empty($phoneno) || empty($password) || empty($city) || empty($gender) || empty($birthdate)|| empty($email)){
       // echo "Please fill all required fields!";
      }else{
        $sql = "INSERT INTO `crud2` (`username`,`phoneno`,`password`,`city`,`gender`,`birthdate`,`email`)
        VALUES ('$username','$phoneno','$password','$city','$gender','$birthdate','$email')";
     $q = mysqli_query($conn, $sql);
     header('location:display.php');
      }
    }
  

?>
<?php
$usernameerr = $phonenoerr = $passworderr = $cityerr = $gendereer = $birthdateer = $emailerr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if(isset($_POST['submit'])){
  if (empty($username) || empty($phoneno) || empty($password) || empty($city) || empty($gender) || empty($birthdate) || empty($email))
   {
   $usernameerr = "USERNAME IS REQUIRED";
   $phonenoerr = "PHONENO IS REQUIRED";
    $passworderr = "PASSWORD IS REQUIRED";
    $cityerr = "CITY IS REQUIRED";
    $gendereer = "GENDER IS REQUIRED";
    $birthdateer =  "BIRTHDATE IS REQUIRED";
    $emailerr ="EMAIL IS REQUIRED";
   }else
   {
    if ($username_error || $phoneno_error ||  $city_error || $email_error);

                if (preg_match('/^[a-zA-Z]+$/', $username)) {
                    echo "Valid username";
                } 
                
                if (strlen($phoneno) == 10) {
                    $phoneno_error = "only enter 10 number digit";
                }
                if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {

                    $email_error = "Invalid email address";
                }
            }
        }
    }
   
    if (isset($_POST['submit']))
     {

      $username = $_POST['username'];
      $phoneno = $_POST['phoneno'];
      $password = $_POST['password'];
      $city = $_POST['city'];
      $gender = $_POST['gender'];
      $birthdate = $_POST['birthdate'];
      $email = $_POST['email'];
      
      if (empty($username) || empty($phoneno) || empty($password) || empty($city) || empty($gender) || empty($birthdate)|| empty($email)){
       // echo "Please fill all required fields!";
      }else{
        $sql = "INSERT INTO `crud2` (`username`,`phoneno`,`password`,`city`,`gender`,`birthdate`,`email`)
        VALUES ('$username','$phoneno','$password','$city','$gender','$birthdate','$email')";
     $q = mysqli_query($conn, $sql);
     header('location:display.php');
      }
    }
  

?>
<?php
   {
      if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) 
      {
        $userErr = "invalid user name";
      }
      if (strlen($phoneno) == 10){
        $phonenoErr = "enter 10 digit number";
      }
      if (!preg_match("/^[a-zA-Z-' ]*$/",$city))
      {
        $cityErr = "enter valid cityname";
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL));
      {
        $emailErr = "enter valid emailid";
      }

   }
   ?>
   <?php
   if ($query) {

echo "<script>
alert('Success! Data has been successfully updated!');
window.location.href='display.php';
</script>";
} else {
echo "data not update";
}
?>
<?php

include ('conn1.php');

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $query = mysqli_query($conn, "SELECT * FROM `crud2` WHERE id=$id");
   
    
       $n = mysqli_fetch_array($query);
       $id = $_GET['id'];
       $username = $n['username'];
       $phoneno = $n['phoneno'];
       $city = $n['city'];
       $gender = $n['gender'];
       $birthdate = $n['birthdate'];
       $email = $n['email'];
   }
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
   
</head>
<body>
<div class="col-lg-6 m-auto">
        <form method="post">
            <div class="card"><br>
                <div class="card-header bg-info">
                    <h5 class="text-white text-center">View data</h5>
               </div>
               <br>

               <lable>username: </lable>
               <input type ="text" name="username" class="form-control" value="<?= $n['username'];?>"><br>
               <lable>phoneno</lable>
               <input type ="number" name="phoneno" class="form-control" value="<?=$n['phoneno'];?>"><br>
               <lable>city:</lable>
               <input type = "text" name="city" class="form-control" value="<?= $n['city'];?>"><br>
               <label for="inputState">Gender</label>
       <select id="inputState" name="gender" class="form-control" value="<?= $n['gender'];?>">
          <option selected>Choose...</option>
          <option>Male</option>
         <option>Female</option>
          <option>Other</option>
      </select><br>
      <label>birthdate:</label>
      <input type="date" name ="birthdate" placeholder="enter birthdate" class="form-control" value="<?= $n['birthdate'];?>"><br>
      <lable>email:</lable>
        <input type="email" name="email" class="form-control" value="<?= $n['email'];?>"><br>

                          
            
</div><br><br>

    <a href="display.php" class=" btn btn-outline-success ">back </a>


</body>
</html>

<?php
include 'conn.php';
$usernameerr = $phonenoerr = $passworderr = $cityerr = $gendereer = $birthdateer = $emailerr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (isset($_POST['submit']))
     {

      $username = $_POST['username'];
      $phoneno = $_POST['phoneno'];
      $password = $_POST['password'];
      $city = $_POST['city'];
      $gender = $_POST['gender'];
      $birthdate = $_POST['birthdate'];
      $email = $_POST['email'];
      
      if (empty($username) || empty($phoneno) || empty($password) || empty($city) || empty($gender) || empty($birthdate)|| empty($email)){
        $usernameerr = "USERNAME IS REQUIRED";
        $phonenoerr = "PHONENO IS REQUIRED";
         $passworderr = "PASSWORD IS REQUIRED";
         $cityerr = "CITY IS REQUIRED";
         $gendereer = "GENDER IS REQUIRED";
         $birthdateer =  "BIRTHDATE IS REQUIRED";
         $emailerr ="EMAIL IS REQUIRED";
        
        
      }else{
        $sql = "INSERT INTO `crud2` (`username`,`phoneno`,`password`,`city`,`gender`,`birthdate`,`email`)
        VALUES ('$username','$phoneno','$password','$city','$gender','$birthdate','$email')";
     $q = mysqli_query($conn, $sql);
     header('location:display.php');
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<body>
<div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <h5 class="text-white h4  text-center">INSERT DATA  </h5>
  </div>
</div>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
    </div>
  </nav>
</div>

  <br><br><br>
  <div class="col-lg-7 m-auto p-1 mb-2 bg-secondary text-black">
    <form method="post">
      <div class="card"><br>
        <div class="card-header bg-dark">
          <h5 class="text-white text-center">Inser operation</h5>
        </div>
        <br>
        <lable>username: </lable>
        <input type="text" name="username" class="form-control"><br>
        <span> <?= $usernameerr; ?></span>
        
        <lable>phoneno:</lable>
        <input type="number" name="phoneno" class="form-control"><br>
        <span> <?= $phonenoerr; ?></span>
        

        <lable>password:</lable>
        <input type="password" name="password" class="form-control"><br>
        <span> <?= $passworderr; ?></span>
        

        <lable>city:</lable>
        <input type="text" name="city" class="form-control"><br>
        <span> <?= $cityerr; ?></span>
       
        <label for="inputState">Gender</label>
       <select id="inputState" name="gender" class="form-control">
          <option selected>Choose...</option>
          <option>Male</option>
         <option>Female</option>
          <option>Other</option>
      </select><br>
      <span> <?= $gendereer; ?></span>
      
      <label>birthdate:</label>
      <input type="date" name ="birthdate" placeholder="enter birthdate" class="form-control"><br>
      <span> <?= $birthdateer; ?></span>

      <lable>email:</lable>
        <input type="email" name="email" class="form-control"><br>
        <span> <?= $emailerr; ?></span>

        <button class="btn btn-success" type="submit" name="submit">submit</button><br>

      </div>
    </form>
</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<body>
<div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <h5 class="text-white h4  text-center">INSERT DATA  </h5>
  </div>
</div>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
    </div>
  </nav>
</div>

  <br><br><br>
  <div class="col-lg-7 m-auto p-1 mb-2 bg-secondary text-black">
    <form method="post">
      <div class="card"><br>
        <div class="card-header bg-dark">
          <h5 class="text-white text-center">Inser operation</h5>
        </div>
        <br>
        <lable>username: </lable>
        <input type="text" name="username" class="form-control"><br>
        <span> <?= $usernameerr; ?></span>
        
        <lable>phoneno:</lable>
        <input type="number" name="phoneno" class="form-control"><br>
        <span> <?= $phonenoerr; ?></span>
        

        <lable>password:</lable>
        <input type="password" name="password" class="form-control"><br>
        <span> <?= $passworderr; ?></span>
        

        <lable>city:</lable>
        <input type="text" name="city" class="form-control"><br>
        <span> <?= $cityerr; ?></span>
       
        <label for="inputState">Gender</label>
       <select id="inputState" name="gender" class="form-control">
          <option selected>Choose...</option>
          <option>Male</option>
         <option>Female</option>
          <option>Other</option>
      </select><br>
      <span> <?=  $gender; ?></span>
      
      <label>birthdate:</label>
      <input type="date" name ="birthdate" placeholder="enter birthdate" class="form-control"><br>
      <span> <?= $birthdateer; ?></span>

      <lable>email:</lable>
        <input type="email" name="email" class="form-control"><br>
        <span> <?= $emailerr; ?></span>

        <button class="btn btn-success" type="submit" name="submit">submit</button><br>

      </div>
    </form>
</body>
</html>
// login 


<?php 
include 'conn.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['submit']))
{   
    $email = $_POST['email'];
    $password = $_POST['password'];
  if(empty($email)|| empty($password)) {
    $query = "INSERT INTO `login` (`email`,`password`) VALUES ('$email','$password')";
    $q = mysqli_query($conn,$query);
}

  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password !== $confirm_password) {
    $error_message = 'Passwords do not match';
  } else {
    echo  "Passwords match, proceed with form submission";
  }
}
}
?>
<?php  
include 'conn.php';

$email = $password = $correct_password = "";
$emailerr = $passworderr = $correct_passworderr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if(empty($email)|| empty($password)){
        $emailerr = "please enter email";
        $passworderr = "please enter your password";

    }else{
    $query = "INSERT INTO `login` (`email`,`password`) VALUES ('$email','$password')";
    $q = mysqli_query($conn,$query);
}
    if($query)
    {
       echo "your data is insert";
    }else
    {
         echo  "your data is not insert";
    }
}
}

  else{

$sql = "INSERT INTO `login` (`email`,`password`) VALUES ('$email','$password')";
$q = mysqli_query($conn,$sql);
}

?>
<?php
include 'conn.php';
$password = $Confirm_password = "";
if(isset($_POST['login']))
{
    $password = $_POST['password'];
    $Confirm_password = $_POST['Confirm_password'];


if ($_POST["password"] === $_POST["Confirm_password"]) {
} else {

  $Confirm_passworderr = "please enter match password";
  
  echo "<script> alert(' Please enter same passwords ') </script>";
}
}
if($_SERVER["REQUEST_METHOD"]== "POST"){
if(isset($_POST['login']))
{
    if(empty($password) || (empty($Confirm_password)))
{
    }  else{

    $password = $_POST['password'];
    $created_at = date('Y-m-d H:i:s');
       
   $query = "INSERT INTO `password_update`(`password`,`created_at`) VALUES ('$password','$created_at')";
   $q = mysqli_query($conn,$query);
}  
}
}
<?php
include 'conn.php';

$email = $password = "";
$emailerr = $passworderr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['login'])) {
    $email = $_POST['$email'] ?? '';
    $password = $_POST['$password'] ?? '';

    if (empty($email) || empty($password)) {

      $emailerr = "Please enter email";
      $passworderr = "Please enter password";
     
    }
  }else{
    $created_at = date('Y-m-d H:i:s');
    $query = "INSERT INTO `login` (`email`,`password`,`created_at`)VALUES ('$email','$password','$created_at')";
    $q = mysqli_query($conn, $query);
    
    
  }


}
?>
<?php
include 'conn.php';
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST['login'])){

  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);
  
  if (strlen($password) < 8) {
   
  } elseif (!preg_match("#[a-zA-Z]+#", $password)) {
    echo "Password must include at least one letter.";
  } else {
    
    $created_at =  date('Y-m-d H:i:s');
    $sql = "INSERT INTO users (`email`, `password`,`createed_at`) VALUES ('$email', '$password',$created_at)";
    
    if ($conn->query($sql) === TRUE) {
      echo "Data inserted successfully.";
    } else {
      echo "Error inserting data: " . $conn->error;
    }
    
    
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Email: <input type="text" name="email"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit" value="Submit">
</form>

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

<body>
  <style>

body {
  background-image: linear-gradient(rgba(1,1,1,.5),ghostwhite);
}

    .error {
      color: #FF0000;
    }
  </style>

  <br><br><br>

  <section>

<hgroup>
    <h2>Welcome back!</h2>
  <p>Please enter your details to sign into your account</p>
</hgroup>

<form method = "post" class = "log-form">

    <div class="group log-input">
      <input type="email" id = "username" name = "email" placeholder = "email" value="<?= $email; ?>">
      
    </div>

    <div class="group log-input">
        <input type="password" id = "password" name = "password"  placeholder = "Password">
        
    </div>

    <button class="btn btn-dark" type="submit" name="login">submit</button><br>
  
</form>

</section>
<footer>

</footer>
</body>
</html>
<?php

include 'conn.php';
$email = $password = "";
$emailerr = $passerr = "";
$success = false;
$error = "";

// If the form has been submitted, validate the password and insert the data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['login'])) {

    $email = ($_POST["email"]);
    $password = ($_POST["password"]);


    if (strlen($password) < 8) {
      $passerr = "Password must be at least 8 characters long."; {
      }
    } elseif (!preg_match("#[a-zA-Z]+#", $password)) {
      $passerri =  "Password must include at least one letter.";
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerr = "please enter valid email";
    } else {
      //$emailerr =  "Invalid email format";
    }
  }
}


$created_at =  date('Y-m-d H:i:s');
$sql = "INSERT INTO `login` (email, password,created_at) VALUES ('$email', '$password','$created_at')";
$q = mysqli_query($conn, $sql);


function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<?php
include 'conn.php';
// Initialize variables
$password1 = '';
$password2 = '';
$errors = array();

// If the form is submitted
if (isset($_POST['password'])) {

    $password = $_POST['password1'];
    $password = $_POST['password2'];

    // Validate the passwords
    if ($password1 != $password2) {
        $errors[] = "Passwords don't match";
    }

    // If there are no errors, insert data into the database
    if (empty($errors)) {
        $created_at =  date('Y-m-d H:i:s');
        $sql = "INSERT INTO `password_update` (`password`,`created_at`) VALUES ('$password','$created_at')";
        mysqli_query($conn, $sql);
    }
}
?>
<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Add icon library-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="updtpass.css">
    <script>
        let check = function() {
            if (document.getElementById('password-1').value == document.getElementById('password-2').value) {
                document.getElementById("formSubmit").disabled = false;
                document.getElementById("formSubmit").style.background = 'blue';
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Password Matched';
            } else {
                document.getElementById("formSubmit").disabled = true;
                document.getElementById("formSubmit").style.background = 'grey';
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Password not matching';
            }
        }
        let validate = function() {
            console.log(document.getElementById('password-1').value)
            console.log(document.getElementById('password-2').value)
            if (document.getElementById('password-1').value.length < 5) {
                document.getElementById('pwd-length-1').innerHTML = 'Minimum 6 characters';
            } else {
                document.getElementById('pwd-length-1').innerHTML = '';
                check();
            }
            if (document.getElementById('password-2').value.length < 5) {
                document.getElementById('pwd-length-2').innerHTML = 'Minimum 6 characters';
            } else {
                document.getElementById('pwd-length-2').innerHTML = '';
                check();
            }
        }
    </script>
</head>

<body>
    <form action="/users/updatePassword" method="PUT" style="max-width:500px;margin:auto">

        <img src="data:image/png;base64,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">
        </center>

        <center>
            <h2><span class="fa-passwd-reset fa-stack"><i class="fa fa-undo fa-stack-2x"></i><i class="fa fa-lock fa-stack-1x"></i></span>Reset your Password<span class="fa-passwd-reset fa-stack"><i class="fa fa-undo fa-stack-2x"></i><i class="fa fa-lock fa-stack-1x"></i></span></h2>
        </center>

        <div class="input-container"><i class="fa fa-key icon"></i>
            <input class="input-field" id="password-1" type="password" placeholder="Type your new password" name="password" oninput='validate();'>
            <span></span>
        </div>

        <span id="pwd-length-1"></span>
        <!-- Second Input Text  -->
        <div class="input-container"><i class="fa fa-key icon"></i>
            <input class="input-field" id="password-2" type="password" placeholder="Re-type your new password" name="confirmPassword" oninput='validate();'>
        </div>

        <span id="pwd-length-2"></span>
        <span id="message"></span>
        <button class="btn" id="formSubmit" type="submit" disabled name="password" name="password">Password Update</button>
    </form>


</body>

</html>
?>
<?php
include 'conn.php';
$username = $phoneno = $password = $confirm_password = $city = $gender = $birthdate = $email = "";
$usernameerror = $phonenoerror = $passworderror = $confirm_passworderror = $cityerror = $gendererror = $birthdateerror = $emailerror = "";

// check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submit'])) {

    if (empty($_POST["username"])) {
      $usernameerror = "Username is required";
    } else {
      $username = ($_POST["username"]);
      // check if username only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
        $usernameerror = "Only letters and white space allowed";
      }
    }

    // validate phone number
    if (empty($_POST["phoneno"])) {
      $phonenoerror = "Phone number is required";
    } else {
      $phoneno = ($_POST["phoneno"]);
      // check if phone number is valid
      if(preg_match('/^\d{10}$/', $phoneno)) {
        $phonenoerror = "Phone number is valid.";
      } else {
        $phonenoerror = "Phone number is invalid.";
      }
    }
    

    // validate password
    // Validate the password
  if (strlen($password) < 9) {
      $passworderror = "password is reqire";
    }else{  $error = "Password must be at least 8 characters long.";
  } 

  //   // validate confirm password
    if (empty($_POST["confirm_password"])) {
      $confirm_passworderror = "enter confirm password";
    }
    else{
       $confirm_passworderror = "enter match password";
    } 
    
    if (empty($_POST["city"])) {
      $cityerror = "city is required";
    } else {
      $city = ($_POST["city"]);
      // check if username only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
        $cityerror = "Only letters and white space allowed";
      }
    }

    // validate gender
    if (empty($_POST["gender"])) {
      $gendererror = "Gender is required";
    } else {
      $gender = ($_POST["gender"]);
    }

    // validate birthdate
    if (empty($_POST["birthdate"])) {
      $birthdateerror = "Birthdate is required";
    } else {
      $birthdate = ($_POST["birthdate"]);
    }

    // validate email
    if (empty($_POST["email"])) {
      $emailerror = "Email is required";
    } else {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {}else
{
        $emailerror = "Invalid email format";
      }
    
    }
  
  
  if ($usernameerror == "" && $phonenoerror == "" && $passworderror == "" && $confirm_passworderror == "" && $cityerror == "") { {
      $sql = "INSERT INTO `crud2` (`username`,`phoneno`,`password`,`city`,`gender`,`birthdate`,`email`)
        VALUES ('$username','$phoneno','$password','$city','$gender','$birthdate','$email')";
      $q = mysqli_query($conn, $sql);
    }
  }
}
}
if ($q) {

  echo "<script>
  alert('Success! Data has been successfully updated!');
  window.location.href='display.php';
  </script>";
  } else {
  echo "data not update";
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
          <span class="error"><?php echo $usernameerror; ?></span><br><br>



          <label>Phone number:</label>
          <input type="number" name="phoneno" class="form-control" value="<?= $phoneno; ?>">
          <span class="error"><?php echo $phonenoerror; ?></span><br><br>

          <label>Password:</label>
          <input type="password" name="password" class="form-control" value="">
          <span class="error"><?php echo $passworderror; ?></span><br><br>

          <label>Confirm_Password:</label>
          <input type="password" name="Confirm_password" class="form-control">
          <span class="error"><?php echo $confirm_passworderror; ?></span><br><br>

          <label>City:</label>
          <input type="text" name="city" class="form-control" value="<?= $city; ?>">
          <span class="error"><?php echo $cityerror; ?></span><br><br>


          <label>gender:</label>
          <select id="inputState" name="gender" class="form-control" value="<?= $gender; ?>">
            <option selected>Choose...</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
          <span class="error"><?php echo $gendererror; ?></span><br><br>


          <label>birthdate:</label>
          <input type="date" name="birthdate" class="form-control" value="<?= $birthdate; ?>">
          <span class="error"><?php echo $birthdateerror; ?></span><br><br>

          <label>email:</label>
          <input type="email" name="email" class="form-control  md-4" value="<?= $email ?>">
          <span class="error"><?php echo $emailerror; ?></span><br><br><br>


          <button class="btn btn-dark" type="submit" name="submit">submit</button><br>

        </form>
      </div>
  </div>


  <footer class="text-center text-white" style="background-color: #f1f1f1;">


    <div class="text-center text-white p-3" style="background-color: black;">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/"></a>
    </div>

  </footer>
</body>

</html>
<?php 
<?php
include 'conn.php';
$username = $phoneno = $password = $confirm_password = $city = $gender = $birthdate = $email = "";
$usernameerror = $phonenoerror = $passworderror = $confirm_passworderror = $cityerror =  $gendererror = $birthdateerror = $emailerror = "";

// check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submit'])) {

    if (empty($_POST["username"])) {
      $usernameerror = "Username is required";
    } else {
      $username = ($_POST["username"]);
      // check if username only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
        $usernameerror = "Only letters and white space allowed";
      }
    }

    // validate phone number
    if (empty($_POST["phoneno"])) {
      $phonenoerror = "Phone number is required";
    } else {
      $phoneno = ($_POST["phoneno"]);
      // check if phone number is valid
      if(preg_match('/^\d{9}$/', $phoneno)) {
        $phonenoerror = "Phone number only 10 digit allow !";
      }
    }
    
    // Validate the password
  
    if (empty($password)) {
      $passworderror = "Password is required.";
    } elseif (strlen($password) < 8) {
      $passworderror = "Password should be at least 8 characters long.";
    }

  //   // validate confirm password
    if (empty($_POST["confirm_password"])) {
      $confirm_passworderror = "confirm password require";
    }
    else{
       $confirm_passworderror = "enter match password";
    } 
    
    if (empty($_POST["city"])) {
      $cityerror = "city is required";
    } else {
      $city = ($_POST["city"]);
      // check if username only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
        $cityerror = "Only letters and white space allowed";
      }
    }

    // validate gender
    if (empty($_POST["gender"])) {
      $gendererror = "Gender is required";
    } else {
     $gendererror = ($_POST["gender"]);
    }

    // validate birthdate
    if (empty($_POST["birthdate"])) {
      $birthdateerror = "Birthdate is required";
    } else {
      $birthdate = ($_POST["birthdate"]);
    }

    // validate email
    if (empty($_POST["email"])) {
      $emailerror = "Email is required";
    } else {
      
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
         $emailerror= "Great! The Email Format is Valid!";
        }
        else{
          $emailerror= "Sorry! Invalid Email Format!";
        }
    }
  
  }
      $sql = "INSERT INTO `crud2` (`username`,`phoneno`,`password`,`city`,`gender`,`birthdate`,`email`)
        VALUES ('$username','$phoneno','$password','$city','$gender','$birthdate','$email')";
      $q = mysqli_query($conn, $sql);
    }
  
  
  if (!empty($usernameerror) && !empty($phonenoerror) && !empty($passworderror) && !empty($confirmPassworderror) && !empty($cityerror) && !empty($gendererror) && !empty($birthdateerror) && !empty($emailerror)) {
  
    header("Location:display .php");
  }else{
   //echo "please  fill all data ";
  }


?>
<section>
    <div class="col-sm-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Login successfully</h5><br>
        <a href="#" class="btn btn-dark center">Ok</a>
      </div>
    </div>
    </section>
    <?php 
include 'conn.php';
$password = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['password']))
{
    $created_at =  date('Y-m-d H:i:s');
  $query = "INSERT INTO `password_update`(`password`, `created_at`) VALUES ('$password','$created_at')";
  $q = mysqli_query($conn,$query);
}else
if ($conn->connect_error) {
    $passworderror = "Connection failed: " . $conn->connect_error;
  } else {

    $created_at =  date('Y-m-d H:i:s');
    $stmt = $conn->prepare("INSERT INTO `password_update` (`password`,`created_at`) VALUES ('$password','$created_at')");

    
    if ($stmt->execute()) {
      $success = true;
      $_SESSION['status'] = "login successfully";
      
    } else {
      $passworderror = "Error inserting data: " . $conn->error;
    }

   
    $stmt->close();
    $conn->close();

    
    
  }
}

?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Add icon library-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="updtpass.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        let check = function() {
            if (document.getElementById('password-1').value == document.getElementById('password-2').value) {
                document.getElementById("formSubmit").disabled = false;
                document.getElementById("formSubmit").style.background = 'blue';
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Password Matched';
            } else {
                document.getElementById("formSubmit").disabled = true;
                document.getElementById("formSubmit").style.background = 'grey';
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Password not matching';
            }
        }
        let validate = function() {
            console.log(document.getElementById('password-1').value)
            console.log(document.getElementById('password-2').value)
            if (document.getElementById('password-1').value.length < 5) {
                document.getElementById('pwd-length-1').innerHTML = 'Minimum 6 characters';
            } else {
                document.getElementById('pwd-length-1').innerHTML = '';
                check();
            }
            if (document.getElementById('password-2').value.length < 5) {
                document.getElementById('pwd-length-2').innerHTML = 'Minimum 6 characters';
            } else {
                document.getElementById('pwd-length-2').innerHTML = '';
                check();
            }
        }
    </script>
    
</head>
<body>
<?php
if(isset($_SESSION['status']))
{
  ?><div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>  Thank you  !</strong> <br><?= $_SESSION['status'];  ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php

  unset($_SESSION['status']);
}

?>
    <form action="/users/updatePassword" method="PUT" style="max-width:500px;margin:auto">

        <img src="data:image/png;base64,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">
        </center>

        <center>
            <h2><span class="fa-passwd-reset fa-stack"><i class="fa fa-undo fa-stack-2x"></i><i class="fa fa-lock fa-stack-1x"></i></span>Reset your Password<span class="fa-passwd-reset fa-stack"><i class="fa fa-undo fa-stack-2x"></i><i class="fa fa-lock fa-stack-1x"></i></span></h2>
        </center>

        <div class="input-container"><i class="fa fa-key icon"></i>
            <input class="input-field" id="password-1" type="password" placeholder="Type your new password" name="password" oninput='validate();'>
            <span></span>
        </div>

        <span id="pwd-length-1"></span>
        <!-- Second Input Text  -->
        <div class="input-container"><i class="fa fa-key icon"></i>
            <input class="input-field" id="password-2" type="password" placeholder="Re-type your new password" name="confirmPassword" oninput='validate();'>
        </div>

        <span id="pwd-length-2"></span>
        <span id="message"></span>
        <div>
</div>
 
        <button class="btn btn-dark" id="formSubmit" type="submit" disabled name="password" name="password">Password Update</button><br><br>

        
    
</form>

</script>
    
</body>

</html>
//body {
  font-family: Arial, Helvetica, sans-serif;
}
* {
    box-sizing: border-box;
}
.input-container {
    display: -ms-flexbox;
   
    display: flex;
    width: 100%;
    margin-bottom: 15px;
}
.icon {
    padding: 10px;
    background: green;
    color: white;
    min-width: 50px;
    text-align: center;
}
.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
}
.input-field:focus {
    border: 2px solid dodgerblue;
}
/* Set a style for the submit button */
.btn {
   
    background-color: rgb(19, 17, 17);
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.btn:hover {
    opacity: 1;
}
.fa-passwd-reset>.fa-lock {
    font-size: 0.85rem;
}

footer p
{
   margin-bottom:100%;
    width: 100%;
    height: 100px;
    margin: auto;
    text-align: center;
    background-color: black;
    color: white;
    display: grid;
    justify-content: center;
    place-items:center;

}
<?php
include ('conn.php');

if (isset($_GET['id'])) 
{   
    if (isset($_POST['update'])) {
        $username = $_POST['username'] ?? '';
        $phoneno = $_POST['phoneno'] ?? '';
        $city = $_POST['city'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $birthdate = $_POST['birthdate'] ?? '';
        $email = $_POST['email'] ?? '';

        $updated_at = date('Y-m-d H:i:s');
        $update = "UPDATE `crud2` SET  username ='$username',phoneno = '$phoneno' , city='$city', gender = '$gender', birthdate='$birthdate',`email` ='$email', `updated_at` = '$updated_at' WHERE id=$id ";
        $query= mysqli_query($conn,$update);
    }
        $query = mysqli_query($conn, " SELECT * FROM crud2 WHERE id=". $_GET['id']);
        $n = mysqli_fetch_array($query);
    }
 


?>
<?php   
include 'conn.php';
$name = "admin";
$password= "pass123";

$hash = password_hash($password, PASSWORD_DEFAULT);

$created_at = date('Y-m-d H:i:s');
$query = "INSERT INTO `account` (`name`,`password`,`created_at`) VALUES ('$name', :'$password','$created_at')";
$q = mysqli_query($conn,$query);

 
if (isset($_POST['name']) || isset($_POST['password']) && !empty($_POST['name']) || !empty($_POST['password']))
if(isset($_POST['passwordsecure'])){
{
$new_password=$_POST['password'];
     
    if(md5($new_password)==md5($password))
    {
       echo 'connect password !';
    }
    else{
         echo "Incorrect password ";
    }
}
  

  }

?>  
<?php   
include 'conn.php';
$name = "admin";
$password= "pass123";
$error1 = $success = "";


$hash = password_hash($password, PASSWORD_DEFAULT);

$created_at = date('Y-m-d H:i:s');
$query = "INSERT INTO `account` (`name`,`password`,`created_at`) VALUES ('$name', :'$password','$created_at')";
$q = mysqli_query($conn,$query);

 
if (isset($_POST['name']) || isset($_POST['password']) && !empty($_POST['name']) || !empty($_POST['password']))
if(isset($_POST['name']))
if(isset($_POST['password']))
{
$new_password=$_POST['password'];
     
    if(md5($new_password)==md5($password))
    {
         $error1 =  " Correct password ";
    }
    else{
         $error1 = "Incorrect password ";
    }
}
  if($hash == True){
    $success = true;
    $_SESSION['status'] = "password secure";
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
    <title>Document</title>
 </head>
 <body>
    <br><br>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="md5.css">
    <title>LoginForm</title>
</head>
<body>
<?php
if(isset($_SESSION['status']))
{
  ?><div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>  Thank you  !</strong> <br><?= $_SESSION['status'];  ?><br><br>
  <a href="display.php" class="btn btn-primary" >Next</a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php

  unset($_SESSION['status']);
}

?>
    <div class="container">
       <form action="md5.php" method="post">
        <div class="circleTop"></div>
        <div class="content">
            <h1>Login</h1>
            <div class="form-group">
                <label for="">username </label>
                <br>
                <input type="text" class="form" name="name" id="" aria-describedby="helpId" placeholder="">
</div>
            <div class="form-group">
                <label for="">Password</label>
                <br>
                <input type="password" class="form" name="password" id="" placeholder="">
                
            </div>
            <p>
                <a href="login.php"> Forgot Password?</a>
            </p>
            <div class="icons">
                <a href="http://www.google-plus.com"><i class="fa fa-google-plus-official" aria-hidden="true"></i>
                </a>
                <a href="https://www.facebook.com"><i class="fa fa-facebook-square" aria-hidden="true"></i>
                </a>
                <a href="http://www.twitter.com"><i class="fa fa-twitter-square" aria-hidden="true"></i>
                </a>
            </div>
            <button type="submit" name ="password"><a href="">Login</a></button>

        </div>
        <div class="circleBottom"></div>
       </form>
    </div>
</body>

</html>
<?php   
include 'conn.php';
$password= "pass123";
$name = "admin";

$hash = password_hash($password, PASSWORD_DEFAULT);

$created_at = date('Y-m-d H:i:s');
$query = "INSERT INTO `account` (`name`,`password`,`created_at`) VALUES ('$name', :'$password','$created_at')";
$q = mysqli_query($conn,$query);

 
if (isset($_POST['name']) || isset($_POST['password']) && !empty($_POST['name']) || !empty($_POST['password']))
if(isset($_POST['submit'])){
{
$new_password=$_POST['password'];
     
    if(md5($new_password)==md5($password))
    {
       echo "connect password !";
    }
    else{
         echo "Incorrect password ";
    }
}
}

  

?> 
<?php

include 'conn.php';
$email = $password = $passworderror = $errordic = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['login'])){

  $email = $_POST["email"];
  $password = $_POST["password"];
  
  // Validate the password
  if (strlen($password) < 8) {
    $passworderror = "Password must be at least 8 characters long.";
  } elseif (!preg_match("#[0-9]+#", $password)) {
    $passworderror = "Password must include at least one number.";
  } elseif (!preg_match("#[a-zA-Z]+#", $password)) {
    $passworderror = "Password must include at least one letter.";
  } 
  else {

    
    if ($conn->connect_error) {
      $passworderror = "Connection failed: " . $conn->connect_error;
    } else {

      $created_at =  date('Y-m-d H:i:s');
      $stmt = $conn->prepare("INSERT INTO `login` (`email`, `password`,`created_at`) VALUES ('$email','$password','$created_at')");

      
      if ($stmt->execute()) {
        $success = true;
        $_SESSION['status'] = "login successfully";
        
        
      } else {
         $errordic = "" . $conn->error;
      }

     
      $stmt->close();
      $conn->close();

      
      
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
  <strong>  Thank you  !</strong><br><?= $_SESSION['status'];  ?><br><br>
  <a href="design2.html" class="btn btn-primary" >Next</a>
   <a href="insert.php" class="btn btn-primary active" >Registration</a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php

  unset($_SESSION['status']);
}

?>
</div>
  <section>
   
    <form action = "insert.php" method="post" class="log-form">
     <center>  <h4>   Login Here ! </h4> </center>
      <div class="group log-input">
        <input type="email"  name="email" placeholder="Email" value="<?= $email; ?>">
        <span> <?= $errordic ?></span>
      </div>
      <div class="group log-input">
        <input type="password" id="password" name="password" placeholder="Password">
        <span> <?= $passworderror; ?> </span>
      </div><br>
    
      <button class="btn btn-dark"  type="submit" name="login">Login</button>

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
<?php

include 'conn.php';
$email = $password = $passworderror = $errordic = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['login'])){

  $email = $_POST["email"];
  $password = $_POST["password"];
  
  // Validate the password
  if (strlen($password) < 8) {
    $passworderror = "Password must be at least 8 characters long.";
  } elseif (!preg_match("#[0-9]+#", $password)) {
    $passworderror = "Password must include at least one number.";
  } elseif (!preg_match("#[a-zA-Z]+#", $password)) {
    $passworderror = "Password must include at least one letter.";
  } 
  else {

    
    if ($conn->connect_error) {
      $passworderror = "Connection failed: " . $conn->connect_error;
    } else {

      if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = mysqli_query($conn, "SELECT * FROM `crud2` WHERE email=$email");
        $ni = mysqli_fetch_array($query);
      }
      }     
    }
  }
}