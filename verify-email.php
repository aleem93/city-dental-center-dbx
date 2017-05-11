<?php

if(!isset($_REQUEST['email']) && !isset($_REQUEST['code'])){
    echo "<script>window.location.href='index.php'</script>";
}
else{

    $conn = mysql_connect("aedubaicity.db.10691417.hostedresource.com","aedubaicity","City!#123@D%") or die(mysql_error());
    $db = mysql_select_db("aedubaicity") or die(mysql_error());
    $getEmail = $_REQUEST['email'];
    $rand = $_REQUEST['code'];
    $query = mysql_query("SELECT * FROM city_news_letter WHERE encrypt_email='".$getEmail."'AND encrypt_rand='".$rand."'")
    or die(mysql_error());
    $row = mysql_fetch_array($query);


    //$dbcode = $row['password_reset'];
    //print_r($row);
    $dbmail = $row['encrypt_email'];
    $rand = $_REQUEST['code'];

    $usr_pass_code = $row['encrypt_rand'];
    //die();
    $usr_pass_code = $row['encrypt_rand'];
    if($getEmail == $dbmail && $rand == $usr_pass_code){
        mysql_query("UPDATE city_news_letter SET status=1 WHERE email='".$row['email']."'");
        mysql_query("UPDATE city_news_letter SET
        encrypt_email=0,
        encrypt_rand = 0
         WHERE email='".$row['email']."'");
        echo "<script>alert('Your Email has been verified');window.location.href='index.php';</script>";
    }
    else{
        echo "<script>alert('Invalid Link');window.location.href='index.php';</script>";
    }
}
?>
