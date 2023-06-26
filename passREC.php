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

$pass=substr($pass, -1);



       if($pass==$password){ 
            if($newPassword==$vPassword){


        //$query="insert into users password value '$newPassword'"  ;
        $query="update users set password = '$newPassword' where user_id='$id' limit 1";
        $DB->insert($query);
        echo"Reset complete you can use your new password";
        $_SESSION['placeholder_userid']=NULL;
        header("Location:login.php");
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
    <link href="Style\forgot.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <title>Password Recovery</title>
</head>
<body>
<div  class ="mid container d-flex justify-content-center">
    <form style="width: 600px;" action="" method="post" name="register">
    <h2 class="header mt-4">Password  Recovery</h2>

  <br /> 
  <div class="input-box">
    <div class="form-floating">
      <input   type="password" name="Password" class="form-control mx-2" id="" placeholder="" id="text" required minlength="1"maxlength="1">
      <label for="floatingPassword">Enter the last character of your old password</label>
    </div>
  </div>

  <div class="input-box mt-3">
    <div class="form-floating">
      <input   type="password"  name="newPassword" class="form-control mx-2" id="" placeholder="" id="text" required minlength="8" maxlength="15">
      <label for="floatingPassword">Enter New Password</label>
    </div>
  </div>

  <div class="input-box mt-3">
    <div class="form-floating">
      <input   type="password" name="vPassword" class="form-control mx-2" id="" placeholder="" id="text" required minlength="8" maxlength="15">
      <label for="floatingPassword">Verify New Password</label>
    </div>
  </div>




 
 


  <!-- <a href="index.html"> -->
  <button style="width: 100%;" type="submit" name="submit" id="Btn" class="mt-3 btn btn-success btn-block">
    Submit
  </button>
  <br />
</form>
</div>
</body>
</html>