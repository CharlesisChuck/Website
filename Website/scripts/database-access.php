<?php


$dbConnect = array(
	'user' => 'charlesc_df5a_cg',
	'pass' => 'BOBjobob123',
	'name' => 'charlesc_first_website'
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