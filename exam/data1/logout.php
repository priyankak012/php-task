<?php
include "conn.php";
    if(session_destroy()) {
        header("Location:home.html");
    }
?>