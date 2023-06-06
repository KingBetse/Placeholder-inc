<?php 
session_start();
include("classes\connect.php");
include("classes\apply.php");
$post_id=$_GET['id'];
$id=$_SESSION['placeholder_userid'];

if($id!=''){
    if(isset($_SESSION['placeholder_userid']) && is_numeric($_SESSION['placeholder_userid']))
    {   $query="DELETE FROM apply WHERE post_id= '$post_id'";
        $query2="DELETE FROM post WHERE post_id= '$post_id'";
      $DB = new Database();
$DB->insert($query);
$DB->insert($query2);
    header("Location:pro page.php");
    die;

      }else{
        header("Location:login.html");
      die;
      }}
else{
    header("Location:login.html");
    die;
}

?>