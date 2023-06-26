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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="Style\forgot.css" rel="stylesheet" />
    <title>Password Recovery</title>
</head>
<body>
  <div class="container d-flex justify-content-center">
<div class ="mid">
    <form action="" method="post" class="form" name="register">
    <h2 class="header mt-4">Password  Recovery</h2>
  <br />
  <div class="input-box">
      <!-- <input type="email" name="email1" placeholder="&nbsp;&nbsp;Email" id="text" required/> -->
        <div class="form-floating mb-3 ">
        <input style="width: 400px;" type="email" name="email1"class="form-control" id="text" required/>
        <label for="floatingInput">Email address</label>
  </div>
  </div>
 <button style="width: 100%;" type="submit" name="submit" id="Btn" class="btn btn-primary " type="button">
    Check
  </button>
  <!-- <button class="btn btn-primary" type="button">Button</button> -->
</form>
</div>
  </div>
</body>
</html>