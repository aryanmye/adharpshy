<?php
include 'admin-panel/connection_service.php';

// Fetch all table names in the database
$sql = "SELECT table_name FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = '$dbname'";
$tables_result = $coni->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags and other headers go here -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home - Adharpsych</title>
    <link rel="icon" href="img/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/icofont.css">
    <link rel="stylesheet" href="css/slicknav.min.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/datepicker.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <style>
        /* Custom Styles for Service Cards */
        .service-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            background-color: #fff;
            margin-bottom: 30px;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
        }

        .service-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .service-card-body {
            padding: 20px;
        }

        .service-card-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }

        .service-card-description {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .service-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .service-card-footer a {
            font-size: 1rem;
            color: #007bff;
            text-decoration: none;
        }

        .service-card-footer a:hover {
            text-decoration: none;
        }

        /* Custom Button Styles */
        .custom-btn {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
            background-color: #007bff;
            color: #000000;
            text-decoration: none;
            border: none;
        }

        /* Style for the navbar */
        .navbar-nav .nav-item .nav-link {
            font-size: 1rem;
            padding: 10px 15px;
            color: white;
            transition: background-color 0.3s;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background-color: #0056b3;
        }

        /* Style for service card title truncation */
        .service-card-title {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
<header class="header">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 col-12">
                    <ul class="top-contact">
                        <li><i class="fa fa-phone"></i>+91 91587 48122</li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:asksameer@gmail.com">asksameer@gmail.com</a></li>
                        <li>
                            <a href="https://wa.me/919158748122" target="_blank" style="display: flex; align-items: center; gap: 5px; color: #25D366;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/WhatsApp_icon.png" alt="WhatsApp" style="width: 16px; height: 16px;">
                                WhatsApp
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Header -->
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="logo">
                            <a href="index.php"><img src="img/Adharpsych-logo_sml.png" alt="#"></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-9 col-12">
                        <div class="main-menu">
                            <nav class="navigation">
                                <ul class="nav menu">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="services.php">Services</a></li>
                                    <li><a href="blogs.php">Blogs</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <li><a href="admin-panel/index.php">Admin Panel</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2 col-12">
                        <div class="get-quote">
                            <a href="#appointment" class="btn">Book Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="services section" id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2>Explore Our Comprehensive Services</h2>
                    <img src="img/section-img.png" alt="#" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="row">
        <?php
if ($tables_result->num_rows > 0) {
    echo '<header style="margin-left:50px; margin-right:50px; margin-bottom:50px; border-radius:20px;">
        <nav>
            <ul>';
    while ($table = $tables_result->fetch_assoc()) {
        $tableName = $table['table_name'];
        
        // Check if the table has services enabled
        $checkServicesSql = "SELECT COUNT(*) as count FROM `$tableName` WHERE is_enabled = 1";
        $serviceCheckResult = $coni->query($checkServicesSql);
        $serviceCount = $serviceCheckResult->fetch_assoc()['count'];

        if ($serviceCount > 0) { // Only include table if it has services
            echo '<li style="margin: 0 10px; list-style: none; display: inline-block;">
            <a href="#' . htmlspecialchars($tableName) . '" 
               style="
                   text-decoration: none; 
                   font-size: 1rem; 
                   font-weight: 600; 
                   color: ##474747; 
                   padding: 8px 20px; 
                   border-radius: 5px; 
                   border: 1px solid ##474747; 
                   background-color: ##474747;
                   box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1); 
                   transition: all 0.3s ease-in-out;
                   ">
               ' . ucfirst($tableName) . '
            </a>
        </li>';
    
        }
    }
    echo '</ul>
        </nav>
    </header>';
}
?>


<style>
    header nav ul {
    display: flex;
    flex-direction: row;
    justify-content: center; /* Centers the menu items horizontally */
    list-style: none; /* Removes bullet points */
}

/* Hover effect */
header nav ul li a:hover {
    color: #ffffff; /* White text on hover */
    background-color: #474747; /* Match hover color */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Slightly intensified shadow */
    transform: translateY(-3px); /* Subtle lift */
}



</style>


            
<?php
            // Display services
            $tables_result->data_seek(0); // Reset the result pointer
            while ($table = $tables_result->fetch_assoc()) {
                $tableName = $table['table_name'];
                $sql = "SELECT * FROM `$tableName` WHERE is_enabled = 1";
                $result = $coni->query($sql);

                if ($result->num_rows > 0) {
                    echo '<div id="' . htmlspecialchars($tableName) . '" class="col-12">
                        <h5 class="table-name-title text-center">' . ucfirst($tableName) . ' Services</h5>
                        <hr>
                    </div>';

                    while ($row = $result->fetch_assoc()) {
                        $imgSrc = "uploado/" . htmlspecialchars($row['image_path']);
                        echo '<div class="col-lg-4 col-md-6 col-12">
                                <div class="service-card">
                                    <img src="' . (file_exists($imgSrc) ? $imgSrc : 'img/empty_image.jpg') . '" alt="Service Image">
                                    <div class="service-card-body">
                                        <h5 class="service-card-title">' . htmlspecialchars(ucfirst($row['service_title'])) . '...</h5>
                                        <span class="date">Published on: ' . htmlspecialchars($row['created_at']) . '</span>
                                        <p class="service-card-description">' . htmlspecialchars(substr(strip_tags($row['service']), 0, 150)) . '</p>
                                        <div class="service-card-footer">
                                            <a href="services_details.php?table=' . urlencode($tableName) . '&service_name=' . urlencode($row['service_title']) . '" class="btn" style="color:white;">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                              </div>';
                    }
                }
            }
            ?>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    // Smooth scrolling for anchor links
    $(document).ready(function() {
        $("a[href^='#']").on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 220
                }, 1000);
            }
        });
    });
</script>
</body>
</html>
