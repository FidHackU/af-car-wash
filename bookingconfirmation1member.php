<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Confirmation</title>
    <link rel="icon" type="image/x-icon" href="image\car-wash.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
    <?php include 'includes/header.php'; ?>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!--Nav Bar Start-->
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="afcarwash.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="service.php" class="nav-item nav-link">Service</a>
                        <a href="price.php" class="nav-item nav-link">Price</a>
                        <a href="booking2.php" class="nav-item nav-link active">Booking</a>
                        <a href="location.php" class="nav-item nav-link">Location</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!--Nav Bar End-->

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Booking Confirmation</h2>
                </div>
                <div class="col-12">
                    <a href="afcarwash.php">Home</a>
                    <a href="booking2.php">Booking Confirmation</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    
    <!-- Confirmation Page Content Start -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Your Booking Confirmation</h2>
            </div>
        </div>

        <!-- Display Booking Details -->
        <div class="row mt-4">
            <div class="col-12">
                <p><strong>Service Type:</strong> </p>
                <p><strong>Car Type:</strong> </p>
                <p><strong>Date:</strong> </p>
                <p><strong>Time:</strong> </p>
            </div>
        </div>

        <!-- Additional Confirmation Message or Information -->
        <div class="row mt-4">
            <div class="col-12">
                <p>Thank you for choosing AF Car Care & Triple (A) Carwash! Your booking has been confirmed.</p>
                <p>We look forward to serving you on the selected date and time. See you there!</p>
            </div>
        </div>

        <!-- Back to Home Button -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="afcarwash.php" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </div>
    <!-- Confirmation Page Content End -->

    <!-- Bootstrap JS, Popper.js and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-c1tAAjOQppz6v8r7Fm5Vv9aDHF49/rvx8+ayyJ99KOTdeM4gdeq5g7yPVNVnpq0Q" crossorigin="anonymous"></script>
</body>
</html>
