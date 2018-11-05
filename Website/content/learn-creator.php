<div class="left-col">
<?php
$page_category = $_GET['page_category'];

if(($page_category == 'current'))
{
  $filter = 'current';
  echo '<h3>My Current Classes</h3>';

}
else if($page_category == 'completed')
{
  $filter = 'completed';
  echo '<h3>My Completed Classes</h3>';
}
else
{
echo '<form method="post" >
<strong>Filter By Status</strong>
<select name="filter">
  <option value=""></option>
  <option value="current">Current</option>
  <option value="completed">Completed </option>
  <option value="default">Unseen</option>
</select>

<input type="submit">

</form>';

echo 'Filter: ';
if (empty($_POST["filter"])) {
    echo 'none';
    } else
    {
    	$filter = $_POST['filter'];
      echo $filter;
    }


echo '<br><br/>';
}
include("scripts/class-item-creator.php");
include("scripts/database-access.php");
include("scripts/database-functions.php");


  $logged_in_user_id = $_SESSION['idlogin'];
  if(($logged_in_user_id == NULL))
  {
    $logged_in_user_id = 0;
  }

$sidebar = FilterData($db,$logged_in_user_id,$page_category,$filter);



?>
<script>
  $(document).ready(function(){$(".item-content").hide();   
  $( "div.item-small" ).click(function() {
    $(this).next().toggle();
  });
  });
  </script>
</div>

<div class="clear"></div>