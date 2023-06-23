<?php
session_start();

include("classes\connect.php");
include("classes\signin.php");
include("classes\user.php");
include("classes\post.php");


//checking if the user is logined in
//print_r($_COOKIE['userEmail']);
;
$id=$_SESSION['placeholder_userid'];
if($id!=''){
if(isset($_SESSION['placeholder_userid'])&&is_numeric($_SESSION['placeholder_userid']))
{
  $id=$_SESSION['placeholder_userid'];
  
  $signin=new Signin();
  $result=$signin->check_login($id);
  if($result){
    $user= new User();
    $user_data=$user->get_data($id);
  }else{
    //if(id)
    header("Location:login.php");
  die;
  }
}
//collect posts
$post=new Post();
$posts=$post->get_some();
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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Home</title>
  <link rel="stylesheet" href="styles/home.css" />

  <link rel="stylesheet" href="styles/style.css" />

  

  <!-- <link rel="stylesheet" href="heme.css"/> -->

  <script src="https://kit.fontawesome.com/6bed12e9d5.js" crossorigin="anonymous"></script>
</head>

<body>



  <!-- the header section  -->

  <div id="back-to-top">
    <a href="#top"><img src="images/top.jpg" alt="top" height="10px" width="10px"> </a>
  </div>


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
                    <i class="fa-solid fa-house"></i>
                    <!-- <a href="" class="link">Home</a> -->
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
                        <i class="fa-solid fa-house"></i>
                        <!-- <a href="" class="link">Home</a> -->
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













  <!-- the end the header section -->
  <!-- the background image and the introduction section -->

  <div class="back-ground">
    <div class="intro-button">
      <?php
      if($_SESSION['user']==1){
        echo '
      <div><a href="post.php"><button class="btn-hire">Hire a Freelancer</button></a></div>'; }
else{
  echo '
      <div><a href="job.php"><button class="btn-earn">Earn Money</button></a></div>';
    
}?>
    </div>
    <br>
  </div>

  <!-- the top tech campany links -->
  <div class="work-with">
    <hr noshade="true" width="100%" color="black">
    <img style="width: 70px;" src="https://logos-world.net/wp-content/uploads/2020/04/Amazon-Logo-700x394.png"
      alt="image" />
    <img style="width: 70px;" src="https://1000logos.net/wp-content/uploads/2018/10/Alibaba-Logo-768x432.png"
      alt="image" />
    <img style="width: 70px;" src="https://www.pngfind.com/pngs/m/495-4957388_ethio-telecom-logo-hd-png-download.png"
      alt="image" />
    <img width="40px;" src="https://logos-download.com/wp-content/uploads/2016/03/PayPal_Logo_2014-1536x1520.png"
      alt="image" />
    <img width="40px;"
      src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Amazon_icon.svg/2500px-Amazon_icon.svg.png"
      alt="image" />
    <img width="40px;" src="https://upload.wikimedia.org/wikipedia/en/6/6c/CBE_SA.png" alt="image" />
    <img width="40px;"
      src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Amazon_icon.svg/2500px-Amazon_icon.svg.png"
      alt="image" />
    <hr />
    <hr noshade="true" width="100%" color="black">
  </div>


  <section class="main" id="main">
    <h2 align="center">
      <br><br>
      <div class="top-word">
        <marquee behavior="alternate" direction="right">
          <h3>Need Something Done</h3>
        </marquee>
      </div>
    </h2>

    
      <br><br> <br>
<div class="description">
      <div class="job-container">
        <!-- info-page -->

        <div class="job-card">
          <img src="images\post-a-project.svg" class="logos" title="post-a-project" />
          <h2>Post a Job</h2>
          <img
            src="https://media.istockphoto.com/id/1453972170/photo/human-resources-concept.jpg?s=1024x1024&w=is&k=20&c=999QPIW7b9yY01QlN-6RRqUEJzRGyv3JRdfJBvhlOqw="
            class="photo" height="150px" width="250px">
          <p>

            It’s free and easy to post a job. Simply fill in a title, description and budget and competitive bids come
            within minutes.
          </p>
          <br><br>

          <button type="button" class="location-btn" name="button" id="btn-location">
            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126089.51358399286!2d38.67829084396364!3d9.036621454501985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b854e109339cd%3A0x7ed26c143dd8d9a9!2sJobs%20In%20Ethiopia%7C%20Serafelagi%7C%20EthioJobs!5e0!3m2!1sen!2set!4v1673568133258!5m2!1sen!2set"
              target="location"> View Location</a>
          </button>
          <i class="fa-solid fa-location-dot"></i>
        </div>

<!-- post-a-job -->
        <!-- the second column -->
        <div class="job-card"><img src="images\Work.svg" class="logos" title="image" />
          <h2> Choose Freelancers</h2>
          <img
            src="https://images.unsplash.com/photo-1452830978618-d6feae7d0ffa?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
            class="photo" height="150px" width="250px">
          <p>

            No job is too big or too small. We've got freelancers for jobs of any size or budget, across 1800+ skills.
            No job is too complex. We can get it done!</p>
          </p>




          <br>
          <br>

          <button type="button" class="location-btn" name="button" id="btn-location">
            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126089.51358399286!2d38.67829084396364!3d9.036621454501985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b854e109339cd%3A0x7ed26c143dd8d9a9!2sJobs%20In%20Ethiopia%7C%20Serafelagi%7C%20EthioJobs!5e0!3m2!1sen!2set!4v1673568133258!5m2!1sen!2set"
              target="location">View Location</a>
          </button>
          <i class="fa-solid fa-location-dot"></i>

          <br> <br>
        </div>
<!-- choose-freelancer  -->

        <!-- the third column -->
        <div class="job-card"><img src="images\post-a-project.svg" class="logos" title="post-a-project" />
          <h2>
            Pay Safely
          </h2>
          <img
            src="https://images.unsplash.com/photo-1628527304948-06157ee3c8a6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
            class="photo" height="150px" width="250px">
          <p>
            Only pay for work when it has been completed and you're 100% satisfied with the quality using our milestone
            payment system</p>
          </p>


          <br>
          <br>

          <button type="button" class="location-btn" name="button" id="btn-location">
            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126089.51358399286!2d38.67829084396364!3d9.036621454501985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b854e109339cd%3A0x7ed26c143dd8d9a9!2sJobs%20In%20Ethiopia%7C%20Serafelagi%7C%20EthioJobs!5e0!3m2!1sen!2set!4v1673568133258!5m2!1sen!2set"
              target="location">View Location</a>
          </button>
          <i class="fa-solid fa-location-dot"></i>

          <br> <br>
        </div>

<!-- pay-safly -->


      </div>

  </div>
    
  
  















    <div class="temp-css"></div>
    <div class="temp-css2"></div>


    <div class="recent-jobs">

      <h3>Recent Jobs</h3>
 
      <div class='test'>
        <i class='fa fa-arrow-left' onclick="rights()"></i>
        <i class='fa fa-arrow-right' onclick="lefts()"></i>



        <div class='job-container'>
          
       <?php

if($_SESSION["user"]==0){        
            if($posts){
          foreach($posts as $row){
              $user= new User();
              $row_user=  $user->get_user($row["user_id"]);
              include("ind_post.php ");

            }
            }

          }
    ?>

       </div>

      </div>
      

      <div class="explore-more-jobs">
        <?php
        if($_SESSION['user']==0){
          echo '
        <a href="job.php"><button>Explore more Jobs</button></a> ';}
        else{
          echo '
        <button>find qualified workers</button>';
      
      }
      ?>
      </div>

    </div>





  </section>

 


















  <!-- the footer section -->
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
  <script src="app.js"></script>
  <script src="home.js"></script>
</body>

</html>