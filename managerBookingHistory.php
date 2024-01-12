<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Booking History</title>
    <link rel="icon" type="image/x-icon" href="image\car-wash.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

    .nav-link.active {
      color: #FF5735; /* Active link color */
    }

    .logout-btn {
      margin-left: auto;
    }

    .container {
      margin-top: 50px;
    }

        .container {
            max-width: 800px;
            margin: 30px auto;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #59626B;
            color: white;
        }

        .back-btn {
            margin-top: 20px;
        }

        .add-booking-btn {
            float: right;
            margin-top: 20px;
        }
    </style>
</head>

<body>
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
                        </a>

                        <a href="managerModifyBookingForm.php" class="nav-item nav-link">Pending Booking</a>
                        <a href="managerBookingHistory.php" class="nav-item nav-link">Booking History</a>
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
        <h2>Booking History</h2>
        <!-- Search Bar -->
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." id="searchInput">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="searchBooking()">Search</button>
            </div>
        </div>
                <!-- Add Booking Button -->
        <button class="btn btn-primary add-booking-btn" onclick="addBooking()">+ Add Booking</button>

        <br><br>
        <table>
            <thead>
                <tr>
                    <th>Schedule Date</th>
                    <th>Booking ID</th>
                    <th>Service Type</th>
                    <th>Car Type</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="bookingHistoryTableBody">
                <!-- Booking history entries will be added here dynamically -->
            </tbody>
        </table>

        <div class="back-btn">
            <center><a href="booking2.php" class="btn btn-primary">Back to Booking</a></center>
        </div>
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