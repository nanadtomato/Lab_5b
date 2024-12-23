<?php
include 'Database.php';
include 'User.php';

session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the matric value from the GET request
    $matric = $_GET['matric'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $userDetails = $user->getUser($matric);

    $db->close();

    if (!$userDetails) {
        echo "Error: User not found.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Update User</h2>
    <form action="update.php" method="post" class="border p-4 rounded">
        <!-- Matric -->
        <div class="mb-3">
            <label for="matric" class="form-label">Matric:</label>
            <input type="text" id="matric" name="matric" class="form-control" value="<?php echo htmlspecialchars($userDetails['matric']); ?>" readonly>
        </div>
        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($userDetails['name']); ?>" required>
        </div>
        <!-- Access Level -->
        <div class="mb-3">
            <label for="role" class="form-label">Access Level:</label>
            <select name="role" id="role" class="form-select" required>
                <option value="">Please select</option>
                <option value="lecturer" <?php if ($userDetails['role'] === 'lecturer') echo "selected"; ?>>Lecturer</option>
                <option value="student" <?php if ($userDetails['role'] === 'student') echo "selected"; ?>>Student</option>
            </select>
        </div>
        <!-- Action Buttons -->
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="read.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</body>
</html>
