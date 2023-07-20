<?php
session_start();
include 'data_connection.php';

if(isset($_GET['id']))
{
  $id = $_GET['id'];

$quers = "SELECT * FROM  `records`  where id =  $id ";
  $query =  mysqli_query($conn, $quers);
  $n = mysqli_fetch_array($query);
  $image = 'image/'.$n["attachment"];

  if($n['id'] != $_GET['id'])
  {
    echo "<script> alert('Dont try again!'); window.location.href='data_dispay.php';</script>";
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
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">View_detail </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Select Option
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="data_dispay.php"> Back</a></li>
    
  </ul>
</div>
      
    </div>
  </div>
</nav>
    <div class="col-lg-5 mx-auto p-1 mb-2  text-black">
        <form method="POST" enctype="multipart/form-data">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" value="<?=$n['title']?>"><br><br>
            <label>Description:</label>
            <input type="text" name="description" class="form-control" value="<?= $n['description']??""; ?>"><br><br>
            <label>Priority:</label>
            <input type="text" name="priority" class="form-control" value="<?= $n['priority']??""; ?>"><br><br>
            <label>Language:</label>
            <input type="text" name="priority" class="form-control" value="<?=$n['language']??""; ?>"><br><br>
            <label>Status:</label><br>
            <input type="text" name="status" class="form-control" value="<?= $n['status']??""; ?>"><br><br>
            <label>Due Date:</label>
            <input type="date" id="due_date" name="due_date" class="form-control" value="<?= $n['due_date']??""; ?>"><br><br>
            <label>Attachments:</label><br><br>
            <img src="<?= $image; ?>" alt="" width="75px"  height="20%"/></td><br><br>

        
    </div>
    </div>
    </form>
</body>
</html>