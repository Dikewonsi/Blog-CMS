<?php
     session_start();
    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit();
    };

    require 'config.php';

    //Ensure ID is provided in URL
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        die("Invalid request. No post ID provided.");
    }

    $post_id = intval($_GET['id']);

    //Fetch Post Data based on ID in URL
    $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->bind_param('i', $post_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();

    if(!$post) {
        die("Post not found.");
    }

    //Handle Form Submission
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $title = trim($_POST["title"]);
        $content = trim($_POST["content"]);

        if(!empty($title) && !empty($content)) {
            $update = $conn->prepare ("UPDATE posts SET title = ?, content = ? WHERE id = ?");
            $update->bind_param("ssi", $title, $content, $post_id);
            if($update->execute()) {
                header("Location: posts.php?success=Post updated successfully");
                exit();
            } else {
                $error = "Error updating post. Try again.";
            }
        } else {
            $error = "Both fields are required.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Posts</title>
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
    <h2>Edit Posts</h2>

    <?php if (!empty($eror)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required><?= htmlspecialchars($post['content']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
    
</body>
</html>