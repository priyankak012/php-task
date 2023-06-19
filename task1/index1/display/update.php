<?php
include('conn.php');
$username = $phoneno = $city = $gender = $birthdate = $email = "";
$success = "";
if (isset($_GET['id'])) {
    $id = $_GET['id']; 

    if (isset($_POST['update'])) {
        $username = $_POST['username'] ?? '';
        $phoneno = $_POST['phoneno'] ?? '';
        $password = $_POST['password'] ?? '';
        $city = $_POST['city'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $birthdate = $_POST['birthdate'] ?? '';
        $email = $_POST['email'] ?? '';

        $updated_at = date('Y-m-d H:i:s');
        $update = "UPDATE `crud2` SET  username ='$username', phoneno = '$phoneno', city='$city', gender = '$gender', birthdate='$birthdate', `email` ='$email', `updated_at` = '$updated_at' WHERE id=$id";
        $query = mysqli_query($conn, $update);
    }

    $query = mysqli_query($conn, "SELECT * FROM crud2 WHERE id=$id"); 
    $n = mysqli_fetch_array($query);
}
if ($query == TRUE) {
    $success = true;
    $_SESSION['status'] = "update successfully";
    
  } else {
   // echo "data not update";
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
    <link rel="stylesheet" href="update.css">

</head>

<body>
<br><br>
    <div class="message">
<?php
if(isset($_POST['update'])){
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
}

?>
    </div>
    <div class="col-lg-6 m-auto">
        <form method="post">
            <div class="form-container"><br>
                <div class="card-header bg-dark">
                    <h5 class="text-white text-center">Edit operation</h5>
                </div>
                <br>
               
                <lable>username: </lable>
                <input type="text" name="username" class="form-control" value="<?= $n['username']; ?>"><br>

                <lable>phoneno</lable>
                <input type="number" name="phoneno" class="form-control" value="<?= $n['phoneno']; ?>"><br>



                <lable>city:</lable>
                <input type="text" name="city" class="form-control" value="<?= $n['city']; ?>"><br>



                <label for="inputState">Gender</label>
                <select id="inputState" name="gender" class="form-control" value="<?= $n['gender']; ?>">
                    <option selected>Choose...</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select><br>


                <label>birthdate:</label>
                <input type="date" name="birthdate" placeholder="enter birthdate" class="form-control" value="<?= $n['birthdate']; ?>"><br>


                <lable>email:</lable>
                <input type="email" name="email" class="form-control" value="<?= $n['email']; ?>"><br>


            </div>
            <button class="burlywoodBtn generalBtn" type="submit" name="update">Update Data</button>
            <a href="display.php" class="boneBtn generalBtn">close</a>


    </div>
    </form>
    <br><br><br>
    <footer>
        <p> @copy right 2022 </p>
    </footer>



</body>

</html>