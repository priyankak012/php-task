<?php


include 'connection.php';

$user_id = $title = $description = $priority = $status = $language = $due_date = $attachment = $file = $created_at = $low = $allowTypes= $fileType="";
$titleerro = $descriptionerr = $priorityerr = $statuserr = $due_dateerr = $attachmenterr = '';

if (isset($_POST['click'])) 
{

    if(!empty($_POST['title']))
    {
        $title = $_POST['title'];
    }
    else
    {
        $titleerro = "Please filed title";
    }
     if(!empty($_POST['description']))
     {
         $description = $_POST['description'];

     }else if (strlen($description) < 30) {
        $descriptionerr = "Please enter 30 character message";
    } 
     if(!empty($_POST['priority']))
     {
         $priority = $_POST['priority'];
     } else {

        $priorityerr ="Option is selected";
      if(!empty($_POST['language']))  
      {
        $language = "Please enter language";
      }else
      {
        $language = $_POST['langauge'];
      }
    
     }
     if(!empty($_POST['status']))
     {
        $status = $_POST['status'];
     }else
     {
         $statuserr = "Please select data";
     }
     if(!empty($_POST['due_date']))
     {
        $due_dateerr = $_POST['due_date'];
     }else
     {
         $due_dateerr = "Please select date";
     }


      if(empty($_POST['title']) || empty($_POST['description']) || empty($_POST['priority'])|| empty($_POST['langauge']) || empty($_POST['status']))
{  
  echo "please fill all data";
}
    else
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    $query = "INSERT INTO `records`(`user_id`, `title`, `description`, `priority`, `status`, `language`, `due_date`, `attachment`, `created_at`, `updated_at`) VALUES ('$user_id','$title','$description','$priority','$status','$language','$due_date','$attachment','$created_at','$updated_at')";
    $sql = mysqli_query($conn,$query);
 
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
    <title>Document</title>
</head>

<body><div class="col-lg-7 mx-auto p-1 mb-2  text-black">
        <h2> User Details</h2> <br><br>
    </div>
    <div class="col-lg-7 mx-auto p-1 mb-2  text-black">
    <form class="row g-3 needs-validation" novalidate>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Title</label>
            <input type="text" class="form-control" id="validationCustom01"  required name="title">
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="mb-3">
                <label for="validationTextarea" class="form-label">Description</label>
                <textarea class="form-control " id="validationTextarea" placeholder="Required example textarea" required name="description"></textarea>
                <div class="invalid-feedback">
                    Please enter a message in the textarea.
                </div>
            </div>
            <label>Priority:</label>
            <select id="" name="priority" class="form-select"><br>
            <option value="low">LOW</option>
            <option value="midium">MIDIUM</option>
            <option value="high">HIGH</option>   
            </select><br><br>

            
            <label>Status:</label><br>
            <input type="radio" name="status" value="Pending"> Pending<br>
            <input type="radio" name="status" value="In Progress"> In Progress<br>
           <input type="radio" name="status" value="Completed"> Completed<br><br><br>

        
    
            <label for="language">Languages:</label><br>    
            <input type="checkbox" name="language[]" value="PHP"> PHP<br>
            <input type="checkbox" name="language[]" value="JavaScript"> JavaScript<br>
            <input type="checkbox" name="language[]" value="Python"> Python<br><br>

            <label for="due-date">Due Date:</label>
            <input type="date" id="due_date" name="due_date" class="form-control" value="<?= $due_date; ?>"><br>


            <div class="mb-3">
                <input type="file" class="form-control" aria-label="file example" required>
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div><br><br>

            <button type="button" class="btn btn-dark">Click </button>
        </div>
</div>
    </form>
</body>

</html>