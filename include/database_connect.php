<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $db = "ticketmaster";
    // Connect to MySQL server.
    $conn = mysqli_connect($servername, $username, $password, $db);
    
    // If connection fails output error message.
    if(mysqli_connect_errno()){
        echo "Connection Error: " . mysqli_connect_error();
        return;
    }
?>