<?php
require 'config.php';
$passwordHash = password_hash("0000", PASSWORD_DEFAULT);
$conn->query("INSERT INTO users (username, password) VALUES ('admin', '$passwordHash')");
echo "Admin user created.";
?>