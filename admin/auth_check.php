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
    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit();
    };

    //Session timeout after 15mins
    $timeout_duration = 900; // 15 minutes in seconds

    if(isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
        
        //Session Expired
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }

    $_SESSION['last_activity'] = time(); //Reset last_activity time

    ?>