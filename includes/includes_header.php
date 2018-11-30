<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UAS - Plymouth State University</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
  </head>
  <body>
    <div class="header">
      <div style="float:left;">
        <img src="img/img_logo.png" height="50px" class="header-img">
      </div>
      <div style="float:right;margin-right:20px;">
        <?php
        if (loggedIn()) {
          echo "$FirstName $LastName <a href='logout.php'>Logout</a>";
        }
        ?>
      </div>
    </div>
