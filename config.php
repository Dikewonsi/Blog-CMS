<?php 

    //Database Credentials
    $host = "localhost";
    $user = "your_username";
    $pass = "your_password";
    $dbname = "your_database_name";


    //Create Connection
    $conn = mysqli_connect($host, $user, $pass, $dbname);

    //Check Connection
    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    //