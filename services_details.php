<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cities";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adharblog";

$coni = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($coni->connect_error) {
    die("Connection failed: " . $coni->connect_error);
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
<head>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title -->
        <title>Services details - Adharpsych </title>
		
		<!-- Favicon -->
        <link rel="icon" href="img/favicon-32x32.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<link rel="stylesheet" href="path/to/font-awesome/css/all.min.css">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
		
    </head>  
	<style>
		body 
		{
			scroll-behavior: smooth;
		}
		/* Style the reviews section */
		.customer-reviews {
    padding: 60px 0;
    background-color: #f9f9f9;
}

/* Section title */
.customer-reviews .section-title h2 {
    font-size: 36px;
    font-weight: bold;
    color: #333;
    margin-bottom: 30px;
}

/* Review card */
.review-card {
    background-color: #fff;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.review-card .review-img {
    margin-bottom: 20px;
}

.review-card .review-img img {
    width: 80px;
    height: 80px;
    object-fit: cover;
}

.review-card .review-content .review-text {
    font-size: 18px;
    color: #555;
    margin-bottom: 20px;
}

.review-card .review-content .customer-name {
    font-size: 20px;
    font-weight: bold;
    color: #333;
}

.review-card .review-content .customer-location {
    font-size: 16px;
    color: #777;
}

/* Carousel controls */
.carousel-control-prev, .carousel-control-next {
    background-color: #007bff;
    width: 50px;  /* Increased size */
    height: 50px; /* Increased size */
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0.7; /* Slight opacity for a modern look */
    transition: opacity 0.3s ease; /* Add transition on hover */
}

.carousel-control-prev:hover, .carousel-control-next:hover {
    opacity: 1; /* Full opacity on hover */
}

.carousel-control-prev-icon, .carousel-control-next-icon {
    width: 20px;  /* Slightly bigger icon */
    height: 20px;
    background-color: white;  /* White icon */
    border-radius: 50%;
}

/* Carousel active item styling */
.carousel-item {
    transition: transform 0.3s ease-in-out;
}

/* Optional: Custom SVG background icons for prev and next if the default Bootstrap icons aren't working */
.carousel-control-prev-icon {
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M12 15l-5-5 5-5" stroke="#fff" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></svg>');
}

.carousel-control-next-icon {
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M8 5l5 5-5 5" stroke="#fff" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></svg>');
}

	</style>
    <body>
	
		<!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Preloader -->
		
		<!-- Get Pro Button -->
		
	
		<!-- Header Area -->
		<header class="header" >
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-6 col-md-7 col-12">
							<!-- Top Contact -->
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
							<!-- End Top Contact -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="index.php"><img src="img/Adharpsych-logo_sml.png" alt="#"></a>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li class="active"><a href="index.html">Home</a></li>
											
											
											<li><a href="services.php">Services </a></li>
											
						
											</li>
											<li><a href="blogs.php">Blogs </a>
												
											</li>
											<li><a href="contact.php">Contact Us</a></li>
											<li><a href="admin-panel/index.php">Admin Panel</a></li>
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
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
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
</head>


		<!-- Breadcrumbs -->
		<div class="breadcrumbs overlay">
		
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2>We provide services across multiple cities, ensuring expert solutions and reliable service to clients wherever they are located.</h2>
							<ul class="bread-list">
								<li><a href="index.html">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Services</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->


<body>
<section class="news-single section">
    <div class="container">
        <div class="row">
            <!-- Main Content Area -->
            <div class="col-lg-8 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="single-main">
                            <?php
                                // Fetch table name from the query parameter
                                $tableName = isset($_GET['table']) ? $_GET['table'] : null;
                                $allEnabledData = [];

                                if ($tableName) {
                                    // Fetch all enabled data from the specified table
                                    $sql = "SELECT * FROM `$tableName` WHERE is_enabled = 1";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $allEnabledData[$tableName] = $result->fetch_all(MYSQLI_ASSOC);
                                    }
                                }

                                if (!empty($allEnabledData)) {
                                    foreach ($allEnabledData as $table => $data) {
                                        foreach ($data as $row) {
                                            echo '<div class="news-head">';
                                            $imgSrc = "uploado/" . htmlspecialchars($row['image_path']);
                                            $imgSrc = str_replace(' ', '%20', $imgSrc);

                                            if (file_exists("uploado/" . $row['image_path'])) {
                                                echo "<img src='$imgSrc' alt='Service Image' style='height: 335px;width: 665px;'>";
                                            } else {
                                                echo "<img src='img/blog2.jpg' alt='Placeholder Image'>";
                                            }
                                            echo '</div>';
                                            echo '<h1 class="news-title">' . htmlspecialchars($row['service_title']) . ' in ' . htmlspecialchars($row['area_name']) . '</h1>';
                                            echo '<div class="meta">';
                                            echo '<span class="date"><i class="fa-solid fa-notes-medical"></i> ' . ucfirst($row['service']) . '</span>';
                                            echo '<span class="date"><i class="fas fa-map-marker-alt"></i> ' . ucfirst($row['area_name']) . '</span>';
                                            echo '<span class="author"><i class="fa fa-clock-o"></i> ' . ucfirst($row['created_at']) . '</span>';
                                            echo '</div>';
                                            echo '<div class="news-text"><p>' . ucfirst($row['service_discription']) . '</p></div>';
                                            echo '<hr>';
                                        }
                                    }
                                } else {
                                    echo '<p>No services available for this category.</p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar for Categories -->
            <div class="col-lg-4 col-12">
                <div class="main-sidebar">
                    <div class="single-widget category">
                        <h3 class="title">Cities and Areas</h3>
                        <ul class="categor-list">
                            <?php
                            // Fetch all tables and display their area names if data exists
                            $sql = "SHOW TABLES";
                            $result = $conn->query($sql);

                            // Check if the query was successful
                            if ($result) {
                                // Loop through the tables in the result
                                while ($row = $result->fetch_row()) {
                                    // Get the table name, which is the first column in the row
                                    $tableName = $row[0];

                                    // Query to check if the table has any enabled data
                                    $dataQuery = "SELECT COUNT(*) as count FROM `$tableName` WHERE is_enabled = 1";
                                    $dataResult = $conn->query($dataQuery);
                                    $dataRow = $dataResult->fetch_assoc();

                                    // Only display the table if it contains data
                                    if ($dataRow['count'] > 0) {
                                        // Query to fetch all distinct area_name values for the table
                                        $areaQuery = "SELECT DISTINCT area_name FROM `$tableName` WHERE is_enabled = 1";
                                        $areaResult = $conn->query($areaQuery);

                                        // Initialize an array to store area names
                                        $areaNames = [];

                                        // Fetch all area names and store them in the array
                                        if ($areaResult->num_rows > 0) {
                                            while ($areaRow = $areaResult->fetch_assoc()) {
                                                $areaNames[] = htmlspecialchars($areaRow['area_name']);
                                            }
                                        }

                                        // Convert the area names array into a comma-separated string
                                        $areaNamesString = implode(', ', $areaNames);

                                        // Display the city name with its associated area names
                                        echo "<li class='m-2'>
                                            <a href='?table=" . urlencode($tableName) . "'>
                                                <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADoUlEQVR4nO2ab2hNYRzHP0P5kzQLS9NkLXshJV7wQivyZolSRpR/L7aMlT8JL3jByKK9EMrYWpkopZjixUr+lKIxpS0Km0LkT/7N8idXT33v7XH+3Ht379ndPbNffev5Pc9zzvl+7nnOc55zzoWhSBgzgM3ALoc2AdMJSSwHfgERH/0AyjJlJh/Y4fGLxtNKbftAhhuBWoea1XYzUyCH4vyi8ZRvgTR4gJyJAzIc2OqxzT5gSqogdTrgRaBN5bNAp8qngC6VjwJvVS5MY2jNibPNgXRBKoEmlY3ByyovBG6rPAvosECiF3u1x/AzE0CJzzFzgHUe22wDJqrPJKBGZ2o/kNffIP0VGx1nav1AgWwB6lPQCaAYGA2sla81wMiBABmX4gQSkQ4nMp0pkDz1eQeU90H12q4u20BeAMOAI8CFODoPzJOHrAUpSnI4NWY7SLHKT4FFuhFGgHvK9ylvGigQU9dq6WACkHa1zVd+TfnygQZx6k9YQRZrqWHUo7pQghRa+/j6P4H8AJ4Br5T3KH8TNpBEagoLSKfuKSus55QirZJDBTJorpH2IZDBfkZKgc8es0Y2zVoRS5/l2RV71OE78BHozRDIbx3vi/Kfyr95gPSq7bty49kVtWqsTnNozQTGS1Ez0bwooKFVrdx4dsVxx8N8UItGL6ULskH5MS+QqNnyNEFeaInhpa6AQMqtNldcUGNZALPWaA0jp2YHBFKm3Hh2xVU1lgYAcqcPQyuVJUqpcuPZFbfUONsBYl5VXlF5pw4U0YuydpVXAc8tkBq9ZnXqYZrTb528Rc+s8eyK+2oscYD0VYWaoeZ4aIEHSI8gH1v3hzZdU34gJcqNZ1c8UWOBA6TT8Qzup28WyIN+nrUKlBvPrnipxlyPaySZsK+RHT6wNwICyVVuPLvikxpHBABSoFc6Ti0LCGSEcuPZFb+0BCAAkEf9PLSQV+P5nxilju8DAqnweQV6yQOkSze4vRZYuXV8P5D3qjPeYzFBld0BgfiFvWicluQs2OAD0q064z0WU1XZkUGQHJ2FeN9ETupm6wUSPZ7xHosZqrwLjNXCsVV1zdpRIr1W/91x+mxTnw9J7rNSin4JbpW3sfIakfdYzFXldWB7ijfCTGq7vEbkPRYLVdkCTNaypDZLdUAeW+TZeI/FUlWeIzxxXp6X2JWrrW/nYYnT1oI1FhWqbMuCoVObpKJ/YqjwAgmjKmyQMUBVH/9Akw2q0tPo4Im/A2NTZ5BTAVoAAAAASUVORK5CYII=' alt='image' style='width: 25px; height: 25px; margin-right: 5px;'>
                                                " . htmlspecialchars(ucfirst(strtolower($tableName))) . " - $areaNamesString
                                            </a>
                                        </li>";
                                    }
                                }
                            } else {
                                echo "<li>No tables found in the 'cities' database.</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="customer-reviews section" id="reviews">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2>What Our Customers Say</h2>
                    <img src="img/section-img.png" alt="#" class="img-fluid">
                </div>
            </div>
        </div>

        <!-- Customer Reviews Carousel -->
        <div id="reviewCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
            <div class="carousel-inner">
                <!-- Review 1 -->
                <div class="carousel-item active">
                    <div class="review-card">
                        <div class="review-img">
                            <img src="img/customer1.jpg" alt="Customer 1" class="img-fluid rounded-circle">
                        </div>
                        <div class="review-content">
                            <p class="review-text">"Dr. Patil is helpful, appointment wait times is not lengthy."</p>
                            <h5 class="customer-name">Shilpa Shinde</h5>
                            <span class="customer-location">Pune , Maharastra</span>
                        </div>
                    </div>
                </div>
                <!-- Review 2 -->
                <div class="carousel-item">
                    <div class="review-card">
                        <div class="review-img">
                            <img src="img/customer2.jpg" alt="Customer 2" class="img-fluid rounded-circle">
                        </div>
                        <div class="review-content">
                            <p class="review-text">"Dr. Patil's empathetic approach and effective treatment plan have significantly improved my mental health."
							</p>
                            <h5 class="customer-name">Abhijeet Magdum</h5>
                            <span class="customer-location">Kolhapur , Maharastra</span>
                        </div>
                    </div>
                </div>
                <!-- Review 3 -->
                <div class="carousel-item">
                    <div class="review-card">
                        <div class="review-img">
                            <img src="img/customer3.jpg" alt="Customer 3" class="img-fluid rounded-circle">
                        </div>
                        <div class="review-content">
                            <p class="review-text">"Dr. Patil's expertise and understanding have been invaluable in my recovery."
							"The AdharPsych Clinic offers a supportive and non-judgmental space for healing.""</p>
                            <h5 class="customer-name">Aditi Kolhapure</h5>
                            <span class="customer-location">Kolhapur , Maharastra</span>
                        </div>
                    </div>
                </div>
                <!-- More reviews can be added here in the same format -->
            </div>
            <!-- Carousel Controls -->
			<a class="carousel-control-prev" href="#reviewCarousel" role="button" data-slide="prev">
    <span aria-hidden="true"><i class="fa-solid fa-arrow-left"></i></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#reviewCarousel" role="button" data-slide="next">
    <span  aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></span>
    <span class="sr-only">Next</span>
</a>

        </div>
    </div>
</section>



<?php
// Close the connection after all queries are done
$conn->close();
?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Add event listeners to database names
        document.querySelectorAll('.db-toggle').forEach(function (element) {
            element.addEventListener('click', function () {
                var dbName = this.getAttribute('data-db');
                var tableList = document.getElementById('tables-' + dbName);

                // Toggle the display of the table list
                if (tableList.style.display === 'none' || tableList.style.display === '') {
                    tableList.style.display = 'block';
                } else {
                    tableList.style.display = 'none';
                }
            });
        });
    });
