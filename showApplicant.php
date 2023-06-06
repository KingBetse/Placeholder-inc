a<?php
session_start();
include("classes\connect.php");
include("classes\apply.php");
include("classes\user.php");
$post_id=$_GET['id'];
$id=$_SESSION['placeholder_userid'];
if($id!=''){
    if(isset($_SESSION['placeholder_userid']) && is_numeric($_SESSION['placeholder_userid']))
    { 
        $apply= new Apply();
        $user= new User();
        $result=$apply->show($post_id);
    //   print_r($result);
        if($result){
            echo "<h2>Search Results:</h2>";
            echo "<table>";
            echo "<tr><th>Full Name</th> <th>Email</th> <th>Requirment</th><th>Action</th></tr>";
            
            foreach($result as $row){
                $r=$user->get_user($row['user_id']);
                // print_r($r);
                echo "<tr>";
                    echo "<td>" .$r['first_name']." ".$r['last_name']. "</td>";
                    echo "<td>" .$r['email']." ". "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td> " ."<a href='accepted.php?id=". $row['post_id']."'><button>Accept</button></a>"."<a href='decline.php?delete=". $row['description']."'><button>Delete</button></a>"." </td>"; 
                echo "</tr>";
            }
        }
        else{
            $message="No one Applied for this Job";
            echo "<center><h3>".$message."</h3></center>";

           // <a href='decline.php?delete=echo $row["description"]'><button>Decilne</button> </a> "
        }

      }else{
        header("Location:login.html");
      die;
      }}
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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td, table th {
            border: 1px solid black;
            padding: 8px;
        }

       
    </style>
</head>
<body>


    <?php
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
</body>
<script src="app.js"></script>
</html>
