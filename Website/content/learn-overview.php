<div class="left-col">
<?php
include("scripts/database-access.php");
include("scripts/database-functions.php");
$logged_in_user_id = $_SESSION['idlogin'];
  if(($logged_in_user_id == NULL))
  {
    $logged_in_user_id = 0;
  }
?>

	<h3>Welcome to the Learning section of MyDataBorg!</h3>
	<p>Here's an overview of the content you've added so far.</p>

	<h3>By the Numbers</h3>
	<ul>
		<li>Total Items: <?php 
		$tag = 'total';
		$Total = CountEntries($logged_in_user_id,$db, $tag);
		echo $Total; 
		?> </li>

		<li>Current Items: <?php 
		$tag = 'current';
		$Total = CountEntries($logged_in_user_id,$db, $tag); 
		echo $Total; 
		?></li>

		<li>Completed Items: <?php 
		$tag = 'completed';
		$Total = CountEntries($logged_in_user_id,$db, $tag);
		echo $Total;  
		?> </li>

		<li>Unseen Items: <?php 
		$tag = 'default';
		$Total = CountEntries($logged_in_user_id,$db, $tag);
		echo $Total;  
		?> </li>

		<li>Youtube Playlists: <?php 
		$tag = 'yt-playlist';
		$Total = ClassesCount($logged_in_user_id, $db, $tag);
		echo $Total;  
		?> </li>

		<li>Web Development Items: <?php 
		$tag = 'webdev';
		$Total = ClassesCount($logged_in_user_id, $db, $tag);
		echo $Total;  
		?> </li>

		<li>Computer Science Items: <?php 
		$tag = 'computer-science';
		$Total = ClassesCount($logged_in_user_id, $db, $tag);
		echo $Total;  
		?> </li>

		

	</ul>






</div>

<?php include($sidebar . '.php'); ?>
<div class="clear"></div>