<?php 

    //Database Credentials
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $dbname = "blog_cms";


    //Create Connection
    $conn = mysqli_connect($host, $user, $pass, $dbname);

    //Check Connection
    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    //