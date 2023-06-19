
<?php
session_start();
include 'conn.php';

if(isset($_GET['id'])){
$id = $_GET['id'];

$qie = "DELETE  FROM  records  WHERE  id = $id ";
mysqli_query($conn,$qie); 

header('location:index.php');

}
else
{
    echo "<script> alert('You can't delete this data!'); window.location.href='index.php';</script>";
}



?>
