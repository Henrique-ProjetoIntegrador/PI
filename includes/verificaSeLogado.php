<?php

if (session_status() === PHP_SESSION_NONE){
    session_start();
}

if ($_SESSION['status'] != true){
    header('location: ../login/login.php');
}

?>