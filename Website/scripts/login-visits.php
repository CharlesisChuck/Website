<?php

//getting timestamp for database
//$time = Timedate("h:i:sa")
//$date = date("Y/m/d")
$block_content = 0;
/* BLOCK IF HACK ATTEMPT
if (isset($_GET['logged_in_user_id']))
{
    $logged_in_user_id = $_GET['logged_in_user_id'];
}
if (isset($_GET['password']))
{
    $unsecure_password = $_GET['password'];
    $spoof_password = 'rXnT52SOpq';
    if ($unsecure_password == $spoof_password)
    {
		$block_content = 0;
		header("Refresh:0,url=index.php?page=home");
	}else if($unsecure_password != $spoof_password)
	{
	$block_content = 0;
	}

	//ALSO NEED IP ADDRESS BLOCK AND STORING
} */





/*

//Getting ip address
if ($_SERVER['HTTP_CLIENT_IP']!="") 
{
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} 
elseif ($_SERVER['HTTP_X_FORWARDED_FOR']!="") 
{
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else 
{
    $ip = $_SERVER['REMOTE_ADDR'];
}
*/

//}
?>