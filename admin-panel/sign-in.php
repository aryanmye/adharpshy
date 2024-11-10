<?php


include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input (assuming login form uses POST method)
    $username = trim($_POST['uname']); // Sanitize and trim input
    $password = trim($_POST['password']); // Trim password input to avoid spaces

    // Check database for user credentials
    $query = "SELECT * FROM `admin` WHERE uname = '$username'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        // Error checking the query
        echo "Error in query: " . mysqli_error($conn);
        exit();
    }

    if (mysqli_num_rows($result) > 0) {
        // User exists, fetch user data
        $user = mysqli_fetch_assoc($result);

        // Verify password (assuming passwords are stored in plain text for now, use hashed password in practice)
        if ($password === $user['password']) {
            // Passwords match, set session variables
            $_SESSION['admin_id'] = $user['admin_id'];  // Correct column for user ID
            $_SESSION['logged_in'] = true;  // Mark as logged in

            // Redirect to the dashboard or admin panel
            header("Location: index.php");
            exit();
        } else {
            // Invalid password
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        // Invalid username
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application UI kit.">

    <title>Admin Log In | AdharPsych</title>
    <!-- Favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png">
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body class="theme-blush">

    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <form class="card auth_form" method="POST" action="sign-in.php">
                        <div class="header">
                            <img class="logo" src="assets/images/Adharpsych-logo_sml.png" alt="">
                            <h5>Admin Log in</h5>
                        </div>
                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="text" name="uname" id="uname" class="form-control" placeholder="Username" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">SIGN IN</button>
                        </div>
                    </form>
                    <div class="copyright text-center">
                        &copy; <script>document.write(new Date().getFullYear())</script>,
                        <span><a href="../index.html">AdharPsych</a></span>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <img src="assets/images/signin.svg" alt="Sign In" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
</body>

</html>
