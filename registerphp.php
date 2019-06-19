<?php
require 'core.inc.php';
require 'connect.inc.php';

//if(isset($_SESSION['user_id']) && empty($_SESSION['user_id'])){

    if( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_again']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conf_password = $_POST['password_again'];

        $password_hash = md5($password);

        if( !empty($username) && !empty($password) && !empty( $conf_password) )
        {
          if($password===$conf_password){
            
            $query = "SELECT `username` FROM `users` WHERE `username`='$username'";
            $result = mysqli_query($conn,$query);

            if(mysqli_num_rows($result)==1){
                ?>
                <p class="echo"> alert 'select diffferent username.'</p>
              
              <?php
            }else{

                $no = mt_rand(1,3);
                
                switch($no){
                 case "1" :
                 $array = array(
                     array(1,2), array(1,1), array(1,3), array(1,5), array(1,4),
                     array(2,6), array(2,8), array(2,7), array(2,10), array(2,9),
                     array(3,12), array(3,11), array(3,13), array(3,15), array(3,14),
                     array(2,16), array(2,18), array(2,17), array(2,19), array(2,20)
                 );
                    break;
                 case "2" :
                 $array = array(
                    array(1,3), array(1,4), array(1,5), array(1,1), array(1,2),
                    array(2,10), array(2,9), array(2,8), array(2,7), array(2,6),
                    array(3,11), array(3,12), array(3,13), array(3,15), array(3,14),
                    array(4,17), array(4,20), array(4,18), array(4,16), array(4,19)
                 );
                   break;
                   case "3":
                   $array = array(
                    array(1,1), array(1,4), array(1,5), array(1,3), array(1,2),
                    array(2,8), array(2,10), array(2,9), array(2,6), array(2,7),
                    array(3,15), array(3,11), array(3,12), array(3,13), array(3,14),
                    array(4,19), array(4,17), array(4,20), array(4,18), array(4,16)
                 );
                 break;
                }


              $insert = serialize($array);


            $query = "INSERT INTO `users` VALUES ('','$username','$password_hash','','$insert','')";

            if($result = mysqli_query($conn,$query)){

               $_SESSION['reg']='success';
               header('location:loginform.php');
                
            }else{
                echo 'couldn\'t register';
            }
            }

          }else{
              ?>
                <p class="echo"> alert 'password do not match'</p>
              
              <?php
          }
        }else
        {
            ?>
            <p class="echo"> alert 'all fields are required.'</p>
          
          <?php
        }
    }

    ?>