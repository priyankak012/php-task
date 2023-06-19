<?php
session_start();
$servername="localhost";
$username1 ="root";
$password ="";
$dbname = "crud";

$conn = new mysqli($servername,$username1,$password,$dbname);
if($conn->connect_error)
{
    dir("data not connect".$conn->connect_error);
}
else
{
   // echo "data connection successfully";
}

?>