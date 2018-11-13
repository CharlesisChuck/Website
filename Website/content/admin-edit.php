<div class="left-col">

<?php include("scripts/form-learn.php"); ?>

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
  Finished: <input type="radio" name="status" value="completed">
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
  <option value="webdev">Web Development</option>
  <option value="mechanics">Mechanics</option>
  <option value="electronics">EE</option>
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

<script type="text/javascript">
if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
  }
</script>

</div>

<?php include($sidebar . '.php'); ?>
<div class="clear"></div>