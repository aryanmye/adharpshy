<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application UI kit.">

    <title>AdharPsych - Service Details</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/plugins/summernote/dist/summernote.css" />

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

    <style>
        /* Sidebar toggle styles */
        body {
            transition: all 0.3s ease;
        }

        body.mobile-menu-open .left-aside {
            transform: translateX(0);
        }

        .left-aside {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body class="theme-blush">

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="submit_service_detail.php">
                            <div class="card">
                                <div class="body">
                                    <!-- Service Title -->
                                    <div class="form-group">
                                        <input type="text" name="service_title" id="service_title" class="form-control" placeholder="Enter Service Title" required />
                                    </div>

                                    <!-- Service Name -->
                                    <div class="form-group">
                                        <input type="text" name="service_name" id="service_name" class="form-control" placeholder="Enter Service Name" required />
                                    </div>

                                    <!-- Service Description -->
                                    <div class="form-group">
                                        <textarea name="service_disc" id="service_disc" required></textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-info waves-effect mt-2 w-100">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Essential Scripts -->
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
    <script>
    $(document).ready(function () {
        // Handle mobile menu toggle
        $(".mobile_menu").on("click", function () {
            $("body").toggleClass("mobile-menu-open");
        });

        // Initialize CKEditor for service description
        CKEDITOR.replace('service_disc');

        // Handle form submission
        $("form").on("submit", function (event) {
            // Prevent default behavior to avoid page reload
            event.preventDefault();

            // Get CKEditor content and set it into the textarea
            var contentData = CKEDITOR.instances.service_disc.getData();
            $("#service_disc").val(contentData); // Set the content into the textarea

            // Collect form data
            var formData = new FormData(this);

            // Submit the form data using AJAX
            $.ajax({
                url: $(this).attr('action'), // Form action URL
                type: $(this).attr('method'), // Form method (POST)
                data: formData, // Form data
                processData: false, // Prevent data from being processed
                contentType: false, // Prevent content type from being set
                success: function (response) {
                    // Handle success response
                    alert("Form submitted successfully!");
                    window.location.href = "add_service.php"; // Redirect on success
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle error response
                    alert("Form submission failed. Please try again.");
                }
            });
        });
    });
</script>


</body>

</html>
