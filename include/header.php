<?php
$currentFile = basename($_SERVER['PHP_SELF']);
$parts = Explode('.', $currentFile);
$file = $parts[0];
	
?>	

<!-- PRELOADER -->
<div id="loader">
      <div id="status"></div>
   </div>
<!-- END / PRELOADER -->
<header>
	<div class="container-fluid">
		<div class="row" style="margin:0;">
				<div class="col-sm-12 top-strip col-xs-12">			

					<h2 class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> <span> B-156 Sector 36 Noida-201301 , <span class="break">20 Km From IGI Airport, New Delhi, INDIA</span></span></h2>
					<h2 class="phonecall"><i class="fa fa-phone" aria-hidden="true"></i> <span>+91-9654440140 </span></h2>
					<h2 class="delt-bord"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:dranuragahuja@gmail.com">dranuragahuja@gmail.com</a></h2>
					<ul class="header_top_social">
						<li class="facebook"><a href="https://www.facebook.com/CityDentalCentreIndia" target="_blank" title="Follow City Dental Center On Facebook"><span><i class="fa fa-facebook"></i><i class="fa fa-facebook bg_icon"></i></span></a></li>		
						<li class="twitter"><a href="https://twitter.com/citydentlcentre" target="_blank" title="Follow City Dental Center On Twitter"><span><i class="fa fa-twitter"></i><i class="fa fa-twitter bg_icon"></i></span></a></li>		
						<li class="google"><a href="https://plus.google.com/u/0/105921290895326156547" target="_blank" title="Follow City Dental Center On Google-Plus"><span><i class="fa fa-google-plus"></i><i class="fa fa-google-plus bg_icon"></i></span></a></li>
						<li class="linkedin"><a href="https://in.linkedin.com/in/dr-anurag-ahuja-682791b9" target="_blank" title="Follow City Dental Center On Linkedin"><span><i class="fa fa-linkedin"></i><i class="fa fa-linkedin bg_icon"></i></span></a></li>		
					</ul>
				</div><!-- /.col-sm-12 -->
		</div>
	</div>

	<div class="container-fluid">
		<div class="row" style="margin: 0;">
		
				<div class="col-sm-12 bottom-strip p-both">
					<div class="col-sm-3 logo col-xs-4">
						<a href="index.php"><img src="images/logo.png" alt="Logo" height=" " width=" " /></a>
					</div><!-- /.col-sm-3 -->
					<div class="col-sm-9 navigation col-xs-8">
						<nav class="navbar navbar-default">
							<div class="container-fluid">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>

								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<ul class="nav navbar-nav pull-right-1">
										<li class="<?php if($file=='index' || $file==''){ echo 'active'; } ?>">
											<a href="index.php">Home</a></li>
											<li class="<?php if($file=='dental-tourism'){ echo 'active'; } ?>"><a href="dental-tourism.php" class="p-r">Dental Tourism</a></li>
											<li class="<?php if($file=='dental-courses'){ echo 'active'; } ?>"><a href="dental-courses.php" class="p-r">Dental Courses</a></li>
											<li class="<?php if($file=='about-doctor'){ echo 'active'; } ?>"><a href="about-doctor.php">About The Doctor</a></li>
											<li class="<?php if($file=='contact'){ echo 'active'; } ?>"><a href="contact.php">Contact us</a></li>


									<!-- <?php  if($_SESSION['member_id']=='') { ?>
									<li><a href="javascript:void(0)" data-target="#member-logn" data-toggle="modal" class="lst-head"> <i class="fa fa-lock"></i>Member Login</a></li>
									<?php } else { 
										$get_userdetail = mysql_fetch_array(mysql_query("select *,DATE_FORMAT(expiry_date,'%d %M %Y') as  expirydate from cd_member where member_id='".$_SESSION['member_id']."'"));	
									 ?>
									<li><a href="member-plan.php"  class="lst-head"> <i class="fa fa-user"></i> <?php echo $get_userdetail['username'];?></a></li>
									<?php } ?> -->
								</ul>
							</div><!-- /.navbar-collapse -->
						</div><!-- /.container-fluid -->
					</nav>
				</div><!-- /.col-sm-9 -->
			</div><!-- /.col-sm-12 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</header><!-- #header --> 
<div id="oral-health-registration" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Registration For Oral Health Day</h4>
			</div>
			<div class="modal-body">
				<form class="form-group" action="" method="post">
					<div class="form-group">
						<input type="text" placeholder="Name *" name="name" id="re_name" class="form-control"  />
					</div>
					<div class="form-group">
						<input type="text" placeholder="Email ID" name="email" id="re_email" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" placeholder="Mobile *" name="mobile" id="re_mobile" class="form-control" maxlength="13" />
					</div>
					<fieldset>
						<div class="form-group">
							<div class="input-group date form_date" data-link-format="yyyy-mm-dd" data-link-field="dtp_input2" data-date-format="dd MM yyyy" data-date="">
								<input id="re_date" name="apdate" type="text"  value="" class="form-control" placeholder="Appointment date*">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</span>
							</div>
							<input id="dtp_input2" type="hidden" value="">
						</div>
					</fieldset>
					<div class="form-group">
						<textarea rows="2" placeholder="Message." class="form-control-2" name="message" id="re_message" style="resize: none; font-size:14px;"></textarea>
					</div>
					<div class="g-recaptcha" data-sitekey="6LeBxhkUAAAAAD4StT3qxJK1sFmaYPBedNrdyTtt" style="transform:scale(1.22);transform-origin:0 0;"></div><br>
					<button type="submit" name="registration" class="btn btn-success pull-right" onclick="return validateRegistrationOralHealth();"><i class="fa fa-paper-plane-o"></i> Send </button>
				</form>
				<div class="clearfix"></div>
			</div>
			<div class="modal-footer">
				<!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
			</div>
		</div>
	</div>
</div>
<!-- Oral health Registration Form End -->

 