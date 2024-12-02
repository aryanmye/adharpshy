<?php
include "connection.php";

// // Check if user is logged in (assuming session variable 'user_id' or 'logged_in' is set on successful login)
// if (!isset($_SESSION['admin_id']) || !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
//     // Redirect to sign-in.php if user is not logged in
//     header("Location: sign-in.php");
//     exit(); // Make sure no further code is executed after the redirect
// }


// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cities";  // Assume the database name is 'cities'

// Establish connection
$coni = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($coni->connect_error) {
    die("Connection failed: " . $coni->connect_error);
}

// Query to fetch all table names from the 'cities' database
$sql1 = "SHOW TABLES";
$tablesResult = mysqli_query($coni, $sql1);

// Check if the query was successful
if ($tablesResult === false) {
    echo "Error executing query: " . mysqli_error($coni);
    exit();
}

$totalEnabledServices = 0; // Variable to keep track of enabled services count
$totaldisabledServices = 0; // Variable to keep track of disabled services count
$totalCities = 0; // Variable to keep track of total cities count

// Loop through the tables and fetch data dynamically
while ($tableRow = mysqli_fetch_assoc($tablesResult)) {
    $tableName = $tableRow['Tables_in_' . $dbname];  // Table name (e.g., 'kolhapur')

    // Query to count enabled services in the table
    $sql2 = "SELECT COUNT(*) AS enabled_count FROM `$tableName` WHERE `is_enabled` = 1";
    $que2 = mysqli_query($coni, $sql2);

    // Check if the query was successful
    if ($que2 === false) {
        echo "Error executing query for table $tableName: " . mysqli_error($coni);
        continue;
    }

    // Fetch the count of enabled services
    $row2 = mysqli_fetch_assoc($que2);
    $enabledCount = $row2['enabled_count'];

    // Add to the total enabled services count
    $totalEnabledServices += $enabledCount;





        // Query to count enabled services in the table
        $sql4 = "SELECT COUNT(*) AS disable_count FROM `$tableName` WHERE `is_enabled` = 0";
        $que4 = mysqli_query($coni, $sql4);
    
        // Check if the query was successful
        if ($que2 === false) {
            echo "Error executing query for table $tableName: " . mysqli_error($coni);
            continue;
        }
    
        // Fetch the count of enabled services
        $row4 = mysqli_fetch_assoc($que4);
        $disableCount = $row4['disable_count'];
    
        // Add to the total enabled services count
        $totaldisabledServices += $disableCount;



    // Query to count the total cities (rows) in the table
    $sql3 = "SELECT COUNT(*) AS city_count FROM `$tableName`";
    $que3 = mysqli_query($coni, $sql3);

    // Check if the query was successful
    if ($que3 === false) {
        echo "Error executing query for city count in table $tableName: " . mysqli_error($coni);
        continue;
    }

    // Fetch the count of cities
    $row3 = mysqli_fetch_assoc($que3);
    $cityCount = $row3['city_count'];

    // Add to the total cities count
    $totalCities += $cityCount;
}

// Query to count the number of tables (cities) inside the 'cities' database
$sql4 = "SELECT COUNT(*) AS table_count FROM information_schema.tables WHERE table_schema = '$dbname'";
$result4 = mysqli_query($coni, $sql4);

// Check if the query was successful
if ($result4 === false) {
    echo "Error executing query for table count in database: " . mysqli_error($coni);
    exit();
}

// Fetch the count of tables (cities)
$row4 = mysqli_fetch_assoc($result4);
$tableCount = $row4['table_count'];

// Close the connection
$coni->close();
?>

<!doctype html>

<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>Admin - AdharPsych</title>
<link rel="icon" href="images/favicon-32x32.png">
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<link rel="stylesheet" href="assets/plugins/charts-c3/plugin.css"/>

<link rel="stylesheet" href="assets/plugins/morrisjs/morris.min.css" />
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body class="theme-blush">


<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Left Sidebar -->
<?php
include 'leftaside.php';
?>

<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" checked=""/>
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark"/>
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Color Skins</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple"><div class="purple"></div></li>
                        <li data-theme="blue"><div class="blue"></div></li>
                        <li data-theme="cyan"><div class="cyan"></div></li>
                        <li data-theme="green"><div class="green"></div></li>
                        <li data-theme="orange"><div class="orange"></div></li>
                        <li data-theme="blush" class="active"><div class="blush"></div></li>
                    </ul>                                        
                </div>
            </div>                
        </div>       
    </div>
</aside>

<!-- Main Content -->

<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Dashboard</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon ">
                        <div class="body">
                            <h6>This Month's Traffic</h6>
                            <h2  class="traffic-count h2 font-weight-bold mb-0" >Loading...</h2> <!-- Add this ID for dynamic updates -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon ">
                        <div class="body">
                            <h6>Today's Traffic</h6>
                            <h2  class="traffic-counttoday h2 font-weight-bold mb-0" >Loading...</h2> <!-- Add this ID for dynamic updates -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon ">
                        <div class="body">
                            <h6>This Year's Traffic</h6>
                            <h2  class="traffic-countyearly h2 font-weight-bold mb-0" >Loading...</h2> <!-- Add this ID for dynamic updates -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon Blog">
                        <div class="body">
                            <h6>Blogs</h6>
                            <?php
                      $que="SELECT blog_id from blogs ORDER BY blog_id" ;
                      $run=mysqli_query($conn,$que);
                      $blog_row=mysqli_num_rows($run);
                      echo '<h2>'.$blog_row.'</h2>';

                      ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
    <div class="card widget_2 big_icon pen">
        <div class="body">
            <h6>Enabled Services</h6>
            <h2><?php echo $totalEnabledServices; ?></h2>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-12">
    <div class="card widget_2 big_icon pen">
        <div class="body">
            <h6>Disabled Services</h6>
            <h2><?php echo $totaldisabledServices; ?></h2>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-12">
    <div class="card widget_2 big_icon pen">
        <div class="body">
            <h6>Total Cities</h6>
            <h2><?php echo $tableCount; ?></h2>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</section>



<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="assets/bundles/c3.bundle.js"></script>

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/index.js"></script>
<script src="traffic.js"></script>
<script src="traffictoday.js"></script>
<script src="trafficyearly.js"></script>
</body>

</html>
