<?php
// session_start();
include_once("classes\post.php");

$post=new Post();
$post->get_post($id);
$post->get_some();
$result=$post->name($row['user_id']);
$r=$result[0];
$username= $r['first_name'].$r['last_name'];

$DB = new Database();   
?>

<div class="job-card">
<div>
        <?php 
        $image="";
        if(file_exists($row['image'])){
                $image=$row['image'];
        }
      
        else {echo "there is no image";}
       
        ?>  
         <img src="<?php echo $image ?>" alt="">
        </div>

    

        <div>
<h4>description:</h4>
<ul>
  <li>job title:<?php echo $row['job_title'];?></li>
  <li>Job type: <?php echo $row['job_type'];?></li>
  <li>work location:<?php echo $row['work_location'];?></li>
  <li>vacancies:<?php echo $row['vacancies'];?></li>
  <li>applicangs Nedded:<?php echo $row['needed'];?></li>
  <li>work experiance: <?php echo $row['work_experiance'];?> </li>
  <li>initial salary: <?php echo $row['salary'] ." birr";?></li>
  <li>verified company:<?php echo $row['closed']; ?></li> 

</ul>
</div>
        <div>
         
         <a class="button" href="profile.html"><button>save</button></a>
         <a href="requirment.php"><button>apply</button></a>

        </div>
        <br>
        <p>Posted on <?php echo $row['date'];?></p>
        <p>Posted by:<?php echo $username;?></p>
     </div>


