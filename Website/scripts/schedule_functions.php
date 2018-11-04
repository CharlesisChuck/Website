<?php
//ALL CALCULATIONS WILL GO HERE

// function CreateSchedule($user_id,)
// {
// 	$SizeHours = SizeData();
// 	$SizeTasks = SizeData();

// 	for ($SizeHours)
// 	{
// 		$category = 'hours';
// 		GetScheduleData($db,$category,$logged_in_user_id)
// 	}
// 	for ($SizeTasks)
// 	{
// 		$category = 'tasks';
// 		GetScheduleData($db,$category,$logged_in_user_id)
// 	}

// }

// Function CurrentTime($db,$logged_in_user_id,)
// {
// 	$DecodedTimeString = 0;
// 	$TimeString = "";

// 	$TimeString = GetTime();

// 	//Decode the $TimeString

// 	return $DecodedTimeString;
// }


// //this creates and decodes the tasks strings
// function HourString($action,)
// {
// 	$HourString = "";
// 	if($action == 'create')
// 	{

// 	}
// 	else if($action == 'decode')
// 	{

// 		//must be posted
// 	}
	
// 	return $HourString;
// }

// //this creates and decodes the tasks strings
// function TaskString($action,)
// {
// 	$TaskString = "";
// 	if($action == 'create')
// 	{

// 	}
// 	else if($action == 'decode')
// 	{

// 		//must be posted
// 	}
	
// 	return $TaskString;
// }



function TableSchedule($first,$second,$third,$total_items)
{			
		$first_data = 10;
		$second_data = 'second';
		$third_data = 3;

		echo'
				<table>
				<tr>
					<th>'.$first.'</th>
					<th>'.$second.'</th>
					<th>'.$third.'</th>
				</tr>';

			

			$i = 0;
			for($i=0;$i<$total_items;$i++)
			{
				// $first_data = $_POST['total_hour'];
				// $second_data = $_POST['previous_hour_name'];
				// $third_data = $_POST['current_hour'];
		echo '
				<tr>
					<th><form method="post" >
					<textarea rows="1" cols="2" name="hours">'.$first_data.'</textarea>
					</form></th>

					<th><form method="post" >
					<textarea rows="1" cols="10" name="hours">'.$second_data.'</textarea>
					</form></th>

					<th><form method="post" >
					<textarea rows="1" cols="2" name="hours">'.$third_data.'</textarea>
					</form></th>
				</tr>';
			}
		echo '</table><br><br/>';
}
?>


