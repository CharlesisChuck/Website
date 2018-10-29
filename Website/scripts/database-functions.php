<?php



function InsertForm($logged_in_user_id,$db,$urlfilter,$title,$description,$status,$type,$category)
{
	if($urlfilter != NULL)//DELETE ME
	{
	$sqlclasses = "INSERT INTO `classes`(`list_id`, `url_id`, `type`, `category`) VALUES (NULL,'$urlfilter','$type','$category')";
	if ($db->query($sqlclasses) === TRUE) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $sqlclasses . "<br>" . $db->error;
	}


	//get the list id from the table so we don't mix up data
	$sql_list_id = "SELECT * FROM classes ORDER BY list_id DESC limit 1";
	$result_id = $db -> query($sql_list_id);
		while($row = $result_id -> fetch_object() )
		{//checking what category we are in currently
			$list_id = $row -> list_id;
			echo $list_id;
		}

	$sqluserclasses = "INSERT INTO `user_classes`(`list_id`, `user_id`, `title`, `description`, `notes`, `status`) VALUES ($list_id,'$logged_in_user_id','$title','$description',NULL,'$status')";
	if ($db->query($sqluserclasses) === TRUE) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $sqluserclasses . "<br>" . $db->error;
	}
	}
}



function GetUserID($username,$db)
{
	$sql_user_id = "SELECT * FROM users ORDER BY user_id ASC";
	$result_user = $db -> query($sql_user_id);
		while($row = $result_user -> fetch_object() )
		{//checking what category we are in currently
			$user_id = $row -> user_id;
			$username_check = $row -> user_name;
			if ($username_check == $username) {
				break;
			}
		}

	return $user_id;
}


$dbConnect = array(
	'server' => 'localhost',
	'user' => 'root',
	'pass' => '',
	'name' => 'first_website'
);

$db = new mysqli(
	$dbConnect['server'], 
	$dbConnect['user'], 
	$dbConnect['pass'], 
	$dbConnect['name']
);

/*remove all of debug lines for production due to security*/
if(($db -> connect_errno) > 0)
{
	exit("<br><strong>DATABASE ERROR</strong><br>" . $db->connect_error);
}

?>