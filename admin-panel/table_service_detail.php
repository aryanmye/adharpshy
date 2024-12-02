<?php
// Connection variables
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password

// Create a new connection
$conni = new mysqli($servername, $username, $password, 'adharblog');

// Check for connection errors
if ($conni->connect_error) {
    die("Connection failed: " . $conni->connect_error);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>AdharPsych - Add Services</title>
    <link rel="icon" href="img/favicon-32x32.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link rel="stylesheet" href="assets/css/style.min.css">
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="assets/plugins/summernote/dist/summernote.css"/>

    <!-- Add Material Design Icon Font (for hamburger menu icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Material-Design-Iconnc-Font/5.0.0/css/material-design-iconnc-font.min.css">

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
            display: flex;
            flex-direction: column;
        }
        .table {
            width: 100%;
            border: 1px solid #ddd;
            border-collapse: collapse;
        }
        .table-header, .table-row {
            display: flex;
            width: 100%;
            padding: 12px 0;
            background: #f9f9f9;
        }
        .table-header {
            background: #333;
            color: #fff;
        }
        .table-data, .header__item {
            flex: 1;
            text-align: center;
            padding: 8px;
        }
        .header__item a {
            color: white;
            text-decoration: none;
        }
        .table-row:nth-of-type(odd) {
            background: #f2f2f2;
        }
    </style>
</head>

<body>
    <!-- Left Sidebar -->
    <?php include 'leftaside.php'; ?>



    <section class="content blog-page">
        <div class="container">
            <h2>Manage Services</h2>
            <div class="table">
                <div class="table-header">
                    <div class="header__item"><a href="#" class="filter__link">Service ID</a></div>
                    <div class="header__item"><a href="#" class="filter__link">Service Name</a></div>
                    <div class="header__item"><a href="#" class="filter__link">Service Title</a></div>
                    <div class="header__item"><a href="#" class="filter__link">Action</a></div>
                </div>
                <div class="table-content">
    <?php
    // Fetch data from the database
    $query = "SELECT * FROM services"; // Replace 'services' with your actual table name
    $result = $conni->query($query);

    if ($result->num_rows > 0) {
        // Output each row
        while ($row = $result->fetch_assoc()) {
            // Directly output the service_name without shortening the title
            echo "<div class='table-row'>
                    <div class='table-data'>{$row['service_id']}</div>
                    <div class='table-data'>{$row['service_name']}</div>
                    <div class='table-data'>{$row['service_title']}</div>
                    <div class='table-data'>
                        <a href='del_service_detail.php?id={$row['service_id']}' 
                           class='btn btn-danger btn-sm' 
                           onclick='return confirm(\"Are you sure you want to delete this record?\")'>
                           Delete
                        </a>
                    </div>
                  </div>";
        }
    } else {
        echo "<div class='table-row'>
                <div class='table-data' colspan='4'>No data available</div>
              </div>";
    }
    ?>
</div>
            </div>
        </div>
    </section>

    <!-- Close the connection -->
    <?php $conni->close(); ?>

    <!-- Scripts -->
    <script src="assets/bundles/libscripts.bundle.js"></script> 
    <script src="assets/bundles/vendorscripts.bundle.js"></script> 
</body>
</html>
