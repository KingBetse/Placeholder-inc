<?php
session_start();
include("classes\connect.php");
include_once("classes\post.php");
include("classes\signin.php");
include("classes\user.php");


  $id=$_SESSION['placeholder_userid'];
  if($id!=''){
  if(isset($_SESSION['placeholder_userid'])&&is_numeric($_SESSION['placeholder_userid']))
  { 
    $signin=new Signin();
    $result=$signin->check_login($id);
    if($result){
      $user= new User();
      $user_data=$user->get_data($id);
    }else{
      header("Location:login.html");
    die;
    }
  }
  //collect

  $post=new Post();

$posts=$post->get_one($id);
}
else{
  unset($_SESSION['placeholder_userid']);
  header("Location:login.html");
  die;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/job.css" />
</head>
<body>


<header>
    <nav class="nav-bar" id="nav">
      <div class="logo-and-search-bar">
        <div class="logo">
          <div class="logo-image">
            <a href=""><img width="20px" height="10px" src="images/logo.jpg" alt="logo" /></a>
          </div>
          <!-- <div class="logo-text"><span>placeholder</span></div> -->
        </div>
        <div class="sign">
          <!-- <span class="sign-link">
                  <i class="fa-solid fa-right-to-bracket"></i>
                  <a href="login.html">Log out</a></span> -->
                  <span class="sign-link">
                    <i class="fa-solid fa-house"></i>
                    <!-- <a href="" class="link">Home</a> -->
                    <a href="notification.php">Notification </a>
                    </span> 

          <span class="sign-link">
            <a href="post.html"><button class="post">Post Jobs</button></a></span>

            <span class="profile-section">
              <img id="profile-picture" width='50px' height='50px' src='         
              <?php 
              if ($_SESSION["photo"]!=""){
                echo$_SESSION["photo"];
              }
              else{
                echo "img/juice wrld.jpg";
                
              }?>
              ' title='test' alt="profile">
  
              <div class="more">
                <span class="sign-link">
                  <img id="profile-picture" width='50px' height='50px' src='
                                      
                    <?php 
                    if ($_SESSION["photo"]!=""){
                      echo$_SESSION["photo"];
                    }
                    else{
                      echo "img/juice wrld.jpg";
                      
                    }?>
                    
                    ' title='test' alt="profile">
                </span>
              <span class="sign-link">
                <?php
                  if($_SESSION['username']!=''  ){
                  echo $_SESSION['username'];
                  }
                  else{
                    echo "test";
                  }
  
                   ?>

              </span>



              <span class="sign-link">
                <i class="fa-solid fa-right-to-bracket"></i>
                <a href="logout.php">log out</a></span>


              <span class="sign-link">
                <!-- <i class="fa-solid fa-left-to-bracket"> -->

                </i>
                  <i class="fa-solid fa-user"></i>
                  <a href="profile.html"> Profile   </a></span> 
                  
                  

                    <span class="sign-link">
                        <i class="fa-solid fa-house"></i>
                        <!-- <a href="" class="link">Home</a> -->
                        <a href="pro page.php">my posts </a>
                      </span> 
                  
               


            </div>

          </span>
        </div>

      </div>
      <div class="nav-links ">
        <ul>
          


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
          <i id="colapse" class="fas fa-layer-groupfas fa-layer-group">colapse</i>
          <!-- <button id="colapse">col</button> -->
        </div>
    </nav>

  </header>





  <center> <h3>Your Posts</h3></center>
 
  <div class="job-container">
      <?php
     if($posts){

    foreach($posts as $row){
        $user= new User();
        $row_user=  $user->get_user($row['user_id']);
          include("pro post.php");
      }
     }
     ?>
      
  

    </div>
</body>
<script src="app.js"></script>
</html>

