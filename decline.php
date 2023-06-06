<?php
session_start();
include("classes\connect.php");
include("classes\apply.php");
$description = $_GET['delete'];
$id=$_SESSION['placeholder_userid'];


if($id!=''){
    if(isset($_SESSION['placeholder_userid']) && is_numeric($_SESSION['placeholder_userid']))
    {   $query="DELETE FROM apply WHERE description= '$description'";
        
      $DB = new Database();
$DB->insert($query);

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