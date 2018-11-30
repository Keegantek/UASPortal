<?php
// include main php file
include 'init.php';

// end session
session_destroy();

// redirect
header('Location: index.php');
exit();

?>
