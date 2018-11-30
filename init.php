<?php
/*
University Administration System
Plymouth State University

A Project for Dr. Shen's CS3600

Authors: Kieran Egan, Sam Yorke, Ryan Latorella

Copyright © 2018

Breakdown of System:
init.php - the main initialization page for all php files - all pages should have this file included
*/

// start session - important for login system - cookies
session_start();

// connect to database
include 'func/func_database.php';

// main functions
include 'func/func_main.php';

// user information
if (loggedIn()) {

  $Id = $_SESSION['user_id'];
  $sql = "SELECT * FROM `Person` WHERE `Id`='$Id'";
  $query = mysqli_query($db_conx, $sql);
  while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $FirstName = $row['FirstName'];
    $LastName = $row['LastName'];
  }

  $roles = userLevel($Id);

}

?>
