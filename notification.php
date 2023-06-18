<?php
session_start();
include("classes\connect.php");
include("classes\apply.php");
include("classes\user.php");
include("classes\post.php");
$change=1;
$apply= new Apply();
$user= new User();
$post= new Post();
$DB= new Database();
$id=$_SESSION['placeholder_userid'];

$query="select * from apply where user_id='$id'and accepted = '$change'";
$result=$DB->read($query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/job.css" />
    <title>Notification</title>
</head>
<body>
<div class="job-card">
    <?php
 
    if($result){
        foreach($result as $row){
           $post_acc=$row['post_id'];
           $p=$post->post_all($post_acc);
      }
       
   
   
       echo" <h3>"." congra you have been accepted to do these jobs "."</h3>";
       if($p){    
       foreach($p as $row){
           $user= new User();
           $row_user=  $user->get_user($row['user_id']);
             include("notifiication_post.php");
         }
       }
   
       foreach($result as $row){ 
           $post_id= $row['post_id'];
           $query2="select * from post where post_id='$post_id'";
   
           $res=$DB->read($query2);
               if($res){
                   foreach($res as $r){
                       $post_userid=$r['user_id'];
                       $r=$user->get_user($post_userid);
   
                       echo " <h3>"."contact this email for further information  ".$r['email'] ."</h3>";
   
                   }
               }
          
       }
       
   }
   else{
       echo"you have nothn";
   }?>
</div>
</body>
</html>