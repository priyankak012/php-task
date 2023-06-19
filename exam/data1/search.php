<?php 
include "conn.php";
$search ="";
if(isset($_POST['submit']))
{
  $search = $_POST['search']??'';
  $sql = "SELECT * FROM `records` WHERE id='$search'";
  $result = mysqli_query($conn,$sql);
  if($result)
  {
      if(mysqli_num_rows($result)>0)
      {
       echo '<thead>
       <tr>
       <th> Title</th>
        <th>Description</th>
        <th> Priority </th>
        <th>Status</th>
        <th>Date </th>
        <th>View</th>
        <th>Delete</th>
        <th>EDIT</th>
</tr>  
</thead>
';
 while($row=mysqli_fetch_assoc($result)){
 echo '<tbody>
 <tr>
 <td><a href="searchdata.php">'.$row['id'].'</a></td>
 <td>'.$row['title'].'</td>
 <td>'.$row['description'].'</td>
 <td>'.$row['priority'].'</td>
 <td>'.$row['status'].'</td>

 </tr>
 </tbody>';
 }

      }else
      {
        echo '<h2 class="text-danger"> Data Not Found</h2>';
      }

}
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search data </title>
</head>
<body>
    <div class="container my-5">
<form class="d-flex col-md-3" method="post">
        <input class="form-control me-3 col-md-3" type="text" placeholder="Search"  name="search"><br>
        <button class="btn btn-dark text-white" type="submit" name="submit">Search</button>
        </div>
      </form><br><br>
      <?php 
    include "conn.php";
    if(isset($_POST['submit']))
    {
        //echo "click done";
    }



?>
</body>
</html>