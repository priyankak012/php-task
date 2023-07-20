<?php
include 'data_connection.php';
session_start();
$title = $description = $priority = $status = $due_date = $language = '';
$titleError = $descriptionError = $statusError = $dueDateError = $languageError = $attachmentError = '';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['detail'])) {

        if (!empty($_POST['title'])) {
            $title = $_POST['title'];
        } else {
            $titleError = "Please fill in the title field";
        }


        if (!empty($_POST['description'])) {
            $description = $_POST['description'];
            if (strlen($description) < 10) {
                $descriptionError = "Please enter at least 10 characters for the description";
            }
        }
        if (empty($_POST['description'])) {
            $descriptionError = "please enter description";
        }

        if (!empty($_POST['language'])) {
            $language = $_POST['language'];
            $language = implode(",", $language);
        } else {
            $languageError = "Please select a language";
        }

        if (!empty($_POST['priority'])) {
            $priority = $_POST['priority'];
        }

        if (!empty($_POST['status'])) {
            $status = $_POST['status'];
            $status = implode(",", $status);
        } else {
            $statusError = "Please select a current status";
        }

        if (!empty($_POST['due_date'])) {
            $due_date = $_POST['due_date'];
            if (strtotime($due_date) < time()) {
                $dueDateError = "The due date cannot be in the past";
            }
            if (empty($_POST['due_date'])) {
                $dueDateError = "please enter due_date";
            }
        }

        $targetDir = "image/";
        $fileName = basename($_FILES["attachment"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $allowTypes = array('jpg', 'jpeg', 'png');
        $attachmentError = "";

        if (!in_array($fileType, $allowTypes)) {
            $attachmentError = "Only files in JPG, JPEG, PNG formats are allowed.";
        } elseif ($_FILES['attachment']['size'] > 15 * 1024 * 1024) {
            $attachmentError = "Upload file size should be less than 15MB.";
        // } elseif (file_exists($targetFilePath)) {
        //     $attachmentError = "Sorry, the file already exists.";
        } elseif (move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFilePath)) {
            $attachment = $fileName;
        }

        if (empty($titleError) && empty($descriptionError) && empty($languageError) && empty($statusError) && empty($dueDateError) && empty($attachmentError)) {
            $created_at = date('Y-m-d H:i:s');
            $updated_at = date('Y-m-d H:i:s');

            $query = "INSERT INTO records (user_id,`title`,`description`,`priority`,`status`,`language`,`due_date`,`attachment`,`created_at`,`updated_at`)VALUES( '" . $_SESSION['user_id'] . "','$title','$description','$priority','$status','$language','$due_date','$fileName','$created_at','$updated_at')";
            $sql = mysqli_query($conn, $query);

            if ($sql) {

                //echo "data submit successfully";
                echo "<script> alert('detail submit successfully!'); window.location.href='data_dispay.php';</script>";
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <style>
        .error {
            color: red;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Record_detail </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Select Option
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="data_dispay.php"> Back</a></li>

                </ul>
            </div>

        </div>
        </div>
    </nav>
    <div class="col-lg-7 mx-auto p-1 mb-2  text-black">
        <h2> User Details</h2> <br><br>
    </div>
    <div class="col-lg-7 mx-auto p-1 mb-2  text-black">
        <form method="POST" action="" enctype="multipart/form-data">
            <label>Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= $title ?>">
            <div class="text-danger" id="titleerror"></div><br>

            <label>Description:</label>
            <input type="text" name="description" id="description" class="form-control" value="<?= $description ?>">
            <div class="text-danger" id="descriptionerror"></div><br><br>

            <label>Priority:</label>
            <select id="" name="priority" class="form-select">
                <option value="low" name="priority[]" <?= $priority == 'low' ? 'selected' : '' ?>>LOW</option>
                <option value="medium" name="priority[]" <?= $priority == 'medium' ? 'selected' : '' ?>>MEDIUM</option>
                <option value="high" name="priority[]" <?= $priority == 'high' ? 'selected' : '' ?>>HIGH</option>
            </select><br><br>



            <label>Status:</label><br>
            <input type="radio" name="status[]" value="Pending" <?= $status == "Pending" ? 'checked' : '' ?>> Pending<br>
            <input type="radio" name="status[]" value="In Progress" <?= $status == "In Progress" ? 'checked' : '' ?>> In Progress<br>
            <input type="radio" name="status[]" value="Completed" <?= $status == "Completed" ? 'checked' : '' ?>> Completed<br>
            <div class="text-danger" id="statuserror"></div><br>


            <label>Languages:</label><br>
            <input type="checkbox" name="language[]" value="php" <?= $language == "php" ? 'checked' : '' ?>> PHP<br>
            <input type="checkbox" name="language[]" value="Javascript" <?= $language == "Javascript" ? 'checked' : '' ?>> JavaScript<br>
            <input type="checkbox" name="language[]" value="Python" <?= $language == "Python" ? 'checked' : '' ?>> Python<br>
            <div class="text-danger" id="languageerror"></div><br>


            <label>Due Date:</label>
            <input type="date" id="due_date" name="due_date" class="form-control" value="<?= $due_date; ?>">
            <div class="text-danger" id="due_dateerror"></div><br>


            <label>Attachments:</label>
            <input type="file" id="fileUpload" name="attachment" class="form-control">
            <span class="error"><?= $attachmentError  ?></span><br><br>

            <button type="submit" name="detail" value="upload" class="btn btn-dark text-white" onclick="return adddata()">Submit</button>

        </form>
    </div>
    <script>
        function adddata() {

            var Title = document.getElementById("title").value;
            var Description = document.getElementById("description").value;
            var due_date = document.getElementById("due_date").value;

            {
                if (Title == "") {
                    document.getElementById('titleerror').innerHTML = 'please enter title !';
                    return false;
                } else {
                    document.getElementById('titleerror').innerHTML = '';
                }


                if (Description == "" || Description.length < 10) {
                    document.getElementById('descriptionerror').innerHTML = 'Please fill Description with at least 10 characters!';
                    return false;
                } else {
                    document.getElementById('descriptionerror').innerHTML = '';
                }
                if (due_date == "") {
                    document.getElementById('due_dateerror').innerHTML = 'please enter  due_date !';
                    return false;
                } else {
                    document.getElementById('due_dateerror').innerHTML = '';
                }
                if (due_date === "" || Date.parse(due_date) < Date.now()) {
                    document.getElementById('due_dateerror').innerHTML = 'Please enter valid date not allow past !';
                    document.getElementById('due_dateerror').style.color = 'red';
                    document.getElementById('due_dateerror').style.fontWeight = 'bold';

                    return false;
                } else {
                    document.getElementById('due_dateerror').innerHTML = '';
                }


            var radiobuttons = document.querySelectorAll('input[name="status[]"]:checked');
            if (radiobuttons.length == "") {
                document.getElementById('statuserror').innerHTML = 'please select current status !';
                return false;
            }

            var fileInput = document.getElementById("fileUpload");
            var attachmentError = document.getElementById("attachmenterror");
            var file = fileInput.files[0];

            if (file) {
                var allowedTypes = ["image/jpeg", "image/png", "image/gif"];
                var maxFileSize = 15 * 1024; // 15KB

                if (!allowedTypes.includes(file.type)) {
                    attachmentError.innerHTML = "Only files in JPG, PNG, and GIF formats are allowed.";
                    return false;
                }

                if (file.size > maxFileSize) {
                    attachmentError.innerHTML = "File size exceeds the allowed limit. Maximum file size is 15KB.";
                    return false;
                }
            }
          
            attachmentError.innerHTML = "";
            return true;
        }
        }
    </script>
</body>

</html>