<?php


// $first_name = "betselot";
// $last_name="bezuayehu";
class Database{
  private  $host="localhost";
  private  $username="root";
  private   $password="";
  private   $db="placeholder";

function  connect(){
    $connection=mysqli_connect($this->host,$this->username,$this->password,$this->db,3306);
    return $connection;
}
function read($query){
   $con= $this->connect();
  
    $result=mysqli_query($con,$query);
    if(!$result){return false;}
    else {
        $data=false; 
        while($row=mysqli_fetch_assoc($result))
         {
            $data[]=$row;
        //    echo"<pre>";
        //     print_r($row);
        //     echo"<pre>";   
       
        }
        return $data;
    }
    
}
function insert($query){
    $con= $this->connect();
    
     $result=mysqli_query($con,$query);
     if(!$result){return false;}
     else {return true;}

}
}

// $DB =new Database;
// $DB->insert("insert into users (password) value('12oo1')");
// $DB->read("select * from users");

//  $query="insert into users (first_name,last_name,gender,email) value('$first_name','$last_name','male','king.betse')";
// echo mysqli_error($connection);
