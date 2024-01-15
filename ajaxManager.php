<?php
include("dbConnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['request'] == 'loadBookingData') {
        loadBookingData($conn);
    }

    if ($_POST['request'] == 'loadBookingHistory') {
        loadBookingHistory($conn);
    }

    if ($_POST['request'] == 'viewBooking') {
        $bookingId = $_POST['bookingId'];
        viewBooking($conn, $bookingId);
    }

    if ($_POST['request'] == 'saveBooking') {
        // Retrieve values from the $_POST array
        $telephoneNumber = $_POST['telephoneNumber'];
        $vehicleNumber = $_POST['vehicleNumber'];
        $serviceType = $_POST['serviceType'];
        $carType= $_POST['carType'];
        $bookingDate = $_POST['bookingDate'];
        $bookingTime = $_POST['bookingTime'];
        $specialInstructions = $_POST['specialInstructions'];
        saveBooking($conn, $telephoneNumber, $vehicleNumber, $serviceType, $carType, $bookingDate, $bookingTime, $specialInstructions);
    }
}

function loadBookingData($conn) {
    $sql = "SELECT booking.id AS booking_id, customer.id AS customer_id,booking.*, customer.*
            FROM booking
            INNER JOIN customer ON booking.customer_id = customer.id
            WHERE bookingStatus = 'Approved' OR bookingStatus = 'Cancelled'
            ORDER BY DATE_FORMAT(`date`, '%Y-%m-%d %H:%i:%s') ASC";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: managerModifyBookingForm.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    // Fetch the data into an array
    $data = array();
    while ($row = mysqli_fetch_assoc($resultData)) {
        $data[] = $row;
    }

    // Return the data in JSON format
    echo json_encode($data);
}

function loadBookingHistory($conn) {
    $sql = "SELECT booking.id AS booking_id, customer.id AS customer_id,booking.*, customer.*
            FROM booking
            INNER JOIN customer ON booking.customer_id = customer.id
            WHERE bookingStatus = 'Approved' OR bookingStatus = 'Cancelled'
            ORDER BY DATE_FORMAT(`date`, '%Y-%m-%d %H:%i:%s') ASC";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: managerBookingHistory.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    // Fetch the data into an array
    $data = array();
    while ($row = mysqli_fetch_assoc($resultData)) {
        $data[] = $row;
    }

    // Return the data in JSON format
    echo json_encode($data);
}

function viewBooking($conn, $bookingId){
    $sql = "SELECT booking.id AS booking_id, customer.id AS customer_id, booking.*, customer.*
            FROM booking
            INNER JOIN customer ON booking.customer_id = customer.id
            WHERE booking.id = ?"; // Use 'id' as the placeholder for bookingId
    
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: managerBookingHistory.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $bookingId);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    // Fetch a single row from the result
    if ($row = mysqli_fetch_assoc($resultData)) {
        // Return the single row in JSON format
        echo json_encode($row);
    } else {
        // Handle the case where no data is found
        echo json_encode(array('error' => 'No data found'));
    }
}

function saveBooking($conn, $telephoneNumber, $vehicleNumber, $serviceType, $carType, $bookingDate, $bookingTime, $specialInstructions){
    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO booking (phone, vehicle, serviceType, carType, date, time, special) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $telephoneNumber, $vehicleNumber, $serviceType, $carType, $bookingDate, $bookingTime, $specialInstructions);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Failed to send " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
