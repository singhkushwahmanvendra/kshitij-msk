<?php
require 'connect.inc.php';
require 'core.inc.php';

$user_id = (int) $_SESSION['user_id'];

$query = "SELECT * FROM `users` WHERE `users`.`id` = $user_id";

$result = mysqli_query($conn,$query);

$user = $result->fetch_assoc();
$_SESSION['question'] = $user['question'] ;
$_SESSION['on_question'] = $user['on_question'] ;
$_SESSION['score'] = $user['score'] ;


$array = unserialize($user['question']);
$on_question =  $user['on_question'];

if($on_question<20){
$no = (string) $array[$on_question][1];
$level = (string) $array[$on_question][0];                            //$query = "UPDATE `users` SET `score` = '$score' WHERE `users`.`id` = 5";
                                                                         
$query = "SELECT * FROM `questions` WHERE `no`='$no' AND `level`='$level'";       //$query = "UPDATE `users` SET `on_question` = '$on_question' WHERE `users`.`id` = 5";
$result = mysqli_query($conn,$query);
$question = $result->fetch_assoc();

$query = "SELECT * FROM `choices` WHERE `q_no`='$no' AND `level`='$level'";
$result = mysqli_query($conn,$query);
$choices = $result->fetch_assoc();

$query = "SELECT * FROM `users`";
$result = mysqli_query($conn,$query);

$i = 0;

while($scores = $result->fetch_assoc()){
    $leaderS[$i] =(int) $scores['score'];
    $i+=1;
}

rsort($leaderS);


$arrlength = count($leaderS);

}

?>