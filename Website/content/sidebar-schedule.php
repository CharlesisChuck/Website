<div class="sidebar">
  <div class="module">
    <h3 class="module-title">About</h3>
    <p>This schedule is a unique way to make you more productive in life while also allowing flexibility. Simply put this schedule goes off of your weekly time instead of hour by hour. This allows events and problems to occur and still not break your flow of productivity.</p>
  </div>
  <body onload="document.submit_schedule.reset();">
  <div class="module">
     <h3 class="module-title">Insert Schedule Info</h3>
     
    <form method="post" name="submit_schedule">

      <h4>Hour Input</h4>
      <table>
        <tr>
          <th>Name</th>
          <th>Total</th>
          <th>Used</th>
        </tr>
        <tr>
          <th>
          <textarea rows="1" cols="10" name="first_hour"></textarea>
          </th>

          <th>
          <textarea rows="1" cols="2" name="second_hour"></textarea>
          </th>

          <th>
          <textarea rows="1" cols="2" name="third_hour"></textarea>
          </th>
        </tr>
        <input type="submit" name="Schedule_Create" value="Add Hours!">
    </table>
    <br><br/>

    <h4>Task Input</h4>
    <table>
        <tr>
          <th>Task</th>
          <th>Importance</th>
        </tr>

      <tr>
          <th>
          <textarea rows="1" cols="10" name="first_task""></textarea>
          </th>

          <th>
          <textarea rows="1" cols="2" name="second_task"></textarea>
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
        <input type="submit" name="Schedule_Create" value="Add Tasks!">
    </form></table>
</body>
<?php
include("scripts/database-access.php");
$logged_in_user_id = $_SESSION['idlogin'];
  if(($logged_in_user_id == NULL))
  {
    $logged_in_user_id = 0;
  }

$first = '';
$second = '';
$third = '';
$type = '';

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

    $MyUpdateStatus = "not set";
  if (empty($_POST['Schedule_Create'])) {
    } else
    {
    
        $MyUpdateStatus = $_POST['Schedule_Create']; 
       CreateItem($first,$second,$third,$logged_in_user_id,$db,$type,$MyUpdateStatus);
    }




    if (empty($_POST['first_hour'])) {
    } else
    {
        $first = $_POST['first_hour'];
       $type = 'hour';
    }


    if (empty($_POST['second_hour'])) {
    } else
    {
        $second = $_POST['second_hour'];
    }

    if (empty($_POST['third_hour'])) {
    } else
    {
        $third = $_POST['third_hour'];
        
    }
     $MyUpdateStatus = "not set";
  if (empty($_POST['Schedule_Create'])) {
    } else
    {
    
        $MyUpdateStatus = $_POST['Schedule_Create']; 
       CreateItem($first,$second,$third,$logged_in_user_id,$db,$type,$MyUpdateStatus);
    }

?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

  </div>

  

