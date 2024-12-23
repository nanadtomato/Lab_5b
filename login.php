<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2>Login</h2>
    <form action="authenticate.php" method="post" class="border p-4 rounded">
        <!-- Matric -->
        <div class="mb-3">
            <label for="matric" class="form-label">Matric:</label>
            <input type="text" name="matric" id="matric" class="form-control" required>
        </div>
        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p class="mt-3">Don't have an account? <a href="register_form.php">Register here</a>.</p>
</body>

</html>
