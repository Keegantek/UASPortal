<?php
/*
All Main User Functions
*/

/*
sanitizeString
Makes sure a String is able to be passed through code
*/
function sanitizeString($var) {
  include 'func_database.php';

  $var = stripslashes($var);
  $var = htmlentities($var);
  $var = strip_tags($var);
  $var = mysqli_real_escape_string($db_conx, $var);

  return $var;

}

/*
getCount
Returns Count Query

parameters:
$table  - The Table to search
$search - String of the fields and values to search - should be `field`='value' [AND]
*/
function getCount($table, $search) {
  include 'func_database.php';

  $sql = "SELECT * FROM `$table` WHERE $search";
  return mysqli_num_rows(mysqli_query($db_conx, $sql));

}

/*
getInfo
Gets info on one specific item
*/
function getInfo($table, $search, $what) {
  include 'func_database.php';

  $sql = "SELECT * FROM `$table` WHERE $search LIMIT 1";
  $query = mysqli_query($db_conx, $sql);
  while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    return $row[$what];
  }

}

/*
loggedIn
Returns if User is Logged in Or Not
*/
function loggedIn() {

  if (isset($_SESSION['user_id'])) {
    return true;
  } else {
    return false;
  }

}

/*
privateOnlyPage
*/
function privateOnlyPage() {
  if (!loggedIn()) {
    header('Location: index.php');
    exit();
  }
}

/*
publicOnlyPage
*/
function publicOnlyPage() {
  if (loggedIn()) {
    header('Location: main.php');
    exit();
  }
}

function userLevel($Id) {
  include 'func_database.php';

  $roles = array();

  // student
  $sql = "SELECT * FROM `Student` WHERE `Id`='$Id'";
  $query = mysqli_query($db_conx, $sql);
  $num_rows = mysqli_num_rows($query);
  if ($num_rows > 0) {
    $roles[] = "Student";
  }

  // teacher
  $sql = "SELECT * FROM `Employee` WHERE `Id`='$Id'";
  $query = mysqli_query($db_conx, $sql);
  $num_rows = mysqli_num_rows($query);
  if ($num_rows > 0) {
    $roles[] = "Employee";
  }

  return $roles;

}

function Student($roles) {

  return in_array("Student", $roles);

}

function Employee($roles) {

  return in_array("Employee", $roles);

}

?>
