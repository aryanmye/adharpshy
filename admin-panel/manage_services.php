<?php
include 'connection_service.php';
$coni = new mysqli($servername, $username, $password, $dbname);

// Check coniection
if ($coni->connect_error) {
    die("coniection failed: " . $coni->connect_error);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>City Services</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
    <link rel="stylesheet" href="assets/plugins/charts-c3/plugin.css"/>
    <link rel="stylesheet" href="assets/plugins/morrisjs/morris.min.css" />

    <!-- Add Material Design Icon Font (for hamburger menu icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Material-Design-Iconic-Font/5.0.0/css/material-design-iconic-font.min.css">

    <!-- Sidebar toggle styles -->
    <style>
        /* Sidebar toggle styles */
        body {
            transition: all 0.3s ease;
        }

        body.mobile-menu-open .left-aside {
            transform: translateX(0); /* Show the sidebar */
        }

        .left-aside {
            transform: translateX(-100%); /* Initially hide the sidebar off-screen */
            transition: transform 0.3s ease;
        }

       

        body.mobile-menu-open .overlay {
            display: block;
        }

        /* Button styling */
        .mobile_menu {
            font-size: 24px; /* Ensure the button is large enough */
            color: #fff; /* White color for the button */
            background-color: transparent; /* Transparent background */
            border: none; /* Remove default border */
            cursor: pointer;
            padding: 10px;
        }
    </style>
</head>
<body class="theme-blush">

    <!-- Overlay for Sidebar -->
    <div class="overlay"></div>

    <!-- Left Sidebar -->
    <?php include 'leftaside.php'; ?>

    

    <div class="container">
        <section class="content m-5" style="width:100%;">
            <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Manage Services</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> AdharPsych</a></li>
                            <li class="breadcrumb-item"><a href="add_service.php">Add Services</a></li>
                            <li class="breadcrumb-item active">Manage Services</li>
                        </ul>
                    </div>
                    <!-- Mobile menu toggle button -->
                    <button class="btn btn-primary btn-icon mobile_menu" type="button" style="background-color:blue;"><i class="zmdi zmdi-sort-amount-desc"></i></button>

                </div>
            </div>
                <div class="container">
                    <!-- Display session messages -->

                    <?php
                    // Query to fetch all table names from the 'cities' database
                    $sql1 = "SHOW TABLES";
                    $tablesResult = mysqli_query($coni, $sql1);

                    // Check if the query was successful
                    if ($tablesResult === false) {
                        echo "Error executing query: " . mysqli_error($coni);
                        exit();
                    }

                    // Loop through the tables and fetch data dynamically
                    while ($tableRow = mysqli_fetch_assoc($tablesResult)) {
                        $tableName = $tableRow['Tables_in_' . $dbname];  // Table name (e.g., 'nagpur')

                        // Query to fetch data from each table
                        $sql2 = "SELECT * FROM `$tableName` ORDER BY `id` DESC";
                        $que2 = mysqli_query($coni, $sql2);

                        // Check if the query was successful
                        if ($que2 === false) {
                            echo "Error executing query for table $tableName: " . mysqli_error($coni);
                            continue;
                        }

                        // Check the number of rows returned
                        $rowCount = mysqli_num_rows($que2);
                        if ($rowCount > 0) {
                            echo "<h3 class='text-center mb-4'>Services in " . ucfirst($tableName) . "</h3>";  // Display the table name as the heading
                            echo "<div class='row'>";
                            while ($row2 = mysqli_fetch_assoc($que2)) {
                                // Concatenate the image path
                                $imgSrc = "../uploado/" . htmlspecialchars($row2['image_path']);
                                $cityName = isset($row2['city_name']) ? urlencode($row2['city_name']) : 'unknown_city';
                            
                                echo "
                                <div class='col-lg-3 col-md-4 col-sm-6 m-1'>
                                    <div class='card'>
                                        <div class='blogitem mb-5'>
                                            <div class='blogitem-image'>
                                                <a href='../services.php?id=" . htmlspecialchars($row2['id']) . "'>
                                                    <img src='$imgSrc' alt='service image' class='img-fluid' style='width: 100%; height: 180px; object-fit: cover; border-radius: 8px;'>
                                                </a>
                                            </div>
                                            <div class='blogitem-content p-3'>
                                                <h5><a href='../services.php?id=" . htmlspecialchars($row2['id']) . "' class='service-title'>" . htmlspecialchars($row2['area_name']) . "</a></h5>
                                                <p class='text-muted'>" . htmlspecialchars(substr($row2['publish_date'], 0, 150)) . "</p>
                                                <h6 class='service-description'>" . htmlspecialchars(substr($row2['service'], 0, 150)) . "</h6>
                                                <p class='service-title'>" . htmlspecialchars(substr($row2['service_title'], 0, 150)) . "...</p>
                                                <div class='d-flex justify-content-between'>
                                                    <a href='../services.php?id=" . htmlspecialchars($row2['id']) . "&service=" . urlencode($row2['service']) . "' class='btn btn-info btn-sm'>Read More</a>
                                                    <a href='del_service.php?db=cities&table=" . urlencode($tableName) . "&id=" . htmlspecialchars($row2['id']) . "&service=" . urlencode($row2['service']) . "' 
                                                       class='btn btn-danger btn-sm' 
                                                       onclick='return confirm(\"Are you sure you want to delete this service?\");'>Delete</a>
                                                    <a href='toggle_service.php?id=" . htmlspecialchars($row2['id']) . "&service=" . urlencode($row2['service']) . "&table=" . urlencode($tableName) . "' 
                                                       class='btn btn-sm toggle-service' 
                                                       style='background-color: " . ($row2['is_enabled'] == 1 ? '#28a745' : '#FD0D0D') . "; color: white;'>
                                                        " . ($row2['is_enabled'] == 1 ? 'Disable' : 'Enable') . "
                                                    </a>
                                                    <!-- Edit button -->
                                                    <a href='edit_services.php?id=" . htmlspecialchars($row2['id']) . "&table=" . urlencode($tableName) . "' 
   class='btn btn-warning btn-sm'>Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";

                                
                            }
                            echo "</div>";  // End of row
                        } else {
                            echo "<div class='col-lg-12'>
                                    <div class='alert alert-warning' role='alert'>
                                        No services found in the $tableName table.
                                    </div>
                                  </div>";
                        }
                    }

                    $coni->close();
                    ?>

                    <style>
                        .service-title {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
    -webkit-line-clamp: 3; /* Limit to 4 lines */
    text-overflow: ellipsis; /* Show "..." if text exceeds 4 lines */
}
                    </style>

                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-info">
                            <?= htmlspecialchars($_SESSION['message']) ?>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>

                </div>
            </div>
        </section>
    </div>

    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script>
    <script src="assets/bundles/jvectormap.bundle.js"></script>
    <script src="assets/bundles/sparkline.bundle.js"></script>
    <script src="assets/bundles/c3.bundle.js"></script>
    <script src="assets/bundles/mainscripts.bundle.js"></script>
    <script src="assets/js/pages/index.js"></script>

    <!-- Mobile menu toggle script -->
    <script>
        $(document).ready(function() {
            // When the mobile menu button is clicked
            $(".mobile_menu").on("click", function() {
                $("body").toggleClass("mobile-menu-open");
            });

            
        });
    </script>

</body>
</html>
<style></style>
