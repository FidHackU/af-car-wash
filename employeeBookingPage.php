<?php include("dbConnection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>employeeBookingPage</title>
    <link rel="icon" type="image/x-icon" href="image\car-wash.png">
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

                        <a href="employeeBookingPage.php" class="nav-item nav-link active">Pending Booking</a>
                        <a href="employeeBookingHistory.php" class="nav-item nav-link">Booking History</a>
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
        
        $resultData = mysqli_stmt_get_result($stmt);?>

        <div class="table-responsive table-hover mt-4">
            <table class="table table-bordered">
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
                    <?php while ($row = (mysqli_fetch_assoc($resultData))) { ?>
                        <tr>
                            <td><?php echo $row['booking_id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td>Pending</td>
                            <td>
                                <button class="btn btn-primary" onclick="approveBooking(1)">Approve</button>
                                <button class="btn btn-danger" onclick="cancelBooking(1)">Cancel</button>
                            </td>
                            <td><textarea class="remarks-textarea" placeholder="Add remarks..."></textarea></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function approveBooking(bookingId) {
            // You can add logic here to handle the approval of the booking
            console.log('Booking Approved:', bookingId);
        }
    </script>
</body>

</html>