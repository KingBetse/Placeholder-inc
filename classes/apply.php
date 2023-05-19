<?php


class Apply{
    public function apply($data){
        $DB= new Database();      
        
  $usernum=$_SESSION['placeholder_userid'];
 $post_id=$_GET['id'];
    $description=addsLashes($data['apply']);
    

  $query="insert into apply (user_id,post_id,descripion) values ('$usernum','$post_id','$description')";
  $DB->insert($query);
    }
    public function verify($id){
      
      $DB = new Database();
      $query="select post_id from post where user_id= '$id' ";
      $result=$DB->read($query);
      if($result){ 
        return $result;
    }
    else{
        return false;
    }

          
}
}
?>