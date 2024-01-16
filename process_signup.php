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

    //check if username exist in database
    $usernameExists = usernameExists($conn, $username);
    
    //if username exist then can create account
    if(!$usernameExists === true){
        createCustomer($conn, $username, $email, $password);
    }
}

function usernameExists($conn, $username) {
    $sql = "SELECT username FROM customer WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../process_register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        return $row;
    }else{
        mysqli_stmt_close($stmt);
        $result = false;
        return $result;   
    }
}

function createCustomer($conn, $username, $email, $password) {
    $sql = "INSERT INTO customer (username, email, password) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=stmtfailed");
        exit();    
    }
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