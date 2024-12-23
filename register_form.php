<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2>Register User</h2>
    <form action="insert.php" method="post" class="border p-4 rounded">
        <!-- Matric -->
        <div class="mb-3">
            <label for="matric" class="form-label">Matric:</label>
            <input type="text" name="matric" id="matric" class="form-control" required>
        </div>
        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <!-- Role -->
        <div class="mb-3">
            <label for="role" class="form-label">Role:</label>
            <select name="role" id="role" class="form-select" required>
                <option value="">Please select</option>
                <option value="lecturer">Lecturer</option>
                <option value="student">Student</option>
            </select>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</body>

</html>
