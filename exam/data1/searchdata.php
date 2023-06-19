<?php 
session_start();
include 'conn.php';
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
    <?php 
    $data = $_GET['data'];
   // echo $data;
   $sql = "SELECT * FROM `records` WHERE  user_id = '".$_SESSION['user_id']."'";
   $resul = mysqli_query($conn,$sql);
   if($resul)
   {
    $row = mysqli_fetch_assoc($resul);
    echo '<div class="jumbotron jumbotron-fluid bg-secondary ">
    <div class="container">
      <h1 class="display-4">'.$row['title'].'</h1>
      <p class="lead">
      This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>
  </div>';
   }
    ?>
</body>
</html>