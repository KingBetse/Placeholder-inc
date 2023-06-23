<?php
session_start();
if(isset($_SESSION['placeholder_userid'])&& isset($_SESSION['user'])){
    $_SESSION['placeholder_userid']=NULL;
    unset($_SESSION['placeholder_userid']);
    unset($_SESSION['user']);
    $_SESSION['user']=NULL;

    
}

header("Location:login.php");
die;

?>