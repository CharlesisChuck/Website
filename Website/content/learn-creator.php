<div class="left-col">

<?php

$page_category = $_GET['page_category'];
include_once("scripts/class_item_creator.php");
$logged_in_user_id = 1;
$sidebar = FilterData($db,$logged_in_user_id,$page_category,$filter);

echo "</div>";

include($sidebar . '.php');
?>
<div class="clear"></div>