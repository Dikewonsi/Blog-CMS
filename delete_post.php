<?php

    session_start();
    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit();
    }

    require 'config.php';

    //Check if ID is present
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $post_id = intval($_GET['id']); //Sanitize ID

        //Delete Post
        $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->bind_param('i', $post_id);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Post deleted successfully,";
        } else {
            $_SESSION['error'] = "Error deleting post. Try again.";
        }

        $stmt->close();
        $conn->close();
    } else {
        $_SESSION['error'] = "Invalid post ID.";
    }

    //Redirect back to posts page
    header("Location: posts.php");
    exit();