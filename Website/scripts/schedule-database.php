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
			$list_id = $row -> list_id;
			HoursTable($first_data,$second_data,$third_data,$list_id,$db);
		}
	
	}

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
			$list_id = $row -> list_id;
			TaskTable($first_data,$second_data,$third_data,$list_id,$db);
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

function UpdateItem($first,$second,$third,$list_id,$db)
{
	$sql_update = "UPDATE schedule_input SET first='$first',second='$second',third='$third' WHERE list_id = ".$list_id;

	if ($db->query($sql_update) === TRUE) {
		echo 'UPDATE SUCCESSFUL';
	} else {
    echo "Error: " . $sql_update . "<br>" . $db->error;
	}
}

function CreateItem($first,$second,$third,$logged_in_user_id,$db,$type,$check)
{
	if($check == 'not set')
	{

	}else {
	$sql_create = "INSERT INTO `schedule_input`(`list_id`, `user_id`, `type`, `first`, `second`, `third`) VALUES (NULL,$logged_in_user_id,'$type','$first','$second','$third')";
	if ($db->query($sql_create) === TRUE) {
		echo 'UPDATE SUCCESSFUL';
	} else {
    echo "Error: " . $sql_create . "<br>" . $db->error;
	}
	}
}

?>