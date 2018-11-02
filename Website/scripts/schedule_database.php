ALTER TABLE table_name
  ADD column_name column_definition;

  <?php
//ALL DATABASE INTERACTIONS GO HERE
function CreateHour($db,$name,$total)
{
//needs database id
	$create = 'create';
	$NewHour = HourString($create,);
}

function CreateTask($db,$name,$category,$importance)
{
//needs database id
	$create = 'create';
	$NewTask = TaskString($create,);

}


function GetScheduleData($db,$category,$logged_in_user_id)
{
//this will pull hours and tasks out
	$decode = 'decode';
	$Decoded = "";

//GET DATA OUT HERE


	if($category == 'hour')
	{
	$Decodedr = HourString($decode,);
	}
	else if($category == 'task')
	{
	$Decoded = TaskString($decode,);
	}

return $Decoded
}

function GetTime($logged_in_user_id)
{
	$CurrentTime = "";

	return $CurrentTime;
}

function SizeData()
{
	$Size = 0;

	return $Size;
}

?>