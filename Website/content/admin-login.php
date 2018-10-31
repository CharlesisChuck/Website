<div class="left-col">
<?php
include("scripts/database-functions.php");
include("scripts/database-access.php");


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$titleErr = "";
if (empty($_POST["input_username"])) {
      $titleErr = " is required";
    } else {
      $input_username = test_input($_POST["input_username"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$input_username)) {
      $titleErr = "Only letters and white space allowed"; 
    } else
    {
    	CreateNewUser($input_username,$db);
    }
    }
?>



<h3>Make a new Username and start adding content!</h3>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>">


	Username: <input type="text" name="input_username">
<span class="error">* <?php echo $titleErr;?></span>
<br><br/>

<input type="submit">
</div>



<?php include($sidebar . '.php'); ?>
<div class="clear"></div>