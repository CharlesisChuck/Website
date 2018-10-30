<div class="left-col">



<form method="post">
<form method="post">
<strong>Current Status: </strong>
<textarea name="notes"></textarea>
<input type="submit">
</form>
</form>

<?php
include("scripts/database-functions.php");
include("scripts/database-access.php");

$notes = "not set";
if (empty($_POST["notes"])) {
    } else
    {
    	
        $notes = $_POST['notes'];
    }

	$list_id = 1;

echo $notes;
    
?>
</div>



<?php include($sidebar . '.php'); ?>
<div class="clear"></div>