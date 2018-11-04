  <?php

/////////////////////////////////////////////////////////////////////////////////

function GetTime($logged_in_user_id,$db)
{
	$time = 'NOT SET';

	$sql_time = "SELECT * FROM schedule";
	$result_time = $db -> query($sql_time);
	while($row = $result_time -> fetch_object() )
	{//checking if we are logged in
		$user_id = $row -> user_id;
		if($user_id == $logged_in_user_id)
		{
			$time = $row -> time;
		}
	}
	return $time;
}

/////////////////////////////////////////////////////////////////////////////////

function UpdateTime($logged_in_user_id,$db)
{
	$current_time = date("y/m/d || h:ia");

	$sql_time = "UPDATE `schedule` SET `time`='".$current_time."' WHERE user_id = ".$logged_in_user_id;
	if ($db->query($sql_time) === TRUE) {
		echo 'SCHEDULE HAS BEEN UPDATED!';
	} else {
    echo "Error: " . $sql_time . "<br>" . $db->error;
	}


	return $current_time;
}

/////////////////////////////////////////////////////////////////////////////////

function GetHours($db,$logged_in_user_id,$type)
{
	$sql_tasks = "SELECT * FROM schedule_input WHERE user_id = ".$logged_in_user_id;;
	$result_tasks = $db -> query($sql_tasks);
	while($row = $result_tasks -> fetch_object() )
	{//checking if we are logged in
		$type_check = $row -> type;
		if($type == $type_check)
		{
			$first_data = $row -> first;
			$second_data = $row -> second;
			$third_data = $row -> third;
			HoursTable($first_data,$second_data,$third_data);
		}
	
	}
	$first_data = 'not set';
	$second_data = 0;
	$third_data = 0;
	HoursTable($first_data,$second_data,$third_data);
	echo '</table><br><br/>';
}

/////////////////////////////////////////////////////////////////////////////////

function GetTasks($db,$logged_in_user_id,$type)
{
	

	$sql_tasks = "SELECT * FROM schedule_input WHERE user_id = ".$logged_in_user_id;;
	$result_tasks = $db -> query($sql_tasks);
	while($row = $result_tasks -> fetch_object() )
	{//checking if we are logged in
		$type_check = $row -> type;
		if($type == $type_check)
		{
			$first_data = $row -> first;
			$second_data = $row -> second;
			$third_data = $row -> third;
			TaskTable($first_data,$second_data,$third_data);
		}
	
	}
	$first_data = 'not set';
	$second_data = 0;
	$third_data = '';
	TaskTable($first_data,$second_data,$third_data);
	echo '</table><br><br/>';
}

?>