</script>





    	<!-- Footer Area -->
        <footer id="footer" class="footer ">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>About Us</h2>
								<p>Welcome to AdharPsych, where mental health meets compassion and expertise. Our mission is to provide comprehensive psychiatric services tailored to the unique needs of each individual.</p>
								<!-- Social -->
								<ul class="social">
									<li><a href="#"><i class="icofont-facebook"></i></a></li>
									<li><a href="#"><i class="icofont-google-plus"></i></a></li>
									<li><a href="#"><i class="icofont-twitter"></i></a></li>
									
								</ul>
								<!-- End Social -->
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer f-link">
								<h2>Quick Links</h2>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="index.html"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a></li>
											<li><a href="aboutus.html"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>
											<li><a href="services.html"><i class="fa fa-caret-right" aria-hidden="true"></i>Services</a></li>
												
										</ul>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
								
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Testimonials</a></li>
										
											<li><a href="contact.html"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a></li>	
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Open Hours</h2>
							
								<ul class="time-sidual">
									<li class="day">Monday - Friday <span>8.00-20.00</span></li>
									<li class="day">Saturday <span>9.00-18.30</span></li>
									<li class="day">Monday - Thusday <span>9.00-15.00</span></li>
								</ul>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!--/ End Footer Top -->
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="copyright-content">
								<p>© Copyright 2024  |  All Rights Reserved by Adharpsych</a> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		<!--/ End Footer Area -->
		<!-- Bootstrap JS (Include after jQuery and Bootstrap CSS) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

		<!-- jquery Min JS -->
        <script src="js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="js/easing.js"></script>
		<!-- Color JS -->
		<script src="js/colors.js"></script>
		<!-- Popper JS -->
		<script src="js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="js/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="js/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="js/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="js/steller.js"></script>
		<!-- Wow JS -->
		<script src="js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="js/main.js"></script>
</body>
</html>
