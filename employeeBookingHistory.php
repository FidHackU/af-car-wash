<?php include("dbConnection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Booking History</title>
    <link rel="icon" type="image/x-icon" href="image\car-wash.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <?php include 'includes/header.php'; ?>
</head>

<body>
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

                        <a href="employeeBookingPage.php" class="nav-item nav-link">Pending Booking</a>
                        <a href="employeeBookingHistory.php" class="nav-item nav-link active">Booking History</a>
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

    <!-- Main Content Container -->
    <div class="container mt-4">
        <h2>Booking History</h2>
        <!-- Search Bar -->
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." id="searchInput">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="searchBooking()">Search</button>
            </div>
        </div>

        <div class="table-responsive table-hover mt-4">
            <table class="table table-bordered" id="bookingTable">
                <thead class="thead-light">
                    <tr>
                        <th>Scheduled Date</th>
                        <th>Booking Id</th>
                        <th>Service Type</th>
                        <th>Car Type</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table Updated Using JQuery Ajax -->
                </tbody>
            </table>
        </div>

        <div class="back-btn">
            <center><a href="booking2.php" class="btn btn-primary">Back to Booking</a></center>
        </div>
    </div>


    <!-- Bootstrap JS, Popper.js and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-c1tAAjOQppz6v8r7Fm5Vv9aDHF49/rvx8+ayyJ99KOTdeM4gdeq5g7yPVNVnpq0Q" crossorigin="anonymous"></script>
</body>
</html>

<!-- JavaScript code -->
<script>
    $(document).ready(function () {
        // Load initial booking data when the page loads
        loadBookingHistory();
    });

    function loadBookingHistory() {
        // Send an AJAX request to fetch updated booking data
        $.ajax({
            url: 'ajaxEmployee.php',
            type: 'POST',
            data: {
                'request': 'loadBookingHistory',
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
                '<td>' + row['date'] + '</td>' +
                '<td>' + row['booking_id'] + '</td>' +
                '<td>' + row['serviceType'] + '</td>' +
                '<td>' + row['carType'] + '</td>' +
                '<td>' + row['time'] + '</td>' + 
                '<td>' + row['bookingStatus'] + '</td>' + // Display bookingStatus from data
                '<td>' +
                '<button class="btn btn-secondary" onclick="viewBooking(\'' + row['booking_id'] + '\')">View Details</button>' +
                '</td>');
        });
    }

    function viewBooking(bookingId){
        loadBookingHistory();
        console.log('View Booking:', bookingId);
    }

    function searchBooking() {
        var input, filter, table, tbody, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector("table");
        tbody = document.getElementById("bookingHistoryTableBody");
        tr = tbody.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];

            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
