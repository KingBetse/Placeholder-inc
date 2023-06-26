<?php
session_start();
include("classes\connect.php");
include("classes\apply.php");
include("classes\user.php");
include("classes\post.php");
$change=1;
$apply= new Apply();
$user= new User();
$post= new Post();
$DB= new Database();
$id=$_SESSION['placeholder_userid'];

$query="select * from apply where user_id='$id'and accepted = '$change'";
$result=$DB->read($query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/job.css" />
    <title>Notification</title>
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
                  <a href="login.php">Log out</a></span> -->
                  <?php
                  //if 1 employer 0 frelancer
                  if($_SESSION['user']==0){
echo '
                  <span class="sign-link">
                    <i class="fa-solid fa-bell"></i>
                   
                    <a href="notification.php">Notification </a>
                    </span> ';}
                    if($_SESSION['user']==1){
                      echo '
          <span class="sign-link">
            <a href="post.php"><button class="post">Post Jobs</button></a></span>';
          }

            ?>

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
                  <a href="profile.php"> Profile   </a></span> 
                  
                  <?php
                  //if 1 employer 0 frelancer
                  if($_SESSION['user']==1){
                    echo '

                    <span class="sign-link">
                        <i class="fa-thin fa-list"></i>
                        
                        <a href="pro page.php">my posts </a>
                      </span> ';
                    }
               ?>


            </div>

          </span>
        </div>

      </div>
      <div class="nav-links ">
        <ul>
          


          <li>

            <i class="fa-solid fa-house"></i>
            <!-- <a href="" class="link">Home</a> -->
            <a href="index.php"><span>Home</span> </a>
          </li>

          

         <?php
         if($_SESSION['user']==0){

echo '
          <li>
            <i class="fa-solid fa-user-doctor"></i>
            <a href="job.php"><span>Jobs</span></a>
          </li>';

          echo '
          <li>
            <i class="fa-solid fa-user-doctor"></i>
            <a href="saved.php"><span>Bookmarks</span></a>
          </li>';
        }else{
         
          

        }

?>
          <li>
            <i class="fa-regular fa-address-card"></i>
            <a href="about.php"><span>About</span></a>
          </li>
        </ul>
        <div>
          <i id="colapse" class="fas fa-layer-groupfas fa-layer-group">colapse</i>
          <!-- <button id="colapse">col</button> -->
        </div>
    </nav>

  </header>





<div class="job-card">
    <?php
 
    if($result){
        foreach($result as $row){
           $post_acc=$row['post_id'];
           $p=$post->post_all($post_acc);
           $des=$row['description'];
      }
       
   
   
       echo" <h3>"." congratulations you have been accepted to do these jobs "."</h3>";
       if($p){    
       foreach($p as $row){
           $user= new User();
           $row_user=  $user->get_user($row['user_id']);
             include("notifiication_post.php");
         }
       }
   
       foreach($result as $row){ 
           $post_id= $row['post_id'];
           $query2="select * from post where post_id='$post_id'";
   
           $res=$DB->read($query2);
               if($res){
                   foreach($res as $r){
                       $post_userid=$r['user_id'];
                       $r=$user->get_user($post_userid);
   
                       echo " <h3>"."contact this email for further information  ".$r['email'] ."</h3>";

                     echo " <a href='decline.php?delete=".$des."'><button>Decline</button></a>";
   
                   }
               }
          
       }
       
   }
   else{
       echo"you have nothing";
   }?>
</div>
</body>
</html>