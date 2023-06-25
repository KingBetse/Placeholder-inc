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
      header("Location:login.php");
    die;
    }
  }
  //collect

  $post=new Post();

$posts=$post->get_one($id);
}
else{
  unset($_SESSION['placeholder_userid']);
  header("Location:login.php");
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
    <section>    
    <footer>
      <div class="footer">
        <div class="contacts">
          <a href="https://www.facebook.com"><img height="36" width="36" src="images/th (3).png" alt="logo"></a>
          <a href="https://www.youtube.com"><img height="36" width="36" src="images/th (2).png" alt="logo"></a>
          <a href="https://www.twitter.com"><img height="36" width="36" src="images/th (1).png" alt="logo"></a> 
          <a href="https://www.instagram.com"><img height="36" width="36" src="images/th.png" alt="logo"></a>
          
        </div>
        <hr class="hid">
      
        <div class="about-terms">
          <div class="about">
            <p>
              <h3 id="about">FAQ</h3>
              <p><a href="About.php">How do i register?</a></p>
              <p><a href="About.php">How to apply for a job?</a></p>
              <p><a href="About.php">How do I reset my password?</a></p> 
              <p><a href="About.php">how do i edit my cv?</a></p>
              <p><a href="About.php">how do i get notification?</a></p>
              <p><a href="About.php">what makes this platform different?</a></p>
            </p>
            <hr class="hid">
          </div>
            <div class="about">
              <p>
                <h3 id="about">About</h3>
                <p><a href="About.php">About us</a></p>
                <p><a href="About.php">how it works</a></p>
                <p><a href="About.php">Careers</a></p>
                <p><a href="About.php">accessibility</a></p>
                <p><a href="About.php">advertising</a></p>
              </p>
              <hr class="hid">
            </div>
            <div class="terms">
              <p>
                <h3 id="terms">Terms</h3>
                <p><a href="terms.php">Privacy Policy</a></p>
                <p><a href="terms.php"> Terms and Conditions</a></p>
                <p><a href="terms.php"> Copyright Policy</a></p>
                <p><a href="terms.php"> Code of Conduct</a></p>
                <!-- <p><a href=""><font color="azure"> Fees and Charges</font></a></p> -->
            </p>
            <hr class="hid">
    
            </div>
            <div class="about">
              <p>
                <h3 id="about">contact us</h3>
                <p><a href="About.php">aastugroup1@gmail.com</a></p>
                <p><a href="About.php">+251953101912</a></p>
                <p><a href="About.php"> AASTU, Tulu Dimtu, Addis Ababa, Ethiopia</a></p>
              </p>
              <hr class="hid">
            </div>
        </div>
    
        <!-- the second row of footer page  -->
        <div class="about-terms">
          <div class="about">
            <p>
              <h3 id="about">Job seekers</h3>
              <p><a href="About.php">Find Jobs</a></p>
              <p><a href="About.php">Register</a></p>
              <p><a href="About.php">post CV</a></p>
              <p><a href="About.php">Job Alerts</a></p>
            </p>
            <hr class="hid">
          </div>
          <div class="about">
            <p>
              <h3 id="about">Employers</h3>
              <p><a href="About.php">Log in</a></p>
              <p><a href="About.php">Register</a></p>
              <p><a href="About.php">post Jobs</a></p>
              <p><a href="About.php">services</a></p>
            </p>
            <hr class="hid">
          </div>
            <div class="terms">
              <p>
                <h3 id="terms">work with us</h3>
                <p><a href="terms.php">Contact Admin</a></p>
                <p><a href="terms.php">Become partner</a></p>
                <p><a href="terms.php"> Explor</a></p>
                <p><a href="terms.php"> Code of Conduct</a></p>
                <!-- <p><a href=""><font color="azure"> Fees and Charges</font></a></p> -->
            </p>
            <hr class="hid">
    
            </div>
            <div class="about">
              <p>
                <h3 id="about">useful links</h3>
                <p><a href="About.php">ehio job</a></p>
                <p><a href="About.php">alibaba</a></p>
                <p><a href="About.php">freelancers</a></p>
                <p><a href="About.php">remote work</a></p>
              </p>
              <hr class="hid">
            </div>
           
            
        </div>
        <!-- up to here -->
        <div class="copyright">
          <p> 
            Placeholder ® is a registered Trademark of Placeholder Technology Pty Limited ()
          </p>
          <p>
            Copyright &copy; 2022 Placeholder Technology Pty Limited ()
          </p>
        </div>
      </div>
    </footer>
</section>
</body>
<script src="app.js"></script>
</html>

