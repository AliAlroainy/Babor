@include('Front.include.header')

	<!-- Breadcrumbs -->
	<div class="breadcrumbs" dir="rtl">
		<div class="container">
		<h4> تواصل معنا </h4>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section" dir="rtl">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									<h4>تواصل</h4>
									<h3>اكتب لنا رسالة</h3>
								</div>
								<form class="form" method="post" action="mail/mail.php">
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>اسمك<span>*</span></label>
												<input name="name" type="text" placeholder=" علي عبده" required>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>عنوان رسالتك<span>*</span></label>
												<input name="subject" type="text" placeholder="" required>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>عنوان ايميلك<span>*</span></label>
												<input name="email" type="email" placeholder=" " required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>رقم تلفونك<span>*</span></label>
												<input name="company_name" type="text" placeholder=" 777 777 777" required>
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group message">
												<label> محتوى رسالتك<span>*</span></label>
												<textarea name="message" placeholder="اكتب هنا ..." required></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn btn-light ">ارسال الرسالة </button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12 "  >
							<div class="single-head" >
								<div class="single-info  text-end"  >
									<i class="fa fa-phone"></i>
									<h4 class="title">اتصل بنا:</h4>
									<ul >
										<li>+123 456-789-1120</li>
										<li>+522 672-452-1120</li>
									</ul>
								</div>
								<div class="single-info text-end">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">عنوان بريدنا:</h4>
									<ul>
										<li><a href="mailto:info@babor.com">info@babor.com</a></li>
										<li><a href="mailto:info@babor.com">support@babor.com</a></li>
									</ul>
								</div>
								<div class="single-info text-end">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title">موقعنا:</h4>
									<ul>
										<li>المسبح , تعز - اليمن </li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->
	
	<!-- Map Section -->
	<div class="map-section">
		<div id="myMap"></div>
	</div>
	<!--/ End Map Section -->
	

@include('Front.include.footer')