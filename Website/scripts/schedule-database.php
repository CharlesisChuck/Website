  <?php

/////////////////////////////////////////////////////////////////////////////////

function GetTimeSchedule($logged_in_user_id,$db)
{
	$time = 'nothing here...';

	$sql_time = "SELECT * FROM schedule WHERE user_id = ".$logged_in_user_id;

	$result_time = $db -> query($sql_time);
	while($row = $result_time -> fetch_object() )
	{//checking if we are logged in
			$time = $row -> time;
	}
	return $time;
}

/////////////////////////////////////////////////////////////////////////////////

function UpdateTimeSchedule($logged_in_user_id,$db)
{
	$current_time = date("y/m/d || h:ia");

	$sql_time = "UPDATE `schedule` SET `time`='".$current_time."' WHERE user_id = ".$logged_in_user_id;
	if ($db->query($sql_time) === TRUE) {
	} else {
    echo "Error: " . $sql_time . "<br>" . $db->error;
	}


	return $current_time;
}

/////////////////////////////////////////////////////////////////////////////////

function GetSchedule($db,$logged_in_user_id,$type)
{
	$sql_tasks = "SELECT * FROM schedule_input WHERE user_id = ".$logged_in_user_id;

	$result_tasks = $db -> query($sql_tasks);
	while($row = $result_tasks -> fetch_object() )
	{//checking if we are logged in
		$type_check = $row -> type;
		if($type == $type_check)
		{
			$first_data = $row -> first;
			$second_data = $row -> second;
			$third_data = $row -> third;
			$list_id = $row -> list_id;
			$good_bad = $row -> good_bad;
			Table($first_data,$second_data,$third_data,$list_id,$db,$type,$good_bad);
		}
	}
	echo '</table><br><br/>';
}

////////////////////////////////////////////////////////////////////////////

function DeleteItemSchedule($list_id,$db)
{
	$sql_delete = "DELETE FROM schedule_input WHERE list_id = ".$list_id;

	if ($db->query($sql_delete) === TRUE) {
		echo "ITEM DELETED";
	} else {
    echo "Error: " . $sql_delete . "<br>" . $db->error;
	}
}

//////////////////////////////////////////////////////////////////////////////

function UpdateSchedule($first,$second,$third,$list_id,$db)
{
	$sql_update = "UPDATE schedule_input SET first='$first',second='$second',third='$third' WHERE list_id = ".$list_id;

	if ($db->query($sql_update) === TRUE) {
	} else {
    echo "Error: " . $sql_update . "<br>" . $db->error;
	}

}

//////////////////////////////////////////////////////////////////////////////

function ScheduleInput($first,$second,$third,$logged_in_user_id,$db,$type,$check,$good_bad)
{
	if($check == 'not set')
	{

	}else {
	$sql_create = "INSERT INTO `schedule_input`(`list_id`, `user_id`, `type`, `first`, `second`, `third`,`good_bad`) VALUES (NULL,$logged_in_user_id,'$type','$first','$second','$third','$good_bad')";

	if ($db->query($sql_create) === TRUE) {
		echo 'UPDATE SUCCESSFUL';
	} else {
    echo "Error: " . $sql_create . "<br>" . $db->error;
	}
	}
	//HistoryScheduleSave();
}

//////////////////////////////////////////////////////////////////

