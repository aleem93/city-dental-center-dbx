"use strict";
function validateContact() 
{
var apname=document.getElementById("apname").value;
var apemail=document.getElementById("apemail").value;
var aptel=document.getElementById("aptel").value;
var apdate=document.getElementById("apdate").value;
var apcomment=document.getElementById("apcomment").value;

if(apname=="" || apemail=="" || aptel=="" || apdate=="" || apcomment==""){
document.getElementById("ferror").innerHTML = "Please Fill all fields";
return false;
}
else{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(apemail))  
  {  
    return (true);
  }  
document.getElementById("ferror").innerHTML = "You have entered an invalid email address!";
    return (false);
}

}

function validateContact1() {



var apemail=document.getElementById("apemail").value;
var aptel=document.getElementById("aptel").value;
var apcomment=document.getElementById("apcomment").value;


var country_id=document.getElementById("country_id").value;
var checkb=document.getElementById("squaredOne").value;
var apfname = document.getElementById("apfname").value;
var aplname = document.getElementById("aplname").value;
var apdate = document.getElementById("apdate").value;
var apdob = document.getElementById("apdob").value;


if( apemail=="" || aptel=="" || apcomment=="" || country_id=="" || checkb.length<=3 || apfname=="" || aplname=="" || apdate=="" || apdob==""){
document.getElementById("ferror").innerHTML = "Please Fill all fields";
return false;
}
else{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(apemail))  
  {  
    return (true);
  }  
document.getElementById("ferror").innerHTML = "You have entered an invalid email address!";
    return (false);
}


}

function validateContactpage() 
{
var apname=document.getElementById("apname").value;
var apemail=document.getElementById("apemail").value;
var aptel=document.getElementById("aptel").value;
var apcomment=document.getElementById("apcomment").value;

if(apname=="" || apemail=="" || aptel=="" || apcomment==""){
document.getElementById("ferror").innerHTML = "Please Fill all fields";
return false;
}
else{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(apemail))  
  {  
    return (true);
  }  
document.getElementById("ferror").innerHTML = "You have entered an invalid email address!";
    return (false);
}

}

function validateuser()
{
         var fname = $("#fname").val().trim();
			if(fname==""){
				alert('Please Enter First Name');
				$("#fname").focus();
				return false;
			}
		 var lname = $("#lname").val().trim();
			if(lname==""){
				alert('Please Enter Last Name');
				$("#lname").focus();
				return false;
			}

         var doe = $("#doe").val().trim();
			if(doe==""){
				alert('Please Enter Date of Expiry');
				$("#doe").focus();
				return false;
			}

         
         var plan = $("#plan").val().trim();
			if(plan==""){
				alert('Please Enter Plan');
				$("#plan").focus();
				return false;
			}			
}

