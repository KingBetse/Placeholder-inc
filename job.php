<?php
session_start();
include("classes\connect.php");
include("classes\signin.php");
include("classes\user.php");
include("classes\post.php");

$id=$_SESSION['placeholder_userid'];
if($id!=''){
//checking if the user is logined in
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
//collect posts
$post=new Post();
//$id=$_SESSION['placeholder_userid'];
$skills = $post->get_skills($id);

$posts_you_are_skilled_in= $post->IDK($id);


// print_r($posts_you_are_skilled_in);
//print_r($posts);
$posts=$post->get_moderate(10,0); 
$al = count($post->get_all());
//$pages = $al/10;



}
else{
  
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

    <title>Job</title>
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

  
  

    <section class="main">
      <br>
      <div class="job-title">
        <h2>
          JOBS BASED ON YOUR SKILLS
        </h2>
      </div>
        <div class="job-title">
        <?php
        if ($skills){
        foreach($skills as $s){
          $ss = $s['skill'];
          echo " <a href='#'> <button  class='btn'>$ss  </button></a> ";
        }
      }
        ?>
      </div>
    
    <div class="job-container">
    <?php
     if($posts_you_are_skilled_in){

    foreach($posts_you_are_skilled_in as $row){
        $user= new User();
        $row_user=  $user->get_user($row['user_id']);
          include("posts.php");
      }
     }
     ?>
      
  
</div>
<div class="job-title">
  <h2>
    All JOBS
  </h2>
</div>
<div class="job-container">
  <?php

        // Determine records per page
        $records_per_page = 10;
        
        // Determine current page
           $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    
        // Determine offset
        $offset = ($current_page - 1) * $records_per_page;
        
        // Get total number of records
        //$query = "SELECT COUNT(*) as count FROM posts";
        //$result = $DB->query($query);
        //$row = $result->fetch_assoc();
        //$total_records = $row['count'];
        $total_records =  $al;
        
        
        // Determine total pages
        $total_pages = ceil($total_records / $records_per_page);
        
        // Query for records on current page
        //$query = "SELECT * FROM posts LIMIT $offset, $records_per_page";
        $posts= $post->get_moderate($records_per_page,$offset); 

        
        // Display records
 if($posts){
foreach($posts as $row){
    $user= new User();
    $row_user=  $user->get_user($row['user_id']);
      include("posts.php");
  }
 }

 ?>
  

</div>
<div class="job-title">



  <?php
  // Display pagination links
  for ($i = 1; $i <= $total_pages; $i++) {
      if ($i == $current_page) {
          echo "<button class='btn'>  $i </button>";
      } else {
          echo "<a href='?page=$i'><button class='btn'><u> $i</u> </button></a>";
      }
  }
?>
</div>






  
  </section>
    
 
  <section>
    <div class="job-title">
      <h2>
        FEATURED
      </h2>
    </div>
    <br>
    
    <div class="job-container">
      <div class="job-card">
        <div>
          <img src="data:image/png;base64,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" alt="">
        </div>
        <div>
         <h4>description:</h4>
         <ul>
           <li>job title: banker</li>
           <li>Job type: permanent</li>
           <li>work location: addis Ababa</li>
           <li>vacancies: 1</li>
           <li>applicangs Nedded: male/female</li>
           <li>work experiance: 0+ year</li>
           <li>initial salary:7,000</li>
           <li>verified campany</li>
           <p>application will be closed on 24<sup>th</sup> jan 2025</p>
         </ul>
        </div>
        <div>
          <a class="button" href="profile.php"><button>today</button></a>
          <a href="profile.php"><button>apply</button></a>
        </div>
     </div>
     <div class="job-card">
      <div>
       <img src="https://s3.us-east-1.amazonaws.com/accredible_temp_credential_images/16002836894132567677717491881160.png" alt="">
        <img src="https://www.inovex.de/wp-content/uploads/databricks-kl.png" alt="">
        
      </div>
      <div>
       <h4>description:</h4>
       <ul>
         <li>job title: banker</li>
         <li>Job type: permanent</li>
         <li>work location: addis Ababa</li>
         <li>vacancies: 1</li>
         <li>applicangs Nedded: male/female</li>
         <li>work experiance: 0+ year</li>
         <li>initial salary:7,000</li>
         <li>verified campany</li>
         <p>application will be closed on 24<sup>th</sup> jan 2025</p>
       </ul>
      </div>
      <div>
        <a class="button" href="profile.php"><button>today</button></a>
        <a href="profile.php"><button>apply</button></a>
      </div>
    </div>
    <div class="job-card">
    <div>
      <img src="data:image/png;base64,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" alt="">
    </div>
    <div>
     <h4>description:</h4>
     <ul>
       <li>job title: banker</li>
       <li>Job type: permanent</li>
       <li>work location: addis Ababa</li>
       <li>vacancies: 1</li>
       <li>applicangs Nedded: male/female</li>
       <li>work experiance: 0+ year</li>
       <li>initial salary:7,000</li>
       <li>verified campany</li>
       <p>application will be closed on 24<sup>th</sup> jan 2025</p>
     </ul>
    </div>
    <div>
      <a class="button" href="profile.php"><button>today</button></a>
      <a href="profile.php"><button>apply</button></a>
    </div>
    </div>
    <div class="job-card">
    <div>
      <img src="data:image/jpeg;base64,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" alt="">
    </div>
    <div>
    <h4>description:</h4>
    <ul>
     <li>job title: banker</li>
     <li>Job type: permanent</li>
     <li>work location: addis Ababa</li>
     <li>vacancies: 1</li>
     <li>applicangs Nedded: male/female</li>
     <li>work experiance: 0+ year</li>
     <li>initial salary:7,000</li>
     <li>verified campany</li>
     <p>application will be closed on 24<sup>th</sup> jan 2025</p>
    </ul>
    </div>
    <div>
      <a class="button" href="profile.php"><button>today</button></a>
      <a href="profile.php"><button>apply</button></a>
    </div>
    </div>
    
  
  </div>

    </section>



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
