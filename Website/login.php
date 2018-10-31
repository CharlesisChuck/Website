
<a href="index.php?page=home&login=guest&password=rXnT52SOpq"><strong>Guests Click Here</strong></a>   
<p>This will give you example site, no info will be saved</p>
<p></p>
<p></p>


<h3>Users Login: </h3>
<form action="index.php" method="post">

	<table border="1" cellpadding="5" cellspacing="0">
		<tr>
			<td style="width: 100px;">Username:</td>
			<td style="width: 150px;"><input type="text" name="username"></td>
		</tr>
		
		<tr>
			<td style="width: 100px;">Password:</td>
			<td style="width: 150px;"><input type="text" name="password"></td>
		</tr>
		<tr>
			
		</tr>

	</table>	

	<input type="submit">

</form>

<h3>Employers: </h3>
<p>Fill out the info here and you'll see more content than guest relating to myself</p>
<form action="index.php" method="post">

	<table border="1" cellpadding="5" cellspacing="0">
		<tr>
			<td style="width: 100px;">Company:</td>
			<td style="width: 150px;"><input type="text" name="company"></td>
		</tr>
		
		<tr>
			<td style="width: 100px;">Email: (optional)</td>
			<td style="width: 150px;"><input type="text" name="email"></td>
		</tr>
		<tr>
			<td style="width: 100px;">Position: (optional)</td>
			<td style="width: 150px;"><input type="text" name="position"></td>
		</tr>

	</table>	

	<input type="submit">

</form>

<h3>Hackers: </h3>
<form action="index.php" method="post">
<p>Feel free to break in, there is no dangerous info here. If you find a hole in security tell me what below I'd love to learn!</p>
	<table border="1" cellpadding="5" cellspacing="0">
		<tr>
			<td style="width: 100px;">Type of Attack:</td>
			<td style="width: 150px;"><input type="text" name="company"></td>
		</tr>
		
		<tr>
			<td style="width: 100px;">Time it took to implement:</td>
			<td style="width: 150px;"><input type="text" name="email"></td>
		</tr>

		<tr>
			<td style="width: 100px;">Where security hole was:</td>
			<td style="width: 150px;"><input type="text" name="email"></td>
		</tr>

		<tr>
			<td style="width: 100px;">Notes: </td>
			<td style="width: 150px;"><input type="text" name="position"></td>
		</tr>

	</table>	

	<input type="submit">

</form>

<?php

$notes = "not set";
if (empty($_POST["notes"])) {
    } else
    {
    	
        $notes = $_POST['notes'];
    }
$notes = "not set";
if (empty($_POST["notes"])) {
    } else
    {
    	
        $notes = $_POST['notes'];
    }
$notes = "not set";
if (empty($_POST["notes"])) {
    } else
    {
    	
        $notes = $_POST['notes'];
    }






?>