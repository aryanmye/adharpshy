<?php
include 'connection_service.php';

// Connect to MySQL server and select the 'cities' database
$conn = new mysqli($servername, $username, $password, 'cities');

// Check for connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch table names from the 'cities' database
$sql = "SHOW TABLES";
$result = $conn->query($sql);

$options = '';
if ($result->num_rows > 0) {
    // Loop through the tables and add them as options in the dropdown
    while($row = $result->fetch_assoc()) {
        $table_name = $row['Tables_in_cities'];  // 'Tables_in_cities' is the column name returned by 'SHOW TABLES'

        // Optionally, filter out system tables if needed
        $options .= "<option value='$table_name'>" . ucfirst($table_name) . "</option>";
    }
} else {
    $options = "<option>No cities found</option>";
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>AdharPsych - Add_services</title>
    <link rel="icon" href="img/favicon-32x32.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link rel="stylesheet" href="assets/css/style.min.css">
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="assets/plugins/summernote/dist/summernote.css"/>
</head>

<body class="theme-blush">

<div class="overlay"></div>

<div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
        <input type="search" value="" placeholder="Search..." />
        <button type="submit" class="btn btn-primary">Citys</button>
    </form>
</div>

<?php
include 'leftaside.php';
?>

<section class="content blog-page">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Service</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> AdharPsych</a></li>
                        <li class="breadcrumb-item"><a href="blog-dashboard.html">Service</a></li>
                        <li class="breadcrumb-item active">New Service</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Form for Creating City-Specific Database and Adding Service Information -->
                    <form method="post" action="submit_service.php" enctype="multipart/form-data">
                        <div class="card">
                            <div class="body">

                                <!-- Category Selection -->
                                <div class="form-group">
                                    <select class="form-control show-tick" name="category" id="category" required>
                                        <option value="">Select City</option>  <!-- Default Empty Option -->
                                        <?php echo $options; ?>  <!-- Dynamically filled options -->
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="area_name" id="area_name" class="form-control" placeholder="Enter Area Name" required />
                                </div>

                                <div class="form-group">
                                    <input type="text" name="service" id="service" class="form-control" placeholder="Enter Service" required />
                                </div>



                                <div class="form-group">
                                    <input type="text" name="service_title" id="service_title" class="form-control" placeholder="Enter Service Title" required />
                                </div>

                                <!-- Image Upload -->
                                <div class="form-group">
                                    <input type="file" name="image" id="image" class="form-control" placeholder="Choose an Image" required />
                                </div>
                                
                            </div>
                        </div>

                        <div class="card">
                            <div class="form-group">
                                <textarea name="service_discription" id="service_discription" required></textarea>
                                <script>
                                    CKEDITOR.replace('service_discription');
                                    document.querySelector('form').onsubmit = function() {
                                        for (let instance in CKEDITOR.instances) {
                                            CKEDITOR.instances[instance].updateElement();
                                        }
                                    };
                                </script>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-info waves-effect m-t-20">Submit</button>
                        </div>
                    </form>
                </div>        
            </div>
        </div>
    </div>
</section>

<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>
