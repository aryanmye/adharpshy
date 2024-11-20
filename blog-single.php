<?php
include 'header.php';

if (isset($_GET['title'])) {
    $blid = $_GET['title'];
    $sql9 = "SELECT * FROM `blogs` WHERE title='$blid';";
    $res9 = mysqli_query($conn, $sql9);
    $row9 = mysqli_fetch_assoc($res9);

    if (!$row9) {
        // If no row is found, handle the error or display a message
        echo "<p>Blog not found.</p>";
        // Optionally redirect the user to the home page or another page
        // header("Location: index.php");
        // exit();
    }
} else {
    // If 'title' is not set in the URL, handle the error
    echo "<p>No blog title specified.</p>";
    // Optionally redirect the user to the home page
    // header("Location: index.php");
    // exit();
}
?>
		
		<!-- Breadcrumbs -->
		<div class="breadcrumbs overlay">
		
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2><?= ucfirst($row9['title']) ?></h2>
							<ul class="bread-list">
								<li><a href="index.html">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active"><?= ucfirst($row9['title']) ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Single News -->
		<section class="news-single section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-12">
						<div class="row">
							<div class="col-12">
								<div class="single-main">
									<!-- News Head -->
									<div class="news-head">
									<?php $imgSrc = "uploado/" . htmlspecialchars($row9['image']); ?>
									<img src="<?= $imgSrc ?>" alt="blog image" class="img-fluid">
									</div>
									<!-- News Title -->
									<h1 class="news-title"><?= ucfirst($row9['title']) ?></h1>
									<!-- Meta -->
									<div class="meta">
										<div class="meta-left">
											<span class="author"><a href="#"><img src="img/author1.jpg" alt="#"><?= ucfirst($row9['author']) ?></a></span>
											<span class="date"><i class="fa fa-clock-o"></i><?= ucfirst($row9['publish_date']) ?></span>
										</div>
										
									</div>
									<!-- News Text -->
									<div class="news-text">
										<p><?= ucfirst($row9['content']) ?></p>
										
										
										
										
									</div>
									<div class="blog-bottom">
										<!-- Social Share -->
										<ul class="social-share">
										<button class="btn btn-share" onclick="shareOnWhatsApp()">Share On Whatsapp</button>
										</ul>
										<!-- Next Prev -->
										
										<!--/ End Next Prev -->
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="blog-comments">
									<h2>All Comments</h2>
									<div class="comments-body">
									<?php
								$sql2 = "SELECT * FROM `customer_comment` ORDER BY publish_date DESC;";
								$que2 = mysqli_query($conn, $sql2);
								$rowCount = mysqli_num_rows($que2)
								?>
									<?php if ($rowCount > 0): ?>
										<?php while ($row2 = mysqli_fetch_assoc($que2)): ?>
										<div class="single-comments">
											<div class="main">
												<div class="head">
													<img src="img/rb_53919.png" alt="#"/>
												</div>
												<div class="body">
													<h4><?= htmlspecialchars($row2['firstname']) ?> <?= htmlspecialchars($row2['lastname']) ?></h4>
													<div class="comment-meta"><span class="meta"><i class="fa fa-calendar"></i><?= htmlspecialchars($row2['publish_date']) ?></span><span class="meta"><i class="fa fa-clock-o"></i><?= htmlspecialchars($row2['publish_time']) ?></span></div>
													<p><?= htmlspecialchars($row2['message']) ?></p>
													
												</div>
											</div>
										</div>		
										<?php endwhile; ?>
										<?php endif;?>
									
																					
									</div>
								</div>
							</div>
							
							<div class="col-12">
								<div class="comments-form">
									<h2>Leave Comments</h2>
									<!-- Contact Form -->
									<form class="form" method="post" action="submit_comment.php">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-12">
												<div class="form-group">
													<i class="fa fa-user"></i>
													<input type="text" name="firstname" placeholder="First name" required="required">
												</div>
											</div>
											<div class="col-lg-4 col-md-4 col-12">
												<div class="form-group">
													<i class="fa fa-envelope"></i>
													<input type="text" name="lastname" placeholder="Last name" required="required">
												</div>
											</div>
											<div class="col-lg-4 col-md-4 col-12">
												<div class="form-group">
													<i class="fa fa-envelope"></i>
													<input type="email" name="email" placeholder="Your Email" required="required">
												</div>
											</div>
											<div class="col-12">
												<div class="form-group message">
													<i class="fa fa-pencil"></i>
													<textarea name="message" rows="7" placeholder="Type Your Message Here" ></textarea>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group button">	
													<button type="submit" class="btn primary"><i class="fa fa-send"></i>Submit Comment</button>
												</div>
											</div>
										</div>
									</form>
									<!--/ End Contact Form -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="main-sidebar">
							<!-- Single Widget -->
						
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<div class="single-widget recent-post">
								<?php
								$sql2 = "SELECT * FROM `blogs` WHERE is_enabled = 1 ORDER BY publish_date DESC;";
								$que2 = mysqli_query($conn, $sql2);
								$rowCount = mysqli_num_rows($que2)
								?>
							
								<h3 class="title">Recent post</h3>
								<?php if ($rowCount > 0): ?>
									<?php while ($row2 = mysqli_fetch_assoc($que2)): ?>
								<!-- Single Post -->
								<div class="single-post">
									<div class="image">
									<?php $imgSrc = "uploado/" . htmlspecialchars($row2['image']); ?>
									<img src="<?= $imgSrc ?>" alt="blog image" class="img-fluid">
									</div>
									<div class="content">
										<h5><a href="#"><?= htmlspecialchars($row2['title']) ?></a></h5>
										<ul class="comment">
											<li><i class="fa fa-calendar" aria-hidden="true"><?= htmlspecialchars($row2['publish_date']) ?></i></li>
											<li><i class="fa fa-commenting-o" aria-hidden="true"></i><?= htmlspecialchars($row2['author']) ?></li>
										</ul>
									</div>
								</div>
								<?php endwhile; ?>
								<?php endif; ?>
								<!-- End Single Post -->
								<!-- Single Post -->
								
								<!-- End Single Post -->
								<!-- Single Post -->
								
								<!-- End Single Post -->
							</div>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							
							<!--/ End Single Widget -->
						</div>
					</div>
				</div>
			</div>
		
		</section>
		<!--/ End Single News -->
		
		<!-- Footer Area -->
		<?php 
		include 'footer.php';
		?>
		<!--/ End Footer Area -->
		<script>
    function shareOnWhatsApp() {
        // Get the current page URL
        var currentUrl = window.location.href;

        // Create a WhatsApp share link
        var whatsappLink = 'whatsapp://send?text=' + encodeURIComponent('Check out this blog from AdharPsych: ' + currentUrl + '\n');

        // Open the WhatsApp app
        window.location.href = whatsappLink;
    }
</script>
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