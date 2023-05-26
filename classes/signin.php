<?php
class Signin{
    private $error ="";
    public function login($data){

        $email=addSlashes($data['email1']);
        $password=addslashes($data['password1']);
        $DB = new Database();
       $query="select * from users where email='$email' limit 1";
       
       $result=$DB->read($query);
       if($result){ 
        $row=$result[0];
        if($password==$row['password']){
            $_SESSION['placeholder_userid']= $row['user_id'];
            $_SESSION['username']= $row['first_name'].$row['last_name'];
            $_SESSION['photo']= $row['photo'];
        }
        else{ $this->error.="wrong password <br>";}
        
       }
       else{
       $this->error.="no such email found<br>" ;
       }

       return $this->error;
    }

    public function check_login($id){

        $DB = new Database();
        $query="select * from users where user_id='$id' limit 1";
       $result= $DB->read($query);
       if($result){
        return true;
       }
       else {
        return false;}



    }

}