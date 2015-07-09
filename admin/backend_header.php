<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
include '../data_class/reservation.php';
include '../data_class/menu_category.php';
include '../data_class/menu_item.php';

$reservation = new reservation();


    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
    <meta name = "format-detection" content = "telephone=no" />
    <meta name="description" content="<?php echo $desc;?>"> 
    <meta name="keywords" content="<?php echo $keywords;?>">
    <meta name="author" content="Alexander Spiteri">
    <link rel="author" href="https://plus.google.com/104631896111160610839"/> 
    
    
    
    <link rel="stylesheet" href="../css/bootstrap.css" >
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/font-awesome.css">
    <link rel="stylesheet" href="../css/camera.css">
    <link rel="stylesheet" href="../css/touchTouch.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    

    <!---------------------->
    <link rel="stylesheet" type="text/css" href="../css/common.css" />
    <link rel="stylesheet" type="text/css" href="../css/style2.css" />
    <!---------------------->
    
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-migrate-1.2.1.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/jquery.sortable.js"></script>
    <script  src="../js/touchTouch.jquery.js"></script>
    <script src="../js/superfish.js"></script>
    <script src="../js/jquery.mobilemenu.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/jquery.ui.totop.js"></script>
    <script src="../js/jquery.touchSwipe.min.js"></script>
    <script src="../js/jquery.equalheights.js"></script>
    <script src="../js/jquery.datetimepicker.js"></script>
    <script src="../js/jquery.cookie.js"></script>
    <script src="../js/jquery.autosize.min.js"></script>
    <script src="../js/animatescroll.min.js"></script>

    
      <script src="../js/myscript.js"></script>
    
    <script src='../js/camera.js'></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
        <script src="../js/jquery.mobile.customized.min.js"></script>
    <!--<![endif]-->
    
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
    <?php include_once("../analyticstracking.php") ?>
<!--==============================header=================================-->


<header id="header">
    <div class="container">
        
        
    
        
        
        <h1 class="navbar-brand navbar-brand_"><a href="index.php"><img alt="Sliema Pitch Restaurant & Lounge" src="../img/logo3.png"></a></h1> 
        <div class="menuheader">
            <nav class="navbar navbar-default navbar-static-top tm_navbar" role="navigation">
                <ul class="nav sf-menu">
                  <li><a href="../index.php">Main Site<span></span></a></li>
                  <li<?php if($_SESSION["current_page"] == "menu") echo ' class="active"'; ?>><a href="manage_menu.php">Menu<span><em class="indicator1"></em></span></a>
                      <ul>
                        <li><a id="scrollto_additem" href="manage_menu.php#showmenuitems" data-toggle="modal" data-target="#addmenumodal">Add Menu Item</a></li>
                        <li><a id="scrollto_managecategory" href="manage_menu.php#showmenuitems" data-toggle="modal" data-target="#menucategorymodal">Manage Categories</a></li>
                      </ul>
                  </li>
                  <li<?php if($_SESSION["current_page"] == "review") echo ' class="active"'; ?>><a href="logged.php">Reservations <p class="badge"><?php if(isset($_SESSION["loggedin"])){ if($reservation->getPendingReservations()>0){echo $reservation->getPendingReservations();}}?></p><span></span></a>
                  </li>               
                  <li class="last<?php if($_SESSION["current_page"] == "login") echo ' active'; ?>">
                      
                          <?php 
                          if(isset($_SESSION["loggedin"]))
                           {
                          ?>
                      <a href='logout.php'>Logout<span></span></a>
                                       
                            <?php    
                            }
                             else
                            { echo "<a href='login.php#login'>Login<span></span></a>"; }
                            ?>
                          <span></span>
                     </li>
                </ul>
            </nav>
        </div>
    </div>
</header>