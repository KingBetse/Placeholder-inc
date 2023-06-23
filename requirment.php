<?php
session_start();
include("classes\connect.php");
include("classes\apply.php");
$id=$_SESSION['placeholder_userid'];

$post_id= $_GET['id'];
$appply= new Apply();
$app="";
$result=$appply->verify($id);
if($result){
  foreach($result as $row){
    
$ownPost_id=$row['post_id'];
     if($post_id === $ownPost_id ){
      header("Location:job.html");
      die;

     }}
    }
    
      if($id!=''){
    if($_SERVER['REQUEST_METHOD']=='POST'){

    //   if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
    //     $upload_dir = 'uploads/CV/'; // Specify the upload directory
    //     $file_name = basename($_FILES['cv']['name']); // Get the file name
    //     $target_file = $upload_dir . $file_name; // Set the target file path

    //     // Check if the file is a PDF
    //     $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //     if ($file_type == 'pdf') {
    //         // Move the uploaded file to the target directory
    //         if (move_uploaded_file($_FILES['cv']['tmp_name'], $target_file)) {
    //           $sql="INSERT INTO apply(CV) VALUES('$target_file')";
    //           $DB= new Database();
    //       $DB->insert($sql);    
          
    //             echo "Your CV has been uploaded successfully.";
    //         } else {
    //             echo "An error occurred while uploading your CV.";
    //             header("'Location:requirment.php?id=. echo $post_id;'");
    //         die;
    //         }
    //     } else {
    //         echo "Only PDF files are allowed.";
    //         header("'Location:requirment.php?id=. echo $post_id;'");
    //         die;
    //     }
    // } else {
    //     echo "No file was uploaded or there was an error during the upload.";
    //     header("'Location:requirment.php?id=. echo $post_id;'");
    //     die;
    // }
   
    
    $appply->apply($_POST);
    // header("Location:job.html");
    // die;
    }
  
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
    <title>reqirment</title>
    <link rel="stylesheet" href="styles/style.css" />

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
                  <a href="Uprofile.php"> Profile</a></span> 
                  
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
    

    <div class ="mid">
    <form action="" method="post" name="register" enctype="multipart/form-data">
    
   
    <br /> <br />
    <div class="CV">
        <h3>uplode your CV</h3>
        <input type="file" name="cv" placeholder="" />
      </div>
  <br /> <br />
 <lable>Why do you think you are eligiable to apply for this job</lable>
  <br />   <br /> 
  <textarea name="apply" placeholder="write here"  rows="6" cols="40" required></textarea>
  <br /><br />

  
  <br /><br />

  <!-- <a href="index.html"> -->
  <button type="submit">
    submit
  </button>
  <br />
</form>
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
              <p><a href="About.html">How do i register?</a></p>
              <p><a href="About.html">How to apply for a job?</a></p>
              <p><a href="About.html">How do I reset my password?</a></p> 
              <p><a href="About.html">how do i edit my cv?</a></p>
              <p><a href="About.html">how do i get notification?</a></p>
              <p><a href="About.html">what makes this platform different?</a></p>
            </p>
            <hr class="hid">
          </div>
            <div class="about">
              <p>
                <h3 id="about">About</h3>
                <p><a href="About.html">About us</a></p>
                <p><a href="About.html">how it works</a></p>
                <p><a href="About.html">Careers</a></p>
                <p><a href="About.html">accessibility</a></p>
                <p><a href="About.html">advertising</a></p>
              </p>
              <hr class="hid">
            </div>
            <div class="terms">
              <p>
                <h3 id="terms">Terms</h3>
                <p><a href="terms.html">Privacy Policy</a></p>
                <p><a href="terms.html"> Terms and Conditions</a></p>
                <p><a href="terms.html"> Copyright Policy</a></p>
                <p><a href="terms.html"> Code of Conduct</a></p>
                <!-- <p><a href=""><font color="azure"> Fees and Charges</font></a></p> -->
            </p>
            <hr class="hid">
    
            </div>
            <div class="about">
              <p>
                <h3 id="about">contact us</h3>
                <p><a href="About.html">aastugroup1@gmail.com</a></p>
                <p><a href="About.html">+251953101912</a></p>
                <p><a href="About.html"> AASTU, Tulu Dimtu, Addis Ababa, Ethiopia</a></p>
              </p>
              <hr class="hid">
            </div>
        </div>
    
        <!-- the second row of footer page  -->
        <div class="about-terms">
          <div class="about">
            <p>
              <h3 id="about">Job seekers</h3>
              <p><a href="About.html">Find Jobs</a></p>
              <p><a href="About.html">Register</a></p>
              <p><a href="About.html">post CV</a></p>
              <p><a href="About.html">Job Alerts</a></p>
            </p>
            <hr class="hid">
          </div>
          <div class="about">
            <p>
              <h3 id="about">Employers</h3>
              <p><a href="About.html">Log in</a></p>
              <p><a href="About.html">Register</a></p>
              <p><a href="About.html">post Jobs</a></p>
              <p><a href="About.html">services</a></p>
            </p>
            <hr class="hid">
          </div>
            <div class="terms">
              <p>
                <h3 id="terms">work with us</h3>
                <p><a href="terms.html">Contact Admin</a></p>
                <p><a href="terms.html">Become partner</a></p>
                <p><a href="terms.html"> Explor</a></p>
                <p><a href="terms.html"> Code of Conduct</a></p>
                <!-- <p><a href=""><font color="azure"> Fees and Charges</font></a></p> -->
            </p>
            <hr class="hid">
    
            </div>
            <div class="about">
              <p>
                <h3 id="about">useful links</h3>
                <p><a href="About.html">ehio job</a></p>
                <p><a href="About.html">alibaba</a></p>
                <p><a href="About.html">freelancers</a></p>
                <p><a href="About.html">remote work</a></p>
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
</html>
<!-- type="submit" name="submit" id="Btn" -->