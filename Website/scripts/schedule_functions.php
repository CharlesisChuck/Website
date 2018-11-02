<?php
//ALL CALCULATIONS WILL GO HERE

function CreateSchedule($user_id,)
{
	$SizeHours = SizeData();
	$SizeTasks = SizeData();

	for ($SizeHours)
	{
		$category = 'hours';
		GetScheduleData($db,$category,$logged_in_user_id)
	}
	for ($SizeTasks)
	{
		$category = 'tasks';
		GetScheduleData($db,$category,$logged_in_user_id)
	}

}

Function CurrentTime($db,$logged_in_user_id,)
{
	$DecodedTimeString = 0;
	$TimeString = "";

	$TimeString = GetTime();

	//Decode the $TimeString

	return $DecodedTimeString;
}


//this creates and decodes the tasks strings
function HourString($action,)
{
	$HourString = "";
	if($action == 'create')
	{

	}
	else if($action == 'decode')
	{

		//must be posted
	}
	
	return $HourString;
}

//this creates and decodes the tasks strings
function TaskString($action,)
{
	$TaskString = "";
	if($action == 'create')
	{

	}
	else if($action == 'decode')
	{

		//must be posted
	}
	
	return $TaskString;
}


?>