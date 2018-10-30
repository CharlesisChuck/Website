<?php


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