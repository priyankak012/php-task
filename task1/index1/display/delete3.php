<?php
include 'conn.php';

$id = $_GET['id'];
$query = "DELETE  FROM `registration` WHERE id = $id";
$root = mysqli_query($conn,$query);

header('location:insert3.php');

?>