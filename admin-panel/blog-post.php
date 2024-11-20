<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application UI kit.">

    <title>AdharPsych - Blog</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="assets/plugins/summernote/dist/summernote.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Ensure jQuery is included -->

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

       
    </style>

</head>

<body class="theme-blush">

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- Main Search -->
    <div id="search">
        <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
        <form>
            <input type="search" value="" placeholder="Search..." />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- Left Sidebar -->
    <?php include 'leftaside.php'; ?>

    <!-- Right Sidebar -->

    <section class="content blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Blog Post</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i>AdharPsych</a></li>
                            <li class="breadcrumb-item"><a href="blog-dashboard.php">Blog</a></li>
                            <li class="breadcrumb-item active">New Post</li>
                        </ul>
                        <!-- Mobile menu toggle button -->
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
                        <form method="post" action="submit_blog.php" enctype="multipart/form-data">
                            <div class="card">
                                <div class="body">
                                    <!-- Blog Title -->
                                    <div class="form-group">
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Blog Title" required />
                                    </div>

                                    <!-- Author's Name -->
                                    <div class="form-group">
                                        <input type="text" name="author" id="author" class="form-control" placeholder="Enter Blog Author's Name" required />
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="form-group">
                                        <input type="file" name="image" id="image" class="form-control" placeholder="Choose an Image" required />
                                    </div>

                                    <!-- Category Selection -->
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="category" id="category" required>
                                            <option value="">Select Category</option>
                                            <option value="consultation">Consultation</option>
                                            <option value="indoor_admission_voluntary">Indoor Admission - Voluntarily</option>
                                            <option value="indoor_admission_involuntary">Indoor Admission - Involuntarily</option>
                                            <option value="detoxification">Detoxification of All Illicit and Non-Illicit Drugs or Substances</option>
                                            <option value="deaddiction">Deaddiction of All Substances</option>
                                            <option value="behavioral_therapy">Behavioral Therapy</option>
                                            <option value="cognitive_therapy">Cognitive Therapy</option>
                                            <option value="long_term_admission">Long-Term Admission for Older Patients with Chronic Illness or Bedridden</option>
                                            <option value="short_term_admission_old_patients">Short-Term Admission for Older Patients</option>
                                            <option value="scholastic_backwardness">Scholastic Backwardness of Children and Adolescents</option>
                                            <option value="mental_retardation_behavioural_issues">Mental Retardation and Behavioral Issues</option>
                                            <option value="gambling_disorder">Gambling Disorder</option>
                                            <option value="adolescent_running_away">Running Away from Home in Adolescence</option>
                                            <option value="anger_control_disorder">Anger Control Disorder Treatment</option>
                                            <option value="stroke_consequences">Stroke and Its Consequences</option>
                                            <option value="parkinsons_disease">Parkinson's Disease</option>
                                            <option value="alzheimers_dementia">Alzheimer's Dementia</option>
                                            <option value="unexplained_tremors_tics">Unexplained Tremors and Tics</option>
                                            <option value="neurological_illness_psychological">Neurological Illness with Psychological Connection</option>
                                            <option value="neurotic_illness">Neurotic Illness</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="body">
                                    <!-- Content -->
                                    <div class="form-group">
                                        <textarea name="content" id="content" required></textarea>
                                        <script>
                                            CKEDITOR.replace('content');
                                            document.querySelector('form').onsubmit = function() {
                                                for (let instance in CKEDITOR.instances) {
                                                    CKEDITOR.instances[instance].updateElement();
                                                }
                                            };
                                        </script>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-info waves-effect m-t-20 w-100">Submit</button> <!-- Full width button -->
                                </div>
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
