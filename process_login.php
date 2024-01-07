<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "afcarwash.db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get username and password from the form
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Query the database to check the credentials
    $sql = "SELECT * FROM users WHERE username='$enteredUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the entered password against the hashed password
        if (password_verify($enteredPassword, $hashedPassword)) {
            // Successful login
            echo json_encode(['status' => 'success', 'message' => 'Login successful']);
        } else {
            // Incorrect password
            echo json_encode(['status' => 'error', 'message' => 'Incorrect password']);
        }
    } else {
        // User not found
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
    }

    $conn->close();
} else {
    // If the form is not submitted, return an error
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>

