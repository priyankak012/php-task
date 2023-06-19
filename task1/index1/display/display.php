<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="display1.css">
  
  <title>Document</title>
</head>

<body>
  <style>
body {
  background-image: linear-gradient(rgba(1,1,1,.5),ghostwhite);
  
}
</style>
  <br>
  <div class="container">
    <div class="col lg-12"><br><br>
      <h3 class="text-center"> Display Table data </h3><br><br>

      <a href="insert.php" class="btn btn-outline-warning  text-black btn-lg " id="mymodel">Add new data records </a><br><br>
      <table class="table  table-striped table-hover table-border">
        <tr class="bg-dark text-white  text-center">

        
         
          <th>Name</th>
          <th>Phone</th>
          <th>City</th>
          <th>Gender</th>
          <th>Birthdate </th>
          <th>Email</th>
          <th>View</th>
          <th>Edit</th>
          <th>Delete</th>

        </tr>

        <?php
        include 'conn.php';
        $q = 'SELECT * FROM  `crud2`';
        $query = mysqli_query($conn, $q);
        while ($res = mysqli_fetch_array($query))
         {
         
        ?>
          <tr class="text-center">

            <td><?= $res['username']; ?></td>
            <td><?= $res['phoneno']; ?></td>
            <td><?= $res['city']; ?></td>
            <td><?= $res['gender']; ?></td>
            <td><?= $res['birthdate']; ?></td>
            <td><?= $res['email']; ?></td>
           
            
            <td><a href="view.php?id=<?= $res['id'] ?>" class="btn btn-secondary text-white" id="mymodel"> View</a></td>
            <td><a href="update.php?id=<?= $res['id'] ?>" class="btn btn-primary text-white"> Edit</a></td>
            <td><a href="delete.php?id=<?= $res['id'] ?>" class="btn btn-danger  text-white" onclick="return confirm('are you  want delete data ?')"> Delete</a></td>

          </tr>
        <?php
        }
        ?>

      </table>
    </div>
  </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <footer class="text-center text-white" style="background-color: #f1f1f1;">


    <div class="text-center text-white p-3" style="background-color: black;">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/"></a>
    </div>

  </footer>
 
</body>

</html>