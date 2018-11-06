<?php

/////////////////////////////////////////////////////////////////////////////////////////////

function CreateSchedule($first,$second,$third,$type,$db,$logged_in_user_id)
{			
		

			if($type == 'hour')
			{
				echo'
				<table>
				<tr>
					<th>'.$first.'</th>
					<th>'.$second.'</th>
					<th>'.$third.'</th>
					<th>Delete</th>
				</tr>';
				GetSchedule($db,$logged_in_user_id,$type);
			}else{
				echo'
				<table>
				<tr>
					<th>'.$first.'</th>
					<th>'.$third.'</th>
					<th>Delete</th>
				</tr>';
				GetSchedule($db,$logged_in_user_id,$type);
			}
		
}

/////////////////////////////////////////////////////////////////////////////////////////////

function Table($first_data,$second_data,$third_data,$list_id,$db,$type)
{

	if($type == 'hour')
	{
		echo '
		<tr>
		<th>
		<textarea rows="1" cols="10" name="first'.$list_id.'">'.$first_data.'</textarea>
		</th>
		<th>
		<textarea rows="1" cols="2" name="second'.$list_id.'">'.$second_data.'</textarea>
		</th>
		<th>
		<textarea rows="1" cols="2" name="third'.$list_id.'">'.$third_data.'</textarea>
		</th>
		<th>
		<input type="radio" name="delete'.$list_id.'" value="delete">
		</th>
		</tr>';
	}else
	{
		$yes = 1;
		$no = 0;
		if($third_data == $yes)
		{
			$checked_yes = 'checked="checked"';
			$checked_no = '';
		}
		else if($third_data == $no)
		{
			$checked_no = 'checked="checked"';
			$checked_yes = '';
		}else
		{
			$checked_no = '';
			$checked_yes = '';
		}
		echo '
		<tr>
		<th>
		<textarea rows="1" cols="10" name="first'.$list_id.'"">'.$first_data.'</textarea>
		</th>
		<th>
		Yes: <input '.$checked_yes .' type="radio" name="third'.$list_id.'" value="1">
		No: <input '.$checked_no .' type="radio" name="third'.$list_id.'" value="0">
		</th>
		<th>
		<input type="radio" name="delete'.$list_id.'" value="delete">
		</th>
		</tr>';
	}

	$empty = "not set";
	$delete = "";
	$delete = "";
	$first = '';
	$second = '';
	$third = '';

	if (empty($_POST['first'.$list_id])) {
    } else
    {
        $first = $_POST['first'.$list_id];
        $empty = "set";
        $second = 1; //DELETE ME
    }

    if (empty($_POST['second'.$list_id])) {
    } else
    {
        $second = $_POST['second'.$list_id];
        $empty = "set";
    }

    if (empty($_POST['third'.$list_id])) {
    } else
    {
        $third = $_POST['third'.$list_id];
        $empty = "set";
    }

    if (empty($_POST['delete'.$list_id])) {
    } else
    {
        $delete = $_POST['delete'.$list_id];
        $empty = "set";
    }

    if($delete == "delete")
    {
    	DeleteItemSchedule($list_id,$db);
    }else if($empty != 'not set')
    {
    	UpdateSchedule($first,$second,$third,$list_id,$db);
    }
    $empty = "not set";
}

/////////////////////////////////////////////////////////////////////////////////////////

function HistorySchedulePrint($logged_in_user_id,$db)
{

}

///////////////////////////////////////////////////////////////////

?>


