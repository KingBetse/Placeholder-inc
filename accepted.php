<?php
session_start();
include("classes\connect.php");
include("classes\apply.php");
include("classes\user.php");

$apply= new Apply();
$user= new User();
$DB= new Database();
$post_id=$_GET['id'];
$result=$apply->show($post_id);
print_r($result);
$change=1;
if($result){foreach($result as $row){

    $r=$user->get_user($row['user_id']);
    print_r($r);
    $description=$row['description'];
    $query="UPDATE apply
    SET accepted = '$change'
    WHERE description = '$description' AND post_id = '$post_id'";
$DB->insert($query);


}}





?>