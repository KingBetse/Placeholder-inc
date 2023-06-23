<?php
session_start();
include("classes\connect.php");
include("classes\profile.php");
include("classes\signin.php");
include("classes\user.php");
//echo '<pre>';
 // print_r($_SESSION);
  //echo '<pre>';
$id=$_SESSION['placeholder_userid'];
if($id!=''){

if($_SERVER['REQUEST_METHOD']=='POST'){
 
 
  if(isset($_SESSION['placeholder_userid'])&&is_numeric($_SESSION['placeholder_userid'])&& $_SESSION['placeholder_userid'] !='')
{
  $id=$_SESSION['placeholder_userid'];
  $signin=new Signin();
  $result=$signin->check_login($id);

  
  if($result){
    $user= new User();
    $user_data=$user->get_data($id);
    
   

    $profile= new Profile();
    $error =$profile->evaluate($_POST);
    if($error==''){
      $profile->getProf($_POST);
      if(isset($_FILES['photo']['name'])&&  $_FILES['photo']['name']!=''){
        $filename='uploads/' .$_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'],$filename);
        if(file_exists($filename)){
    
          $query ="update users set image= '$filename' where user_id='$id'";
          $DB=new Database();
          $DB->insert($query);
          
          $query="select * from users where user_id='$id' limit 1";
          $result=$DB->read($query);
          if($result){ 
          $row=$result[0];
          if($password==$row['password']){
            $_SESSION['username']= $row['first_name'];
            $_SESSION['photo']= $row['image'];
        }}


    
        }
        } 
        else{
    $error='enter a valid photo';
    echo $error;
        }
    }
    else{
      return $error;
    }
    header("Location:eIndex.php");
    die;
  }else{
    unset($_SESSION['placeholder_userid']);
    header("Location:login.php");
  die;
  }
  
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

    <title>profile</title>
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/profile.css" />
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
                  <span class="sign-link">
                    <i class="fa-solid fa-house"></i>
                    <!-- <a href="" class="link">Home</a> -->
                    <a href="showApplicant.php">Notification </a>
                    </span> 

          <span class="sign-link">
            <a href="post.php"><button class="post">Post Jobs</button></a></span>

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
                  <a href="eUprofile.php"> Profile   </a></span> 
                  
                  

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
            <a href="index.php"><span>Home</span> </a>
          </li>

          

         

          <li>
            <i class="fa-solid fa-user-doctor"></i>
            <a href="post.php"><span>Post Jobs</span></a>
          </li>
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
  
  


  
<section class="container">
    <?php
    $DB=new Database();
    $query="select * from users where user_id='$id' limit 1";
    $result=$DB->read($query);
    
    if($result){
        foreach($result as $row){
            $firstname=$row['first_name'];
            $lastname=$row['last_name'];
            $phone_no=$row['phone_number'];
            $date=$row['date'];
            $country=$row['country'];
            ?>
      <h3>Profile</h3>
  <form action="#" class="form" method="post" enctype="multipart/form-data">
    <div class="input-box">
        
      <label>First Name</label>
      <input type="text" name='firstName'placeholder="Enter first name"  value="<?php echo $firstname; ?>"/>
    </div>
    <div class="input-box">
      <label>Last Name</label>
      <input type="text" name='lastName' placeholder="Enter last name" value=<?php  echo $lastname ?>/>
    </div>
    
 
      <div class="input-box">
        <label>Phone Number</label>
        <input type="number" name='phoneNum' placeholder="Enter phone number" value= <?php echo $phone_no ?> />
      </div>
      <div class="input-box">
        <label>Birth Date</label>
        <input type="date"  name='birthDate' placeholder="Enter birth date" value= <?php echo $date ?>  />
      </div>
    
    <div class="gender-box">
      <h3>Gender</h3>
      <div class="gender-option">
        <div class="gender">
          <input type="radio" id="check-male" name="gender" checked value="male"/>
          <label for="check-male">Male</label>
        </div>
        <div class="column">
          <div class="gender">
            <input type="radio" id="check-female" name="gender" value="female" />
            <label for="check-female">Female</label>
          </div>
        </div>
       
      </div>
    

        <div class="select-box">
          <select name="country" value= <?php echo $country ?> >
            <option hidden>Country</option>
            <option>Ethiopia</option>
            <option>America</option>
            <option>Japan</option>
            <option>India</option>
            <option>Nepal</option>
          </select>
        </div>
      </div>
      <div class="photo">
        <h3>Photo</h3>
        <input type="file" name="photo" placeholder="" />
      </div>

    </div>
<?php
}
  
}?>
     

    <button>Submit</button>
  </form>
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
