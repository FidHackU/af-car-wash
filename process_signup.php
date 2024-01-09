<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection code here
    include_once 'dbConnection.php';

    // Get username, email, and password from the form
    // It's a good idea to validate and sanitize these inputs
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO customer (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        echo "New record created successfully";
        header("location: login.php");
    } else {
        echo "Error: " . $stmt->error;
        header("location: login.php");
    }

    // Close the statement
    $stmt->close();
}

