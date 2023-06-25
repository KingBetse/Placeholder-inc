<?php
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


