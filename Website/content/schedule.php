<div class="left-col">


<?php 
// include("scripts/schedule-functions.php");
// include("scripts/schedule-database.php");
// include("scripts/database-access.php");

	//DELETE ME
$logged_in_user_id = 1;
	//DELETE ME

if (empty($_POST["schedule_update"])) {
    } else
    {
    	$time = UpdateTime($logged_in_user_id,$db);
    	
    }
?>

<h2>Your Schedule</h2>

<form method="post">
<input type="submit" name ="schedule_update" value="Add to Schedule!">
</form>
<br><br/>

<div class="schedule-edit">
	<p><strong>Time Since Last Edit:

	<?php
	echo GetTime($logged_in_user_id,$db);
	?>

	</strong></p>
	<ul>

		<h3>Hours</h3>
		<?php 
		$first = 'Name';
		$second = 'Total Hours';
		$third = 'Remaining';
		$type = 'hour';
		CreateSchedule($first,$second,$third,$type,$db,$logged_in_user_id); 
		?>

		<h3>Daily Tasks</h3>
		<?php
		$first = 'Task';
		$second = 'Importance';
		$third = 'Completed';
		$type = 'day';
		CreateSchedule($first,$second,$third,$type,$db,$logged_in_user_id);
		?>

		<h3>Weekly Tasks</h3>
		<?php
		$first = 'Task';
		$second = 'Importance';
		$third = 'Completed';
		$type = 'week';
		CreateSchedule($first,$second,$third,$type,$db,$logged_in_user_id); 
		?>

		<h3>Months Tasks</h3>
		<?php
		$first = 'Task';
		$second = 'Importance';
		$third = 'Completed';
		$type = 'month';
		CreateSchedule($first,$second,$third,$type,$db,$logged_in_user_id); 
		?>

		<h3>Yearly Tasks</h3>
		<?php
		$first = 'Task';
		$second = 'Importance';
		$third = 'Completed';
		$type = 'year';
		CreateSchedule($first,$second,$third,$type,$db,$logged_in_user_id); 
		?>

	</ul>

</div>

</div>
<?php include($sidebar . '.php'); ?>
<div class="clear"></div>