<?php
session_start();
if(isset($_SESSION['placeholder_userid'])){
    $_SESSION['placeholder_userid']=NULL;
    unset($_SESSION['placeholder_userid']);
}

header("Location:login.html");
die;

?>