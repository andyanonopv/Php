<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $connection = mysqli_connect("localhost","root","","blogplatform");

    if(!$connection) {
        die("not connected". mysqli_connect_error());
    } 
?>