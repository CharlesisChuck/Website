<?php

include("scripts/database-functions.php");

/////////////////////////////////////////////////////////////////////////
function FilterURL($url,$type)
{
  $filtered_url = "";
 
  if($type == "yt-playlist")
{
  $filtered_url = strstr($url, 'list=', false);
  $filtered_url = str_replace("list=","","$filtered_url");

} else if ($type == "yt-video")
{
  $filtered_url = strstr($url, 'watch?v', false);
  $filtered_url = str_replace("watch?v=","","$filtered_url");
} else{
  $filtered_url = $url;
}

  return $filtered_url;
}


/////////////////////////////////////////////////////////////////////////
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
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

  
  
  $logged_in_user_id = $_SESSION['idlogin'];
  if(($logged_in_user_id == NULL))
  {
    $logged_in_user_id = 0;
  }
  if($logged_in_user_id == 0)
  {
    echo 'YOU ARE NOT SIGNED IN, NO CONTENT ADDED';
  } else if($title != '')
  {
    $filteredurl = FilterURL($url,$type);
    InsertSQLForm($logged_in_user_id,$db,$filteredurl,$title,$description,$status,$type,$category);
  }
/////////////////////////////////////////////////////////////////////////
?>






