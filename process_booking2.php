<?php session_start();
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection code here
    include_once 'dbConnection.php';

    $telephoneNumber = $_POST['telephoneNumber'];
    $vehicleNumber = $_POST['vehicleNumber'];
    $serviceType = $_POST['serviceType'];
    $carType= $_POST['carType'];
    $bookingDate = $_POST['bookingDate'];
    $bookingTime = $_POST['bookingTime'];
    $specialInstructions = $_POST['specialInstructions'];

    $id = $_SESSION['id'];
    $_SESSION['serviceType'] = $serviceType;
    $_SESSION['carType'] = $carType;
    $_SESSION['bookingDate'] = $bookingDate;
    $_SESSION['bookingTime'] = $bookingTime;

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO booking (customer_id, phone,vehicle,serviceType,carType,date,time,special) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssss", $id, $telephoneNumber, $vehicleNumber, $serviceType, $carType, $bookingDate ,$bookingTime, $specialInstructions );

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        echo "New record created successfully";
        header("location: bookingconfirmation1member.php");
    } else {
        echo "Failed to send " . $stmt->error;
        header("location: booking2.php");
    }

    // Close the statement
    $stmt->close();
}
