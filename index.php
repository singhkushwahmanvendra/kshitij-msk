<?php
require 'core.inc.php';
require 'connect.inc.php';
//session_destroy();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    header('location:logout.php');
}else{
include 'loginform.php';
}
?>