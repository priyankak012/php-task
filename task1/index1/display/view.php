<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="view.css">

  <title>Document</title>
</head>

<body>
  <style>
    body {
      background-image: linear-gradient(rgba(1, 1, 1, .5), ghostwhite);
    }
  </style>
  <br><br>
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasLabel">Offcanvas</h5>

      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      Content for the offcanvas goes here. You can place just about any Bootstrap component or custom elements here.
    </div>
  </div>

  <div class="card-body text-black">

    <?php

    include('conn.php');

    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query = mysqli_query($conn, "SELECT * FROM `crud2` WHERE id = $id");
      $n = mysqli_fetch_array($query);
    }
    ?>


    <div class="col-lg-6 m-auto">
      <form method="post">
        <div class='form-container'>
          <h5 class="text-white text-center">View data</h5>
        </div>
        <br>
        <div class="label">
          <lable>Username: </lable>
          <input type="text" name="username" class="form-control" value="<?= $n['username']; ?>"><br>
          <lable>Phoneno</lable>
          <input type="number" name="phoneno" class="form-control" value="<?= $n['phoneno']; ?>"><br>
          <lable>City:</lable>
          <input type="text" name="city" class="form-control" value="<?= $n['city']; ?>"><br>
          <label for="inputState">Gender</label>
          <select id="inputState" name="gender" class="form-control" value="<?= $n['gender']; ?>">
            <option selected>Choose...</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select><br>
          <label>Birthdate:</label>
          <input type="date" name="birthdate" placeholder="enter birthdate" class="form-control" value="<?= $n['birthdate']; ?>"><br>
          <lable>Email:</lable>
          <input type="email" name="email" class="form-control" value="<?= $n['email']; ?>"><br><br><br><br>

          <div class="form-group">
            <a href="display.php" class="button green criss-cross">Close</a><br>
            <a href="login.php?id=<?= $n['id'] ?>" class="btn btn-secondary text-white" id="mymodel">Login</a>
            

          </div>
        </div>
    </div>
  </div>
  </form>

  <br><br>
  
</body>

</html>