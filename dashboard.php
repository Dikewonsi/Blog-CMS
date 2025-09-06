<?php
    session_start();
    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit();
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
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
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-body text-center p-5">
                <h1 class="mb-4">
                    👋 Hello, 
                    <span class="text-primary">
                        <?php echo htmlspecialchars($_SESSION["username"]); ?>
                    </span>
                </h1>
                <p class="lead">Good Day, how is work going today?</p>
                
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <a href="create_post.php" class="btn btn-success btn-lg">
                        ➕ Add New Post
                    </a>
                    <a href="logout.php" class="btn btn-outline-danger btn-lg">
                        🚪 Logout
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
