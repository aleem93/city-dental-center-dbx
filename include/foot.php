<div id="member-logn" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Member Login</h4>
			</div>
			<div class="modal-body">
				<form class="form-group" action="" method="post">
					<div class="form-group">
						<input type="text" placeholder="User ID" name="user_id" id="user_id" class="form-control" required />
					</div>
					<div class="form-group">
						<input type="password" placeholder="Password" name="password" id="password" class="form-control" />
					</div>
					<button type="submit" name="Sign_in" class="btn btn-success pull-right"> Sign in </button>
				</form>
				<?php if(isset($_POST['Sign_in']))
				{
					$name = $_POST['user_id'];
					$pass = $_POST['password'];
					//echo "select * from  cd_member where name='".$name."' and password='".$pass."' and status = '1'";
					$query = mysql_query("select * from  cd_member where username='".$name."' and password='".$pass."' and status = '1'");
					$erroMSG='';
					if(mysql_num_rows($query)>0)
					{
						$result = mysql_fetch_array($query);
						$_SESSION['member_id']=$result['member_id'];
						echo "<script>window.location='member-plan.php'</script>";
					}else
					{
						echo"<script>alert('Invalid Login Details.');</script>";
					}
				} ?>
				<div class="clearfix"></div>
			</div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
            </div>
        </div>
    </div>
</div>

<div id="member-appointment" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Schedule Your Appointment</h4>
            </div>
            <div class="modal-body">
                <form class="form-group" action="" method="post" id="contactus">
					<div class="form-group">
						<input type="text" placeholder="Name *" name="name" id="ap_name" class="form-control"  />
					</div>
					<div class="form-group">
						<input type="text" placeholder="Email ID *" name="email" id="ap_email" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" placeholder="Mobile *" name="mobile" id="ap_mobile" class="form-control"  />
					</div>
			
					<fieldset>
						<div class="form-group">
							<div class="input-group date form_date" data-link-format="yyyy-mm-dd" data-link-field="dtp_input2" data-date-format="dd MM yyyy" data-date="">
								<input id="ap_date" name="apdate" type="text"  value="" class="form-control" placeholder="Appointment date*">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</span>
							</div>
							<input id="dtp_input2" type="hidden" value="">
						</div>
					</fieldset>
					
					<div class="form-group">
						<textarea rows="2" placeholder="Message." class="form-control-2" name="message" id="ap_message" style="resize: none; font-size:14px;"></textarea>
					</div>
					<div id="myCallBackEnq4"></div>
					<!--<div class="g-recaptcha" data-sitekey="6LeBxhkUAAAAAD4StT3qxJK1sFmaYPBedNrdyTtt" style="transform:scale(1.22);transform-origin:0 0;"></div>--><br>
					<button type="submit" name="appointment" class="btn btn-success pull-right" onclick="return validateappointement();"><i class="fa fa-paper-plane-o"></i> Send </button>
				</form>
				<div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
            </div>
        </div>
    </div>
</div>

