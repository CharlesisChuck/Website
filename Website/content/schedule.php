<div class="left-col">
<?php 
include("scripts/schedule_functions.php");
?>
<h2>Your Schedule</h2>

<div class="schedule-edit">
	<p><strong>Time Since Last Edit: </strong></p>
	<ul>

		<h3>Hours</h3>
		<?php 
			
		$total_items = 3;
		$first = 'Total Hours';
		$second = 'Name';
		$third = 'Remaining';
		
		TableSchedule($first,$second,$third,$total_items); 
		?>

		<h3>Daily Tasks</h3>
		<table>
			<tr>
				<th>Task</th>
				<th>Importance</th>
				<th>Complete?</th>
			</tr>
			<?php
			$task = 'do laundry';
			$name_task = 3;
			$complete = 'no';
			$total_items = 4;
			$i = 0;
			for($i=0;$i<$total_items;$i++)
			{
				//$Total = function();
				//$Name = function();
				//$Remaining = function();
			echo '
			<tr>
				<th>'.$task.'</th>
				<th>'.$name_task.'</th>
				<th>'.$complete.'</th>
			</tr>
			';
			}
			?>
		</table>
		<br><br/>

		<h3>Weekly Tasks</h3>

		</table>
		<br><br/>

		<h3>Months Tasks</h3>


		<h3>Yearly Tasks</h3>

	</ul>





</div>





<?php
// $save_schedule = "not set";
// if (empty($_POST[save_schedule])) {
//     } else
//     { 	
//         $save_schedule = $_POST['notes'.$list_id];
//         UpdateSchedule($save_schedule,$user_id,$db);
//     }

//USER ID
//GET DATA FOR SCHEDULE

//GETDATA FROM DATABASE
	//RETURN DATA

//PUT DATA INTO TABLE (EDITABLE)

//BUTTONS





//WHAT GOES ON INDEX

	//GET DATA FOR SCHEDULE

	//CREATE SCHEDULE
	
	//BUTTONS

	//CSS
?>

</div>
<?php include($sidebar . '.php'); ?>
<div class="clear"></div>