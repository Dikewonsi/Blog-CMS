<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require "../config.php";

    //Fetch Posts
    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
     <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Blog CMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-light py-5 mb-4">
        <div class="container text-center">
            <h1 class="fw-bold">Welcome to Blog CMS</h1>
            <p class="lead">Your one-stop solution for the latest news and insights.</p>
        </div>
    </header>

    <!-- Posts Section -->
     <div class="container">
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                            <p class="card-text text-muted small">
                                <?php echo date("F j, Y", strtotime($row['created_at'])); ?>
                            </p>
                            <p class="card-text">
                                <?php echo substr(htmlspecialchars($row['content']), 0, 100) . '...'; ?>
                            </p>
                            <a href="post.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
     </div>
</body>
</html>