<?php
session_start();
include 'data_connection.php';

$languageError = $titleError = $descriptionError = $dueDateError = $statusError = $attachmentError= $fetch_data = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM `records` WHERE id=$id");
    $fetch_data = mysqli_fetch_array($query);

    if (isset($_POST['submit'])) {
        $title = $_POST['title'] ?? "";
        $description = $_POST['description'] ?? "";
        $priority = $_POST['priority'] ?? "";
        $status = $_POST['status'] ?? "";
        $due_date = $_POST['due_date'] ?? "";
        $attachment = $_FILES['attchment']['name'] ?? '';
        $attachment_old = $_POST['attachment_old'] ?? '';

        if (empty($title)) {
            $titleError = "Please enter a title";
        }

        if (empty($_POST['Language'])) {
            $languageError = "Please select a language";
        } else {
            $language = implode(",", $_POST['Language']);
        }

        if (empty($description) || strlen($description) < 10) {
            $descriptionError = "Please enter at least 10 characters for the description";
        }

        if (empty($priority)) {
            $priorityError = "Please select a priority option";
        }

        if (empty($due_date) || strtotime($due_date) < time()) {
            $dueDateError = "Please select a valid due date";
        }
        if (!empty($_FILES['attachment']['name'])) {
            $attachment = $_FILES['attachment']['name'];
            $attachment_size = $_FILES['attachment']['size'];
        
            $allowed_types = array('jpg', 'png');
            $file_extension = strtolower(pathinfo($attachment, PATHINFO_EXTENSION));
        
            if (!in_array($file_extension, $allowed_types)) {
                $attachmentError = "Invalid file type. Only JPG, JPEG, PNG, files are allowed.";
            }
        
            $max_size = 15 * 1024 * 1024; // 15MB
            if ($attachment_size > $max_size) {
                $attachmentError = "File size exceeds the allowed limit. Maximum file size is 15MB.";
            }
        
            if (empty($attachmentError)) {
                move_uploaded_file($_FILES['attachment']['tmp_name'], 'image/' . $attachment);
            } else {
                $attachment = $attachment_old;
            }
        } else {
            $attachment = $attachment_old;
        }
        
        if (empty($titleError) && empty($descriptionError) && empty($priorityError) && empty($languageError) && empty($dueDateError)) {
            $update = mysqli_query($conn, "UPDATE `records` SET title='$title', description='$description', language='$language', status='$status', priority='$priority', due_date='$due_date', attachment='$attachment' WHERE id=$id");

            if ($update) {
                echo "<script> alert(' Congraculation Record successfully'); window.location.href='data_dispay.php';</script>";
            } else {
                echo "Failed to update record";
            }
        }
    }

    if ($fetch_data['id'] != $_GET['id']) {
        echo "<script> alert('Don't try again!'); window.location.href='update.php';</script>";
    }

    $image_display = 'image/' . $fetch_data["attachment"];

    $selected_languages = explode(",", $fetch_data["language"]);
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

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Edit_Records </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown button
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="data_dispay.php">Back</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <style>
        .error {
            color: red;
        }
    </style>

    <div class="col-lg-7 mx-auto p-1 mb-2 text-black">
        <div class="col-lg-6 m-auto">
            <form method="POST" enctype="multipart/form-data">
                <div class='form-container'>
                    <h3 class="text-black text-center">Edit data</h3>
                </div>
                <div class="col-lg-7 mx-auto p-1 mb-2 text-black">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <label>Title:</label>
                        <input type="text" name="title" class="form-control" value="<?= $fetch_data['title']  ?>" id="title">
                        <div class="text-danger" id="titleerror"></div><br>

                        <label>Description:</label>
                        <input type="text" name="description" class="form-control" id="description" value="<?= $fetch_data['description'] ?> "><br>
                        <div class="text-danger" id="descriptionerror"></div><br><br>

                        <label>Priority:</label>
                        <select id="" name="priority" class="form-select" id="priority">
                            <option value="low" <?= ($fetch_data['priority'] ?? '') == 'low' ? 'selected' : '' ?>>LOW</option>
                            <option value="medium" <?= ($fetch_data['priority'] ?? '') == 'medium' ? 'selected' : '' ?>>MEDIUM</option>
                            <option value="high" <?= ($fetch_data['priority'] ?? '') == 'high' ? 'selected' : '' ?>>HIGH</option>
                        </select><br>

                        <label>Status:</label><br>
                        <input type="radio" name="status" value="Pending" <?= ($fetch_data['status'] ?? '') == 'Pending' ? 'checked' : '' ?>>Pending
                        <input type="radio" name="status" value="In Progress" <?= ($fetch_data['status'] ?? '') == 'In Progress' ? 'checked' : '' ?>>In Progress
                        <input type="radio" name="status" value="Completed" <?= ($fetch_data['status'] ?? '') == 'Completed' ? 'checked' : '' ?>>Completed<br>
                        <span class="error"><?= $statusError ?></span><br>

                        <label>Languages:</label><br>
                        <input type="checkbox" id="php" name="Language[]" value="php" <?= in_array("php", $selected_languages) ? 'checked' : '' ?>>Php<br>
                        <input type="checkbox" id="Javascript" name="Language[]" value="Javascript" <?= in_array("Javascript", $selected_languages) ? 'checked' : '' ?>>Javascript<br>
                        <input type="checkbox" id="python" name="Language[]" value="python" <?= in_array("python", $selected_languages) ? 'checked' : '' ?>>Python<br>
                        <div class="text-danger" id="languageerror"></div><br><br>


                        <label>Due Date:</label>
                        <input type="date" id="due_date" name="due_date" class="form-control" value="<?= $fetch_data['due_date'] ?>"><br>
                        <div class="text-danger" id="due_dateerror"></div><br><br>


                        <label>Attachments:</label>
                        <img src="<?= $image_display; ?>" alt="" width="30%" height="40%" /><br>
                        <input type="file" name="attachment" class="form-control"><br>
                        <div class="text-danger" id="attachmenterror"><?=$attachmentError ?></div><br><br>
                        <input type="hidden" name="attachment_old" value="<?= $fetch_data['attachment'] ?>"><br>

                        <button type="submit" name="submit" class="btn btn-dark text-white" onclick="return update()">Submit</button><br><br>

                    </form>
                </div>
        </div>
        <script>
            function update() {
                var error = document.getElementById("error");
                var Title = document.getElementById('title').value;
                var description = document.getElementById('description').value;
                var due_date = document.getElementById('due_date').value;

                if (Title == "") {
                    document.getElementById('titleerror').innerHTML = 'please enter title !';
                    return false;
                } else {
                    document.getElementById('titleerror').innerHTML = '';
                }
                if (description == "") {
                    document.getElementById('descriptionerror').innerHTML = 'please enter description !';
                    return false;
                } else {
                    document.getElementById('descriptionerror').innerHTML = '';
                }
                if (description == "" || description.length < 10) {
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
                    document.getElementById('due_dateerror').innerHTML = 'Please enter at date $ nor allow past date !';
                    document.getElementById('due_dateerror').innerHTML = 'Please enter at date $ nor allow past date !';
                    document.getElementById('due_dateerror').style.color = 'red';
                    document.getElementById('due_dateerror').style.fontWeight = 'bold';

                    return false;
                } else {
                    document.getElementById('due_dateerror').innerHTML = '';
                }

                var checkboxes = document.querySelectorAll('input[name="Language[]"]:checked');
                if (checkboxes.length === 0) {
                    document.getElementById('languageerror').innerHTML = 'Please select at least one language. !';
                    return false;
                } else {
                    document.getElementById('languageerror').innerHTML = '';
                }
            
            var attachmentInput = document.querySelector('input[name="attachment"]');
            var attachmentFile = attachmentInput.files[0];

            if (attachmentFile) {
                var allowedTypes = ['image/jpeg', 'image/png'];
                var maxSize = 15 * 1024 * 1024; // 15MB

                if (!allowedTypes.includes(attachmentFile.type)) {
                    document.getElementById('attachmenterror').innerHTML = 'Invalid file type. Only JPG, JPEG, PNG files are allowed.';
                    return false;
                }

                if (attachmentFile.size > maxSize) {
                    document.getElementById('attachmenterror').innerHTML = 'File size exceeds the allowed limit. Maximum file size is 15MB.';
                    return false;
                }
            }
        }
        </script>


</body>

</html>