function RatioScheduleGet($logged_in_user_id,$data_type,$db)
{
	$ratio_data = 0;
	$bad_sum = 0;
	$good_sum = 0;
	$sum_total = 0;
	$sum_total_task = 0;

	$sql_data = "SELECT * FROM schedule_input WHERE user_id = '$logged_in_user_id'";
	
	$result_data = $db -> query($sql_data);
	while($row = $result_data -> fetch_object() )
	{//checking if we are logged in
		$first_data = $row -> first;
		$second_data = $row -> second;
		$third_data = $row -> third;
		$list_id = $row -> list_id;
		$good_bad = $row -> good_bad;
		$type_check = $row -> type;
		if($type_check == $data_type)
		{
			if($good_bad == 'bad')
			{
				$bad_sum  += $third_data; 
			} else if($good_bad == 'good')
			{
				$good_sum += $third_data;
			} 
			else if($good_bad == NULL)
			{
				$good_sum += $second_data;
				if($third_data == 0)
				{
				$bad_sum += 1;
				}
			}
		} 
	}
		if($data_type == 'total')
		{
			$total_type = 'hour';		
			$sum_total += RatioScheduleGet($logged_in_user_id,$total_type,$db);

			$total_type = 'day';
			$sum_total_task += RatioScheduleGet($logged_in_user_id,$total_type,$db);
			$total_type = 'week';
			$sum_total_task += RatioScheduleGet($logged_in_user_id,$total_type,$db);
			$total_type = 'month';
			$sum_total_task += RatioScheduleGet($logged_in_user_id,$total_type,$db);
			$total_type = 'year';
			$sum_total_task += RatioScheduleGet($logged_in_user_id,$total_type,$db);

			$ratio_data = ($sum_total/5) + (4 - $sum_total_task);

		} else if($data_type == 'hour')
		{
			if(($bad_sum==0)||($good_sum==0))
			{
				//do nothing
			}else{
			$ratio_data = ($good_sum/$bad_sum);
			}
			
		} else
		{
			if(($bad_sum==0)||($good_sum==0))
			{
				//do nothing
			}else{
			$ratio_data = ($bad_sum/$good_sum);
			}
		}
		
	
	return round($ratio_data, 2);
}

///////////////////////////////////////////////////////////////////////////////////

function HistoryScheduleGet($logged_in_user_id,$db)
{
	$sql_history_get = "SELECT * FROM schedule_history WHERE user_id = '$logged_in_user_id'";
	
	$result_history = $db -> query($sql_history_get);
	while($row = $result_history -> fetch_object() )
	{
		$date = $row -> date;
		$ratio = $row -> value;
		echo ' Date: ';
		echo $date;
		echo ' Ratio: ';
		echo $ratio;
		echo "<br><br/>";
	}


}

//////////////////////////////////////////////////////////////////////////////////

function HistoryScheduleSave($logged_in_user_id,$db,$type)
{

	$current_time = date("y/m/d ").$type;

	$data = 'total';
	$save_ratio = RatioScheduleGet($logged_in_user_id,$data,$db);

	$sql_save_history = "INSERT INTO `schedule_history`
	Values('$logged_in_user_id','$save_ratio','$current_time')";

	if ($db->query($sql_save_history) === TRUE) {
		echo 'UPDATE SUCCESSFUL';
	} else {
    echo "Error: " . $sql_save_history . "<br>" . $db->error;
	}

}

///////////////////////////////////////////////////////////////////////////////////

function ClearSaveReset($logged_in_user_id,$db,$type)
{
	HistoryScheduleSave($logged_in_user_id,$db,$type);

	$blank = '0';

	if($type == 'hour'){
		$sql_reset = "UPDATE `schedule_input` 
		SET `third` = '$blank'
		WHERE type = 'hour'";
	}
	else {
		$sql_reset = "DELETE FROM `schedule_input` 
		WHERE type = '$type'";
	}

	if ($db->query($sql_reset) === TRUE) {
	} else {
    echo "Error: " . $sql_reset . "<br>" . $db->error;
	}
}

/////////////////////////////////////////////////////////////////////////

function NewUser($logged_in_user_id,$db)
{
	$current_time = date("y/m/d || h:ia");
	$sql_new_schedule = "INSERT INTO `schedule` 
	VALUES ('$logged_in_user_id','$current_time')";

	if ($db->query($sql_new_schedule) === TRUE) {
	} else {
    echo "Error: " . $sql_new_schedule . "<br>" . $db->error;
	}
}

/////////////////////////////////////////////////////////////////

function SumHours($logged_in_user_id,$db,$hour_type)
{
	$hours_sum = 0;
	$sql_hour_sum = "SELECT * FROM schedule_input 
	WHERE type = 'hour' AND user_id = '$logged_in_user_id'";

	$result_hour = $db -> query($sql_hour_sum);
	while($row = $result_hour -> fetch_object() )
	{
		$hour_total = $row -> second;
		$hour_used = $row -> third;

		if($hour_type == 'total'){
		$hours_sum += $hour_total;
		}else if($hour_type == 'current'){
		$hours_sum += $hour_used;
		}
		if($hour_type == 'time'){
			$hour_type_day = 'current';
			$current_hours_day = SumHours($logged_in_user_id,$db,$hour_type_day);
			$hours_sum = ($current_hours_day%24);
		}
	}
	return $hours_sum;
}
?>