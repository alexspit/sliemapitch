<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="edCb5rpZYeaEC6II7IoDvjJB5uGElmDekX53_Xc18vg" />
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <meta name = "format-detection" content = "telephone=no" />
    <meta name="description" content="<?php echo $desc;?>"> 
    <meta name="keywords" content="<?php echo $keywords;?>">
    <meta name="author" content="Alexander Spiteri">
    <link rel="author" href="https://plus.google.com/104631896111160610839"/> 
    
    
    
    <link rel="stylesheet" href="css/bootstrap.css" >
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/font-awesome.css">
    <link rel="stylesheet" href="css/camera.css">
    <link rel="stylesheet" href="css/touchTouch.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css">
    <link rel="stylesheet" href="css/animate.min.css">


    <!---------------------->
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/style2.css" />
    <!---------------------->
    
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script  src="js/touchTouch.jquery.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.mobilemenu.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
    <script src="js/jquery.equalheights.js"></script>
    <script src="js/jquery.datetimepicker.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/animatescroll.min.js"></script>
    <script src="js/jquery.sticky.js"></script>  
    <script src="js/myscript.js"></script>
    
    <script src='js/camera.js'></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
        <script src="js/jquery.mobile.customized.min.js"></script>
    <!--<![endif]-->
    
          <!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?2J8ekTMeAwUmVnlAanljKwcEKPCzOBCN';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->
    
      <script>	
        $(window).load( function(){	
            
           //camera
    	   jQuery('.camera_wrap').camera();	
           
                          
            // TouchTouch
            $('.thumb').touchTouch();   
           	 
        });
      </script>
    
      <!--[if lt IE 9]>
        <div style='text-align:center'><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div>  
      <![endif]-->
      <!--[if lt IE 9]><script src="../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    
      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
      

  
</head>

<body>
    <?php include_once("analyticstracking.php") ?>
<!--==============================header=================================-->


<header id="header">
    <div class="container">
        
        
        <!--==============================modal=================================-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"> Site Under Development</h4>
      </div>
      <div class="modal-body">
         
          
          <p style="text-align: left">This site is still in Beta phase, which means it is fully functional but not officially launched. Feel free to try it out and send us your <a href="contact.php">feedback</a>. <br/>Please note that even if the booking functionality works, we are currently not accepting reservations made through the website.</p>
              
        </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" data-dismiss="modal">Got it</button>
      </div>
    </div>
  </div>
</div>
<!--==============================modal=================================-->
        
        
        
        <h1 class="navbar-brand navbar-brand_"><a href="index.php"><img alt="Sliema Pitch Restaurant & Lounge" src="img/logo3.png"></a></h1> 
   
            
    
        <div class="menuheader">
            <nav class="navbar navbar-default navbar-static-top tm_navbar" role="navigation">
                <ul class="nav sf-menu">
                  <li<?php if($_SESSION["current_page"] == "index") echo ' class="active"'; ?>><a href="index.php">Home<span></span></a></li>
                  <li<?php if($_SESSION["current_page"] == "aboutus") echo ' class="active"'; ?>><a href="aboutus.php">About us<span></span></a></li>
                  <li<?php if($_SESSION["current_page"] == "menu") echo ' class="active"'; ?>><a href="menu.php">Menu<span></span></a></li>
                  <li<?php if($_SESSION["current_page"] == "contact") echo ' class="active"'; ?>><a href="contact.php">Contact Us<span><em class="indicator1"></em></span></a>
                      <ul>
                        <li><a id="scrollto_map" href="contact.php#map">Where to find us</a></li>
                        <li><a id="scrollto_getintouch" href="contact.php#getintouch">Send us a message</a></li>
                        <li><a id="scrollto_faqs" class="last" href="contact.php#faqs">FAQs</a></li>
                      </ul>
                  </li>
                  <li class="last<?php if($_SESSION["current_page"] == "reservations") echo ' active'; ?>">
                     <a href='reservations.php'>Reservations<span><em class="indicator1"></em></span></a>
                                        <ul>
                                            <li><a href="reservations.php#booking">Book a table</a></li>
                                            <li><a class="last" href="reservations.php#">Plan an event</a></li>
                                        </ul>
                            
                          <span></span>
                     </li>
                </ul>
            </nav>
        </div>
    </div>
</header>