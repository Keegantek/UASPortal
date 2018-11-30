<?php
/*
Homepage
index.php
*/

// include all necessary files
include 'init.php';

publicOnlyPage();

// header
include 'includes/includes_header.php';

// get variables
$errors = array("");
if (isset($_GET['username'])) {
  $username = $_GET['username'];
  $errors = explode(",", $_GET['errors']);
  if ($username === "") {
    $username = "Username";
  }
}

?>
<div class="index-content">
  <div class="content-inner vertical-container">
    <div class="vertical">
      <div class="box" style="float:right;">
        <table style="height:300px;margin:0 auto;width:280px;" valign="center">
          <tr>
            <td>
              <div class="item">
                <div class="title">Sign In</div>
                <form method="POST" action="login.php">
                  <input type="text" placeholder="Username" name="username" value="<?php echo $username;?>"><br />
                  <input type="password" placeholder="Password" name='password'><br />
                  <div class="" style="float:left;padding-top:25px;padding-left:10px;color:#b84242">
                    <?php
                    foreach ($errors as $error) {
                      echo "$error<br />";
                    }
                    ?>
                  </div>
                  <div class="" style="float:right">
                    <input type='submit' class="login-button" name='submit' value='Sign In'>
                  </div>
                </form>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php
include 'includes/includes_footer.php';
?>
