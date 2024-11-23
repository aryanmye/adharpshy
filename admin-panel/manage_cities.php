<?php
include 'connection_service.php';
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch all table names from the 'cities' database
$sql1 = "SHOW TABLES FROM $dbname";
$tablesResult = mysqli_query($conn, $sql1);

// Check if the query was successful
if ($tablesResult === false) {
    echo "Error executing query: " . mysqli_error($conn);
    exit();
}

// Handle the delete request for the database
if (isset($_GET['delete_database'])) {
    $deleteQuery = "DROP DATABASE `$dbname`";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('Database $dbname has been deleted.');</script>";
        echo "<script>window.location.href='manage_tables.php';</script>";  // Redirect to refresh the page
    } else {
        echo "Error deleting database: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Tables in the Cities Database</title>
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

        .overlay {
            display: none;
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
    <!-- Left Sidebar -->
    <?php include 'leftaside.php'; ?>

    <section class="content">
        <div class="body_scroll">
        <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Manage Cities</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> AdharPsych</a></li>
                            <li class="breadcrumb-item"><a href="add_city.php">Add City</a></li>
                            <li class="breadcrumb-item active">Manage Cities</li>
                        </ul>
                    </div>
                    <!-- Mobile menu toggle button -->
                    <button class="btn btn-primary btn-icon mobile_menu" type="button" style="background-color:blue;"><i class="zmdi zmdi-sort-amount-desc"></i></button>

                </div>
            </div>
            <div class="container">
    <h3 class="text-center mb-4">Tables in the 'Cities' Database</h3><hr>
    <div class="row">
        <?php if (mysqli_num_rows($tablesResult) > 0): ?>
            <?php while ($tableRow = mysqli_fetch_assoc($tablesResult)): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm border-light rounded">
                        <div class="card-body p-4">
                            <h5 class="card-title text-center text-primary font-weight-bold"><?= htmlspecialchars($tableRow["Tables_in_$dbname"]) ?></h5>
                            <p class="card-text text-muted text-center">Explore and manage the table data.</p>
                            <!-- Button with hover effect and confirmation -->
                            <div class="text-center">
                                <a href="manage_services.php" 
                                   class="btn btn-danger btn-sm">
                                   <i class="zmdi "></i> Manage City</a>
                            </div>
                        </div>
                    </div><hr>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-lg-12">
                <div class="alert alert-warning" role="alert">
                    No tables found in the 'cities' database.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
        </div>
    </section>

    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script>
    <script src="assets/bundles/jvectormap.bundle.js"></script>
    <script src="assets/bundles/sparkline.bundle.js"></script>
    <script src="assets/bundles/c3.bundle.js"></script>
    <script src="assets/bundles/mainscripts.bundle.js"></script>
    <script src="assets/js/pages/index.js"></script>
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

<?php
$conn->close();
?>
<style>
    /* Card styling enhancements */
.card {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 2rem;
}

/* Title font adjustments */
.card-title {
    font-size: 1.25rem;
    color: #007bff; /* Bootstrap primary color */
}

/* Button styles */
.btn-danger {
    font-size: 0.875rem;
    padding: 0.5rem 1.25rem;
    border-radius: 30px;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    background-color: #e74c3c;
    transform: scale(1.05);
}

/* Hover effect for the card when deleting */
.card .btn-danger i {
    margin-right: 5px;
}

</style>