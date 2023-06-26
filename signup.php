<?php

include("classes\connect.php");
include("classes\signup.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
  $signup= new Signup();
  $error=$signup->evaluate($_POST);
  if($error==''){
    $result=$signup->createUser($_POST);
    if($result!=''){
      echo $result;
     
    }
    
    else{
      
      setcookie("userEmail","",time()-(60*60*24*2));
      setcookie("userPassword","",time()-(60*60*24*2));
      header("Location:login.php");
    die;
    }}
    else{
      echo $error;
    }



  }

?>


<!DOCTYPE html>
<html lang="en">
  <link>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="styles/login.css" rel="stylesheet" />
    <title>Sign Up</title>
  </head>
  <body>
    <div class="mid">
    
      <img src="images\logo.jpg" alt="logo" />
      <br /><br /><br />
      <h2>Sign Up</h2>
      <br />
      <form action="" method="post" name="register">
        <a href=""
          ><button name="submit" type="submit"  id="Btn1"><!--<img src ="img\Yootheme-Social-Bookmark-Social-facebook-button-blue.512.png" alt="" height="20"width=""/>--> Sign Up with facebook</button></a>
        <br /><br />
        <hr />
        <br>
        <div class="select-box">
          <select name="useStat">
            <option hidden>C</option>
            <option >Employers</option>
            <option >Freelancer</option>
           
          </select>
        </div>
        <br />
        <input name="email1" type="email"  placeholder="&nbsp;&nbsp;Email" id="text" required  />
        <br /><br />
  
        <input
          name="password1"
          type="password"
          placeholder="&nbsp;&nbsp;Password"
          minlength="8"
          maxlength="50"
          required
          id="text" 
        />
        <br /><br /><br />
        <input type="checkbox" name="Remember" value="Remember" required />
        <label>
          I agree to the Freelancer
          <br>
          <a href="">User Agreement</a> and 
          <a href="">Privacy Policy</a>.
        </label>
  
        <br /><br /><br />
        <!-- <a href="index.html"> -->
        <button type="submit" name="submit" id="Btn">
          Join</a>
        </button>
        <br /><br />
      </form>
      <hr />
      <br /><br />
      Already have an account? <br /><br /><a href="login.html">Login</a>
    </div>
  </body>
</html>
