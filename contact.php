
<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"><!--<![endif]-->
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Medical Theams">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Dental Care Services in Noida, Ghaziabad | City Dental Centre</title>
	<link rel="shortcut icon" href="images/fav-ico/favicon.ico" />

	<?php require("include/head.php"); ?>

    <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
    <?php

    if(isset($_POST['submit-form'])){
        $name = $_POST['username'];
        $emailid = $_POST['email'];
        $phone = $_POST['phone1'];
        $subject = $_POST['subject'];
        $mess = $_POST['message'];
        //echo "<script>alert('Hello');</script>";
        include_once("email.class.php");
        $body ='';
        $body .="<b>"."Dear Admin</b>, "."<br/><br/>"."Please find below query received from Contact Us section of your website.<br />(http://www.vibescom.in/client_project/clients_website_templates/2017/city-dental-center/contact.php)<br/><br/>".
            "<table width='50%' style='padding:0 0 10px 5px; border-collapse:collapse; background-color:#E6E6E6;' valign='top' border='1' cellsapacing='0' cellpadding='0'>
            <tr>
                <td width='35%' style='padding: 3px 3px 3px 3px;'>Name</td>
                <td style='padding: 3px 3px 3px 3px;'>".ucfirst($name)."</td>
            </tr>
            <tr>
                <td width='35%' style='padding: 3px 3px 3px 3px;'>Email ID</td>
                <td style='padding: 3px 3px 3px 3px;'>".$emailid."</td>
            </tr>
            <tr>
                <td width='35%' style='padding: 3px 3px 3px 3px;'>Phone Number</td>
                <td style='padding: 3px 3px 3px 3px;'>".$phone."</td>
            </tr>
            <tr>
                <td width='35%' style='padding: 3px 3px 3px 3px;'>Subject </td>
                <td style='padding: 3px 3px 3px 3px;'>".$subject."</td>
            </tr>
            <tr>
                <td width='35%' style='padding: 3px 3px 3px 3px;'>Message</td>
                <td style='padding: 3px 3px 3px 3px;'>".$mess."</td>
            </tr>";
        $body .="</table>"."<br/><br/>"."Thanks.<br/><br/>";

        $email_obj = new Email();
        $email_obj->mailaccount='vibescom';
        $email_obj->to= 'dranuragahuja@gmail.com';
        //$email_obj->bcc= BCC;
        //$email_obj->toname= SUPPORTNAME;
        $email_obj->from= $emailid;
        $email_obj->fromname= $name;
        $email_obj->subject ="Enquiry Now – You have got a new message.(City Dental)";
        $email_obj->body.=$body;
        //print_r($email_obj);
        $send=$email_obj->sendemail();
        //print_r($send);
        //die();
        if($send==1)
        {
            $email_obj1 = new Email();
            $email_obj1->mailaccount='vibescom';
            $email_obj1->to=$emailid;
            $email_obj1->toname=$name;
            $email_obj1->from='dranuragahuja@gmail.com';
            $email_obj1->fromname='City-Dental-Centre';
            $email_obj1->subject ="City Dental Centre - Thank for your Enquiry";
            $email_obj1->body.="<b>Dear ".ucwords($name)."</b>,<br/><br/> Thank You For Contacting Us.<br/>
            <br/>
            <br/>Kind Regards,<br/>City Dental Cental<br/>+91-9654440140";
            //print_r($email_obj1);die;
            $send1=$email_obj1->sendemail();
            echo "<script>window.location.href='thanks.php'</script>";
        }
    }
    ?>
	<style>
	/***
	====================================================================
	Contact Us Section style
	====================================================================

	***/
	.contact-section{position:relative;padding:90px 0 50px;color:#888}
	.contact-section .column{position:relative;margin-bottom:40px}
	.contact-section .sec-title{margin-bottom:30px;text-align:left}
	.contact-section .info-box{position:relative;margin-bottom:30px}
	.contact-section .info-box h3{position:relative;font-size:16px;font-weight:800;color:#1c1c1c;margin-bottom:15px}
	.contact-section .info-box li{position:relative;padding-left:30px}
	.contact-section .info-box li .icon{position:absolute;left:0;top:4px;font-size:16px}
	.contact-section .info-box .social-links a{position:relative;display:inline-block;margin-right:10px;font-size:20px;border:1px solid #c8d9e0;color:#c8d9e0;width:40px;height:40px;line-height:38px;text-align:center;border-radius:3px}
	.contact-section .info-box .social-links a:hover{color:#2db0e6}
	.contact-section .form-box{position:relative;padding:20px;background:#f3f3f3;border:1px solid #ccc;border-radius:5px;-webkit-border-radius:5px;-ms-border-radius:5px;-o-border-radius:5px;-moz-border-radius:5px}
	.contact-section .form-box .form-group{position:relative;margin-bottom:20px}
	.contact-section .form-box .field-label{position:relative;font-size:14px;font-weight:600;margin-bottom:5px;color:#000}
	.contact-section .form-box input[type=text],.contact-section .form-box input[type=email],.contact-section .form-box input[type=number],.contact-section .form-box input[type=tel],.contact-section .form-box input[type=password],.contact-section .form-box select,.contact-section .form-box textarea{position:relative;display:block;width:100%;background:#fff;color:#1c1c1c;line-height:24px;padding:7px 15px;border:1px solid #ccc;transition:all .5s ease;-webkit-transition:all .5s ease;-ms-transition:all .5s ease;-o-transition:all .5s ease;-moz-transition:all .5s ease}
	.contact-section .form-box input[type=text]:focus,.contact-section .form-box input[type=email]:focus,.contact-section .form-box input[type=number]:focus,.contact-section .form-box input[type=tel]:focus,.contact-section .form-box input[type=password]:focus,.contact-section .form-box select:focus,.contact-section .form-box textarea:focus{background:#fff;border-color:#00a3c8}
	.contact-section .form-box input[type=text].error,.contact-section .form-box input[type=email].error,.contact-section .form-box input[type=number].error,.contact-section .form-box input[type=tel].error,.contact-section .form-box input[type=password].error,.contact-section .form-box select.error,.contact-section .form-box textarea.error{background:#e0a99e;color:#fff;border-color:red}
	.normal-btn,.normal-btn:hover{background:rgba(43, 151, 26, 0.8);color:#fff!important}
	.contact-section .form-box label.error{display:none!important}
	.contact-section .form-box textarea{height:140px;resize:none}
	.contact-section .form-box button{border-radius:25px;-webkit-border-radius:25px;-ms-border-radius:25px;-o-border-radius:25px;-moz-border-radius:25px;padding:8px 30px}
	.normal-btn{position:relative;padding:9px 25px;line-height:24px;text-transform:uppercase;font-size:14px;border:2px solid #fff!important;font-family:Raleway,sans-serif;font-weight:700;border-radius:20px;-webkit-border-radius:20px;-ms-border-radius:20px;-o-border-radius:20px;-moz-border-radius:20px;transition:all .3s ease;-moz-transition:all .3s ease;-webkit-transition:all .3s ease;-ms-transition:all .3s ease;-o-transition:all .3s ease}
	.normal-btn .fa{padding-right:5px}
	.normal-btn:hover{border-color:#1a1a1a!important}
	.info-box ul{list-style:none}
	.contact-section .sec-title h2,.contact-section .sec-title h3{text-transform:capitalize}
	.sec-title h3{position:relative;text-transform:uppercase;font-size:15px;font-weight:800;color:#646d72;margin-bottom:0}
	.sec-title .line{position:relative;width:40px;height:6px;background:#ccc;margin:20px auto 0;border-radius:3px;-webkit-border-radius:3px;-ms-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px}
	.contact-section .sec-title .line{margin:20px 0 0;background:#dfdfdf}

	</style>
</head>

<body class="in-align">
	<div class="outer-sync var2">
		<!-- Banner of page -->
		<?php require("include/header.php"); ?>		
		<div class="inner-banner">
			<img src="images/Contact.jpg" alt="City Dental Centre" width=" "  height=" " />
			<div class="practo">
				<practo:abs_widget widget="18c77c1012cd214a"></practo:abs_widget><script src="https://www.practo.com/bundles/practopractoapp/js/abs_widget_helper.js"></script> 
			</div>
			<div class="container">
				<div class="row">
					<h2 class="page-tag">Contact us</h2>
				</div>
			</div>
		</div> 

		<div class="first-section p82-topbot">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 about">



						<div class="contact-section" id="contact-section">

							<div class="auto-container">
								<div class="row clearfix">

									<!--Content Side-->
									<div class="col-md-8 col-sm-7 col-xs-12 column pull-right">
										<div class="sec-title">
											<h3>Drop us a line</h3>
											<h2>We are happy to help you! Share your details to get in touch with us.</h2>
											<div class="line"></div>
										</div>
										<div class="form-box">
											<form action="" name="contact_form" method="post">
												<div class="row clearfix">
                                                    <div id="alertmsg" style="color: #ff0a0a;"></div>
													<div class="form-group col-md-6 col-sm-12 col-xs-12">
														<div class="field-label">Your Name *</div>
														<input name="username" id="name1" placeholder="" type="text">
													</div>
													<div class="form-group col-md-6 col-sm-12 col-xs-12">
														<div class="field-label">Your Email *</div>
														<input name="email" id="email1" placeholder="" type="email">
													</div>
                                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
														<div class="field-label">Your Phone *</div>
                                                        <input name="phone1" id="phone1" maxlength="13" type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off">
													</div>
													<div class="form-group col-md-6 col-sm-12 col-xs-12">
														<div class="field-label">Subject *</div>
														<input name="subject" id="subject1" placeholder="" type="text">
													</div>
													<div class="form-group col-md-12 col-sm-12 col-xs-12">
														<div class="field-label">Message *</div>
														<textarea name="message" id="message1" placeholder=""></textarea>
													</div>
                                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 contactcaptcha">
                                                        <div id="recaptchaCont"></div>
                                                    </div>
													<div class="form-group col-md-12 col-sm-12 col-xs-12 text-right">
														<button class="normal-btn theme-btn" type="submit" id="contact_submit" name="submit-form" >SEND US</button>
													</div>
												</div>
											</form>
										</div>

									</div>

									<!--Left Side-->
									<div class="col-md-4 col-sm-5 col-xs-12 column pull-left">
										<div class="sec-title">
											<h3>Contact Info.</h3>
											<h2>Connect with us</h2>
											<div class="line"></div>
										</div>

										<div class="info-box">
											<h3>Information</h3>

											<ul>
												<li><span class="icon fa fa-phone"></span><p>+91-9654440140</p><!-- <p>(+064)-342-68383</p> --></li>
												<li><span class="icon fa fa-envelope"></span><p><a href="mailto:dranuragahuja@gmail.com">dranuragahuja@gmail.com</a></p></li>
											</ul>
											<br>

											<h3>Connect With Us</h3>
											<div class="social-links">
												<a href="https://www.facebook.com/CityDentalCentreIndia" target="_blank"><span class="fa fa-facebook-f"></span></a>
												<a href="https://twitter.com/citydentlcentre" target="_blank"><span class="fa fa-twitter"></span></a>
												<a href="https://plus.google.com/u/0/105921290895326156547" target="_blank"><span class="fa fa-google-plus"></span></a>
												<a href="https://in.linkedin.com/in/dr-anurag-ahuja-682791b9" target="_blank"><span class="fa fa-linkedin"></span></a>
											</div>
										</div>

									</div>

								</div>
							</div>
							<div>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid mapsec">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mapsecwrapper">
				<section class="map-section">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.0685024899412!2d77.36817731452217!3d28.597721692407617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce57bd7d89727%3A0xb3e1de077e5fe15b!2sCity+Dental+Centre!5e0!3m2!1sen!2sin!4v1493041990078" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</section>
			</div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mapsecwrapper beta">
                <section class="map-section">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3503.892387290706!2d77.354274!3d28.572994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5bc28ef1da1%3A0x385543ffaf7bf9b5!2sB-156%2C+Service+Rd%2C+B+Block%2C+Sector+36%2C+Noida%2C+Uttar+Pradesh+201301%2C+India!5e0!3m2!1sen!2sin!4v1494417718809" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </section>

            </div>
		</div>

		<?php require("include/footer.php"); ?>             
	</div>
    <script>
        $(document).ready(function(){
            $("#contact_submit").click(function(){

                if($("#name1").val() == ''){
                    $("#alertmsg").html("Please enter Your Name");
                    $("#name1").focus();
                    return false;
                }
                if($("#name1").val().length > 30){
                    $("#alertmsg").html("Please enter Name in less than 30 characters.");
                    $("#name1").focus();
                    return false;
                }
                if($("#name1").val().length < 3){
                    $("#alertmsg").html("Please enter Name in greater than 3 characters.");
                    $("#name1").focus();
                    return false;
                }
                /*var alphanumers = /^[a-zA-Z]+$/;
                if(!alphanumers.test($("#name1").val())){
                    $("#alertmsg").html("Please enter Name without special characters or numeric values.");
                    $("#name1").focus();
                    return false;
                }*/
                if($("#email1").val() == ''){
                    $("#alertmsg").html("Please Enter Your Email");
                    $("#email1").focus();
                    return false;
                }
                var emailval = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
                if(!emailval.test($("#email1").val())){
                    $("#alertmsg").html("Invalid Email ID. Please enter the correct Email ID.");
                    $("#email1").focus();
                    return false;
                }
                if($("#phone1").val()== ''){
                    $("#alertmsg").html('Please enter Mobile No.');
                    $("#phone3").focus();
                    return false;
                }
                if($("#phone1").val().length > 14){
                    $("#alertmsg").html('Please enter Mobile No. in less than 14 digits.');
                    $("#phone3").focus();
                    return false;
                }
                if($("#phone1").val().length < 10){
                    $("#alertmsg").html('Please enter Mobile No. in  greater than 10 digits.');
                    $("#phone3").focus();
                    return false;
                }
                if($("#subject1").val() == ''){
                    $("#alertmsg").html('Please enter Your Subject.');
                    $("#subject1").focus();
                    return false;
                }
                if($("#message1").val() == ''){
                    $("#alertmsg").html('Please enter Your Message.');
                    $("#message1").focus();
                    return false;
                }
                if( $('div[id="recaptchaCont"]').length )
                {   
                    var v = grecaptcha.getResponse(recaptchaCont);
                    if(v.length == 0)
                    {
                        $("#alertmsg").html("To proceed, check the ReCaptcha box.");
                        return false;
                    }
                }
            })

            $('#name1').keypress(function (key) {
                if ((key.charCode < 97 || key.charCode > 122)
                    && (key.charCode < 65 || key.charCode > 90) &&
                    (key.charCode != 45) && (key.charCode != 32) && (key.charCode != 0)  )
                    return false;
            });
        });

    </script>
	<?php require ("include/foot.php"); ?>
