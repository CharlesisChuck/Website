<div class="left-col">
	<h3>Come Back Soon!</h3>
	<p>Need overview of database</p>


<table border="1" cellpadding="1" cellspacing="0">
	<h3>Classes</h3>
	<tr>
		<th>|  list_id  | </th>
		<th>|  url_id  |</th>
		<th>|  type  |</th>
		<th>|  category  |</th>
	</tr>
	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
</table>

<table border="1" cellpadding="1" cellspacing="0">
	<h3>Users</h3>
	<tr>
		<th>|  user_id  |</th>
		<th>|  username  |</th>
		<th>|  password  |</th>
		<th></th>
	</tr>
	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
</table>

<table border="1" cellpadding="1" cellspacing="0">
	<h3>user_classes</h3>
	<tr>
		<th>|  list_id  |</th>
		<th>|  user_id  |</th>
		<th>|  title  |</th>
		<th>|  decription  |</th>
		<th>|  status  |</th>
	</tr>
	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
</table>

</div>
<?php include_once($sidebar . '.php'); 

//DELETE ME
include_once("scripts/database-functions.php");
$username = 'CharlesCurt';
$userid = GetUserID($username,$db);
echo "USER_ID";
echo $userid;


?>
<div class="clear"></div>