<!--<script src="js/vendor/jquery-min.js"></script>-->
	<script type="text/javascript" src="js/validation.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/vendor/modernizr.custom.68477.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/vendor/jquery.bxslider.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	
	<script type="text/javascript">
		$('#owl-1').owlCarousel({
			items: 1,
			animateOut: 'fadeOut',
			loop:true,
			autoplay:true,
			//autoplayTimeout:1000,
			autoplayHoverPause:true,
			nav: true,
			navText: ["<i class='fa fa-chevron-left'></i>" , "<i class='fa fa-chevron-right'></i>"],
			singleItem : true,
			dots: false
			
		});
	</script>
	<script type="text/javascript">
		"use strict";
		$('.form_date').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
			startDate: new Date(), 
        });
    </script>
	
	<script>
		$(window).load(function(){
			$(".services-heading.clik_fn").click(function(){
				//alert("hello");
				if($(".accordian1").is(":visible") == true){
					$(".accordian1").slideUp("slow");
				}else{
					$(".accordian1").slideDown("slow");
				}
				//return false;
			});
		
			if($(window).width() < 768){
				$(".accordian1").slideUp("slow");
				$("ul.sub_menu").slideUp("slow");
			}else{
				$(".accordian1").slideDown("slow");
				$("ul.sub_menu").slideDown("slow");
			}
		});
		
		$(window).resize(function(){
			if($(window).width() < 768){
				$(".accordian1").slideUp("slow");
				$("ul.sub_menu").slideUp("slow");
			}else{
				$(".accordian1").slideDown("slow");
				$("ul.sub_menu").slideDown("slow");
			}
		});
		
		$(window).load(function(){
			$(".services_submenu > a.small").click(function(){
				//alert("hello");
				$("ul.sub_menu").slideUp("slow");
				if($(this).next("ul.sub_menu").is(":visible") == false ){
					$(this).siblings("ul.sub_menu").slideDown("slow");
					//alert("hello");
				}
				//$("ul.sub_menu").slideToggle("slow");	
				//$("ul.sub_menu").css("max-height" , "480px");	
			});

			if ($('#back-to-top').length) {
				var scrollTrigger = 100, // px
				backToTop = function () {
					var scrollTop = $(window).scrollTop();
					if (scrollTop > scrollTrigger) {
						$('#back-to-top').addClass('show');
					} else {
						$('#back-to-top').removeClass('show');
					}
				};
				backToTop();
				$(window).on('scroll', function () {
					backToTop();
				});
				$('#back-to-top').on('click', function (e) {
					e.preventDefault();
					$('html,body').animate({
						scrollTop: 0
					}, 700);
				});
			}
		});	
		
		function validateappointement()
		{
			var full_name = $("#ap_name").val().trim();
			if(full_name==""){
				alert('Please Enter Name');
				$("#ap_name").focus();
				return false;
			}
			var iChars = "~`!@#$%^&*()+=-\_[]1234567890\\\';,./{}|\":<>?";
            for (var i = 0; i < $("#ap_name").val().length; i++)
            {
                if (iChars.indexOf($("#ap_name").val().charAt(i)) != -1)
                {
                    alert ("Please Enter Name without special characters or numeric values.");
                    $("#ap_name").focus();
                    return false;
                }
            }
			var email = $("#ap_email").val().trim();
			if(email=="")
			{
				alert('Please Enter Email id');
				$("#ap_email").focus();
				return false;
			}
			if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email)))
			{
				alert("Please Enter valid Email id");
				$("#ap_email").focus();
				return false;
			} 
			var contact = $("#ap_mobile").val().trim();		
 	        if(contact=="")
			{
				alert("Please Enter Contact number");
				$("#ap_mobile").focus();
				return false;	
			}
			if (!(/^[1-9]{1}[0-9]{9,15}$/.test($('#ap_mobile').val().trim())))
			{
				alert("Please Enter Valid Contact number");
				$("#ap_mobile").focus();
				return false;
			}
			var apdate= $("#ap_date").val().trim();
			if(apdate=="")
			{
				alert('Please Enter appointment date');
				$("#ap_date").focus();
				return false;
			}
			var message = $("#ap_message").val().trim();
			if(message=="")
			{
				alert('Please Enter Message');
				$("#ap_message").focus();
				return false;
			}
			var v = grecaptcha.getResponse(recaptchaCont);
			if(v.length == 0)
			{
				alert("Please enter the recaptcha.");
				return false;
			}
		}
		
		function validateRegistrationOralHealth()
		{
			var full_name = $("#re_name").val().trim();
			if(full_name=="")
			{
				alert('Please Enter Name');
				$("#re_name").focus();
				return false;
			}
			var iChars = "~`!@#$%^&*()+=-\_[]1234567890\\\';,./{}|\":<>?";
            for (var i = 0; i < $("#re_name").val().length; i++)
            {
                if (iChars.indexOf($("#re_name").val().charAt(i)) != -1)
                {
                    alert ("Please Enter Name without special characters or numeric values.");
                    $("#re_name").focus();
                    return false;
                }
            }
			
			var contact = $("#re_mobile").val().trim();		
 	        if(contact=="")
			{
				alert("Please Enter Contact number");
				$("#re_mobile").focus();
				return false;	
			}
			if (!(/^[1-9]{1}[0-9]{9,15}$/.test($('#re_mobile').val().trim())))
			{
				alert("Please Enter Valid Contact number");
				$("#re_mobile").focus();
				return false;
			}
			var apdate= $("#re_date").val().trim();
			if(apdate=="")
			{
				alert('Please Enter appointment date');
				$("#re_date").focus();
				return false;
			}
			
		}	
	</script>
	<script>
       $(window).load(function() {
         $("#status").fadeOut("slow"); 
         $("#loader").delay(400).fadeOut(); 
       });
    </script>
    <script>
			$(document).ready(function(){
				$(".open1").click(function(){
			     $(".main1").animate({
			        bottom:'0',
			       });
			        $(".close1").show();
			        $(this).hide();
			    });
			     	$(".close1").click(function(){
			       	$(".main1").animate({
			        bottom:'-460px',
			       });
				    $(".open1").show();

				    $(this).hide();
				    });
			     
			 });
		</script>