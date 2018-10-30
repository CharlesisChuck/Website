<?php 

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
				if($category == $page_category)
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

								/*creates the visual item on page*/

								PrintItemByStatus($status,$notes,$description,$title,$type,$url_id,$category);

								$content = 1; //Content found!
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
		echo "add content!";
	}

	 $sidebar = FindSideBar($page_category);
	 return $sidebar;
}


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
		echo ("<h3>" . $title ."</h3> <br/>");
		echo ('<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=' . $url_id . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br/>');
		echo("<p>" . $description . "</p> <br/>");

	}else if($type==$video)
	{
		echo ("<h3>" . $title ."</h3> <br/>");
		echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $url_id . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
		echo("<p>" . $description . "</p> <br/>");

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


function CreateItemDefault($status,$notes,$description,$title,$type,$url_id,$category)
{

}
function CreateItemComplete($status,$notes,$description,$title,$type,$url_id,$category)
{

}

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

function PrintItemByStatus($status,$notes,$description,$title,$type,$url_id,$category)
{
	if($status == 'default')
	{
		echo "DEFAULT";
		CreateItemCurrent($status,$notes,$description,$title,$type,$url_id,$category);

	} else if($status == 'current')
	{
		echo "CURRENT";
		CreateItemCurrent($status,$notes,$description,$title,$type,$url_id,$category);

	} else if($status == 'completed')
	{
		echo "COMPLETED";
		CreateItemCurrent($status,$notes,$description,$title,$type,$url_id,$category);
	}

	
}
?>