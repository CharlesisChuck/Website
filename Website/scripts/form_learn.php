<?php
include("scripts/database-functions.php");
function FilterURL($url)
{

  return $url;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  echo $data;
  return $data;
}

  $url = 
  $title = 
  $description = 
  $status = 
  $type = 
  $category = "";
  
  $urlErr = 
  $titleErr = 
  $descriptionErr = 
  $statusErr = 
  $typeErr = 
  $categoryErr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if (empty($_POST["url"])) {
      $urlErr = "url is required";
    } else {
      $url = test_input($_POST["url"]);
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
      $urlErr = "Invalid URL"; 
    }
    }


    if (empty($_POST["title"])) {
      $titleErr = " is required";
    } else {
      $title = test_input($_POST["title"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$title)) {
      $titleErr = "Only letters and white space allowed"; 
    }
    }


    if (empty($_POST["description"])) {
      $descriptionErr = "description is required";
    } else {
      $description = test_input($_POST["description"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$description)) {
      $descriptionErr = "Only letters and white space allowed"; 
    }
    }


    if (empty($_POST["status"])) {
      $statusErr = "status is required";
    } else {
      $status = test_input($_POST["status"]);
    }


    if (empty($_POST["type"])) {
      $typeErr = "type is required";
    } else {
      $type = test_input($_POST["type"]);
    }

    if (empty($_POST["category"])) {
      $categoryErr = "category is required";
    } else {
      $category = test_input($_POST["category"]);
    }
  }

  $urlfilter = FilterURL($url);
  echo $urlfilter; 
  echo $title;
  echo $description;
  echo $status;
  echo $type;
  echo $category;
  
  $logged_in_user_id = 1; //DELETE ME
  
  InsertForm($logged_in_user_id,$db,$urlfilter,$title,$description,$status,$type,$category);
?>


<h3>Insert your material here</h3>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>">

URL: <input type="text" name="url">
<span class="error">* <?php echo $urlErr;?></span>
<br><br/>

Title: <input type="text" name="title">
<span class="error">* <?php echo $titleErr;?></span>
<br><br/>

Description: <input type="text" name="description">
<span class="error">* <?php echo $descriptionErr;?></span>
<br><br/>

<h4><strong>Status</strong></h4>
Unused: <input type="radio" name="status" value="default">
<br><br/>
Currently Using: <input type="radio" name="status" value="current">
<br><br/>
Finished: <input type="radio" name="status" value="finished">
<span class="error"><?php echo $statusErr;?></span>
<br><br/>

<h4><strong>Input Type</strong></h4>
<select name="type">
  <option value=""></option>
  <option value="yt-playlist">Youtube Playlist</option>
  <option value="yt-video">Youtube Video</option>
  <option value="document">Document</option>
  <option value="website">Website</option>
  <option value="book">Book</option>
  <option value="other">Other</option>
</select>
<span class="error">* <?php echo $typeErr;?></span>
<br><br/>

<h4><strong>Category</strong></h4>
<select name="category">
  <option value=""></option>
  <option value="book">Book</option>
  <option value="feynman">Feynman</option>
  <option value="electronics">Electronics</option>
  <option value="mechanics">Mechanics</option>
  <option value="physics">Physics</option>
  <option value="computer-science">Computer Science</option>
  <option value="buissness">Buissness</option>
  <option value="other">Other</option>
</select>
<span class="error">* <?php echo $categoryErr;?></span>
<br><br/>
<br><br/>

<input type="submit">

</form>





