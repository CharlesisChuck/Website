<div class="sidebar">
  <div class="module">
    <h3 class="module-title">About</h3>
    <p>This schedule is a unique way to make you more productive in life while also allowing flexibility. Simply put this schedule goes off of your weekly time instead of hour by hour. This allows events and problems to occur and still not break your flow of productivity.</p>
  </div>
  <div class="module">
    <h3 class="module-title">How To Guide</h3>
    <p><ul>
    	<li>Insert Data into the table below</li>
    	<li>Submit</li>
    	<li>Fill tables as needed</li>
    	<li>d</li>
    	<li>e</li>
    	<li>f</li>
    </ul></p>
  </div>

    <div class="module">
    <h3 class="module-title">Schedule Insert</h3>
    <p><ul>
      <?php
    $first = 'Task';
    $second = 'Importance';
    $third = 'Completed';
    $type = 'hour';

    CreateSchedule($first,$second,$third,$type,$db,$logged_in_user_id);
    ?>
    </ul></p>
  </div>
  
