<?php
session_start();
include("classes\connect.php");
include("classes\post.php");

$id=$_SESSION['placeholder_userid'];
  if($id!=''){
  if(isset($_SESSION['placeholder_userid'])&&is_numeric($_SESSION['placeholder_userid']))
{

}
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

    <title>About</title>
    <link rel="stylesheet" href="styles/about.css" />
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/job.css" />
  <script src="https://kit.fontawesome.com/6bed12e9d5.js" crossorigin="anonymous"></script>


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
  
  
    <!-- <div class="main"> -->
 <section class="main container">
  <div class="why-choose-us upper-section">
    <div class="image-container">
      <img src="https://media.istockphoto.com/id/1345144783/photo/freelancers-working-on-new-projects.jpg?b=1&s=170667a&w=0&k=20&c=NAX0oItlF3lpBX8RmwNbS74yqrg-UvRqSl2nmcK8icM=" alt="">
    </div>
    <div class="text-container">
      <h2 class="upper-header">About us</h2>
        <p>We proudly boast of a team of experienced professionals who have served job seekers and clients in the 
          African job market for over 25 years. We have a team of qualified individuals committed to providing a 
          transparent service to all our customers. With their years of expertise in the field, our team is confident in 
          providing the best possible service to everyone.</p>
          
    </div>
  </div>
  <div class="why-choose-us">
    <div class="text-container">
      <h2 class="upper-header">Why choose us?</h2>
        <p>We proudly boast of a team of experienced professionals who have served job seekers and clients in the 
          African job market for over 25 years. We have a team of qualified individuals committed to providing a 
          transparent service to all our customers. With their years of expertise in the field, our team is confident in 
          providing the best possible service to everyone.</p>
          <p>We provide a streamlined solution to our clients with customized recruitment services, payroll management, 
            and HR consulting. By partnering with thousands of clients, we can deliver quality services and support to 
            those who need it most.</p>
            <p>With a team of experienced professionals with years of experience in this field, Africa Jobs Network is an
              ideal choice for quality recruitment and HR services.</p>
    </div>
    <div class="image-conainer">
      <img src="https://media.istockphoto.com/id/1345144783/photo/freelancers-working-on-new-projects.jpg?b=1&s=170667a&w=0&k=20&c=NAX0oItlF3lpBX8RmwNbS74yqrg-UvRqSl2nmcK8icM=" alt="">
    </div>
  </div>     
      <h2>Our Experts</h2>
      <div class="our-experts">
        <div class="person">
          <img src="img/asero.jpg" alt="" class="team-photo">
          <h4>Aser Hailu</h4>
          <p>Founder/CEO</p>
        </div>
        <div class="person">
          <img src="img/bethi.jpg" alt="" class="team-photo">
          <h4>Bethelhem Habtamu</h4>
          <p>Chief operating officer</p>
        </div>
        <div class="person">
            <img src="img/betty.jpg" alt="" class="team-photo">
            <h4>Bethelhem Gebeyehu</h4>
          <p>Country manager</p>
        </div>
        <div class="person">
          <img src="img/abel.jpg" alt="" class="team-photo">
          <h4>Abel Bekele</h4>
          <p>Project director</p>
        </div>
       
        <div class="person">
          <img src="img/betselot.jpg" alt="" class="team-photo">
          <h4>Betselot</h4>
          <p>Front end designer</p>
        </div>
      </div>




      
      <div class="xob our-jobs job-card">
        <div class="right-side-of-our-jobs">
          <h2>we are hiring</h2>  
          <p>Do you have a team-oriented spirit, a never give up mentality and enough bandwidth?<br/> If yes, apply for the upcoming our job apply</p>
          <button>apply for our job</button>
        </div>
        <div class="left-side-of-our-jobs">
              <div class="upper-images">
                  <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
                  <img src="https://images.unsplash.com/photo-1557426272-fc759fdf7a8d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
                  <img src="https://images.unsplash.com/photo-1452457750107-cd084dce177d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=801&q=80" alt="">
              </div>
              <div class="lower-images">
                <img src="https://images.unsplash.com/photo-1530099486328-e021101a494a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8Y29sbGFnZSUyMHRlYW0lMjB3b3JrfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=600&q=60" alt="">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80" alt="">
                <img src="https://images.unsplash.com/photo-1531545514256-b1400bc00f31?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80" alt="">
              </div>
              
        </div>
      </div>



      <div class="job-container x">
        <div class= "job-card">
          <img src="images\jobs\graphic-designer.png" alt="" />
          <strong><p>Design, Media & Architecture</p></strong>
          <p>
            Graphic Design, Website Design, Photoshop, Logo Design, Illustrator...
          </p>
          <!-- <p>pay</p> -->
  
          <!-- <a href="profile.php"><button class="btn-apply">Apply</button></a> -->
        </div>
        <div class=" job-card">
          <img src="images\jobs\production (1).png" alt="" />
          <strong><p>Product Sourcing & Manufacturing</p></strong>
          <p>
            Product Design, Amazon, Process Automation, Product Research, 3D
            Printing
          </p>
          <!-- <p>pay</p> -->
  
          <!-- <a href="profile.php"><button class="btn-apply">Apply</button></a>  -->
        </div>
  
        <div class=" job-card">
          <img src="images\jobs\acquisition.png" alt="" />
          <strong><p>Sales & Marketing</p></strong>
          <p>
            Internet Marketing, Marketing, Social Media Marketing, Facebook
            Marketing, Sales.
          </p>
          <!-- <p>pay</p> -->
  
          <!-- <a href="profile.php"><button class="btn-apply">Apply</button></a> -->
        </div>
        <div class=" job-card">
          <img src="images\jobs\languages.png" alt="" />
          <strong><p>Translation & Languages</p></strong>
          <p>
            English (US) Translator, English (UK) Translator, Spanish Translator,
            Arabic Translator, English Grammar...
          </p>
          <!-- <p>pay</p> -->
  
          <!-- <a href="profile.php"><button class="btn-apply">Apply</button></a> -->
        </div>
        <div class=" job-card">
          <img src="images\jobs\engineering.png" alt="" />
          <strong><p>Engineering & Science</p></strong>
          <p>
            AutoCAD, Engineering, CAD/CAM, Electronics, Electrical Engineering...
          </p>
          <!-- <p>pay</p> -->
  
          <!-- <a href="profile.php"><button class="btn-apply">Apply</button></a> -->
        </div>
        <div class=" job-card">
          <img src="images\jobs\business.png" alt="" />
          <strong><p>Business, Accounting, Human Resources & Legal</p></strong>
          <p>
            Business Analysis, Accounting, Finance, Business Plans, Trading...
          </p>
          <!-- <p>pay</p> -->
  
          <!-- <a href="profile.php"><button class="btn-apply">Apply</button></a> -->
        </div>
  
        <div class=" job-card">
          <img src="images\jobs\education.png" alt="" />
          <strong><p>Education</p></strong>
          <p>
            Video Game Coaching, English Teaching, Accounting Tutoring, Chemistry
            Tutoring, English Tutoring...
          </p>
          <!-- <p>pay</p> -->
  
          <!-- <a href="profile.php"><button class="btn-apply">Apply</button></a> -->
        </div>
  
        <div class=" job-card">
          <img src="images\jobs\more.png" alt="" />
          <strong><p>Jobs for Anyone</p></strong>
          <p>Virtual Assistant, Local Job, Odd Jobs, Freelance, Inspections...</p>
          <!-- <p>pay</p> -->
  
          <!-- <a href="profile.php"><button class="btn-apply">Apply</button></a> -->
        </div>


      </div>




</section>
    

  <!-- </div> -->
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
  </body>
</html>
