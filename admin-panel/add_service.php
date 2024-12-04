<?php
include 'connection_service.php';

// connect to MySQL server and select the 'cities' database
$conn = new mysqli($servername, $username, $password, 'cities');

// Check for connection
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
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



$conn->close();
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

                                    <!-- Category Selection -->
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="service_id" id="service_select" required>
                                        <option value="">Select Service</option>
                                        <!-- Populate this with services from the database -->
                                        <?php
                                        // Include database connection
                                        include 'connection.php';

                                        // Fetch available services from the database
                                        $sql = "SELECT service_id, service_name FROM services";
                                        $result = $conni->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='{$row['service_id']}'>{$row['service_name']}</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No services available</option>";
                                        }
                                        ?>
                                        </select>
                                    </div><hr>

                                    <div class="form-group">
                                        <label for="service_title">Area Name</label>
                                        <input type="text" name="area_name" id="area_name" class="form-control" placeholder="Enter Area Name" required />
                                    </div>

                                <!-- Service Name -->
                                <div class="form-group">
                                    <label for="service_name">Service Name</label>
                                    <input type="text" name="service_name" id="service_name" class="form-control" placeholder="Enter Service Name" required />
                                </div>


                                   <!-- Service Title (dynamically filled) -->
                                <div class="form-group">
                                    <label for="service_title">Service Title</label>
                                    <input type="text" name="service_title" id="service_title" class="form-control" placeholder="Enter Service Title" required />
                                </div>


                                    <!-- Image Upload -->
                                    <div class="form-group">
                                        <input type="file" name="image" id="image" class="form-control" placeholder="Choose an Image" required />
                                    </div>

									<div class="form-group">
										<input type="date" id="publish_date" name="publish_date" class="form-control" placeholder="Date" required style="width:20%;">
									</div>

                                </div>
                            </div>

                            <div class="card">
                                <div class="form-group">
                                <textarea name="service_disc" id="service_disc" required></textarea>
<script>
    CKEDITOR.replace('service_disc');
</script></div>

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
        CKEDITOR.replace('service_disc');

        // Handle form submission
        $("form").on("submit", function (event) {
            // Prevent the form from submitting normally
            event.preventDefault();

            // Get CKEditor content and set it into the textarea
            var contentData = CKEDITOR.instances.service_disc.getData();
            $("#service_disc").val(contentData);  // Set the content into the textarea

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





<script>
// When a service is selected
// On selecting a service from the dropdown
// When a service is selected from the dropdown
$('#service_select').on('change', function() {
    var serviceId = $(this).val(); // Get the selected service ID
    
    if (serviceId) {
        // Make AJAX request to fetch service details
        $.ajax({
            url: 'get_service.php', // PHP script to fetch service details
            type: 'POST',
            data: { service_id: serviceId }, // Send the selected service_id
            dataType: 'json', // Expect JSON response
            success: function(response) {
                // Check if there is an error in the response
                if (response.error) {
                    alert(response.error); // Show error message if service is not found
                } else {
                    // Populate the fields dynamically with the returned service data
                    $('#service_title').val(response.service_title); // Populate Service Title
                    $('#service_name').val(response.service_name); // Populate Service Name
                    
                    // Set the Service Description in CKEditor
                    CKEDITOR.instances['service_disc'].setData(response.service_desc);
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors during the AJAX request
                alert('Error fetching service details: ' + error);
            }
        });
    } else {
        // Clear the fields if no service is selected
        $('#service_title').val('');
        $('#service_name').val('');
        CKEDITOR.instances['service_disc'].setData(''); // Clear CKEditor content
    }
});





</script>
</body>
</html>
