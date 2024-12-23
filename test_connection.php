<?php
include_once "Database.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$database = new Database();
$connection = $database->getConnection();

if ($connection) {
    echo "Database connection successful!";
} else {
    echo "Database connection failed.";
}
?>
