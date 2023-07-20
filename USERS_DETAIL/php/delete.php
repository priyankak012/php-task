<?php
include 'data_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $selectQuery = "SELECT attachment FROM records WHERE id = $id";
    $result = mysqli_query($conn, $selectQuery);
    $row = mysqli_fetch_assoc($result);
    $attachment = $row['attachment'];

    $imagePath = "image/" . $attachment;
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }


    $deleteQuery = "DELETE FROM records WHERE id = $id";
    mysqli_query($conn, $deleteQuery);

    header('Location: data_dispay.php');
    exit();
}
?>
