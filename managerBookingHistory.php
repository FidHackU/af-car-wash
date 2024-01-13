<?php include("dbConnection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manager Booking History</title>
    <link rel="icon" type="image/x-icon" href="image\car-wash.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

                        <a href="managerModifyBookingForm.php" class="nav-item nav-link">Pending Booking</a>
                        <a href="managerBookingHistory.php" class="nav-item nav-link active">Booking History</a>
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

        <?php
        //Retrieve user data for table
        $sql = "SELECT booking.id AS booking_id, customer.id AS customer_id,booking.*, customer.*
                FROM booking
                INNER JOIN customer ON booking.customer_id = customer.id";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: employeeBookingPage.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt); ?>

        <div class="table-responsive table-hover mt-4">
            <table class="table table-bordered">
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
                    <?php while ($row = (mysqli_fetch_assoc($resultData))) { ?>
                        <tr>
                            <td>
                                <?php echo $row['date']; ?>
                            </td>
                            <td>
                                <?php echo $row['booking_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['serviceType']; ?>
                            </td>
                            <td>
                                <?php echo $row['carType']; ?>
                            </td>
                            <td>
                                <?php echo $row['time']; ?>
                            </td>
                            <td>Pending</td>
                            <td>
                                <button class="btn btn-secondary" onclick="viewDetails(1)">View Details</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <script>
            // Dummy booking history data (replace this with actual data)
            var bookingHistoryData = [
                { date: '2023-01-01', bookingID: '111', serviceType: 'Car Wash', carType: 'Small Car', time: '10:00 AM', status: '' },
                { date: '2023-01-02', bookingID: '222', serviceType: 'Car Repair', carType: 'SUV', time: '02:30 PM', status: '' },
                // Add more entries as needed
            ];

            // Function to display booking history
            function displayBookingHistory() {
                var tableBody = document.getElementById('bookingHistoryTableBody');

                bookingHistoryData.forEach(function (booking) {
                    var row = tableBody.insertRow();
                    row.insertCell(0).textContent = booking.date;
                    row.insertCell(1).textContent = booking.bookingID;
                    row.insertCell(2).textContent = booking.serviceType;
                    row.insertCell(3).textContent = booking.carType;
                    row.insertCell(4).textContent = booking.time;
                    row.insertCell(5).textContent = booking.status;

                });
            }

            // Display booking history when the page loads
            window.onload = displayBookingHistory;

            // Function to search booking history
            function searchBooking() {
                var input, filter, table, tbody, tr, td, i, txtValue;
                input = document.getElementById("searchInput");
                filter = input.value.toUpperCase();
                table = document.querySelector("table");
                tbody = document.getElementById("bookingHistoryTableBody");
                tr = tbody.getElementsByTagName("tr");

                // Loop through all table rows and hide those that don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2]; // Change index based on the column you want to search

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

            // Function to add a new booking
            function addBooking() {
                // You can add your logic to handle the addition of a new booking
                console.log('Adding a new booking');
            }
        </script>
</body>

</html>