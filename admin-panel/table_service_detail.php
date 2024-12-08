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


</head>

<body>
    <!-- Left Sidebar -->
    <?php include 'leftaside.php'; ?>



    <section class="content service-details-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Service Detail Post</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> AdharPsych</a></li>
                            <li class="breadcrumb-item"><a href="service-details-dashboard.php">Service Details</a></li>
                            <li class="breadcrumb-item active">New Post</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
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
    
    <style>
    /* General styles for the service details page */
.content.service-details-page {
    padding: 20px;
    background-color: #f5f5f5;
}

.block-header {
    margin-bottom: 20px;
}

.breadcrumb {
    background-color: transparent;
    padding: 0;
    margin-bottom: 0;
    list-style: none;
}

.breadcrumb-item {
    display: inline-block;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    padding: 0 5px;
}

/* Table styles */
.table {
    width: 100%;
    margin-bottom: 20px;
    background-color: #ffffff;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #ddd;
}

.table-header {
    background-color: #007bff;
    color: #ffffff;
    display: flex;
    justify-content: space-between;
    padding: 10px;
}

.header__item {
    flex: 1;
    text-align: center;
    padding: 8px;
}

.header__item a {
    color: #ffffff;
    text-decoration: none;
    font-weight: bold;
}

.header__item a:hover {
    text-decoration: underline;
}

/* Table rows */
.table-content {
    display: flex;
    flex-direction: column;
}

.table-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

.table-row:last-child {
    border-bottom: none;
}

.table-data {
    flex: 1;
    text-align: center;
}

/* Action buttons */
.table-data .btn {
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.5;
    border-radius: 4px;
    cursor: pointer;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    color: #fff;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

/* Responsive styles */
@media (max-width: 768px) {
    .table-header {
        flex-direction: column;
        align-items: center;
    }

    .table-row {
        flex-direction: column;
        align-items: flex-start;
    }

    .table-data {
        text-align: left;
        padding-left: 10px;
    }

    .header__item {
        padding: 8px 0;
    }
}

    
</style>

    <!-- Close the connection -->
    <?php $conni->close(); ?>

    <!-- Scripts -->
    <!-- JQuery and Scripts -->
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
    <script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
    <script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
    <script src="assets/bundles/c3.bundle.js"></script>
   
    <script src="assets/js/pages/index.js"></script>
    <script src="assets/bundles/mainscripts.bundle.js"></script> 
</body>
</html>
