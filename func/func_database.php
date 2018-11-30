<?php
/*
func_database.php
connection script for connecting to database

Kieran Egan (keegan@skrolr.com)
*/

/* values */
$hostname = "XXXXXX.plymouth.edu"; // MariaDB server
$username = "Username";
$password = "Password";
$database = "Team4"; // database to connect to

/* connect */
//use $db_conx in every mysqli_query() you want to use
$db_conx = mysqli_connect($hostname, $username, $password, $database);

// error reporting
if (mysqli_connect_errno()) {
  echo mysqli_connect_error();
  exit();
}


?>
