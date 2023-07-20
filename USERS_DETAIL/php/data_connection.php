<?php
$servername = "localhost";
$username ="root";
$password = "";
$dbname = "user_detail";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    die('your database not connect'.mysqli_connect_error());
}else
{
   // echo "your database connectio successfully";
}


?>