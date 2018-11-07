<div class="sidebar">
<!------------------------------------------------------------------------------------>
<div class="module">
  <h3 class="module-title">About</h3>
  <p>This schedule is a unique way to make you more productive in life while also allowing flexibility. Simply put this schedule goes off of your weekly time instead of hour by hour. This allows events and problems to occur and still not break your flow of productivity.</p>
</div>
<!------------------------------------------------------------------------------------>
<body onload="document.submit_schedule.reset();">
<!------------------------------------------------------------------------------------>
  <div class="module">
    <h3 class="module-title">Insert Schedule Info</h3>
     
    <form method="post" name="submit_schedule">
      <h4>Hour Input</h4>

      <table>

        <tr>
          <th>Name</th>
          <th>Total</th>
          <th>Used</th>
          <th>Good/Bad?</th>
        </tr>

        <tr>
          <th>
          <textarea rows="1" cols="10" name="first_hour" maxlength="10"></textarea>
          </th>
          <th>
          <textarea rows="1" cols="3" name="second_hour" maxlength="3"></textarea>
          </th>
          <th>
          <textarea rows="1" cols="3" name="third_hour" maxlength="3"></textarea>
          </th>
          <th>
          <select name="good_bad">
          <option value="good">Good</option>
          <option value="bad">Bad</option>          
          </select>
          </th>
        </tr>

      <input type="submit" name="Schedule_Create_Hour" value="Add Hours!">
      </table>
    <br><br/>

    <h4>Task Input</h4>
    <table>
        <tr>
          <th>Task</th>
          <th>Category</th>
        </tr>

      <tr>
          <th>
          <textarea rows="1" cols="10" name="first_task" maxlength="10"></textarea>
          </th>

          <th>
          <select name="type_task">
          <option value="day">Day</option>
          <option value="week">Week</option>
          <option value="month">Month</option>
          <option value="year">Year</option>
          
          </select>
        </th>
        </tr>
        <input type="submit" name="Schedule_Create_Task" value="Add Tasks!">
    </form></table>
  
  </div>
<!------------------------------------------------------------------------------------>
</body>
<!------------------------------------------------------------------------------------>
<?php
include("scripts/database-access.php");

$logged_in_user_id = $_SESSION['idlogin'];
if(($logged_in_user_id == NULL)){
    $logged_in_user_id = 0;
}

$first = '';
$second = '';
$third = '';
$type = '';
$good_bad = NULL;

  if (empty($_POST['first_task'])) {
  } else
  {
      $first = $_POST['first_task'];

  }


  if (empty($_POST['second_task'])) {
  } else
  {
      $second = $_POST['second_task'];
      $third = '0';
  }

  if (empty($_POST['type_task'])) {
  } else
  {
      $type = $_POST['type_task'];

  }

  if (empty($_POST['good_bad'])) {
  } else
  {
    if($type == 'hour')
    {
      
    }

  }

  $MyUpdateStatus = "not set";
  if (empty($_POST['Schedule_Create_Task'])) {
  } else
  {
    $second = 1;
      $MyUpdateStatus = $_POST['Schedule_Create_Task']; 
     ScheduleInput($first,$second,$third,$logged_in_user_id,$db,$type,$MyUpdateStatus,$good_bad);
     echo "<meta http-equiv='refresh' content='0'>";  
      
  }


  if (empty($_POST['first_hour'])) {
  } else
  {
      $first_hour = $_POST['first_hour'];
     $type = 'hour';
  }


  if (empty($_POST['second_hour'])) {
  } else
  {
      $second_hour = $_POST['second_hour'];
  }

  if (empty($_POST['third_hour'])) {
  } else
  {
      $third_hour = $_POST['third_hour'];
      
  }
   $MyUpdateStatus = "not set";
  if (empty($_POST['Schedule_Create_Hour'])) {
  } else
  {
    $good_bad = $_POST['good_bad'];
    $type = 'hour';
      $MyUpdateStatus = $_POST['Schedule_Create_Hour']; 
     ScheduleInput($first_hour,$second_hour,$third_hour,$logged_in_user_id,$db,$type,$MyUpdateStatus,$good_bad);
     echo "<meta http-equiv='refresh' content='0'>"; 
  }
?>

<!------------------------------------------------------------------------------------>
<div class="module">
  <h3 class="module-title">How To</h3>
  <ul>
    <li>Hours: add a weeks worth of hours and count them as you complete it.</li>
    <li>Tasks: Add tasks by a category and mark them off as you complete them.</li>
    <li>Save and Reset: This is so at the end of the week you can save your score and reset the items in you list.</li>
  </ul>
</div>
<!------------------------------------------------------------------------------------>

</div>