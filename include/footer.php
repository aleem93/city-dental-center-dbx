<style>
/*.g-recaptcha div{ width:100% !important;}*/
.g-recaptcha {transform:scale(0.87);transform-origin:0 0;}
/*.g-recaptcha iframe{ width:100% !important;}*/
.open1 {
    position: absolute;
    left: 0;
    top: auto;
    bottom: 100%;
}
.main1 {
    width: 300px; 
    position: fixed;
    z-index: 999;
    left: 0px;
}
.close1 {
    position: absolute;
    left: 0;
    top: auto;
    bottom: 100%;
}
.special1 {
    background-color: rgba(0, 0, 0, 0.7);
    position: relative;
    padding: 10px 15px;
    height: 460px;

}
.special1 form{position: relative;}
.mar-bot {
    margin-bottom: 5px;
}
.color-wr {
    color: #fff;
}
.marg_t35{margin-top:45px;}
.color-wr.errmsg{color: #ffff05; position: absolute; line-height: 20px;}
.btn-dangers {
    background-color: rgba(0, 0, 0, .02);
    border-color: #D1CFCF;
    color: #454545;
}
.panel_btn {
    margin-top: 10px;
}
.input-sm {
    height: 30px;
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}
.enquire {
    display: block;
    background-color: #3a752a;
    width: 180px;
    color: #fff;
    text-align: center;
    height: 30px;
    text-transform: uppercase;
    font-size: 17px;
    font-weight: bold;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
}
.enquire:hover{background-color: #3a752a;color: #fff;}
.scaptach{margin-top: 5px;}
</style>
<?php

$conn = mysql_connect("aedubaicity.db.10691417.hostedresource.com","aedubaicity","City!#123@D%");
$db = mysql_select_db("aedubaicity");
define('SITE_URL','http://www.vibescom.in/client_project/clients_website_templates/2017/city-dental-center/');
include_once("email.class.php");
if(isset($_POST['contact2'])){
    $name = $_POST['name3'];
    $phone = $_POST['phone3'];
    $emailid = $_POST['email3'];
    $mess = $_POST['message3'];



    $body ='';
    $body .="<b>"."Dear Admin</b>, "."<br/><br/>"."Please find below query received from Enquire Now section of your website.<br />(http://www.vibescom.in/client_project/clients_website_templates/2017/city-dental-center/index.php)<br/><br/>".
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
                <td width='35%' style='padding: 3px 3px 3px 3px;'>Mobile No. </td>
                <td style='padding: 3px 3px 3px 3px;'>".$phone."</td>
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
        $email_obj1->subject ="City Dental Center - Message Received";
        $email_obj1->body.="<b>Dear ".ucwords($name)."</b>,<br/><br/> Thank You For Contacting Us.<br/>
            <br/>
            <br/>Kind Regards,<br/>City Dental Cental<br/>+91-9654440140";
        //print_r($email_obj1);die;
        $send1=$email_obj1->sendemail();
        echo "<script>window.location.href='thanks.php'</script>";
    }
}

#######################FOR NEWSLETTER SUBSCRIPTIPN SUBMIT######################################
if(isset($_POST['news_submit'])){
    
    
    $emailid = $_POST['news_letter'];
    $verifyCode = rand(10,100);
    $verifyCode_encrypt = md5($verifyCode);
    $sql = mysql_query("INSERT INTO city_news_letter (email,status,rand_no,encrypt_email,encrypt_rand)
   VALUES ('".$emailid."',0,'".$verifyCode."','".$emailid_encrypt."','".$verifyCode_encrypt."')");
   $csv=  $emailid."\n";
   $csv_handler = fopen ('newsletter.csv','a');
   fwrite ($csv_handler,$csv);
   fclose ($csv_handler);
    //email send to admin////////////////
    $email_obj1 = new Email();
    $email_obj1->mailaccount='vibescom';
    $email_obj1->to=$emailid;//admin
    $email_obj1->toname='user';
    $email_obj1->from="dranuragahuja@gmail.com";
    $email_obj1->fromname="City Dental Centre";
    $email_obj1->subject ="City Dental Centre - Newsletter Subscription";
    $email_obj1->body.="<b>Dear Admin</b>,<br/>Email id. ".$emailid." is added to newsletter subscription list. <a href='".SITE_URL."newsletter.csv'></a><br/>
        <br/><br/>City Dental.";
		
    $send1=$email_obj1->sendemail();
    



    $email_obj2 = new Email();
    $email_obj2->mailaccount='vibescom';
    $email_obj2->to="dranuragahuja@gmail.com";
    //$email_obj1->toname=$name;
    $email_obj2->from=$emailid;
    $email_obj2->fromname="City Dental Centre";
    $email_obj2->subject ="City Dental Centre - Newsletter Subscription";
    $email_obj2->body.="<b>Dear user</b>,<br/><br/> Thank You for NewsLetter Subscription.
            <br/><br/>Regards,<br/>City Dental";

    $send2=$email_obj2->sendemail();
    //data insert in csv file
    
         echo "<script>window.location.href='thanks.php'</script>";
    }
?>

<footer class="footer p82-topbot">
	<div class="container">
		<div class="row">
			<div class="col-sm-7 col-md-4 col-lg-4 all-need">
				<h2>Address</h2>
				<!-- <p><b>Contact Person :- </b> Dr. Anurag Ahuja</p>-->
				<div class="faddress">
                    <span><b>Address (Clinic 1) :-  </b></span> F-12, First Floor, DDA Shopping Centre, Opp. Jeevan Anmol Hospital,<br/> Mayur Vihar Phase 1, New Delhi, Delhi 110091<br>
					<span><b>Address (Clinic 2) :-  </b></span> D - 183 (Opposite Prateek Fedora Apartments), Near Sai Mandir, Sector - 61, Noida<br>
					<span><b>Address (Clinic 3) :-  </b></span> Shop No. A2/19, 1st Floor, Main Market Opposite Kendriya Vihar - 2, Sector - 110, Noida.<br>
					<span><b>Address (Clinic 4) :-  </b></span> B-156 Sector 36 Noida-201301 (Near Noida City Centre Metro Station)<br/>
                    <span><b>Address (Clinic 5) :-  </b></span> Shop No. 9,10, Crossing Plaza Market, Crossing Republic, Ghaziabad.
				</div>
			</div><!-- col-sm-3 -->
			<div class="col-sm-5 col-md-2 col-lg-2 all-need list-styles">
				<h2>Quick Links</h2>
				<ul>
					<li><a href="index.php"> Home </a></li>
					<li><a href="javascript:void(0);"> About Doctor</a></li>
					<li><a href="javascript:void(0);">Dental Tourism</a></li>
					<li><a href="javascript:void(0);">Dental Courses</a></li>
					<li><a href="contact.php">Contact us</a></li>
				</ul>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-6 all-need list-styles">
				<div class="row">
					<form action="" method="post">
						<div class="col-sm-6 col-md-6 col-lg-6 all-need list-styles">
							<h2>Newsletter</h2>
							<div class="news-letter">
                                <p class="color-wr errmsg" id="alertmsg2"></p>
                                <form method="post" action="">
                                    <input type="text" placeholder="Enter Email Address*" name="news_letter" id="news_email"  />
                                    <button type="submit" name="news_submit" id="submit_email" class="send-btn"><i class="fa fa-envelope"></i> Send </button>
                                </form>


                                <a href="example.csv" download>download not open it</a>
							</div>
						</div>

						<div class="col-sm-6 col-md-6 col-lg-6 all-need list-styles">
							<h2 class="">Quick Contact</h2>
							<div class="news-letter quickcontact">
								<ul>
									<li>
										<div class="info-title"><span class="fa fa-phone"></span> Call Us</div>
										<p class="info">+91-9654440140</p>
									</li>
									<li>
										<div class="info-title"><span class="fa fa-clock-o"></span> Opening Hours</div>
										<p class="info">9:00 am - 9:00 pm (AST)</p>
									</li>
									<li>
										<div class="info-title"><span class="fa fa-at"></span> Write Us</div>
										<p class="info"><a href="mailto:dranuragahuja@gmail.com">dranuragahuja@gmail.com</a></p>
									</li>
								</ul>
							</div>
							
						</div><!-- col-sm-3 -->
					</form>
				</div><!-- row -->
			</div><!-- col-sm-6 -->
		</div><!-- ./row -->
	</div><!-- /.container -->   
</footer>
<div class="copyrights">
	<ul class="social_icon_footer">
		<li class="facebook"><a href="https://www.facebook.com/CityDentalCentreIndia" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<li class="tw"><a href="https://twitter.com/citydentlcentre" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<li class="gplus"><a href="https://plus.google.com/u/0/105921290895326156547" target="_blank"><i class="fa fa-google-plus"></i></a></li>
		<li class="lin"><a href="https://in.linkedin.com/in/dr-anurag-ahuja-682791b9" target="_blank"><i class="fa fa-linkedin"></i></a></li>
	</ul>
	
	<p class="copy">Copyright &copy; City Dental Centre All Rights Reserved</p>
	<p class="power">Powered by: <a href="http://www.vibescom.in" target="_blank">Vibes Communications Pvt. Ltd.</a></p>
</div>
<!-- /.copy-rights -->
<a href="#" id="back-to-top" title="Back to top">&uarr;</a> 

<div class="col-md-4">
	<div class="main1" style="bottom: -460px;">
		<div>
			<a href="javascript:void(0)" class="open1 enquire" style="display: block;">
				<!-- <img src="images/email.png" alt="email" height=" " width=" "> -->
				
				Enquire Now!
			</a>
			<a href="javascript:void(0)" class="close1 enquire" style="display: none;">
				<!-- <img src="images/email.png" alt="email" height=" " width=" "> -->

				Enquire Now!
			</a>
		</div>
		<div class="special1">
			<form action="" name="contact_form3" method="post">
				<!-- <h2 class="color-wr">Enquiry Form</h2> -->
				<p class="color-wr">We are happy to help you! Share your details to get in with us.</p>
                <p class="color-wr errmsg" id="alertmsg1"></p>
				<input name="name3" id="name3" class="input-sm form-control mar-bot marg_t35" placeholder="Name*" type="text">
				<input name="phone3" id="phone3" class="input-sm form-control mar-bot" maxlength="13" placeholder="Phone*" type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
				<input name="email3" id="email3" class="input-sm form-control mar-bot" placeholder="Email*" type="text">
				<textarea type="text" name="message3" id="message3" value="" class="input-sm form-control" placeholder="Write Message*"></textarea>
               <div class="scaptach">
                <div id="recaptchaEnq1" style="transform:scale(0.89);transform-origin:0 0;"></div>
                </div>
				<input type="submit" id="contact_submit2" value="Submit" class="btn btn-dangers btn-sm panel_btn pull-right" name="contact2" style="color:#fff;">
			</form>
		</div>
	</div>
    <script>
        $(document).ready(function(){
            $("#contact_submit2").click(function(){

                if($("#name3").val() == ''){
                    $("#alertmsg1").html("Please enter Your Name");
                    $("#name3").focus();
                    return false;
                }
                if($("#name3").val().length > 30){
                    $("#alertmsg1").html("Please enter Name in less than 30 characters.");
                    $("#name3").focus();
                    return false;
                }
                if($("#name3").val().length < 3){
                    $("#alertmsg1").html("Please enter Name in greater than 3 characters.");
                    $("#name3").focus();
                    return false;
                }
                if($("#phone3").val()== ''){
                    $("#alertmsg1").html('Please enter Mobile No.');
                    $("#phone3").focus();
                    return false;
                }
                if($("#phone3").val().length > 14){
                    $("#alertmsg1").html('Please enter Mobile No. in less than 14 digits.');
                    $("#phone3").focus();
                    return false;
                }
                if($("#phone3").val().length < 10){
                    $("#alertmsg1").html('Please enter Mobile No. in  greater than 10 digits.');
                    $("#phone3").focus();
                    return false;
                }
                if($("#email3").val() == ''){
                    $("#alertmsg1").html("Please Enter Your Email");
                    $("#email3").focus();
                    return false;
                }

                var emailval = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
                if(!emailval.test($("#email3").val())){
                    $("#alertmsg1").html("Invalid Email ID. Please enter the correct Email ID.");
                    $("#email3").focus();
                    return false;
                }

                if($("#message3").val() == ''){
                    $("#alertmsg1").html('Please enter Your Message.');
                    $("#message3").focus();
                    return false;
                }
                if( $('div[id="recaptchaEnq1"]').length )
                {
                    var v = grecaptcha.getResponse(recaptchaEnq1);
                    if(v.length == 0)
                    {
                        $('#alertmsg1').html('To proceed, check the ReCaptcha box.');
                        return false;
                    }
                }
            })

            $('#name3').keypress(function (key) {
                if ((key.charCode < 97 || key.charCode > 122)
                    && (key.charCode < 65 || key.charCode > 90) &&
                    (key.charCode != 45) && (key.charCode != 32) && (key.charCode != 0)  )
                    return false;
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#submit_email").click(function(e){
                e.preventDefault();
                var email = $("submit_email");
                if($("#news_email").val() == ''){
                    $("#alertmsg2").html("Please Enter Your Email");
                    $("#news_email").focus();
                    return false;
                }

                var emailval = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
                if(!emailval.test($("#news_email").val())){
                    $("#alertmsg2").html("Invalid Email ID. Please enter the correct Email ID.");
                    $("#news_email").focus();
                    return false;
                }
                else{
                    var email = $("#news_email").val();
                    $.ajax({
                        type:"POST",
                        url:"include/exist-email.php?action=email_check",
                        data:{
                            email:email
                        },
                        success: function(data){
                            if(data == 1){
                                $("#alertmsg2").html("Email already exist, Please choose another Email.");
                                return false;
                            }
                            else{
                                $.ajax({
                                    type:"POST",
                                    url:"include/exist-email.php?action=insert_news",
                                    data:{
                                        email:email
                                    },
                                    success: function(data){
                                        if(data == 1){
                                            window.location.href='thanks.php';
                                        }
                                    }
                                })
                            }
                        }
                    })
                }



            });
           

        });

    </script>
