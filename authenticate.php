<?php
include 'Database.php';
include 'User.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create database connection
    $database = new Database();
    $db = $database->getConnection();

    // Sanitize inputs
    $matric = $db->real_escape_string($_POST['matric']);
    $password = $db->real_escape_string($_POST['password']);

    // Validate inputs
    if (!empty($matric) && !empty($password)) {
        $user = new User($db);
        $userDetails = $user->getUser($matric);

        // Check if user exists and verify password
        if ($userDetails && password_verify($password, $userDetails['password'])) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['matric'] = $userDetails['matric'];
            $_SESSION['role'] = $userDetails['role'];

            // Redirect to the user list page
            header('Location: read.php');
            exit;
        } else {
            echo 'Invalid Matric or Password.';
        }
    } else {
        echo 'Please fill in all required fields.';
    }
} else {
    // Redirect to login if accessed directly
    header('Location: login.php');
    exit;
}
