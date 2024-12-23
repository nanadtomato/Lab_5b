<?php
include 'Database.php';
include 'User.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect to login if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$result = $user->getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2>User List</h2>
    
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Access Level</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['matric']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['role']); ?></td>
                        <td>
                            <a href="update_form.php?matric=<?php echo urlencode($row['matric']); ?>" class="btn btn-warning btn-sm">Update</a>
                            <a href="delete.php?matric=<?php echo urlencode($row['matric']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="4" class="text-center">No users found</td></tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>
