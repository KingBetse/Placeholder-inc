<?php
session_start();
include("classes\connect.php");
include("classes\apply.php");
$id=$_SESSION['placeholder_userid'];

$post_id=$_GET['id'];
$appply= new Apply();
$app="";
$result=$appply->verify($id);
if($result){
echo $post_id."</br>";
$test=0;
$app=$_POST['apply'];
echo $app;
  foreach($result as $row){
    // echo print_r($row)."</br>";
$ownPost_id=$row['post_id'];
     if($post_id === $ownPost_id ){
      header("Location:job.html");
      die;
      
      //break;
     }}
    //  if($test==1){
    //   echo $post_id;
    //   echo"...";
    //   echo $ownPost_id;
      
    //   // echo "</br>"."you can not apply for you rat  own job";
    //  }
     
      // echo"abebe";
      if($id!=''){
    if($_SERVER['REQUEST_METHOD']=='POST'){
           
    $appply->apply($_POST);
    header("Location:job.html");
    die;
    }
  
    }
    else{
        header("Location:login.html");
      die;
    }
     }
    
  
   



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reqirment</title>
    <link rel="stylesheet" href="style.css" />

</head>
<body>
      
<header >
      <nav class="nav-bar" id="nav">
        <div class="logo-and-search-bar">
          <div class="logo">
            <div class="logo-image">
              <a href=""><img width="20px" height="10px"
                src="images/logo.jpg" alt="logo" /></a>
            </div>
            <!-- <div class="logo-text"><span>placeholder</span></div> -->
          </div>
          <div class="sign">
            <span class="sign-link">
              <i class="fa-solid fa-right-to-bracket"></i>
              <a href="logout.php">Log out</a></span>
  
            <span class="sign-link">
              <a href="post.html"><button class="post">Post Jobs</button></a></span>
          </div>
          
        </div>
        <div class="nav-links ">
          <ul>
            <li>
              <i class="fa-solid fa-user"></i>
              <a href="profile.html"><span>Profile</span> </a>
            </li>
            
            
            <li>
              
            <i class="fa-solid fa-house"></i>
            <!-- <a href="" class="link">Home</a> -->
              <a href="index.html"><span>Home</span> </a>
            </li>
            <li>
              <i class="fa-solid fa-user-doctor"></i>
              <a href="job.html"><span>Jobs</span></a>
            </li>
            <li>
              <i class="fa-regular fa-address-card"></i>
              <a href="about.html"><span>About</span></a>
            </li>
          </ul>
          <div>
            <i id="colapse" class="fas fa-layer-groupfas fa-layer-group" >colapse</i>
          <!-- <button id="colapse">col</button> -->
        </div>
      </nav>
      
    </header>
    

    <div class ="mid">
    <form action="" method="post" name="register">

  <br /> <br />
 <lable>Why do you think you are eligiable to apply for this job</lable>
  <br />   <br /> 
  <textarea name="apply" placeholder="write here"></textarea>
  <br /><br />

  
  <br /><br />

  <!-- <a href="index.html"> -->
  <button  >
    submit
  </button>
  <br />
</form>
</div>
</body>
</html>
<!-- type="submit" name="submit" id="Btn" -->