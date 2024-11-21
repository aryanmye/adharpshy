<?php
include 'coniection_service.php';

// coniect to MySQL server and select the 'cities' database
$coni = new mysqli($servername, $username, $password, 'cities');

// Check for coniection
if ($coni->coniect_error) {
    die("coniection failed: " . $coni->coniect_error);
}

// Query to fetch table names from the 'cities' database
$sql = "SHOW TABLES";
$result = $coni->query($sql);

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

$coni->close();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Material-Design-Iconic-Font/5.0.0/css/material-design-iconic-font.min.css">

    <style>
        /* Mobile Menu Button Styling */
        .mobile_menu {
            font-size: 24px; /* Ensure it's large enough */
            color: #fff; /* White color */
            background-color: transparent; /* Transparent background */
            border: none; /* Remove the default border */
            cursor: pointer; /* Make it clickable */
            padding: 10px;
        }

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
    </style>
</head>

<body class="theme-blush">

    <!-- Overlay for Sidebar -->
    <div class="overlay"></div>

    <!-- Main Search (Optional) -->
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
                            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> AdharPsych</a></li>
                            <li class="breadcrumb-item"><a href="blog-dashboard.php">Service</a></li>
                            <li class="breadcrumb-item active">New Service</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button" style="background-color:blue;"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <!-- Mobile menu toggle button -->
                    
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
<!-- JQuery and Scripts -->
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
<script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="assets/bundles/c3.bundle.js"></script>
<script src="assets/js/pages/index.js"></script>
<script src="assets/bundles/mainscripts.bundle.js"></script>

    <!-- Add JavaScript for Sidebar Toggle -->
    <script>
    $(document).ready(function () {
        // Handle mobile menu toggle
        $(".mobile_menu").on("click", function () {
            $("body").toggleClass("mobile-menu-open");
        });

        // Ensure CKEditor is initialized for service description
        CKEDITOR.replace('service_discription');

        // Handle form submission
        $("form").on("submit", function (event) {
            // Prevent the form from submitting normally
            event.preventDefault();

            // Get CKEditor content and set it into the textarea
            var contentData = CKEDITOR.instances.service_discription.getData();
            $("#service_discription").val(contentData);  // Set the content into the textarea

            // Prepare form data using FormData to handle file uploads
            var formData = new FormData(this);

            // Perform AJAX request to submit the form
            $.ajax({
                url: $(this).attr('action'),  // URL where the form will be submitted
                type: $(this).attr('method'), // Form submission method (POST)
                data: formData,               // Form data
                processData: false,           // Don't process the data
                contentType: false,           // Don't set content type (for file upload)
                success: function (response) {
                    // Handle success (e.g., show a success message)
                    alert("Service added successfully!");
                    window.location.href = "manage_services.php"; // Redirect to the service dashboard or another page
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle error (e.g., show an error message)
                    alert("Error occurred while submitting the form. Please try again.");
                }
            });
        });
    });
</script>

</body>
</html>
