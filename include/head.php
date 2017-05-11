<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/custom-variation2.css">
<link rel="stylesheet" type="text/css" href="css/style.css"> 
<link rel="stylesheet" type="text/css" href="css/responsive.css"> 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,800,900,400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lora:400,400italic' rel='stylesheet' type='text/css'>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-72504485-1', 'auto');
	  ga('send', 'pageview');
</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>


<script src="https://www.google.com/recaptcha/api.js?onload=myCallBack1&render=explicit" async defer></script>
<script>
    var recaptchaCont;
    var recaptchaEnq1;
    var myCallBack1 = function()
    {
        //Render the recaptchaMail on the element with ID "recaptchaMail"
        if( $('div[id="recaptchaCont"]').length )
        {
            recaptchaCont = grecaptcha.render('recaptchaCont', {
              'sitekey' : '6LfeSh0UAAAAAP9AxTZFAy0yS0A1QlhRQHNyrbBd' //Replace this with your Site key
            });
        }
        //alert($('div[id="recaptchaEnq"]').length );
        //Render the recaptchaDelete on the element with ID "recaptchaDelete"
        if( $('div[id="recaptchaEnq1"]').length )
        {
            recaptchaEnq1 = grecaptcha.render('recaptchaEnq1', {
              'sitekey' : '6LfeSh0UAAAAAP9AxTZFAy0yS0A1QlhRQHNyrbBd' //Replace this with your Site key
            });
        }
    };
</script>