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
    session_destroy();
    header("location: login.php");
    exit();
?>