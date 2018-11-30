<?php

include 'init.php';

privateOnlyPage();

if (!Student($roles)) {
  header('Location: index.php');
  exit();
}

echo "Grades";

?>
