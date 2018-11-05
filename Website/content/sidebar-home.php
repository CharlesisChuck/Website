    <div class="sidebar">

<?php
  include_once("scripts/database-access.php");
  include_once("scripts/database-functions.php");

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


  $username = "";
  $useridErr = "";
  $logged_in_user_id = "user name not found";
  if (empty($_POST["userid"])) {
    } else {
      $username = test_input($_POST["userid"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $useridErr = "Only letters and white space allowed"; 
    }
    }

    $username_value = GetUserId($username,$db);
    if($username_value != "")
    {
    	$useridErr = "You are logged in";
      $_SESSION['idlogin'] = $username_value;

    }
     $username_value = $_SESSION['idlogin'];

  ?>
  <div class="module">
    <strong>User Id #: <?php echo "$username_value"; ?></strong>
  </div>
  <div class="module">
    <h3 class="module-title">Input Username</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>">
	User ID: <input type="userid" name="userid">
	<span class="error"><?php echo $useridErr;?></span>

	<br><br/>
	<input type="submit">
	<br><br/>
	</form>
  </div>
  

