<?php
session_start();
include("classes\connect.php");

$_SESSION['placeholder_userid']="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $email=$_POST['email1'];
      
$DB = new Database();
$query="select * from users where email='$email' limit 1";
$result=$DB->read($query);
       if($result){ 
        $row=$result[0];
        $_SESSION['placeholder_userid']=$row['user_id'];
        $id=$_SESSION['placeholder_userid'];
        header("Location:passREC.php");
        die;
       }
       else{
        echo"Incorrect email";
       }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login.css" rel="stylesheet" />
    <title>Password Recovery</title>
</head>
<body>
<div class ="mid">
    <form action="" method="post" name="register">
    <h2>Password recovery</h2>
  <br /> <br />
 <lable>Enter the email</lable>
  <br />   <br /> 
  <input type="email" name="email1" placeholder="&nbsp;&nbsp;Email" id="text" required/>
  <br /><br />

  
  <br /><br />

  <!-- <a href="index.html"> -->
  <button type="submit" name="submit" id="Btn" >
    Check
  </button>
  <br />
</form>
</div>
</body>
</html>