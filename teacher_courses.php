<?php

include 'init.php';

privateOnlyPage();

if (!Employee($roles)) {
  header('Location: index.php');
  exit();
}

echo "Courses";

?>
