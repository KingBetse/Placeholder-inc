<?php
// session_start();
include_once("classes\post.php");

$post=new Post();
//$id=$_SESSION['placeholder_userid'];

//$post->get_post($id);
$post->get_some();

$DB = new Database();

    // foreach($id as $row)

    //     $query="select * from post where id='$id' limit 1";
       
    //     $result=$DB->read($query);
    //     if($result){ 
    //       $row=$result[0];
    //     $job_title =$row['job_title'];
    //     $Job_type =$row['job_type'];
    //     $work_location =$row['work_location'];
    //     $vacancies =$row['vacancies'];
    //     $Needed =$row['needed'];
    //     $experiance =$row['work_experiance'];
    //     $salary =$row['salary'];
    //     $closed =$row['closed'];

    // }

    
?>

<div class="job-card">
        <div>
         <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRKdzUhdrYISPKPLpvkEHdwX40eEWdRf-PXtsf-6I3ng&s" alt="">
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
  <li>verified campany</li>
  <p> <<?php echo $row['closed'];?></p>
</ul>
</div>
        <div>
         
         <a class="button" href="profile.html"><button>today</button></a>
         <a href="profile.html"><button>apply</button></a>

        </div>
        <br>
        <p>Posted on <?php echo $row['date'];?></p>
     </div>


