<?php

//////////////////////////////////////////////////////////////////////////////////////////

function InsertSQLForm($logged_in_user_id,$db,$urlfilter,$title,$description,$status,$type,$category)
{
	//do not change default notes formatting
	$create_date = date("m/d/y");
	$default_notes = 'Previous Location:       Date Last  used:         Date Created:'.$create_date.'

Meta Notes: 
    - 
    - 

Video :
    - 
    - 
    -';

	if($urlfilter != NULL)//DELETE ME
	{
	$sqlclasses = "INSERT INTO `classes`(`list_id`, `url_id`, `type`, `category`) 
	VALUES (NULL,'$urlfilter','$type','$category')";

	if ($db->query($sqlclasses) === TRUE) {
	} else {
    echo "Error: " . $sqlclasses . "<br>" . $db->error;
	}

	//get the list id from the table so we don't mix up data
	$sql_list_id = "SELECT * 
	FROM classes 
	ORDER BY list_id 
	DESC limit 1";

	$result_id = $db -> query($sql_list_id);
	while($row = $result_id -> fetch_object() )
	{//checking what category we are in currently
		$list_id = $row -> list_id;
	}

	$sqluserclasses = "INSERT INTO `user_classes`(`list_id`, `user_id`, `title`, `description`, `notes`, `status`) VALUES ($list_id,'$logged_in_user_id','$title','$description','$default_notes','$status')";

	if ($db->query($sqluserclasses) === TRUE) {
    echo "YOUR UPDATE WAS SUCESSFUL!";
	} else {
    echo "Error: " . $sqluserclasses . "<br>" . $db->error;
	}
	}
}

//////////////////////////////////////////////////////////////////////////////////////////

function UpdateStatus($updatestatus,$list_id,$db)
{

	if($updatestatus == "not set")
    {

    } else {

	$sqluserclasses = "UPDATE user_classes SET status ='".$updatestatus."' WHERE list_id = ".$list_id;

	if ($db->query($sqluserclasses) === TRUE) {
	} else {
    echo "Error: " . $sqluserclasses . "<br>" . $db->error;
	}
    }
}

//////////////////////////////////////////////////////////////////////////////////////////

function UpdateNotes($notes,$list_id,$db)
{

	if($notes == "not set")
    {

    } else {

	$sql_note_update = "UPDATE user_classes 
	SET notes ='$notes' 
	WHERE list_id = ".$list_id;

	if ($db->query($sql_note_update) === TRUE) {
	} else {
    echo "Error: " . $sql_note_update . "<br>" . $db->error;
	}
    }
}

//////////////////////////////////////////////////////////////////////////////////////////

function GetPreviousNotes($list_id,$db)
{
	$sqlpreviousnotes = "SELECT * FROM user_classes
	WHERE `list_id` = '$list_id'";
	$result_notes = $db -> query($sqlpreviousnotes);
	
	while($row = $result_notes -> fetch_object() )
	{
		$notes = $row -> notes;
		return $notes;
	}

}

//////////////////////////////////////////////////////////////////////////////////////////

function CreateNewUser($input_username,$db)
{
	$sqlusername = "INSERT INTO `users`(`user_id`, `user_name`, `password`) 
	VALUES (NULL,'$input_username','password')";

	if ($db->query($sqlusername) === TRUE) {
		echo "username created! Welcome!";
	} else {
    echo "Error: " . $sqlusername . "<br>" . $db->error;
	}
	$schedule_user_id = GetUserId($input_username,$db);
	NewUser($schedule_user_id,$db);
}

//////////////////////////////////////////////////////////////////////////////////////////

function GetUserId($username,$db)
{
	$sqlusername = "SELECT * FROM `users` 
	WHERE  user_name = '$username'" ;

	$result_id = $db -> query($sqlusername);
	while($row = $result_id -> fetch_object())
	{
		$user_id = $row -> user_id;
		return $user_id;
	}
}

//////////////////////////////////////////////////////////////////////////////////////////

function CountEntries($logged_in_user_id,$db, $tag)
{
	$total = 0;

	$sql_user_classes = "SELECT * FROM user_classes
	WHERE user_id = '$logged_in_user_id'";
	
	$result_user_classes  = $db -> query($sql_user_classes);
	while($row = $result_user_classes  -> fetch_object() )
	{//future things we can check
		//$title = $row -> title;
		//$description = $row -> description;
		//$notes = $row -> notes;
		$status = $row -> status;

		if(($tag == 'total'))
		{
			$total += 1;
		} else if($tag == $status)
		{
			$total += 1;
		}  									
	}		
	return $total;
}

//////////////////////////////////////////////////////////////////////////////////////////

function ClassesCount($logged_in_user_id,$db, $tag)
{
	$total = 0;


	$sql_user = "SELECT * FROM users";
	$result_user = $db -> query($sql_user);
	while($row = $result_user -> fetch_object() )
	{//checking if we are logged in
		$user_id_check = $row -> user_id;
		if($user_id_check == $logged_in_user_id)
		{//you are logged in and now can access content
			$user_id = $user_id_check;
			$sql_classes = "SELECT * FROM classes";
			$result_classes = $db -> query($sql_classes);
			while($row = $result_classes -> fetch_object() )
				{
					//$list_id = $row -> list_id;
					//$url_id = $row -> url_id;
					$category = $row -> category;
					$type = $row -> type;
					if($tag == $type)
					{
						$total += 1;
					} else if ($tag == $category)
					{
						$total += 1;
					}
				}
		}
	}
	return $total;
}

//////////////////////////////////////////////////////////////////////////////////////////

function DeleteItem($DeleteItem,$list_id,$db)
{

	if($updatestatus == "not set")
    {

    } else {

    $sqlDelete = "DELETE FROM user_classes WHERE list_id = '$list_id'";

    if ($db->query($sqlDelete) === TRUE) {
    	echo 'Item Deleted';
	} else {
    echo "Error: " . $sqlDelete . "<br>" . $db->error;
	}

	$sqlDelete = "DELETE FROM classes WHERE list_id = '$list_id'";

    if ($db->query($sqlDelete) === TRUE) {
    	echo 'Item Deleted';
	} else {
    echo "Error: " . $sqlDelete . "<br>" . $db->error;
	}

    }


}

//////////////////////////////////////////////////////////////////////////////////////////


?>