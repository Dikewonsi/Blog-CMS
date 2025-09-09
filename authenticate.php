<?php

    session_set_cookie_params([
      'lifetime' => 0, // Session cookie lasts until the browser is closed
      'path' => '/', // Available within the entire domain
      'domain' => '', // Set to your domain name
      'secure' => isset($_SERVER['HTTPS']), // True if using HTTPS
      'httponly' => true, // JS can't access the cookie
      'samesite' => 'Strict'
    ]);

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
            // Regenerate session ID
            session_regenerate_id(true);

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION['last_activity'] = time(); //Track session start
            header("Location: admin/dashboard.php");
            exit();
         } else {
            echo "Invalid Username or Password";
         }
    }