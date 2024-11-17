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
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

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
                                // Ensure the table name is dynamic
                                $tableName = isset($_GET['table']) ? $_GET['table'] : 'kolhapur'; // Default to 'kolhapur' if no table is specified
                                $sql = "SELECT * FROM `$tableName` WHERE is_enabled = 1"; // Fetch only enabled services
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                            ?>
                                    <!-- Display Data -->
                                    <div class="news-head" style="width: 670px; height: 330px;">
                                        <?php
                                            // Display the image dynamically
                                            $imgSrc = "upload/" . htmlspecialchars($row['image_path']);
                                            // Replace spaces with URL-encoded value
                                            $imgSrc = str_replace(' ', '%20', $imgSrc);

                                            if (file_exists("upload/" . $row['image_path'])) {
                                                echo "<img src='$imgSrc' alt='Service Image'>";
                                            } else {
                                                echo "<img src='img/blog2.jpg' alt='Placeholder Image'>"; // Fallback for missing images
                                            }
                                        ?>
                                    </div>
                                    <div class="area-item" style="display: flex; align-items: center; margin-top:10px;">
									    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADuElEQVR4nO2ZWYiOURjHfzRkmbHPZOJCWYZCiNwoW7JEGtkaV24VuZG9xnZBcodsxYWILJESLiQiDLIklEhqLFnGvoxPR/+3TtN8531f3znffCO/euvr/f7vc/bnOec58J9G6QBUAbuAq8BL4Luel3q3E5gLlFCAVAB7gM9AJuHzCdgN9KUAaAdsBn6ocr/U6yuB0Wpgez0VercKuCZtRqO1CWjTVI0wPXlHlakH9gO9U3zfBzhgNegyUE6eGao5byrwABiWg63hwEPZegYMJo8jETXiDNDZg80uwFmrMeX5WBN3rEYUebTdCjhnTbOga2azNZ18jERjI/NIZawhEBXyTvU5rok4RsgBfAS6hyhgj3rKeKfQHFRZ20JE7E/qqSQutgxYB9xUz5rnBrAWKE3oUH7pu2I8UqUeMsEujplAnSOivwdmJLBzXfo5eGSXjJqIHdeIKMAdUySPIvsY4LgVQCtjbK2WdofHdvwZiYwq5ppO0UgsceiWSvMO6ObQjZXuCh55JaP9HJp11kjEcSKBi+0nzQs88k1GXVvvWwlGrWFvGweQjRJpvuKRLzLqirYfpEniZaJKmqno2kVkdDTwRq2MugJUXYqGdLA8WDZ6SPMcj9yX0YEOzU1pjHeKY5y0NQ7NEGnu4pGTMjrboVkrzfEU9qodmnnSHMUjG2R0vUNTqqmSkYvNxnJp3gJdHbqNCRqbmtkyarbZLmYo2GXkYsdqzRRrOkUjYTTTY2xdlDZOl4oyFf5V3sRFpYJdti3K2wSV66Sdtnk64pkbqsiUBNpuCnY1cst12jtVx0yniFkqy4yKd6LIvZfwHEmw1v6a/pbvj5teudBRAdhsPnuFKqRGjTGuMRQLVcb5gGWwwEoOhKAIeKwyzBkoGMWWRzJna9/MtbYlJqsSlC0q7HDAqbuCPFBuLcZBHu1OsA5cJo7kha0BRsUs7qD5rMboaWVVRnmwV6lGvA6U+HNSbZ3yWuZgp7WVxF5AE9AWeKIKzM/BzhLZuOc5l/xX+a5anfrSUmq584k0IS2AS6qISXCnZZ++Ndv7Jmeors9+AiNTfDfJuktMc9MVlOiYez/hvYbJojzVN4soIFoDtxMchyO2W+eNXDxeEIZoitXHZFImKf6Y0+YACpQ16uknWbYZZUqBGs1iCpgi4IKVxjFeLcJModP671SD/wqSnlbSe2UjR+XaUFdqIZimdWDWy2Rgqn4bFz2eZka1RuCNUkDm9zKaIS2AQ1Y+q+GaaVaU6Mbpsu9LTf5VfgNttDSN+ivn8AAAAABJRU5ErkJggg==" alt="marker--v1" style="width: 20px;height: 20px;margin-right: 0px;margin-top: 2px;">
									    <p style="display: flex; align-items: center;" style="margin-top:10px;"><?php echo $row['area_name']; ?></p>
									</div>
<style>
	.area-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px; /* Space between items */
}

.area-item img {
    width: 30px;
    height: 30px;
    margin-right: 10px; /* Space between image and text */
}

