<?php 
$logged_in_user_id = $_SESSION['idlogin'];
if(($logged_in_user_id == NULL)){
	$logged_in_user_id = 0;
	}

if (empty($_POST["schedule_update"])) {
    } else{
    	$time = UpdateTimeSchedule($logged_in_user_id,$db);
		echo "<meta http-equiv='refresh' content='0'>";	
    }
if (empty($_POST["schedule_reset"])) {
    } else{
    	$reset_type = $_POST["reset_item"];
    	ClearSaveReset($logged_in_user_id,$db,$reset_type);
		echo "<meta http-equiv='refresh' content='0'>";	
    }

?>

<div class="left-col">
<!------------------------------------------------------------------------------------>
	<div class="reset_schedule">
	<form method="post">
		<select name="reset_item">
			<option name="none">Don't Reset</option>
			<option value="hour">Weekly Hours</option>
			<option value="day">Daily Tasks</option>
			<option value="week">Weekly Tasks</option>
			<option value="month">Monthly Tasks</option>
			<option value="year">YearlyTasks</option>
		</select>
	<input type="submit" name="schedule_reset" value="Save and Reset?">
	</form>
	<p>This deletes, saves and resets your selection.</p>
	</div>
<!------------------------------------------------------------------------------------>
	<form method="post">
	<input type="submit" name="schedule_update" value="Update the Schedule!">
	<p><strong>Time Since Last Edit:
	<?php
	echo GetTimeSchedule($logged_in_user_id,$db);
	?>
	</strong></p>
<!------------------------------------------------------------------------------------>
<ul>
<div class="daily_tasks_edit">
	<h3>Weekly Hours</h3>
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
<!------------------------------------------------------------------------------------>
<div class="data_schedule_edit">
	<h3>Current Data</h3>
	<li><p><strong>Total Saved: 
	<?php
	$data = 'total';
	echo RatioScheduleGet($logged_in_user_id,$data,$db);
	?>
	</strong></p></li>
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
</div>
<!------------------------------------------------------------------------------------>
<div class="history_schedule_edit">
	<h3>History</h3>
	<li><p><strong> 
	<?php
	HistoryScheduleGet($logged_in_user_id,$db);
	?>
</div>
<!------------------------------------------------------------------------------------>
</ul>
</form>
<!------------------------------------------------------------------------------------>
</div>

<?php include($sidebar . '.php'); ?>
<div class="clear"></div>