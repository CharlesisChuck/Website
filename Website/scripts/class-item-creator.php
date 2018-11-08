<?php 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function FilterData($db,$logged_in_user_id,$page_category,$filter)
{
	$content = NULL;

	$sql_classes = "SELECT * 
	FROM classes 
	WHERE `category` = '$page_category' OR `category` = 'current' OR `category` = 'completed' ";

	$result_classes = $db -> query($sql_classes);
	while($row = $result_classes -> fetch_object() )
	{//checking what category we are in currently
		$list_id = $row -> list_id;
		$url_id = $row -> url_id;
		$category = $row -> category;
		$type = $row -> type;
				
		$sql_user_classes = "SELECT * 
		FROM user_classes 
		WHERE `list_id` = '$list_id' AND `user_id` = '$logged_in_user_id' ";

		$result_user_classes  = $db -> query($sql_user_classes);
		while($row = $result_user_classes  -> fetch_object() )
		{//checking what item is assigned to our user				
			$title = $row -> title;
			$description = $row -> description;
			$notes = $row -> notes;
			$status = $row -> status;

			if (($status == $filter)) 
			{
				//we have passed all checks and will now create the item
				ItemCapsule($status,$notes,$description,$title,$type,$url_id,$category,$list_id,$db);
				$content = "Content Found"; //Content found!
			} 
			
							
		}
				
	}
	$db->close();

	if($content == NULL)
	{
		echo "There's nothing here yet <br><br/>";
		echo 'Go to: "Admin" then "Add Content" to add your stuff!';
	}

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function CreateItemCurrent($status,$notes,$description,$title,$type,$url_id,$category)
{

$playlist = 'yt-playlist';
$video = 'yt-video';
$document = 'document';
$website = 'website';
$books = 'book';
$other = 'other';

	if($type==$playlist)
	{
		
		echo ('<iframe width="800" height="500" src="https://www.youtube.com/embed/videoseries?list=' . $url_id . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br/>');

	}else if($type==$video)
	{
		echo '<iframe width="800" height="500" src="https://www.youtube.com/embed/' . $url_id . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';

	}else if($type==$document)
	{
		echo '<blockquote class="embedly-card"><h4><a href="http://' . $url_id . '">'. $title .'</a></h4><p>' . $description . '</p></blockquote>
			<script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>';

	}else if($type==$website)
	{
		echo '<blockquote class="embedly-card"><h4><a href="http://' . $url_id . '">'. $title .'</a></h4><p>' . $description . '</p></blockquote>
			<script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>';
	}
	else if($type==$books)
	{
		echo '<blockquote class="embedly-card"><h4><a href="http://' . $url_id . '">'. $title .'</a></h4><p>' . $description . '</p></blockquote>
			<script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>';
	} else if($type==$other)
	{
		echo '<blockquote class="embedly-card"><h4><a href="http://' . $url_id . '">'. $title .'</a></h4><p>' . $description . '</p></blockquote>
			<script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>';
	}

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function ItemButton($list_id,$db)
{
echo'
<form method="post">
<strong>Current Status: </strong>
Current: <input type="radio" name="status'.$list_id.'" value="current">
Finished: <input type="radio" name="status'.$list_id.'" value="completed">
Default: <input type="radio" name="status'.$list_id.'" value="default">
<input type="submit" value="Change Status">
</form>
';

$MyUpdateStatus = "not set";
if (empty($_POST['status'.$list_id])) {
    } else
    {
    	
        $MyUpdateStatus = $_POST['status'.$list_id];
        UpdateStatus($MyUpdateStatus,$list_id,$db);
        echo "<meta http-equiv='refresh' content='0'>";	
    }



}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function NoteCreator($list_id,$db)
{
	$previousNotes = GetPreviousNotes($list_id,$db);
	echo '
<form method="post" >
<textarea rows="25" cols="130" name="notes'.$list_id.'">'.$previousNotes.'</textarea>
<input type="submit" value="Save Notes">
</form>
';

$notes = "not set";
if (empty($_POST['notes'.$list_id])) {
    } else
    {
    	
        $notes = $_POST['notes'.$list_id];

        UpdateNotes($notes,$list_id,$db);
        echo "<meta http-equiv='refresh' content='0'>";	
    }
	



}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function DeleteButton($list_id,$db)
{

echo'
<form method="post">
Delete?: yes<input type="radio" name="delete'.$list_id.'" value="delete">
<input type="submit" value="Delete">
</form>
<br><br/>
';

$DeleteItem = "not set";
if (empty($_POST['delete'.$list_id])) {
    } else
    {
    	
        $DeleteItem = $_POST['delete'.$list_id];
        DeleteItem($DeleteItem,$list_id,$db);
        echo "<meta http-equiv='refresh' content='0'>";	
    }

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function ItemCapsule($status,$notes,$description,$title,$type,$url_id,$category,$list_id,$db)
{

	echo '<div class="item-small"><strong><a>'.$title.'</a>:</strong>'.$description.'</div>';

    echo '<div class="item-content">';
	
	CreateItemCurrent($status,$notes,$description,$title,$type,$url_id,$category);
	
	NoteCreator($list_id,$db);
	ItemButton($list_id,$db);
	DeleteButton($list_id,$db);

	echo '</div>';

}


?>