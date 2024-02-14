<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8" >
  <title>Thank you for your contribution</title>
  <style type="text/css">
  ol, ul { 
     list-style-type: none;
      }
  body {  
  background-color: #ADD8E6;
  margin: 0 10%;
  font-family: sans-serif;
  }
  h1 {
  text-align: center;
  font-family: serif;
  font-weight: normal;
  text-transform: uppercase;
  border-bottom: 1px solid #00008B;
  margin-top: 30px;
  }
  h2 {
  color: #800000;
  font-size: 1em;
  }
  p.disclaimer { 
    border-top: 1px solid #00008B; 
    padding-top: 1em;
  }
</style>
</head>
<body>

  <?php if (isset($_POST['organs']) && !is_array($_POST['organs'])) {
    $organs_problem = TRUE;
    $organs = is_string($_POST['organs']) ? $_POST['organs'] : '<em>empty</em>';
  }
  else {
    $organs_problem = FALSE;
    $organs = isset($_POST['organs']) ? implode(', ', $_POST['organs']) : '<em>empty</em>';
  } ?>
<h1>THANK YOU</h1>

<p>Thank you for your contribution. We have the following information regarding your status as a donor:</p>

<h2>Your Information</h2>
<ul>
<li><strong>Name:</strong> <?php print $_POST['donorname'] ? $_POST['donorname'] : '<em>empty</em>'; ?></li>
<li><strong>Address:</strong> <?php print $_POST['address'] ? $_POST['address'] : '<em>empty</em>'; ?></li>
<li><strong>Telephone number:</strong> <?php print $_POST['telephone'] ? $_POST['telephone'] : '<em>empty</em>'; ?></li>
<li><strong>Email Address:</strong> <?php print $_POST['email'] ? $_POST['email'] : '<em>empty</em>'; ?></li>
</ul>
<p><strong>Notable Health Conditions:</strong> <?php print $_POST['condition'] ? $_POST['condition'] : '<em>empty</em>'; ?></p>

<h2>Donor Status</h2>

<?php if (!isset($_POST['type']) && !isset($_POST['organs']) && !isset($_POST['number'])) { ?>
<em>Sorry, we did not receive your information. <a href="file:///Users/Dawlat/Desktop/Donation/index.html">Try again.</a></em>
<?php } 
  else { ?>
    <ul>
    <li><strong>Type:</strong> <?php print isset($_POST['type']) && $_POST['type'] ? $_POST['type'] : '<em>empty</em>'; ?></li>
    <li><strong>Organs:</strong> <?php
      print $organs;
      if ($organs_problem) { ?>
        <span style="color:blue">*</span>
     <?php } ?></li>
    <li><strong>Number:</strong> <?php print isset($_POST['number']) && $_POST['number'] ? $_POST['number'] : '<em>empty</em>'; ?></li>
    </ul>
<?php  }
if ($organs_problem) { ?>
  <hr />
  <p>&nbsp;</p>
<?php } ?>

<p class="disclaimer"><small>This site is for educational purposes only. You will not be added to the organ registry list.</small></p>

</body>
</html>