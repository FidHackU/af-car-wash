<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>employeeBookingPage</title>
    <link rel="icon" type="image/x-icon" href="image\car-wash.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .nav-bar {
            background-color: #343a40; /* Navbar background color */
            padding: 10px 0;
        }

        .navbar {
            padding: 0;
        }

        .navbar-toggler {
            border: none;
            outline: none;
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        .navbar-nav {
            margin-left: 0;
        }

        .nav-item {
            padding: 0 15px;
        }

        .nav-link {
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .nav-link img {
            width: 180px;
            height: auto;
            margin-right: 15px;
        }

        .nav-link span {
            display: none;
        }

        @media (max-width: 768px) {
            .nav-link img {
                display: none;
            }
            .nav-link span {
                display: inline;
            }
        }

        .nav-link.active {
            color: #007bff; /* Active link color */
        }

        .navbar-toggler-icon {
            background-color: #ccc; /* Change this to your desired color */
        }

        .logout-btn {
            margin-left: auto;
        }

        .container {
            margin-top: 50px;
        }

        .table-form {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-form th, .table-form td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        .table-form th {
            background-color: #007bff;
            color: #fff;
        }

        .table-form tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .approve-btn {
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            background-color: #28a745;
            color: #fff;
            border: 1px solid #218838;
            border-radius: 4px;
        }

        .remarks-textarea {
            width: 100%;
            padding: 8px;
            margin-top: 8px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!--Nav Bar Start-->
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav">
                        <!-- Home link with image -->
                        <a href="afcarwash.php" class="nav-item nav-link active">
                            <img src="image\logo.png" alt="">
                            <span>AF Car Care & Triple (A) Carwash</span>
                        </a>

                        <a href="employeeBookingPage.php" class="nav-item nav-link">Pending Booking</a>
                        <a href="employeeBookingHistory.php" class="nav-item nav-link">Booking History</a>
                    </div>

                    <!-- Logout button -->
                    <div class="navbar-nav logout-btn">
                        <a href="logout.php" class="nav-item nav-link">Logout</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!--Nav Bar End-->

    <div class="container">
        <table class="table table-form">
            <thead>
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
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>2023-01-01</td>
                    <td>Pending</td>
                    <td>
                        <button class="approve-btn" onclick="approveBooking(1)">Approve</button>
                        <button class="cancel-btn" onclick="cancelBooking(1)">Cancel</button>
                    </td>
                    <td><textarea class="remarks-textarea" placeholder="Add remarks..."></textarea></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>janesmith@example.com</td>
                    <td>2023-01-02</td>
                    <td>Pending</td>
                    <td>
                        <button class="approve-btn" onclick="approveBooking(2)">Approve</button>
                        <button class="cancel-btn" onclick="cancelBooking(2)">Cancel</button>
                    </td>
                    <td><textarea class="remarks-textarea" placeholder="Add remarks..."></textarea></td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
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