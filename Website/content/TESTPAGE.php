<h3>TEST PAGE</h3>

//this will print out toal number of users
$total = 0;
	$content = NULL;

	$sql_user = "SELECT * FROM users";
	$result_user = $db -> query($sql_user);
	while($row = $result_user -> fetch_object() )
	{//checking if we are logged in
		$user_id = $row -> user_id;
		if($user_id == $logged_in_user_id)
		{//you are logged in and now can access content
			$total += 1;
?>