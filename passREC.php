<?php
session_start();
include("classes\connect.php");

$id=$_SESSION['placeholder_userid'];

    if($_SERVER['REQUEST_METHOD']=='POST'){
      $password=$_POST['Password'];
      $vPassword=$_POST['vPassword'];
      $newPassword=$_POST['newPassword'];
    
$DB = new Database();
$query2="select * from users where user_id='$id' limit 1";

$result=$DB->read($query2);
$row=$result[0];
$pass=$row['password'];
echo($pass);
echo("<br>");
$pass=substr($pass, -1);
echo($pass);
echo("<br>");
echo($password);

       if($pass==$password){ 
            if($newPassword==$vPassword){


        //$query="insert into users password value '$newPassword'"  ;
        $query="update users set password = '$newPassword' where user_id='$id' limit 1";
        $DB->insert($query);
        echo"Reset complete you can use your new password";
        $_SESSION['placeholder_userid']=NULL;
        header("Location:login.html");
            die;}
            else{
                echo"the password is different";
            }
       }
       else{
        echo"Incorrect last password";
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
    <br /> <br />
 
  <h2>Password recovery</h2>
  <br /> 

  <lable>Enter the last of your old password</lable>
  <br /> <br />
  <input
    type="password"
    name="Password"
    placeholder="&nbsp;&nbsp;Password"
    minlength="1"
    maxlength="1"
    id="text"
    required
  />
  <br /> <br />

  <br /> 
  <label>Enter New Password</label>
  <br /> <br />
  <input
    type="password"
    name="newPassword"
    placeholder="&nbsp;&nbsp;Password"
    minlength="8"
    maxlength="15"
    id="text"
    required
  />
  <br /><br />
  <label>verify New Password</label>
  <br /> <br />
  <input
    type="password"
    name="vPassword"
    placeholder="&nbsp;&nbsp;Password"
    minlength="8"
    maxlength="15"
    id="text"
    required
  />
  
  <br /><br />

  <!-- <a href="index.html"> -->
  <button type="submit" name="submit" id="Btn" >
    Submit
  </button>
  <br />
</form>
</div>
</body>
</html>