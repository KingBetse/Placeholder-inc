<?php
session_start();
include("classes\connect.php");
include("classes\apply.php");
$id=$_SESSION['placeholder_userid'];

$post_id=$_GET['id'];
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
      
<header >
      <nav class="nav-bar" id="nav">
        <div class="logo-and-search-bar">
          <div class="logo">
            <div class="logo-image">
              <a href=""><img width="20px" height="10px"
                src="images/logo.jpg" alt="logo" /></a>
            </div>
            <!-- <div class="logo-text"><span>placeholder</span></div> -->
          </div>
          <div class="sign">
            <span class="sign-link">
              <i class="fa-solid fa-right-to-bracket"></i>
              <a href="logout.php">Log out</a></span>
  
            <span class="sign-link">
              <a href="post.html"><button class="post">Post Jobs</button></a></span>
          </div>
          
        </div>
        <div class="nav-links ">
          <ul>
            <li>
              <i class="fa-solid fa-user"></i>
              <a href="profile.html"><span>Profile</span> </a>
            </li>
            
            
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
            <i id="colapse" class="fas fa-layer-groupfas fa-layer-group" >colapse</i>
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
</body>
</html>
<!-- type="submit" name="submit" id="Btn" -->