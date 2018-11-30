<?php
// include all necessary files
include 'init.php';

privateOnlyPage();

// header
include 'includes/includes_header.php';

// content
?>
<div class='content'>
  <div class='content-inner'>
    <?php
    echo "<div class='title'>Hi $FirstName</div>";
    ?>
    <div class="boxes">
      <div class="box vertical-container" style="margin:10px;">
        <div style="line-height:350px;margin:0 auto;font:30px Roboto;font-weight:300;">
          Course Catalog
        </div>
      </div>
      <div class="box vertical-container" style="margin:10px;">
        <div style="line-height:350px;margin:0 auto;font:30px Roboto;font-weight:300;">
          View My Grades
        </div>
      </div>
    </div>
    <?php
    foreach ($roles as $role) {
      echo "$role<br />";
    }

    if (in_array("Student", $roles)) {
      echo "Yo Ur a Student";
    }

    ?>
  </div>
</div>
