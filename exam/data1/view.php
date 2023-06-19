<?php
session_start();
include 'conn.php';

if (isset($_GET['id'])) { {
        $id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * FROM `records` WHERE id = $id AND user_id = " . $_SESSION['user_id'] . "");
        $n = mysqli_fetch_array($query);
    }

    if ($n['id'] != $_GET['id']??'') {
       header('location:error.php');
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
    <div class="col-lg-5 mx-auto p-1 mb-2  text-black">
        <h2> View data </h2> <br><br>
        <form method="POST">



            <label>Title:</label>
            <input type="text" name="title" class="form-control" value="<?= $n['title']; ?>"><br><br>


            <label>Description:</label>
            <input type="text" name="description" class="form-control" value="<?= $n['description']; ?>"></textarea><br><br>


            <label>Priority:</label>
            <input type="text" name="priority" class="form-control" value="<?= $n['priority']; ?>"></textarea><br><br>


            <label>Status:</label><br>
            <input type="text" name="status" class="form-control" value="<?= $n['status']; ?>"></textarea><br><br>


            <label>Due Date:</label>
            <input type="date" id="due_date" name="due_date" class="form-control" value="<?= $n['due_date'] ?>"><br><br>


            <label>Attachments:</label>
            <input type="file" name="attachments" class="form-control" value="<?= $n['attachment'] ?>"><br><br>



            <a href="index.php" name="next" value="" class="btn btn-dark text-white">Close</a>

    </div>
    </div>
    </form>
    <footer class="text-center text-white fixed-bottom" style="background-color:black;">
  <div class="container p-1"></div>
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