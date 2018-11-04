<?php

/////////////////////////////////////////////////////////////////////////////////////////////

function CreateSchedule($first,$second,$third,$type,$db,$logged_in_user_id)
{			
		echo'
				<table>
				<tr>
					<th>'.$first.'</th>
					<th>'.$second.'</th>
					<th>'.$third.'</th>
				</tr>';

			if($type == 'hour')
			{
				GetHours($db,$logged_in_user_id,$type);
			}else{
				GetTasks($db,$logged_in_user_id,$type);
			}
		
}

/////////////////////////////////////////////////////////////////////////////////////////////

function HoursTable($first_data,$second_data,$third_data)
{
echo '
				<tr>
					<th><form method="post" >
					<textarea rows="1" cols="10" name="hours">'.$first_data.'</textarea>
					</form></th>

					<th><form method="post" >
					<textarea rows="1" cols="2" name="hours">'.$second_data.'</textarea>
					</form></th>

					<th><form method="post" >
					<textarea rows="1" cols="2" name="hours">'.$third_data.'</textarea>
					</form></th>
				</tr>';
			
}

///////////////////////////////////////////////////////////////////////////////////////////////

function TaskTable($first_data,$second_data,$third_data)
{
	$yes = 1;
	$no = 0;
	if($third_data == $yes){
		$checked_yes = 'checked="checked"';
		$checked_no = '';
	}
	else if($third_data == $no){
		$checked_no = 'checked="checked"';
		$checked_yes = '';
	}else
	{
		$checked_no = '';
		$checked_yes = '';
	}
	echo '
				<tr>
					<th><form method="post" >
					<textarea rows="1" cols="10" name="task">'.$first_data.'</textarea>
					</form></th>

					<th><form method="post" >
					<textarea rows="1" cols="2" name="task">'.$second_data.'</textarea>
					</form></th>

					<th><form method="post" >
					Yes: <input '.$checked_yes .' type="radio" name="task" value="yes">
					No: <input '.$checked_no .' type="radio" name="task" value="no">
					</form></th>
				</tr>';
			
		
}

/////////////////////////////////////////////////////////////////////////////////////////

?>


