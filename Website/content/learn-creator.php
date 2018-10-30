<div class="left-col">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>">
<strong>Filter By Status</strong>
<select name="filter">
  <option value=""></option>
  <option value="current">Current</option>
  <option value="completed">Completed </option>
  <option value="default">Unseen</option>
</select>

<input type="submit">

<br><br/>
</form>


<?php
if (empty($_POST["filter"])) {
    } else
    {
    	$filter = $_POST['filter'];
    }

$page_category = $_GET['page_category'];

include("scripts/class_item_creator.php");
include("scripts/database-access.php");
include("scripts/database-functions.php");

$logged_in_user_id = 1;
$sidebar = FilterData($db,$logged_in_user_id,$page_category,$filter);
?>


</div>


<?php
include($sidebar . '.php');
?>
<div class="clear"></div>