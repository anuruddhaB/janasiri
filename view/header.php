<?php
include('../class/class_Common.php');
session_start();
if (isset($_SESSION['usercusname'])) {
    $loginUsername = $_SESSION['usercusname'];
} else {
    $loginUsername = "Not Logged In";
}
?>
<html lang="en">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/fav.png">
        <!-- Author Meta -->
        <meta name="author" content="codepixer">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>Janasiri Motor Station</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="css/linearicons.css">

        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/nice-select.css">	
        <link rel="stylesheet" href="css/hexagons.min.css">							
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/modal-theme.css">		
        <link rel="stylesheet" href="toastr/toastr.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>	
        <header id="header" id="home">
            <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li> 
                            <li><a href="services.php">Service</a></li>
                            <li><a href="reservation.php">Reservation</a></li>						          
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a id="profUsername" href="myaccount.php"><?php echo $loginUsername ?></a></li>
                        </ul>
                    </nav><!-- #nav-menu-container -->		    		
                </div>
            </div>
        </header><!-- #header -->
