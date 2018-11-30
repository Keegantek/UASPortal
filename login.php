<?php
include 'init.php';

//publicOnlyPage();

// post variables
$username   = $_POST['username'];
$password   = $_POST['password'];
$submit     = $_POST['submit'];

// new variables
$errors = array();

if (isset($submit)) {

  // both fields are entered
  if (empty($username) || empty($password)) {
    $errors[] = "Enter Username and Password";
  }

  $sql = "SELECT * FROM `Person` WHERE `Username`='$username'";
  $query = mysqli_query($db_conx, $sql);
  while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $password_query = $row['Password'];
  }

  if (md5($password) != $password_query) { // is this secure? - I don't feel too comfortable pulling the encrypted password down from the database
     // use password verify instead?
     $errors[] = "Incorrect Password";
  }

  // username and password are correct
  if (getCount('Person', "`Username`='$username'") < 1) {
    $errors[] = "Incorrect Username";
  }

  // log the user in
  if (empty($errors)) {

    $_SESSION['user_id'] = getInfo('Person', "`Username`='$username'", 'Id');

    $user_id = $_SESSION['user_id'];
    $sql = "UPDATE `Person` SET `last_login` = now() WHERE `user_id`='$user_id'";
    mysqli_query($db_conx, $sql);

    header('Location: main.php');
    exit();

  } else {

    $errors = implode(",", $errors);

    header("Location: index.php?username=$username&errors=$errors");
    exit();

  }

}
?>
