<?php
// session_start();
include_once("classes\post.php");

$post=new Post();

$post->get_some();

$DB = new Database();   
?>

<div class="job-card">
<div>
        <?php 
        $image="";
        if(file_exists($row['image'])){
                $image=$row['image'];
        }
      
        else {$image="images\jobs\more.png";}
       
        ?>  
         <img src="<?php echo $image ?>" alt=" ">
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
         
         <a href="classes/saved.php?id=<?php echo $row['post_id']?>"><button>save</button></a>
         <a href="requirment.php?id=<?php echo $row['post_id']?>"><button>apply</button></a>

        </div>
        <br>
        <p>Posted on <?php echo $row['date'];?></p>
     </div>


