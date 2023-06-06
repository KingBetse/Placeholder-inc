<?php
session_start();
include("classes\connect.php");
include("classes\apply.php");
include("classes\user.php");
$change=1;
$apply= new Apply();
$user= new User();
$DB= new Database();
$id=$_SESSION['placeholder_userid'];

$query="select * from apply where user_id='$id'and accepted = '$change'";
$result=$DB->read($query);
if($result){

    echo" <h3>"." congra you have been accepted to do these jobs "."</h3>";

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
}

?>