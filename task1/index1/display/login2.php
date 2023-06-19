<?php
include 'conn3.php';






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style> 
    .root
    { 
        margin-top: 10%;
        text-align: center;
    }
    .login 
    {   
       margin: auto;
        text-align: center;
        justify-items: center;
        font-size: larger;
        color: black;
    }




</style>
    <div class="root">
        <h2> Login form </h2>
        
    </div>
    <div class="login">
        <form action="" method="post">
            <label> EMAIL</label>
            <input type="email" name="email"><br><br>
            <label>PASSWORD</label>
            <input type="password" name="password">
            <br><br>
            <input type="submit" name="login"><br>

            <a href="insert3.php"><p><b>i have'nt  account </b></p></a>
                        

        </form>
    </div>
    
</body>
</html>