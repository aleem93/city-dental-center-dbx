<?php
if(isset($_REQUEST['action']) && ($_REQUEST['action']=='email_check') ){
    $conn = mysql_connect("aedubaicity.db.10691417.hostedresource.com","aedubaicity","City!#123@D%");
    $db = mysql_select_db("aedubaicity");
    $email = $_REQUEST['email'];
    $query = mysql_query("SELECT email FROM city_news_letter WHERE email='".$email."'");
    if(mysql_num_rows($query) > 0){
        echo 1;
    }
}

if(isset($_REQUEST['action']) && ($_REQUEST['action']=='insert_news') ){
    $conn = mysql_connect("aedubaicity.db.10691417.hostedresource.com","aedubaicity","City!#123@D%");
    $db = mysql_select_db("aedubaicity");
    //if(isset($_REQUEST['news_submit'])){
    include_once("../email.class.php");
        $emailid = $_REQUEST['email'];
        $emailid_encrypt = md5($_REQUEST['email']);
        $verifyCode = rand(10,100);
        $verifyCode_encrypt = md5($verifyCode);
        $sql = mysql_query("INSERT INTO city_news_letter (email,status,rand_no,encrypt_email,encrypt_rand)
    VALUES ('".$emailid."',0,'".$verifyCode."','".$emailid_encrypt."','".$verifyCode_encrypt."')");
        $email_obj1 = new Email();
        $email_obj1->mailaccount='vibescom';
        $email_obj1->to=$emailid;
        //$email_obj1->toname=$name;
        $email_obj1->from='shahbaz.khan@vibescom.in';
        $email_obj1->fromname="City_Dental_Centre";
        $email_obj1->subject ="City Dental Centre - Newsletter Subscription";
        $email_obj1->body.="<b>Dear </b>,<br/><br/> Thank You for NewsLetter Subscription.<br/>!<br/><br/>
                                                                                                                Please click below to verify your email now: <br/><br/>
                                                                                                                <a style='background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 16px;font-weight: 400 !important;padding: 5px 9px;'href='http://www.vibescom.in/client_project/clients_website_templates/2017/city-dental-center/verify-email.php?email=".$emailid_encrypt."&code=".$verifyCode_encrypt."'>Activate your Subscription</a><br/><br/>

            <br/>Kind Regards,<br/>City Dental<br/>(+064)-342-68383
";
        //print_r($email_obj1);
        $send=$email_obj1->sendemail();
    if($send == 1){
        echo 1;

    }
}



?>