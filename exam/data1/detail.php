<?php
session_start();
include 'conn.php';

$id = $title = $description = $priority = $status = $language = $due_date = $attachment = $file = $created_at = $updated_at= $low = $allowTypes = $fileType = "";
$titleerro = $descriptionerr = $priorityerr = $statuserr = $languageer = $due_dateerr = $attachmenterr =  $statusMsg ='';

if($_SERVER["REQUEST_METHOD"] === "POST"){
if (isset($_POST['click'])) {

    if (!empty($_POST['title'])) {
        $title = $_POST['title'];
    } else {
        $titleerro = "Please filed title";
    }
    if (!empty($_POST['description'])) {
        $description = $_POST['description'];
    } else if (strlen($description) < 30) {
        $descriptionerr = "Please enter 30 character message";
    }
    if (!empty($_POST['priority'])) {
        $priority = $_POST['priority'];
    } else {
        $priorityerr = "Option is selected";
    }
  
    if (!empty($_POST['language'])) {
       $language = $_POST['language'];
       $language = implode(',',$_POST['language']);
    } else {
        $languageer = "Please selecte language";
    }



    if (!empty($_POST['status'])) {
        $status = $_POST['status'];
    } else {
        $statuserr = "Please select current status";
    }
    if (!empty($_POST['due_date'])) {
        $due_date = $_POST['due_date'];
    } else {
        $due_dateerr = "Please select date";

    }
    if(empty($_POST['attachment']["name"]))
    {
        $attachmenterr = "please fill file";
    
        $targetDir = "Download";
        $fileName = basename($_FILES["attachment"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                    
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                
                if(move_uploaded_file($_FILES["attachment"]["tmp_name"],$targetFilePath)){
                    $query = "INSERT INTO records (`user_id`,`title`,`description`,`priority`,`status`,`language`,`due_date`,`attachment`,`created_at`,`updated_at`)VALUES( '".$_SESSION['user_id']."','$title','$description','$priority','$status','$language','$due_date','".$fileName."','$created_at','$updated_at')";
                    $sql = mysqli_query($conn, $query);  
                    if($query){
                        $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                    } 
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            }
        }else{
            $statusMsg = 'Please select a file to upload.';
        }
    

    if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['priority']) ||empty($_POST['language'])  || empty($_POST['status']) || empty($_POST['due_date']))
     {
        //echo  "<script> alert('Please fill all data !'); window.location.href='detail.php';</script>";   
    } 
    else{
     $created_at = date('Y-m-d H:i:s');
     $updated_at = date('Y-m-d H:i:s');
     
     $query = "INSERT INTO records (`user_id`,`title`,`description`,`priority`,`status`,`language`,`due_date`,`attachment`,`created_at`,`updated_at`)VALUES( '".$_SESSION['user_id']."','$title','$description','$priority','$status','$language','$due_date','$attachment','$created_at','$updated_at')";
     $sql = mysqli_query($conn, $query);  


        echo "<script> alert('Detail submitted!'); window.location.href='index.php';</script>";
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<style>
    .error {
        color: red;
    }
</style>

<body>
    <div class="col-lg-7 mx-auto p-1 mb-2  text-black">
        <h2> User Details</h2> <br><br>
    </div>
    <div class="col-lg-7 mx-auto p-1 mb-2  text-black">
        <form method="POST" action="" enctype="multipart/form-data">

            <input type="hidden" name="user_id" class="form-control">

            <label>Title:</label>
            <input type="text" name="title" class="form-control" value="<?= $title ?>">
            <span class="error"><?= $titleerro ?></span><br><br>

            <label >Description:</label>
            <textarea type="text" name="description" class="form-control" value = "<?=$description?>"></textarea>
            <span class="error"><?= $descriptionerr ?></span><br><br>

            <label>Priority:</label>
            <select id="" name="priority" class="form-select"><br>
                <option value="low">LOW</option>
                <option value="medium">MEDIUM</option>
                <option value="high">HIGH</option>
            </select><br><br>
        
            <label>Status:</label><br>
            <input type="radio" name="status" value="Pending"> Pending<br>
            <input type="radio" name="status" value="In Progress"> In Progress<br>
            <input type="radio" name="status" value="Completed"> Completed<br>
            <span class="error"><?= $statuserr ?></span><br><br>
        
        
            <label>Languages:</label><br>
            <input type="checkbox" name="language[]" value="PHP"> PHP<br>
            <input type="checkbox" name="language[]" value="JavaScript"> JavaScript<br>
            <input type="checkbox" name="language[]" value="Python"> Python<br>
            <span class = "error"><?= $languageer?></span><br><br>
         
            <label>Due Date:</label>
            <input type="date" id="due_date" name="due_date" class="form-control" value="<?= $due_date; ?>">
            <span class="error"><?= $due_dateerr ?></span><br><br>


            <label>Attachments:</label>
            <input type="file" id="attachment" name="attachment" class="form-control" accept=".jpg,.jpeg,.png" value="upload" multiple>
            <span class="error"><?= $attachmenterr ?></span><br><br>

            <button type="submit" name="click" value="upload" class="btn btn-dark text-white">submit</button><br><br>
    </div>
    </form>
</body>
</html>