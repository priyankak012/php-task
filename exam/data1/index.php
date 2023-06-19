<?php
session_start();
include "conn.php";
$title = $discription = $priority = $status = $due_date = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style> 
  .fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}
.fa-linkedin {
  background: #007bb5;
  color: white;
}

</style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Document</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <div class="container-fluid">
      <ul class="navbar-nav me-auto mb-1 mb-lg-3 pd-1 text-dark">
      <h2>PHP TASK ! </h2><br>
      </ul>
    </div>
    <div class="container-fluid secondary text-white"><h5><?php echo 'welcome ! "' . $_SESSION['username'] . '" ' ?></h5></div>
    <!-- <div class="d-flex align-items-center">
      <a class="text-reset me-3" href="#">
        <i class="bi bi-bell"></i>
        <i class="bi bi-bell"></i>
      </a>
    </div> -->
    <div>
      <!-- <i class="bi bi-bell"></i> -->
    <i class="bi bi-bell"></i>
    </div>
    <div class="btn-group bi bi-bell">
  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">setting</a></li>
    <li><a class="dropdown-item" href="#">Edite information</a></li>
    <li><a class="dropdown-item" href="home.php">Log out</a></li>
    <li><hr class="dropdown-divider"></li>
  </ul>
</div>
          <img
            src="shubhkey.jfif"
            class="rounded-circle"
            height="50"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          />
        </a>
      </div><br><br>
</nav>
  <div class="container">
    <div class="col lg-12 mx-auto"><br><br>
      <h3 class="mx-auto"> Display Table data </h3><br><br>
    </div>

    <div class="container my-5">
      <a href="detail.php" type="button" class="col-lg-2 btn btn-outline-secondary">Add to data </a></button><br><br>

      <form class="d-flex col-md-3" method="post">
        <input class="form-control me-3 col-md-3" type="text" placeholder="Search" name="search"><br>
        <button class="btn btn-dark text-white" type="submit" name="submit">Search</button> <br><br>

      </form><br>
      <div class="title">
        <table class="table  table-striped table-hover table-border">
          <tr class="bg-dark text-white  text-center">


            <th> Title</th>
            <th>Description</th>
            <th> Priority </th>
            <th> language </th>
            <th>Status</th>
            <th>Date </th>
            <th>File</th>
            <th>View</th>
            <th>Delete</th>
            <th>EDIT</th>
          </tr>
          <?php    
          
          $q = "SELECT * FROM `records` WHERE user_id ='" . $_SESSION['user_id'] . "'";
          $query = mysqli_query($conn, $q);  
          while ($res = mysqli_fetch_assoc($query)) {
        ?>
            <tr class="text-center ">
              <td><?= $res['title'] ??''; ?></td>
              <td><?= $res['description']??''; ?></td>
              <td><?= $res['priority']??''; ?></td>
              <td><?= $res['language']??''; ?></td>
              <td><?= $res['status']??''; ?></td>
              <td><?= $res['due_date']??''; ?></td> 
              <td><?= $res['attachment']??''; ?></td> 
              <td><a href="view.php?id=<?= $res['id']; ?>" class="btn btn-dark text-white">View</a>
              <td><a href="delete.php?id=<?= $res['id']; ?>" class="btn btn-dark text-white" onclick="return confirm('are you  want delete data ?')">Delete</a>
              <td><a href="update.php?id=<?= $res['id']; ?>" class="btn btn-dark text-white">Edit</a>
              <?php
            }
              ?>
              <?php
              $search = "";
              if (isset($_POST['submit'])) {
                $search = $_POST['search'] ?? '';
                $sql = "SELECT * FROM `records` WHERE id='$search'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                  if (mysqli_num_rows($result) > 0) {
                    echo '<thead> 
</thead>
';
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tbody>
 <tr>
 <td><a href="searchdata.php?data=' . $row['id'] . '">' . $row['id'] . ' </a></td>
 <td>' . $row['title'] . '</td>
 <td>' . $row['description'] . '</td>
 <td>' . $row['priority'] . '</td>
 <td>' . $row['language'] . '</td>
 <td>' . $row['status'] . '</td>
 <td>' . $row['due_date'] . '</td>
 <td>' . $row['attachment'] . '</td>
 </tr>
 </tbody>';
                    }
                  } else {
                    echo "<script> alert('DATA NOT FOUND !'); window.location.href='index.php';</script>";
                  }

                }
              }

              ?>
              
  
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