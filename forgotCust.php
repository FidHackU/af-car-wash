<!DOCtype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="icon" type="image/x-icon" href="C:/Users/shereen/OneDrive/Documents/af car wash/car-wash.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="style.css" rel="stylesheet">
    </head>

    <body>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="#">
                    <h1 style="color: black;">Create account to stay connected!</h1>
                    <input type="text" placeholder="Name" />
                    <input type="email" placeholder="Email" />
                    <input type="password" placeholder="Password" />
                    <button>Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="#">
                    <h1 style="color: black;">Forgot Password?</h1>
                    <input type="text" placeholder="Email" name="email" />
                    <button>Submit</button>
                    <p>Back To <span><a href="Login.php">Login</a></span><p></p>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1>Forgot Password?</h1>
                        <p>We will send you a new password for your account in your email</p>
                        <br>
                        <button class="ghost"><a href="afcarwash.html" style="color:white;">Back Home</a></button>
                    </div>
                </div>
            </div>
        </div>

<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
    validatesignIn();
});

function validatesignIn() {
    // Perform client-side validation
    var username = document.getElementsByName('username')[0].value;
    var password = document.getElementsByName('password')[0].value;

    console.log('Username:', username);
    console.log('Password:', password);

    // For demonstration purposes, check if username and password are not empty
    if (username !== '' && password !== '') {
     // Redirect to the desired page (replace 'afcarwash.html' with your actual login page)
         window.location.href = 'afcarwash.html';
            } else {
                alert('Please enter both username and password.');
            }
        }

function myFunction() {
    // Your code for handling the dashboard display or other actions after a successful login
    console.log('Successful login! Redirecting to the dashboard...');
    window.location.href = 'dashboardmember.html';
}

</script>
    </body>
</html>
