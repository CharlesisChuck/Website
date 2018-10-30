<?php

//database initialization
include("scripts/database-access.php");

// if (isset($_POST['logged_in_user_id']))
// {
//     $logged_in_user_id = $_POST['logged_in_user_id'];
//     $sql = "SELECT * FROM `users` WHERE `user_name` = 'logged_in_user_id' ";
//     echo 'user_id';
//     echo $sql;
// }

// if (isset($_POST['password']))
// {
//     $logged_in_user_id = $_POST['logged_in_user_id'];
//     $sql = "SELECT * FROM `` WHERE `password` = 'password' ";
//     echo "password";
//     echo $sql;
// }
    

echo '<link rel="stylesheet" type="text/css" href="css/jbc.css" <noscript>
        <link rel="stylesheet" href="css/jbc-noscript.css" />';


//logging in, security and saving visits
//include("scripts/login-visits.php");

$filter = 0;

// if (isset($_GET['page']))
// {
//     $page = $_GET['page'];
// }   
$page = $_GET['page'];
include("scripts/seo.php");
?>

    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="keywords" content="<?php echo $mKeys?>">
        <meta name="description" content="<?php echo $mDescr?>">

        
        </noscript>

        <title>
            <?php 
            echo $mTitle 
            ?>
        </title>
    </head>

    <body>

        <!-- Container with Slider, please look at the usage documentation -->
        <div class="slider">
            <div class="sl-shadow"></div>
            <a id="slide-next" href="#"></a>
            <a id="slide-prev" href="#"></a>
            <div id="slider">
                <div class="sl-slide activeSlide"> <img src="images/slider/1.jpg" width="900" height="300" alt="slide1" /> </div>
            </div>
        </div>
        <!-- Main Slider's container, must be the BODY's child -->
        <div id="slide-loader"></div>
        <ul id="menu">
            <?php include("includes/menu.php")?>
        </ul>
        <div class="pages">
            <?php
  //Here is a page layout. If you want to change it
  //don't forget to change it in the scripts/constructor.php file!
  ?>
                <!--  Home Page -->
                <div class="page">
                    <div class="page-logo"></div>
                    <div class="content">
                        <div class="content-top">
                            <div class="content-bg">
                                <?php
    if(!is_file("content/$page".".php")) {
      echo "Sorry, but the requested page is not found!"; 
    }
    else include("content/$page".".php");
    ?>
                                    <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-content">
                        <div class="footer-line"></div>
                        <?php include("includes/social-bar.php")?>
                            <?php include("includes/bottom-mods.php")?>
                    </div>
                    <div class="clear"></div>
                </div>
                <!--  Other pages will be loaded here. Do not add here anything! -->
        </div>
        <div class="dark-layer"></div>
        <div class="white-layer"></div>
    </body>

    </html>