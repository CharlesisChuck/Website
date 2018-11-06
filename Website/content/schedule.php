<div class="left-col">

<?php 
date_default_timezone_set("America/Los_Angeles");

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

	<div class="save_schedule">
	<form method="post">
	<input type="submit" name="#" value="Save and Reset Hours!">
	</form>
	<p><strong>Time Until Week's End: <?php
	echo GetTimeSchedule($logged_in_user_id,$db);
	?></strong></p>
	</div>

	<form method="post">
	<input type="submit" name="schedule_update" value="Update the Schedule!">
	<p><strong>Time Since Last Edit:
	<?php
	echo GetTimeSchedule($logged_in_user_id,$db);
	?>
	</strong></p>
	
	<ul>
		<div class="daily_tasks_edit">
		<h3>Hours</h3>
		<?php 
		$first = 'Name';
		$second = 'Total';
		$third = 'Used';
		$type = 'hour';
		CreateSchedule($first,$second,$third,$type,$db,$logged_in_user_id);
		?>
		</div>

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

		<div class="data_schedule_edit">
		<h3>Current Data</h3>
		<li><p><strong>Total: 
		<?php
		$data = 'total';
		echo DataScheduleGet($logged_in_user_id,$data,$db);
		?>
		</strong></p></li>
		<li><p><strong>Hours: 
		<?php
		$data = 'hour';
		echo DataScheduleGet($logged_in_user_id,$data,$db);
		?>
		</strong></p></li>
		<li><p><strong>Week: 
		<?php
		$data = 'week';
		echo DataScheduleGet($logged_in_user_id,$data,$db);
		?>
		</strong></p></li>
		<li><p><strong>Month: 
		<?php
		$data = 'month';
		echo DataScheduleGet($logged_in_user_id,$data,$db);
		?>
		</strong></p></li>
		<li><p><strong>Year: 
		<?php
		$data = 'year';
		echo DataScheduleGet($logged_in_user_id,$data,$db);
		?>
		</strong></p></li>
		</div>
	</ul>



</form>

</div>
<?php include($sidebar . '.php'); ?>
<div class="clear"></div>