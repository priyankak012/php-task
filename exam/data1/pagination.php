<?php 
include 'conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
    <title>Document</title>
</head>
<body>
    
<div class="container">
    <div class="col lg-12 mx-auto"><br><br>
      <h3 class="mx-auto"> Display Table data </h3><br><br>
    </div>
    <div class="container my-5">
<form class="d-flex col-md-3" method="post">
        <input class="form-control me-3 col-md-3" type="text" placeholder="Search"  name="search"><br>
        <button class="btn btn-dark text-white" type="submit" name="submit">Search</button>
        </div>
      </form><br>   
    <div class="title">
      <table class="table  table-striped table-hover table-border">
      <tr class="bg-dark text-white  text-center">
      
      
        <th> Username</th>
        <th>Email</th>

</tr>
<?php

    
      $sql = "SELECT * FROM `users` limit 5";
       $result = mysqli_query($conn, $sql);
       $num = mysqli_num_rows($result);
       $numberpages = 10;
       $totalpages = ceil($num/$numberpages);
      // echo $totalpages;
      for($btn=1;$btn<=$totalpages;$btn++)
      {
        echo '<button class="btn btn-dark mx-1 mb-3"><a href="pagination.php?page='.$btn.'" class ="text-light">'.$btn.'</a></button>';
      }
      if(isset($_GET['page']))
      {
        $page=$_GET['page'];
        
      }else
      {
        $page=10;
      }
      
       $startinglimit = ($page-1)*$numberpages;
       $sqli = "SELECT * FROM `users`  limit".$startinglimit.','.$numberpages;
       $result=mysqli_query($conn,$sql);



      while ($res = mysqli_fetch_array($result))
{     


?>

<tr class="text-center ">

<td><?=$res['username'];?></td>
<td><?=$res['email'];?></td>


<?php
}
?>

</body>
</html>
