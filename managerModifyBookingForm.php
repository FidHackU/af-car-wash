<?php include("dbConnection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manager Modify Booking Form</title>
    <link rel="icon" type="image/x-icon" href="image\car-wash.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <?php include 'includes/header.php'; ?>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!--Nav Bar Start-->
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav">
                        <!-- Home link with image -->
                        <a href="afcarwash.php" class="nav-item nav-link pr-0">
                            <img src="image\logo.png" class="w-25" alt="">
                        </a>

                        <a href="managerModifyBookingForm.php" class="nav-item nav-link active">Modify Booking</a>
                        <a href="managerBookingHistory.php" class="nav-item nav-link">Booking History</a>
                    </div>

                    <!-- Logout button -->
                    <div class="navbar-nav">
                        <a href="logout.php" class="nav-item nav-link">Logout</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!--Nav Bar End-->

    <div class="container">
        <div class="table-responsive table-hover mt-4">
            <table class="table table-bordered" id="bookingTable">
                <thead class="thead-light">
                    <tr>
                        <th>Booking ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function () {
        // Load initial booking data when the page loads
        loadBookingData();
    });

    function loadBookingData() {
        // Send an AJAX request to fetch updated booking data
        $.ajax({
            url: 'ajaxManager.php',
            type: 'POST',
            data: {
                'request': 'loadBookingData',
            },
            dataType: 'json',
            success: function(data) {
                // Handle the success response here
                updateTable(data);
            },
            error: function(error) {
                // Handle the error response here
                console.error('Error fetching booking data:', error);
            }
        });
    }

    function updateTable(data) {
        // Clear the existing table rows
        $('#bookingTable tbody').empty();

        // Loop through the data and populate the table
        data.forEach(function (row) {
            $('#bookingTable tbody').append('<tr>' +
                '<td>' + row['booking_id'] + '</td>' +
                '<td>' + row['username'] + '</td>' +
                '<td>' + row['email'] + '</td>' +
                '<td>' + row['date'] + '</td>' +
                '<td>' + row['bookingStatus'] + '</td>' + // Display bookingStatus from data
                '<td>' +
                '<button class="btn btn-primary" onclick="uploadBooking(\'' + row['booking_id'] + '\')">Upload</button>' +
                '<button class="btn btn-secondary ml-1" onclick="editBooking(\'' + row['booking_id'] + '\')">Edit</button>' +
                '<button class="btn btn-danger ml-1" onclick="deleteBooking(\'' + row['booking_id'] + '\')">Delete</button>' +
                '</td>' +
                '<td><textarea class="remarks-textarea" placeholder="Add remarks..."></textarea></td>' +
                '</tr>');
        });
    }

    function uploadBooking(bookingId) {
        // You can add logic here to handle the approval of the booking
        console.log('Booking Approved:', bookingId);
    }

    function editBooking(bookingId) {
        // You can add logic here to handle editing of the booking
        console.log('Edit Booking:', bookingId);
    }

    function deleteBooking(bookingId) {
        // You can add logic here to handle deleting of the booking
        console.log('Edit Booking:', bookingId);
    }
</script>