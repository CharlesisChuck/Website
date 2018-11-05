  <?php

/////////////////////////////////////////////////////////////////////////////////

function GetTimeSchedule($logged_in_user_id,$db)
{
	$time = 'NOT SET';
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
		echo 'SCHEDULE HAS BEEN UPDATED!';
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
			Table($first_data,$second_data,$third_data,$list_id,$db,$type);
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
		echo 'UPDATE SUCCESSFUL';
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
}

//////////////////////////////////////////////////////////////////

function DataScheduleGet($logged_in_user_id,$data_type,$db)
{
	$ratio_data = 'nothing yet...';
	$bad_sum = 0;
	$good_sum = 0;

	$sql_data = "SELECT * FROM schedule_input";
	$result_data = $db -> query($sql_data);
	while($row = $result_data -> fetch_object() )
	{//checking if we are logged in
			$first_data = $row -> first;
			$second_data = $row -> second;
			$third_data = $row -> third;
			$list_id = $row -> list_id;
			$good_bad = $row -> good_bad;
			$type_check = $row -> type;
			if($data_type == 'total')
			{
			} else if($type_check == $data_type)
			{

				if($good_bad == 'bad')
				{
					$bad_sum  += $third_data; 
				} else if($good_bad == 'good')
				{
					$good_sum += $third_data;
				} 
				else if($good_bad == NULL){
					$good_sum += $second_data;
					if($third_data == 0)
					{
					$bad_sum += 1;
					}
				}
			} else{
			}
			
	}
		if($data_type == 'total')
		{
		} else if($data_type == 'hour')
		{
			$ratio_data = ($good_sum/$bad_sum);
		} else
		{
			if(($bad_sum==0)||($good_sum==0))
			{
				//do nothing
			}else{
			$ratio_data = ($bad_sum/$good_sum);
			}
		}
		
	
	return $ratio_data;
}


?>