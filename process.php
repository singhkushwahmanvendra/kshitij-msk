<?php
require 'core.inc.php';
require 'connect.inc.php';


$user_id = (int) $_SESSION['user_id'];

$score =(int) $_SESSION['score'];
$array = unserialize( $_SESSION['question']);
$on_question =  $_SESSION['on_question'];
$no = (string) $array[$on_question][1];
$level = (string) $array[$on_question][0]; 

if(isset($_POST['choice']) && !empty($_POST['choice'])){

$marked_choice =(string) $_POST['choice'];

$query = "SELECT * FROM `choices` WHERE `q_no`='$no' AND `level`='$level'";

$result = mysqli_query($conn,$query);

$choices = $result->fetch_assoc();

$correct_choice =(string) $choices['correct'];


if($marked_choice == $correct_choice){
    $score+=4;
}else{
    $score-=2;
}}
else{
    $score-=1;
}

     $query = "UPDATE `users` SET `score` = $score WHERE `users`.`id` = $user_id";
    $result = mysqli_query($conn,$query);

    if(!$result){
        ?>
            <p class="echo"> alert 'SCORE NOT UPDATED'</p>
          
          <?php
    }
    $_SESSION['score']=$score;

   $on_question=(int)$on_question;
   $on_question+=1;
   $query = "UPDATE `users` SET `on_question` = $on_question WHERE `users`.`id` = $user_id";
   $result = mysqli_query($conn,$query);

if(!$result){
    ?>
            <p class="echo"> alert 'POINTER NOT UPDATED.'</p>
          
          <?php
}
if($on_question > 19)
{
    header('Location: complete.php');
}
else{
    header('location: question.php');
}
?>
