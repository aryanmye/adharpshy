<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application UI kit.">
    <title>AdharPsych - Add City</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link rel="stylesheet" href="assets/css/style.min.css">
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="assets/plugins/summernote/dist/summernote.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    
    <!-- Add Material Design Icon Font (for hamburger menu icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Material-Design-Iconic-Font/5.0.0/css/material-design-iconic-font.min.css">

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

    <!-- Overlay for Sidebar -->
    <div class="overlay"></div>

    <!-- Main Search (Optional) -->
    <div id="search">
        <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
        <form>
            <input type="search" value="" placeholder="Search..." />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- Left Sidebar -->
    <?php include 'leftaside.php'; ?>

    <!-- Content Section -->
    <section class="content blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Add City</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> AdharPsych</a></li>
                            <li class="breadcrumb-item"><a href="blog-dashboard.php">City</a></li>
                            <li class="breadcrumb-item active">New City</li>
                        </ul>
                    </div>
                    <!-- Mobile menu toggle button -->
                    <button class="btn btn-primary btn-icon mobile_menu" type="button" style="background-color:blue;"><i class="zmdi zmdi-sort-amount-desc"></i></button>

                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Form for Creating City-Specific Database and Adding Service Information -->
                        <form method="post" action="submit_city.php" enctype="multipart/form-data">
                            <div class="card">
                                <div class="body">
                                    <div class="form-group">
                                        <input type="text" name="city" id="city" class="form-control" placeholder="Enter City Name" required />
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="body">
                                    <script>
                                        CKEDITOR.replace('service_discription');
                                        document.querySelector('form').onsubmit = function() {
                                            for (let instance in CKEDITOR.instances) {
                                                CKEDITOR.instances[instance].updateElement();
                                            }
                                        };
                                    </script>
                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-info waves-effect m-t-20">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>        
                </div>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js --> 
    <!-- JQuery and Scripts -->
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
    <script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
    <script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
    <script src="assets/bundles/c3.bundle.js"></script>
   
    <script src="assets/js/pages/index.js"></script>
    <script src="assets/bundles/mainscripts.bundle.js"></script>

    <script>
    $(document).ready(function () {
        // Handle mobile menu toggle
        $(".mobile_menu").on("click", function () {
            $("body").toggleClass("mobile-menu-open");
        });

        // Ensure CKEditor is initialized
      

        // Handle form submission
        $("form").on("submit", function (event) {
            // Prevent default behavior to avoid page reload
            event.preventDefault();

            

            // Perform form validation (if needed) or submit using AJAX
            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                processData: false, // Don't process the data
                contentType: false, // Don't set content type
                success: function (response) {
                    // Handle success (e.g., show a message or redirect)
                    alert("City added successfully!");
                    // You can also redirect to another page or clear the form if needed.
                    window.location.href = "manage_cities.php"; // Redirect to the blogs dashboard
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle error (e.g., show an error message)
                    alert("Form submission failed. Please try again.");
                }
            });
        });
    });
</script>

</body>
</html>
