<div class="left-col">





<?php 

  $logged_in_user_id = $_SESSION['idlogin'];
  if(($logged_in_user_id == NULL))
  {
    $logged_in_user_id = 0;
  }

if (empty($_POST["schedule_update"])) {
    } else
    {
    	$time = UpdateTime($logged_in_user_id,$db);
    	
    }

?>



<div class="schedule-edit">
<form method="post">
	<input type="submit" name="schedule_update" value="Update the Schedule!">
	<p><strong>Time Since Last Edit:

	<?php
	echo GetTime($logged_in_user_id,$db);
	?>

	</strong></p>
	<ul>

		<h3>Hours</h3>
		<?php 
		$first = 'Name';
		$second = 'Total';
		$third = 'Used';
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

</form>

</div>
<?php include($sidebar . '.php'); ?>
<div class="clear"></div>