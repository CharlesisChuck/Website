<?php 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function FilterData($db,$logged_in_user_id,$page_category,$filter)
{
	$content = NULL;

	$sql_user = "SELECT * FROM users";
	$result_user = $db -> query($sql_user);
	while($row = $result_user -> fetch_object() )
	{//checking if we are logged in
		$user_id = $row -> user_id;
		if($user_id == $logged_in_user_id)
		{//you are logged in and now can access content


			$sql_classes = "SELECT * FROM classes ORDER BY type ASC";
			$result_classes = $db -> query($sql_classes);
			while($row = $result_classes -> fetch_object() )
			{//checking what category we are in currently
				$list_id = $row -> list_id;
				$url_id = $row -> url_id;
				$category = $row -> category;
				$type = $row -> type;
				if(($category == $page_category)|| 
					($page_category == 'current')||
					($page_category == 'completed'))
				{//finds all content on your page


					$sql_user_classes = "SELECT * FROM user_classes";
					$result_user_classes  = $db -> query($sql_user_classes);
					while($row = $result_user_classes  -> fetch_object() )
					{//checking what item is assigned to our user
						$list_id_check = $row -> list_id;
						$list_user_check = $row -> user_id;
							if( ($list_user_check == $logged_in_user_id) && ($list_id_check == $list_id) )
							{//we found a list_id attached to an user_id
								//attach all data sorted to our object
								$title = $row -> title;
								$description = $row -> description;
								$notes = $row -> notes;
								$status = $row -> status;

								if (($status == $filter)) {
									//we have passed all checks and will now create the item
									ItemCapsule($status,$notes,$description,$title,$type,$url_id,$category,$list_id,$db);

								} else{
										
								}

								$content = "Content Found"; //Content found!
							}
					}
				}
			}
		} else if($user_id != $logged_in_user_id)
			{
				$user_id == NULL;
			}
	}
	$db->close();
	if($user_id == NULL)
	{
		echo "<br>";
		echo "YOU ARE NOT LOGGED IN AND CANNOT SEE YOUR LIST OF CLASSES!";
		echo "<br>";
	}
	if($content == NULL)
	{
		echo "There's nothing here yet <br><br/>";
		echo 'Go to: "Admin" >> "Add Content" to add your content!';
	}

	 $sidebar = FindSideBar($page_category);
	 return $sidebar;
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

//need buttons here for when I want to tell it to make current or completed.
	if($type==$playlist)
	{
		
		echo ('<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=' . $url_id . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br/>');

	}else if($type==$video)
	{
		echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $url_id . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';

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
	else 
	{
		echo "ERROR";
	}

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function FindSideBar($page_category)
{
	$sidebar = "sidebar-home";
	if($page_category != "feynman")
	{
		$sidebar = "sidebar-classes";
	} else if($page_category == "feynman")
	{
		$sidebar = "sidebar-feynman";
	}      
	return $sidebar;
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
    }



}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function NoteCreator($list_id,$db)
{
	$previousNotes = GetPreviousNotes($list_id,$db);
	echo '
<strong>Notes: </strong>
<form method="post" >
<textarea rows="20" cols="90" name="notes'.$list_id.'">'.$previousNotes.'</textarea>
<input type="submit" value="Save Notes">
</form>
';

$notes = "not set";
if (empty($_POST['notes'.$list_id])) {
    } else
    {
    	
        $notes = $_POST['notes'.$list_id];

        UpdateNotes($notes,$list_id,$db);
    }
	



}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
function DeleteButton($list_id,$db)
{

echo'
<form method="post">
Current: <input type="radio" name="delete'.$list_id.'" value="delete">
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
    }


}


////////////////////////////////////////////////////////////

// DocumentUploader($list_id,$db)
// {

	
// }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function ItemCapsule($status,$notes,$description,$title,$type,$url_id,$category,$list_id,$db)
{

	echo '<div class="item-small"><strong><a>'.$title.'</a>:</strong>'.$description.'</div>';

    echo '<div class="item-content">';
	
	CreateItemCurrent($status,$notes,$description,$title,$type,$url_id,$category);
	ItemButton($list_id,$db);
	NoteCreator($list_id,$db);
	DeleteButton($list_id,$db);

	echo '</div>';

	echo '<script>
	$(document).ready(function(){$(".item-content").hide();   
	$( "div.item-small" ).click(function() {
    $(this).next().toggle();
	});
	});
	</script>';				

}


?>