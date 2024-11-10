<?php
include 'connection_service.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
</head>
<body class="theme-blush">
    <!-- Left Sidebar -->
    <?php include 'leftaside.php'; ?>

    <div class="container">
        <section class="content m-5" style="width:100%;">
            <div class="body_scroll">
                <div class="container">
                    <!-- Display session messages -->

                    <?php // Query to fetch all table names from the 'cities' database
$sql1 = "SHOW TABLES";
$tablesResult = mysqli_query($conn, $sql1);

// Check if the query was successful
if ($tablesResult === false) {
    echo "Error executing query: " . mysqli_error($conn);
    exit();
}

// Loop through the tables and fetch data dynamically
while ($tableRow = mysqli_fetch_assoc($tablesResult)) {
    $tableName = $tableRow['Tables_in_' . $dbname];  // Table name (e.g., 'nagpur')

    // Query to fetch data from each table
    $sql2 = "SELECT * FROM `$tableName` ORDER BY `created_at` DESC";
    $que2 = mysqli_query($conn, $sql2);

    // Check if the query was successful
    if ($que2 === false) {
        echo "Error executing query for table $tableName: " . mysqli_error($conn);
        continue;
    }

    // Check the number of rows returned
    $rowCount = mysqli_num_rows($que2);
    if ($rowCount > 0) {
        
        echo "<h3 class='text-center mb-4'>Services in " . ucfirst($tableName) . "</h3>";  // Display the table name as the heading
        echo "<div class='row'>";
        while ($row2 = mysqli_fetch_assoc($que2)) {
            // Concatenate the image path
            $imgSrc = "upload/" . htmlspecialchars($row2['image_path']);
         
            echo "
<div class='col-lg-3 col-md-4 col-sm-6 m-1'>
    <div class='card'>
        <div class='blogitem mb-5'>
            <div class='blogitem-image'>
                <a href='city-details.php?id=" . htmlspecialchars($row2['id']) . "'>
                    <img src='$imgSrc' alt='service image' class='img-fluid'>
                </a>
            </div>
            <div class='blogitem-content p-3'>
                <h5><a href='city-details.php?id=" . htmlspecialchars($row2['id']) . "'>" . htmlspecialchars($row2['area_name']) . "</a></h5>
                <p>" . htmlspecialchars(substr($row2['created_at'], 0, 150)) . "...</p>
                <h6>" . htmlspecialchars(substr($row2['service'], 0, 150)) . "...</h6>
                <p>" . htmlspecialchars(substr($row2['service_title'], 0, 150)) . "...</p>
                <div class='d-flex justify-content-between'>
                    <a href='city-details.php?id=" . htmlspecialchars($row2['id']) . "' class='btn btn-info btn-sm'>Read More</a>
                    <a href='del_service.php?id=" . htmlspecialchars($row2['id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this service?\");'>Delete</a>
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

$conn->close();
?>
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
</body>
</html>
