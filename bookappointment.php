<!doctype html>
<html class="no-js" lang="zxx">
    <head>

	<!-- header and css files are included -->
	<?php include("header.php"); ?>
		

		<!-- Start Appointment -->
		<section class="appointment">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title" id="appointment">
							<h2>We Are Always Ready to Help You. Book An Appointment</h2>
							<img src="img/section-img.png" alt="#">
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12 col-12">
						<form class="form" method="post" action="appointment.php">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<input name="name" id="name" type="text" placeholder="Name" required>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<input name="email" id="email" type="email" placeholder="Email" required>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<input name="phone" id="phone" type="text" placeholder="Phone" required>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<select id="department" name="department" class="form-control" required>
											<option value="" selected disabled>Department</option>
											<option value="Substance / Drugs Addiction">Substance / Drugs Addiction</option>
											<option value="Neurology">Neurology</option>
											<option value="Behavioural Therapy">Behavioural Therapy</option>
											<option value="Psychological Disorders">Psychological Disorders</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<select id="doctor" name="doctor" class="form-control" required>
											<option value="" selected disabled>Doctor</option>
											<option value="Dr. x">Dr. x</option>
											<option value="Dr. y">Dr. y</option>
											<option value="Dr. z">Dr. z</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<input type="date" id="date" name="date" placeholder="Date" required>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<input type="time" id="time" name="time" placeholder="Time" required>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-12">
									<div class="form-group">
										<textarea name="message" id="message" placeholder="Write Your Message Here....." required></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-5 col-md-4 col-12">
									<div class="form-group">
										<div class="button">
											<button type="submit" class="btn">Book An Appointment</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						
					</div>
					<div class="col-lg-6 col-md-12 ">
						<div class="appointment-image">
							<img src="img/contact-img.png" alt="#">
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Appointment -->



	<!-- footer and js files are included -->
	<?php include("footer.php"); ?>
	

    </body>
</html>