</style>
                                    <h1 class="news-title">
                                        <?php echo $row['service_title']; ?>
                                    </h1>

                                    <div class="meta">
                                        <div class="meta-left">
                                            <span class="date"><i class="fa fa-clock-o"></i><?php echo date("F j, Y", strtotime($row['created_at'])); ?></span>
                                            <div class="area-item" style="display: flex; align-items: center;">
											    <img src="data:image/png;base64,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" alt="marker--v1" style="width: 40px;height: 40px;margin-right: 3px;margin-top: 0px;">
											    <h4 class="news-title"><?php echo $row['service']; ?></h4><hr>
											</div>    
											
										<p><?php echo $row['service_discription']; ?></p>
										
										</div>
                                    </div>

                                    <div class="news-text">
                                        
                                        
                                    </div>
                            <?php
                                    }
                                } else {
                                    echo "<p>No data available</p>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar for Cities -->
            <div class="col-lg-4 col-12">
                <div class="main-sidebar">
                    <div class="single-widget category">
                        <h3 class="title">Cities</h3>
                        <ul class="categor-list">
                            <?php
                                // Assuming $conn is your database connection
                                $sql = "SHOW TABLES";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Fetch table name from the result
                                        $tableName = $row['Tables_in_cities'];

                                        // Query to fetch the area_name for each table
                                        $areaQuery = "SELECT DISTINCT area_name FROM `$tableName`";
                                        $areaResult = $conn->query($areaQuery);

                                        // Check if areas are available for the current table
                                        if ($areaResult->num_rows > 0) {

											
                                            echo "<li class='m-2'><a href='?table=" . urlencode($tableName) . "'>
       											 <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADoUlEQVR4nO2ab2hNYRzHP0P5kzQLS9NkLXshJV7wQivyZolSRpR/L7aMlT8JL3jByKK9EMrYWpkopZjixUr+lKIxpS0Km0LkT/7N8idXT33v7XH+3Ht379ndPbNffev5Pc9zzvl+7nnOc55zzoWhSBgzgM3ALoc2AdMJSSwHfgERH/0AyjJlJh/Y4fGLxtNKbftAhhuBWoea1XYzUyCH4vyi8ZRvgTR4gJyJAzIc2OqxzT5gSqogdTrgRaBN5bNAp8qngC6VjwJvVS5MY2jNibPNgXRBKoEmlY3ByyovBG6rPAvosECiF3u1x/AzE0CJzzFzgHUe22wDJqrPJKBGZ2o/kNffIP0VGx1nav1AgWwB6lPQCaAYGA2sla81wMiBABmX4gQSkQ4nMp0pkDz1eQeU90H12q4u20BeAMOAI8CFODoPzJOHrAUpSnI4NWY7SLHKT4FFuhFGgHvK9ylvGigQU9dq6WACkHa1zVd+TfnygQZx6k9YQRZrqWHUo7pQghRa+/j6P4H8AJ4Br5T3KH8TNpBEagoLSKfuKSus55QirZJDBTJorpH2IZDBfkZKgc8es0Y2zVoRS5/l2RV71OE78BHozRDIbx3vi/Kfyr95gPSq7bty49kVtWqsTnNozQTGS1Ez0bwooKFVrdx4dsVxx8N8UItGL6ULskH5MS+QqNnyNEFeaInhpa6AQMqtNldcUGNZALPWaA0jp2YHBFKm3Hh2xVU1lgYAcqcPQyuVJUqpcuPZFbfUONsBYl5VXlF5pw4U0YuydpVXAc8tkBq9ZnXqYZrTb528Rc+s8eyK+2oscYD0VYWaoeZ4aIEHSI8gH1v3hzZdU34gJcqNZ1c8UWOBA6TT8Qzup28WyIN+nrUKlBvPrnipxlyPaySZsK+RHT6wNwICyVVuPLvikxpHBABSoFc6Ti0LCGSEcuPZFb+0BCAAkEf9PLSQV+P5nxilju8DAqnweQV6yQOkSze4vRZYuXV8P5D3qjPeYzFBld0BgfiFvWicluQs2OAD0q064z0WU1XZkUGQHJ2FeN9ETupm6wUSPZ7xHosZqrwLjNXCsVV1zdpRIr1W/91x+mxTnw9J7rNSin4JbpW3sfIakfdYzFXldWB7ijfCTGq7vEbkPRYLVdkCTNaypDZLdUAeW+TZeI/FUlWeIzxxXp6X2JWrrW/nYYnT1oI1FhWqbMuCoVObpKJ/YqjwAgmjKmyQMUBVH/9Akw2q0tPo4Im/A2NTZ5BTAVoAAAAASUVORK5CYII=' alt='image' style='width: 25px; height: 25px; margin-right: 5px;'>
       											 " . htmlspecialchars($tableName) . " <i class='icofont-rounded-down'></i></a></li>";
                                            echo "<ul class='' id='tables-" . htmlspecialchars($tableName) . "'>";

                                            // Output each area name under the table
                                            while ($areaRow = $areaResult->fetch_assoc()) {
                                                echo "<li class='m-0'>" . htmlspecialchars($areaRow['area_name']) . "</a></li>";
                                            }

                                            echo "</ul></li>";
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
