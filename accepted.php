<?php
session_start();
include("classes\connect.php");
include("classes\apply.php");
include("classes\user.php");

$apply= new Apply();
$user= new User();
$DB= new Database();
$post_id=$_GET['id'];
$query2="select * from post where post_id='$post_id'";
$po=$DB->read($query2);
if($po){
    foreach($po as $row){

        $vac=$row['vacacies'];
    }
}
$result=$apply->show($post_id);
print_r($result);

$change=1;
if($result){
    foreach($result as $row){

    $r=$user->get_user($row['user_id']);
    print_r($r);
    $description=$row['description'];
    
    $query="UPDATE apply
    SET accepted = '$change'
    WHERE description = '$description' AND post_id = '$post_id'";
$DB->insert($query);
$var=-1;
    if($var==0){
         echo "the vacancies is full ";
         $query3="DELETE FROM post WHERE post_id= '$post_id'";
         $DB->insert($query3);        }

$queryy="UPDATE post
SET vacacies = '$var'
WHERE post_id = '$post_id'";

$DB->insert($queryy);


}
}





?>