<?php

function InsertSQLForm($logged_in_user_id,$db,$urlfilter,$title,$description,$status,$type,$category)
{
	if($urlfilter != NULL)//DELETE ME
	{
	$sqlclasses = "INSERT INTO `classes`(`list_id`, `url_id`, `type`, `category`) VALUES (NULL,'$urlfilter','$type','$category')";
	if ($db->query($sqlclasses) === TRUE) {
	} else {
    echo "Error: " . $sqlclasses . "<br>" . $db->error;
	}


	//get the list id from the table so we don't mix up data
	$sql_list_id = "SELECT * FROM classes ORDER BY list_id DESC limit 1";
	$result_id = $db -> query($sql_list_id);
		while($row = $result_id -> fetch_object() )
		{//checking what category we are in currently
			$list_id = $row -> list_id;
		}

	$sqluserclasses = "INSERT INTO `user_classes`(`list_id`, `user_id`, `title`, `description`, `notes`, `status`) VALUES ($list_id,'$logged_in_user_id','$title','$description',NULL,'$status')";
	if ($db->query($sqluserclasses) === TRUE) {
    echo "YOUR UPDATE WAS SUCESSFUL!";
	} else {
    echo "Error: " . $sqluserclasses . "<br>" . $db->error;
	}
	}
}



// function GetUserID($username,$db)
// {
// 	$sql_user_id = "SELECT * FROM users ORDER BY user_id ASC";
// 	$result_user = $db -> query($sql_user_id);
// 		while($row = $result_user -> fetch_object() )
// 		{//checking what category we are in currently
// 			$user_id = $row -> user_id;
// 			$username_check = $row -> user_name;
// 			if ($username_check == $username) {
// 				break;
// 			}
// 		}

// 	return $user_id;
// }


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

function UpdateNotes($notes,$list_id,$db)
{

	if($notes == "not set")
    {

    } else {

	$sqluserclasses = "UPDATE user_classes SET notes ='".$notes."' WHERE list_id = ".$list_id;
	if ($db->query($sqluserclasses) === TRUE) {
	} else {
    echo "Error: " . $sqluserclasses . "<br>" . $db->error;
	}
    }
}

function GetPreviousNotes($list_id,$db)
{
	$sqlpreviousnotes = "SELECT * FROM user_classes";
	$result_notes = $db -> query($sqlpreviousnotes);
		while($row = $result_notes -> fetch_object() )
		{//checking what category we are in currently
			$list_id_check = $row -> list_id;
			$notes = $row -> notes;
			if ($list_id_check == $list_id) {
				return $notes;
				break;
			}
		}

}

function CreateNewUser($input_username,$db)
{
	$sqlusername = "INSERT INTO `users`(`user_id`, `user_name`, `password`) VALUES (NULL,'$input_username','password')";

	if ($db->query($sqlusername) === TRUE) {
		echo "username created! Welcome!";
	} else {
    echo "Error: " . $sqlusername . "<br>" . $db->error;
	}

}

function GetUserId($username,$db)
{
	$sqlusername = "SELECT * FROM `users` WHERE 1" ;
	$result_notes = $db -> query($sqlusername);
		while($row = $result_notes -> fetch_object() )
		{
			$user_id = $row -> user_id;
			$username_check = $row -> user_name;
			if ($username_check == $username) {
				return $user_id;
				
			}
		}

}


?>