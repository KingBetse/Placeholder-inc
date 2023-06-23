<?php
session_start();
include("classes\connect.php");
include("classes\post.php");
//echo '<pre>';
 // print_r($_SESSION);
  //echo '<pre>';
$id=$_SESSION['placeholder_userid'];
  if($id!=''){
if($_SERVER['REQUEST_METHOD']=='POST'){
 
  
  if(isset($_SESSION['placeholder_userid'])&&is_numeric($_SESSION['placeholder_userid']))
{
  $post= new Post();
  $post->createUser($_POST);
  
  //echo "<pre>";
   // print_r($_POST);
   // print_r($_FILES);
   // echo "</pre>";
    $error='';
    if(isset($_FILES['photo']['name'])&&  $_FILES['photo']['name']!=''){
    $filename='uploads/' .$_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'],$filename);
    if(file_exists($filename)){

      $query ="update post set image= '$filename' where user_id='$id'";
      $DB=new Database();
      $DB->insert($query);

    }
    } 
    else{
$error='enter a valid photo';
echo $error;
    }
  header("Location:index.php");
 die;
  
}
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

    <title>post a job</title>
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/post.css" />
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
    <section class="container">
      <h3>Post a Job</h3>
      <form method="post" name="post-a-job" class="form" enctype="multipart/form-data">
       
        <div class="input-box">
        <lable>Job Title</lable
        >
        <input type="text" placeholder="" name="job_title" />
        
        
      </div>

      <div class="input-box">
        <lable>Job Type</lable>

        
      <div class="select-box">
        <select name="job_type" >
          <option hidden></option>
          <option>Full-Time</option>
          <option>Part-Time</option>
          <option>Intership</option>
        </select>
      

      <div class="input-box">
        <lable>Work Location</lable
        >
        <input type="text" placeholder="" name="work_location"/>

      </div>

      <div class="input-box">
        <lable>Vacancies</lable
        >
        <input type="number" placeholder="" name="vacancies" />
        
        
      </div>
<br>
      

      <div class="gender-box">
        <h3>Needed</h3>
        <div class="gender-option">
          <div class="gender">
            <input type="radio" id="check-male" name="gender" checked value="male"/>
            <label for="check-male">male</label>
          </div>
          <div class="column">
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="female" />
              <label for="check-female">Female</label>
            </div>
          </div>

          <div class="column">
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="both" />
              <label for="check-both">both</label>
            </div>
          </div>
        </div>


      
      <br>
      <lable>Work Experiance</lable
        >
        <br>

      <div class="select-box">
        <select name="work_exp" >
          <option hidden></option>
          <option>0+</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5+</option>
          <option>10+</option>
        </select>
        
        
      </div>

      <div class="input-box">
        <lable>Salary</lable
        >
        <input type="text" placeholder="" name="salary"/>
    
      </div>
      
      <div class="input-box">
        <lable>Closed date</lable
        >
        <input type="text" placeholder="" name="closed" />
        
        
      </div>

      <label>Skill</label>
      <br/>
      <div class="column">
        <label>Frontend</label>
        <input type="checkbox" name="skill[]" value="Frontend">
   
         <label>Backend</label>
       <input type="checkbox" name="skill[]" value="Backend">
   
       <label>Fullstack</label>
       <input type="checkbox" name="skill[]" value="Fullstack">
   
       <label>Business</label>
      <input type="checkbox" name="skill[]" value="Business">
   
       <label>Tutoring</label>
       <input type="checkbox" name="skill[]" value="tutoring">
   
       <label>eCommerse</label>
       <input type="checkbox" name="skill[]" value="eCommerse">
   
       <label>Graphic Design</label>
      <input type="checkbox" name="skill[]" value="Graphic Design">
   
       <label>Translator</label>
       <input type="checkbox" name="skill[]" value="Translator">
   
       <label>Another Job</label>
       <input type="checkbox" name="skill[]" value="Another Job">
   
       
       </div>
    
      <div class="box">
        <button>Post</button>
      </div>
        <!-- <button type="submit" name="submit">submit</button> -->
      
      </form>
     
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
