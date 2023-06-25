<?php
session_start();
include("classes\connect.php");
include("classes\apply.php");
include("classes\user.php");
$post_id=$_GET['id'];
$id=$_SESSION['placeholder_userid'];

if($id!=''){
    if($_SESSION['user']==1){
    if(isset($_SESSION['placeholder_userid']) && is_numeric($_SESSION['placeholder_userid']))
    { 
        $apply= new Apply();
        $user= new User();
        $result=$apply->show($post_id);
    //   print_r($result);


      }else{
        header("Location:login.html");
      die;
      }}
    else{
        header("Location:index.html");
        die;
    }
    }
    else{
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
    <title>Applicants</title>
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/job.css" />
    
    <script src="https://kit.fontawesome.com/6bed12e9d5.js" crossorigin="anonymous"></script>
    
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 50px;
            margin-bottom: 50px; 

        }

        table td, table th {
            border: 1px solid black;
            padding: 8px;
        }

       
    </style>
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

  



<section>

    <?php




    if($result){
        echo "<h2>Search Results:</h2>";
        echo "<table>";
        echo "<tr><th>Full Name</th> <th>Email</th><th>CV</th> <th>Requirment</th><th>Action</th></tr>";
        
        foreach($result as $row){
            $r=$user->get_user($row['user_id']);
            // print_r($r);
            
            echo "<tr>";
                echo "<td>" .$r['first_name']." ".$r['last_name']. "</td>";
                echo "<td>" .$r['email']." ". "</td>";               
                echo "<td> <a href='".$row['CV']."'><button>CV</button></a> </td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td> " ."<a href='accepted.php?id=". $row['post_id']."'><button>Accept</button></a>"."<a href='decline.php?delete=". $row['description']."'><button>Delete</button></a>"." </td>"; 
                echo "</tr>";
        }
        echo "</table>";

   

}
    else{
        $message="No one Applied for this Job";
        echo "<center><h3>".$message."</h3></center>";

       // <a href='decline.php?delete=echo $row["description"]'><button>Decilne</button> </a> "
    }
    //foreach()
    
    //  echo "<center><h3>".$message."</h3></center>";

    // echo "<h2>Search Results:</h2>";
    // echo "<table>";
    // echo "<tr>><th>Name</th><th>Requirment</th><th>Action</th></tr>";
    
    // foreach($result as $row){
    //     $r=$user->get_user($row['user_id']);
    //     print_r($r);
    //     echo "<tr>";
    //     foreach($r as $ro){
    //         echo "<td>" .$ro['first_name']. "</td>";
    //     }
    //     echo "<td>" . $row['description'] . "</td>";
    //     echo "<td> " ."<button>Accept</button>"."   <button>Decilne</button>"." </td>";
    //     echo "</tr>";
    // }
   
    ?>
</section>

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

    <!-- <script src="app.js"></script> -->
    


    <script src="app.js"></script>
    



</body>


</html>
