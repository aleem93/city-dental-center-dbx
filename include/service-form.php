<div class="department-section">
	<div class="container">   
		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
			<div class="row services_category_form">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
					<!--<h3 class="services_heading col-xs-12">Get Full Details on Dental Implants</h3>-->
					<h2 class="title-grp"><span>Get</span>Full Details</h2>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 small_pad_0">
					<form class="form-group" action="" method="post" onsubmit="return validateservice_conatct();">
						<div class="form-group col-xs-6 col_xs_6">
							<input type="text" placeholder="Contact Person Name*" name="name" id="conatct_name" class="form-control"  />
						</div>
						<div class="form-group col-xs-6 col_xs_6">
							<input type="text" placeholder="Company Name*" name="company" id="company_name" class="form-control" />
						</div>
						<div class="form-group col-xs-6 col_xs_6">
							<input type="text" placeholder="Email*" name="email" id="contact_email" class="form-control"  />
						</div>
						<div class="form-group col-xs-6 col_xs_6">
							<input type="text" placeholder="Address*" name="address" id="contact_address" class="form-control"  />
						</div>
						<div class="form-group col-xs-6 col_xs_6">
							<input type="text" placeholder="Contact No.*" name="mobile" id="contact_no" class="form-control" />
						</div>
						<div class="form-group col-xs-6 col_xs_6">
							<select  class="form-control-1" name="state" id="state">
								<option value="">---Choose State---</option>
								<option value="Andaman Nicobar">Andaman Nicobar</option>
								<option value="Andhra Pradesh">Andhra Pradesh</option>
								<option value="Assam">Assam</option>
								<option value="Bihar">Bihar</option>
								<option value="Chandigarh">Chandigarh</option>
								<option value="Chennai">Chennai</option>
								<option value="Chhattisgarh">Chhattisgarh</option>
								<option value="Delhi">Delhi</option>
								<option value="Goa">Goa</option>
								<option value="Gujarat">Gujarat</option>
								<option value="Haryana">Haryana</option>
								<option value="Himachal Pradesh">Himachal Pradesh</option>
								<option value="Jammu & Kashmir">Jammu & Kashmir</option>
								<option value="Jharkhand">Jharkhand</option>
								<option value="Karnataka">Karnataka</option>
								<option value="Kerala">Kerala</option>
								<option value="Kolkata">Kolkata</option>
								<option value="Madhya Pradesh">Madhya Pradesh</option>
								<option value="Maharashtra">Maharashtra</option>
								<option value="Mumbai">Mumbai</option>
								<option value="National">National</option>
								<option value="North East ">North East </option>
								<option value="Orissa">Orissa</option>
								<option value="Punjab">Punjab</option>
								<option value="Rajasthan">Rajasthan</option>
								<option value="Tamilnadu">Tamilnadu</option>
								<option value="Uttar Pradesh">Uttar Pradesh</option>
								<option value="Uttar Pradesh(E)">Uttar Pradesh(E)</option>
								<option value="Uttar Pradesh(W)">Uttar Pradesh(W)</option>
								<option value="West Bengal">West Bengal</option>
							</select>
						</div>
						<div class="form-group col-xs-12">
							<textarea rows="4" placeholder="Please share details of your requirement." class="form-control-2" name="req_detail" id="req_detail" style="resize: none; font-size:14px;"></textarea>
							<input type="hidden" name="service" value="<?php echo $service;?>">
						</div>
						<div class="col-md-12">
						<div class="g-recaptcha" data-sitekey="6LeBxhkUAAAAAD4StT3qxJK1sFmaYPBedNrdyTtt"></div>
						</div>
						<div class="form-group col-xs-12 news-letter button send-btn">
							<button type="submit" name="service_contact" id="mc-embedded-subscribe" class="send-btn"><i class="fa fa-paper-plane-o" ></i> Send </button>
							<button type="reset" name="subscribe" id="mc-embedded-subscribe" class="can-btn pull-right mar_r10"><i class="fa fa-repeat"></i> Reset </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function validateservice_conatct()
	{
		var full_name = $("#conatct_name").val().trim();
		if(full_name=="")
		{
			alert('Please Enter Contact Person Name');
			$("#conatct_name").focus();
			return false;
		}
		var iChars = "~`!@#$%^&*()+=-\_[]1234567890\\\';,./{}|\":<>?";
		for (var i = 0; i < $("#conatct_name").val().length; i++)
		{
			if (iChars.indexOf($("#conatct_name").val().charAt(i)) != -1)
			{
				alert ("Please Enter Contact Person Name without special characters or numeric values.");
				$("#conatct_name").focus();
				return false;
			}
		}
		var company_name = $("#company_name").val().trim();
		if(company_name=="")
		{
			alert('Please Enter Company Name');
			$("#company_name").focus();
			return false;
		}
		var email = $("#contact_email").val().trim();
		if(email=="")
		{
			alert('Please Enter Email id');
			$("#contact_email").focus();
			return false;
		}
		if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email)))
		{
			alert("Please Enter valid Email id");
			$("#contact_email").focus();
			return false;
		}
		var contact_address = $("#contact_address").val().trim();
		if(contact_address=="")
		{
			alert('Please Enter Contact address');
			$("#contact_address").focus();
			return false;
		}
		var contact = $("#contact_no").val().trim();
		if(contact=="")
		{
			alert("Please Enter Contact number");
			$("#contact_no").focus();
			return false;
		}
		if (!(/^[1-9]{1}[0-9]{9,15}$/.test($('#contact_no').val().trim())))
		{
			alert("Please Enter Valid Contact number");
			$("#contact_no").focus();
			return false;
		}
		var state = $("#state").val().trim();
		if(state=="")
		{
			alert('Please Enter state');
			$("#state").focus();
			return false;
		}
		var req_detail = $("#req_detail").val().trim();
		if(req_detail=="")
		{
			alert('Please share details of your requirement');
			$("#req_detail").focus();
			return false;
		}
	}
</script>