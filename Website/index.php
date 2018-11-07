<?php
session_start();
//database initialization
include("scripts/database-access.php");
include("scripts/seo.php");
include("scripts/schedule-functions.php");
include("scripts/schedule-database.php");

date_default_timezone_set("America/Los_Angeles");

$filter = 0;
if(empty($_GET['page']))
{
    $page = 'home';
} else {
    $page = $_GET['page'];
}

$logged_in_user_id = $_SESSION['idlogin'];
if(($logged_in_user_id == NULL))
{
    $logged_in_user_id = 0;
}

if (empty($_POST["schedule_update"])) {
} else
{
    $time = UpdateTimeSchedule($logged_in_user_id,$db);
    echo "<meta http-equiv='refresh' content='0'>"; 
}
?>



<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="<?php echo $mKeys?>">
    <meta name="description" content="<?php echo $mDescr?>">
    
    <link rel="stylesheet" type="text/css" href="css/jbc.css" <noscript>
    <link rel="stylesheet" href="css/jbc-noscript.css" />
        
    </noscript>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    <title>
        <?php 
        echo $mTitle 
        ?>
    </title>
</head>

<body>
    <!-- Container with Slider, please look at the usage documentation -->
    <div class="slider">
    <div class="sl-slide activeSlide"> 

    <div class="ui_update">
    <form method="post">
    <input type="submit" name="schedule_update" value="Update the Schedule!">
    </div>

    <div class="ui_hour">
    <h3>Weekly Hours</h3>
    <?php 
    $first = 'Name';
    $second = 'Total';
    $third = 'Used';
    $type = 'hour';
    CreateSchedule($first,$second,$third,$type,$db,$logged_in_user_id); 
    ?>
    </div>

    <div class="ui_day">
    <h3>Daily Tasks</h3>
    <?php 
    $first = 'Task';
    $second = 'Importance';
    $third = 'Complete?';
    $type = 'day';
    CreateSchedule($first,$second,$third,$type,$db,$logged_in_user_id); 
    ?>
    </div>

    <div class="ui_week">
    <h3>Weekly Tasks</h3>
    <?php 
    $first = 'Task';
    $second = 'Importance';
    $third = 'Complete?';
    $type = 'week';
    CreateSchedule($first,$second,$third,$type,$db,$logged_in_user_id); 
    ?>
    </div>

    <div class="ui_stats">
    <h3>Stats</h3>
    <ul>
    <li><p><strong>Total Current: 
    <?php
    $data = 'total';
    echo RatioScheduleGet($logged_in_user_id,$data,$db);
    ?>
    </strong></p></li>
    <li><p><strong>Hours: 
    <?php
    $data = 'hour';
    echo RatioScheduleGet($logged_in_user_id,$data,$db);
    ?>
    </strong></p></li>
    <li><p><strong>Day: 
    <?php
    $data = 'day';
    echo ((float)RatioScheduleGet($logged_in_user_id,$data,$db) * 100). '%' ;
    ?>
    </strong></p></li>
    <li><p><strong>Week: 
    <?php
    $data = 'week';
    echo ((float)RatioScheduleGet($logged_in_user_id,$data,$db) * 100). '%' ;
    ?>
    </strong></p></li>
    <li><p><strong>Month: 
    <?php
    $data = 'month';
    echo ((float)RatioScheduleGet($logged_in_user_id,$data,$db) * 100). '%' ;
    ?>
    </strong></p></li>
    <li><p><strong>Year: 
    <?php
    $data = 'year';
    echo ((float)RatioScheduleGet($logged_in_user_id,$data,$db) * 100). '%' ;
    ?>
    </strong></p></li>
    </ul>
    </div>

    <div class="ui_time">
    <p><strong>Time Since Last Edit: <?php
    echo GetTimeSchedule($logged_in_user_id,$db);
    ?></strong></p>
    </div>
    </form>
    
    </div>
    </div>

    <!-- Main Slider's container, must be the BODY's child -->
    <div id="slide-loader"></div>
    <ul id="menu">
        <?php include("includes/menu.php")?>
    </ul>
    <div class="pages">

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

<script type="text/javascript">

    if ( window.history.replaceState ) 
    {
        window.history.replaceState( null, null, window.location.href );
    }
    
    (function($){
    $.fn.scrollPosReaload = function()
    {
        if (localStorage) 
        {
            var posReader = localStorage["posStorage"];
            if (posReader) {
            $(window).scrollTop(posReader);
            localStorage.removeItem("posStorage");
            }
            $(this).click(function(e) {
            localStorage["posStorage"] = $(window).scrollTop();
            });
            return true;
        }
        return false;
    }

    $(document).ready(function() {
    $('input').scrollPosReaload();
    });
    }(jQuery));  

</script>

</html>