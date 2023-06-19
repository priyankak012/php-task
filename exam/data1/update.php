<?php
session_start();
include 'conn.php';
$title = $description = $priority = $status = $language = $due_date = $attachment = $created_at = $update= "";

if(isset($_GET['id']))
{
  $id = $_GET['id'];

  if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $language = $_POST['language'];
    $due_date = $_POST['due_date'];
    $attachment = $_POST['attachment']??'';


    $updated_at = date('Y-m-d H:i:s');
   $update = mysqli_query ($conn,"UPDATE `records` SET  title='$title', description='$description', priority='$priority',  language='$language', status='$status',due_date='$due_date' ,attachment ='$attachment', updated_at ='$updated_at' WHERE id = $id  AND user_id = ".$_SESSION['user_id']."");
      

  }
 if(isset($_GET['id']))
  $id = $_GET['id'];
  $quers = "SELECT * FROM  `records`  where id =  $id ";
  $query =  mysqli_query($conn, $quers);
  $n = mysqli_fetch_array($query);

  if($update == TRUE)
  {
    
   echo "<script> alert('data update successfully !'); window.location.href='index.php';</script>";
  }
   
  if ($n['id'] != $_GET['id']??'') {
    echo "<script> alert (' Warning Don't  Try Again !'); window.location.href='index.php';</script>";

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="col-lg-7 mx-auto p-1 mb-2  text-black">
    <div class="col-lg-6 m-auto">
       
      <form method="post"  enctype="multipart/form-data">
        <div class='form-container'>
          <h3 class="text-black text-center">Edit data</h3>
        </div>

        <label>Title</label>
        <input type="text" name="title" class="form-control" value="<?=$n['title']?>"><br>


        <label>Description:</label>
        <input type="text" class="form-control" name="description" value ="<?= $n['description']   ?>"><br>


        <label>Priority</label>
        <input type="text" class="form-control" name="priority" value ="<?= $n['priority']   ?>"><br>

        <label>language</label>
        <input type="text" name="language" class="form-control" value="<?= $n ['language']   ?>"><br>

        

        <label>Status:</label>
        <input type="text" name="status"  class="form-control" value="<?= $n ['status']   ?>"><br>
        <label>Pending</label>
        <input type="radio" name="status" value="pending" class="form-check-input" value="">
        <label>In Progress</label>
        <input type="radio" name="status" value="In Progress" class="form-check-input" value="">
        <label>Completed</label>
        <input type="radio" name="status" value="Completed" class="form-check-input" value="">
        <span class="error"></span><br><br><br>


        <label>Due Date:</label>
        <input type="date" name="due_date" class="form-control" value="<?= $n ['due_date']   ?>"><br>

        <label>Attachment:</label>
        <input type="file" name="attachment"  class="form-control" value="<?= $n ['attachment']   ?>"><br>

        <br><br>

        <button type="submit" name="submit" class="btn btn-dark text-white">Update</button>
        <a href="index.php" class="btn btn-dark text-white">Close</a>

    </div>
    </form>
    <?php

?>
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