<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Booking History</title>
    <link rel="icon" type="image/x-icon" href="image\car-wash.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add this style within the head section -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .nav-bar {
            background-color: #343a40;
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
            background-color: #ccc;
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
            color: #007bff;
        }

        .logout-btn {
            margin-left: auto;
        }

        .container {
            margin-top: 50px;
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
            background-color: #007bff;
            color: white;
        }

        .back-btn {
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

    <!-- Main Content Container -->
    <div class="container">
        <h2>Booking History</h2>
        <!-- Search Bar -->
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." id="searchInput">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="searchBooking()">Search</button>
            </div>
        </div>

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

    <!-- JavaScript code -->
    <script>
        var bookingHistoryData = [
            { date: '2023-01-01', bookingID:'111', serviceType: 'Car Wash', carType: 'Small Car', time: '10:00 AM', status: '' },
            { date: '2023-01-02', bookingID: '222', serviceType: 'Car Repair', carType: 'SUV', time: '02:30 PM', status: '' },
            // Add more entries as needed
        ];

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

        window.onload = displayBookingHistory;

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

    <!-- Bootstrap JS, Popper.js and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-c1tAAjOQppz6v8r7Fm5Vv9aDHF49/rvx8+ayyJ99KOTdeM4gdeq5g7yPVNVnpq0Q" crossorigin="anonymous"></script>
</body>
</html>