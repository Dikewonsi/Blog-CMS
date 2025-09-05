<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
    require 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $username = trim($_POST['username']);
         $password = trim($_POST['password']);

         // Prepare and execute the SQL statement to check if user exists
         $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
         $stmt->bind_param("s", $username);
         $stmt->execute();
         $result = $stmt->get_result();
         $user = $result->fetch_assoc();

         //Verify Password
         if ($user && password_verify($password, $user['password'])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            header("Location: dashboard.php");
            exit();
         } else {
            echo "Invalid Username or Password";
         }
    }