<?php
session_start();
include("classes\connect.php");
include("classes\signin.php");
$password='';
$email='';

unset($_SESSION['placeholder_userid']);
unset($_SESSION['user']);



if($_SERVER['REQUEST_METHOD']=='POST'){
  $signin= new Signin();
  $result=$signin->login($_POST);
  $email=$_POST['email1'];
$password=$_POST['password1'];

  if(isset($_POST['Remember'])){
setcookie("userEmail",$email,time()+60*60*24*2);
setcookie("userPassword",$password,time()+60*60*24*2);

  }

if($result!=''){
  // echo $result;
} 
else{
  //employer is 1 and freelancer is 0
  if($_SESSION['username']==''){
  if($_SESSION['user']==1)
    { 
      header("Location:profile.php");
      die;
}
  else{
    header("Location:eProfile.php");
    die;
  }
}
  else{
    if($_SESSION['user']==1){
      
      header("Location:Index.php");
      die;
    }
    else{
      header("Location:index.php");
      die;
    }
    
  }
      
}

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="styles\login.css" rel="stylesheet" />
    <title>Log in</title>
  </head>
  <body>

<div class ="mid">
  <img src="images\logo.jpg" alt="logo" />
  <br /><br /><br />
<h2>Log in</h2>
<br />
<form action="" method="post" name="register">
  <a href=""
    ><button type="submit" name="submit" id="Btn1">Log in with facebook</button></a
  >
  <br /> <br />
  <hr />
  <br /> 
  <input type="email" name="email1" placeholder="&nbsp;&nbsp;Email" value="<?php if(!empty($_COOKIE['userEmail'])){echo $_COOKIE['userEmail'];} ?>" id="text" required/>
  <br /><br />

  <input
    type="password"
    name="password1"
    placeholder="&nbsp;&nbsp;Password"
    minlength="8"
    maxlength="50"
    value="<?php if(!empty($_COOKIE['userPassword'])){echo $_COOKIE['userPassword'];} ?>"
    id="text"
    required
  />
 
  <br /><br />
  <?php if(!empty($_COOKIE['userPassword'])&&!empty($_COOKIE['userPassword'])){ ?>
  <input type="checkbox" name="Remember" checked value="Remember" />
  <?php }  else {?>
    <input type="checkbox" name="Remember"  value="Remember" />
    <?php }?>
  
  <label>Remember me</label>
  <br /><br />
  <a href="forgot.php" align="right">Forgot Password?</a>
  <br /><br />
  <!-- <a href="index.php"> -->
  <button type="submit" name="submit" id="Btn">
    Log in</a>
  </button>
  <br />
</form>
<br />
<hr />
<br />
Don't have an account?<br /> <br /><a href="signup.php">Sign Up</a>
<br /><br />
<?php
if($result!=''){
  echo $result;
} ?>
<br /><br />
</div>
  </body>
</html>
