<?php
 $currentFile = basename($_SERVER['PHP_SELF']);
 $parts = Explode('.', $currentFile);
 $file = $parts[0];
?>	
	<div class="hire-menu">
		<a href="javascript:void(0)" data-target="#member-appointment" data-toggle="modal">Schedule Your Appointment</a>
	</div>
	<ul class="social_icon">
		<li class="facebook"><a href="https://www.facebook.com/CityDentalCentreIndia" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<li class="tw"><a href="https://twitter.com/citydentlcentre" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<li class="gplus"><a href="https://plus.google.com/u/0/105921290895326156547" target="_blank"><i class="fa fa-google-plus"></i></a></li>
		<li class="lin"><a href="https://in.linkedin.com/in/dr-anurag-ahuja-682791b9" target="_blank"><i class="fa fa-linkedin"></i></a></li>
	</ul>
	
	<header>
    	<div class="container">
			<div class="row">
				<div class="col-sm-12 top-strip col-xs-12">
				   
					<h2 class="delt-bord">Email : <a href="mailto:dranuragahuja@gmail.com">dranuragahuja@gmail.com</a></h2>
					<!--<h2 class="delt-bord">Email : <a href="mailto:dranuragahuja@gmail.com">dranuragahuja@gmail.com</a></h2>-->
					<h2>Call :<span> +91-9654440140 </span></h2>
				</div><!-- /.col-sm-12 -->
				<div class="col-sm-12 bottom-strip p-both">
					<div class="col-sm-3 logo col-xs-4">
						<a href="index.php"><h1><img src="images/logo.png" alt="Logo" height="" width="" /></h1></a>
					</div><!-- /.col-sm-3 -->
					<div class="col-sm-9 navigation col-xs-8">
						<nav class="navbar navbar-default">
						  <div class="container-fluid">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
							  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
							</div>
						
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							  <ul class="nav navbar-nav pull-right-1">
								<li class="<?php if($file=='index'){ echo 'active'; } ?>">
								  <a href="index.php">Home</a></li>
								<li class="<?php if($file=='about'){ echo 'active'; } ?> serv_nav services_submenu services_submenu-1">
									<a href="about.php" class="drop big">About Us</a>
									<a href="javascript:void(0);" class="drop small" > about Us </a>
								
									<ul class="sub_menu about">
										<li ><a href="about.php" class="small">About Us</a></li> 
										<li ><a href="cdc-edge.php">CDC EDGE</a></li> 
									</ul>
								
								
								</li>
								<li class="<?php if($file=='services'){ echo 'active'; }  ?> serv_nav services_submenu services_submenu-1">
									<a href="services.php" class="drop big">services</a>
									<a href="javascript:void(0);" class="drop small" >services</a>
								
									<ul class="sub_menu">
										<li ><a href="dental-implants.php">Dental Implants</a></li> 
										<li><a href="dental-fillings.php">Dental Fillings</a></li>
										<li><a href="rct.php">Root Canal Treatment</a></li>
										<li><a href="crowns-bridges.php"  class="active">Crowns and Bridges</a></li>  
										<li><a href="oral-surgery.php">Oral Surgery</a></li>
										<li><a href="teeth-scaling.php">Teeth Scaling</a></li>
										<li><a href="cosmetic.php">Cosmetic Dentistry</a></li>
										<li><a href="pediatric-dentistry.php">Pediatric Dentistry</a></li>
										<li><a href="dental-tourism.php">Dental Tourism</a></li>
										<li><a href="complete-denture.php">Complete dentures</a></li>
										<li><a href="dental-braces.php">Dental Braces</a></li>
										<li><a href="gum-treatment.php">Gums Treatment</a></li>
									</ul>
								
								</li>
								<li class="<?php if($file=='membership'){ echo 'active'; } ?>"><a href="membership.php">Membership</a></li>
								<li class="<?php if($file=='gallery'){ echo 'active'; } ?>"><a href="gallery.php">Gallery</a></li>
								<li class="<?php if($file=='achievements'){ echo 'active'; } ?>"><a href="achievements.php">Achievements</a></li>
								<li class="<?php if($file=='contact-us'){ echo 'active'; } ?>"><a href="contact-us.php" class="p-r">contact us</a></li>
								
								<li><a href="javascript:void(0)" data-target="#member-logn" data-toggle="modal" class="lst-head"> <i class="fa fa-lock"></i>Member Login</a></li>
								
								</ul>
							</div><!-- /.navbar-collapse -->
						  </div><!-- /.container-fluid -->
						</nav>
					</div><!-- /.col-sm-9 -->
				</div><!-- /.col-sm-12 -->
			</div><!-- /.row -->
        </div><!-- /.container -->
    </header><!-- #header --> 
	