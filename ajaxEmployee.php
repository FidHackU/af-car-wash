<?php
include("dbConnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['request'] == 'loadBookingData') {
        loadBookingData($conn);
    }

    if ($_POST['request'] == 'approveBooking') {
        $bookingId = $_POST['bookingId']; 
        approveBooking($conn, $bookingId);
    }

    if ($_POST['request'] == 'cancelBooking') {
        $bookingId = $_POST['bookingId']; 
        cancelBooking($conn, $bookingId);
    }

    if ($_POST['request'] == 'loadBookingHistory') {
        loadBookingHistory($conn);
    }
}

function loadBookingData($conn) {
    $sql = "SELECT booking.id AS booking_id, customer.id AS customer_id,booking.*, customer.*
            FROM booking
            INNER JOIN customer ON booking.customer_id = customer.id
            WHERE bookingStatus = 'PENDING'";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: employeeBookingPage.php?error=stmtfailed");
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

function approveBooking($conn, $bookingId){
    $sql = "UPDATE booking
            SET bookingStatus = 'Approved'
            WHERE id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookingId);
    $stmt->execute();

    if ($stmt->execute()) {
        // Query executed successfully
        echo "Booking status Approved successfully.";
    } else {
        // Query failed
        echo "Error updating booking status: " . mysqli_error($conn);
    }
}

function cancelBooking($conn, $bookingId){
    $sql = "UPDATE booking
            SET bookingStatus = 'Cancelled'
            WHERE id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookingId);
    $stmt->execute();

    if ($stmt->execute()) {
        // Query executed successfully
        echo "Booking status Cancelled successfully.";
    } else {
        // Query failed
        echo "Error updating booking status: " . mysqli_error($conn);
    }
}

function loadBookingHistory($conn) {
    $sql = "SELECT booking.id AS booking_id, customer.id AS customer_id,booking.*, customer.*
            FROM booking
            INNER JOIN customer ON booking.customer_id = customer.id
            WHERE bookingStatus = 'Approved' OR bookingStatus = 'Cancelled'";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: employeeBookingPage.php?error=stmtfailed");
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
