<?php

    // Add admin guard
    require 'auth_check.php';

    // Connect to the database
    require '../config.php';

    // Process form submission
    if($_SERVER["REQUEST_METHOD"] === 'POST') {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        if(!empty($title) && !empty($content)) {
            $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
            $stmt->bind_param("ss", $title, $content);
            $stmt->execute();
            header("Location: posts.php");
            exit();
        } else {
            $error = "Title and content are required.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="container mt-5">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Blog CMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">🏠 Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="posts.php">📝 Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">🚪 Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <h2>Add New Post</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Create Post</button>
        <a href="posts.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>