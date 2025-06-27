<?php
include 'session_check.php';
include 'Database.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the POST request
    $originalMatric = $_POST['original_matric']; // the one to search
    $newMatric = $_POST['matric']; 
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $user->updateUser($originalMatric, $newMatric, $name, $role);
    
    // Close the connection
    $db->close();
    header("Location: read.php");
}