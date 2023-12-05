<?php
    $server = "localhost";
    $user = "root";
    $pw = "Admin";
    $db = "terminchat";
    
    $conn = mysqli_connect($server, $user, $pw, $db);

    if(!$conn) {
        echo "Connection failed!";
        die();        
    }