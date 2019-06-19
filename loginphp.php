<?php
require 'core.inc.php';
require 'connect.inc.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];                                                    //saving username and password to variables.

  $password_hash = md5($password);                                                       //converting passsword string to md5(). 

  if (!empty($username) && !empty($password))                                                  //checking username and password whether empty or not.
  {
    $query = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password_hash' ";        //query to execute and select id of user.

    $result = mysqli_query($conn, $query);                              //executing query using function and saving to variable $result.
    
    if (!$result)                                              //checking if query is running or not
    {
      echo 'SORRY CANNNOT COMPLETE REQUEST AT THE MOMENT';
    }
    $no_row = mysqli_num_rows($result);

    if ($no_row == 0) {
      echo 'no data found';
    } else if ($no_row == 1) {
      $user = $result->fetch_assoc();
      // $user_id = mysqli_result($result,0,'id');
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['score'] = $user['score'];
      if ($user['on_question'] < 20) {
        header('location: question.php');
      } else {
        header('location: complete.php');
      }
    }
  } else {
    ?>
    <p class="echo"> alert 'enter username and password';</p>

  <?php
}
}
if (@$_SESSION['reg'] == 'success') {
  ?>
  <p class="alert"> alert 'REGISTERATION SUCCESS';</p>

<?php
}
?>