<?php
include 'header.php';
$sql2 = "SELECT * FROM `blogs` WHERE is_enabled = 1 ORDER BY publish_date DESC;";
$que2 = mysqli_query($conn, $sql2);


// Check if the query was successful
if ($que2 === false) {
    echo "Error executing query: " . mysqli_error($conn);
    exit();
}
// Check the number of rows returned
$rowCount = mysqli_num_rows($que2);
?>
		

		
		
		<!-- Start Blog Area -->
<section class="blog section" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Keep up with Our Most Recent Medical News.</h2>
                    <img src="img/section-img.png" alt="#">
                </div>
            </div>
        </div>
        <div class="row">
            <?php if ($rowCount > 0): ?>
                <?php while ($row2 = mysqli_fetch_assoc($que2)): ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Blog -->
                        <div class="single-news">
                            <div class="news-head">
                                <?php $imgSrc = "upload/" . htmlspecialchars($row2['image']); ?>
                                <img src="<?= $imgSrc ?>" alt="blog image" class="img-fluid">
                            </div>
                            <div class="news-body">
                                <div class="news-content">
                                    <div class="date">Published on : <?= htmlspecialchars($row2['publish_date']) ?></div>
                                    <h2><a href="blog-single.html"><?= htmlspecialchars($row2['title']) ?></a></h2>
                                    <p class="text"><?= htmlspecialchars(substr($row2['content'], 0, 150)) ?>...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-lg-12">
                    <div class="alert alert-warning" role="alert">
                        No blogs found.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Blog Area -->



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
							<li class="day">Monday - Fridayp <span>8.00-20.00</span></li>
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





        </body>
        </html>