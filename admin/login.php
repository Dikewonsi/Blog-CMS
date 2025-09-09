<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow-lg border-0" style="max-width: 400px; width: 100%;">
        <div class="card-body p-4">
            <h3 class="text-center mb-4">🔐 Admin Login</h3>

            <form action="../authenticate.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" 
                           class="form-control" placeholder="Enter your username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" 
                           class="form-control" placeholder="Enter your password" required>
                </div>

                <div class="d-grid">
                    <button type="submit" name="login" class="btn btn-primary">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
