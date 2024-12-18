<?php
    session_start();
    if(!isset($_SESSION["docname"])) {
        header("Location:  vetlogin.php");
        exit();
    }
?>