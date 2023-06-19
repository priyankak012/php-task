<?php 

$servername = "localhost";
$username ="root";
$password = "";
$dbname = "website";


$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
    die ("data not connection").$conn->connect_error;
}else
{
 //echo "database connection successfully";
}

?>
