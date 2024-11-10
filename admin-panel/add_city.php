<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>AdharPsych - Blog</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
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
        <button type="submit" class="btn btn-primary">Search</button>
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
                    <h2>Add City</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> AdharPsych</a></li>
                        <li class="breadcrumb-item"><a href="blog-dashboard.html">City</a></li>
                        <li class="breadcrumb-item active">New City</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                <!-- Form for Creating City-Specific Database and Adding Service Information -->
                <form  method="post" action="submit_city.php" enctype="multipart/form-data">
                    <div class="card">
                        <div class="body">
                            <div class="form-group">
                                <input type="text" name="city" id="city" class="form-control" placeholder="Enter City Name" required />
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        
                            
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
                </form>
                </div>        
            </div>
        </div>
    </div>
</section>

<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>
