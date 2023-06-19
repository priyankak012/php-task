<?php
include 'conn.php';

$targetDirectory = "uploads/";
$targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

 if(isset($_POST['submit'])){
if (file_exists($targetFile)) {
    echo "Sorry, the file already exists.";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 200000) {
    echo "Sorry, the file is too large.";
    $uploadOk = 0;
}

if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !== "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
  
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "The file ". basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

       
        $fileName = basename($_FILES["fileToUpload"]["name"]);
        $fileSize = $_FILES["fileToUpload"]["size"];

       
        $query = "INSERT INTO records (`user_id`,`title`,`description`,`priority`,`status`,`language`,`due_date`,`attachment`,`created_at`,`updated_at`)VALUES( '".$_SESSION['user_id']."','$title','$description','$priority','$status','$language','$due_date','$attachment','$created_at','$updated_at')";
     $sql = mysqli_query($conn, $query); 

        if ($conn->query($sql) === TRUE) {
            echo "File information stored in the database.";
        } else {
            echo "Error storing file information: " . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>