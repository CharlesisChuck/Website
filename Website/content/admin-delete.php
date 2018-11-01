<div class="left-col">
	<h3>Come Back Soon!</h3>
	<p>Need overview of database</p>



<?php 
include("scripts/class_item_creator.php");
include("scripts/database-access.php");
include("scripts/database-functions.php");

AdminDelete($db,$logged_in_user_id,$page_category,$filter);


?>
</div>

<?php
include($sidebar . '.php'); 
?>
<div class="clear"></div>