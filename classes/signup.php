<?php 

class Signup{  
// public $error='';
//     public function evalute($data){
// foreach($data as $key=>$value){
// if($key='email'){

//     if(!preg_match('/([\w\-]+\@[\w\-]+\.[\w\-]+)/',$email)){
//        $this->error=$this->error.'invalid email adress!';
//     }
// }
// if($this->error==''){
// $this->createUser($data);
// }
// else{
//     echo $this->error;
// }


// }
//     }

private $error='';
   public function createUser($data){
        $email= addsLashes($data['email1']);
        $password=addsLashes($data['password1']);
        $userID = $this->createUserid();
        
        $DB = new Database();


        $query1="select * from users where email='$email' limit 1";
        $result=$DB->read($query1);
        if($result){ 
         $this->error.="email already in use";
        }else{
            
            $query="insert into users (user_id,email,password) values ('$userID','$email','$password')";
        
        $DB->insert($query);
        }

       return $this->error;
        // echo "<pre>";
        // print_r($_POST);
        // echo "<pre>";}
    }
    public function evaluate($data){
        $email= addsLashes($data['email1']);
        $result=trim($email);
        if(!filter_var($result,FILTER_VALIDATE_EMAIL))
        {
            return $this->error.="invalid email";
        }

        // foreach($data as $key => $value){
        //     if($key=="email"){
        //     if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)){

        //        return $this->error.="invlaid email";
        //     }}

         
        // }
      
    }
    private function createUserid(){
        $length=rand(4,10);
        $number="";
        for($i=0;$i<$length;$i++){
            $new_rand=rand(0,9);
            $number = $number . $new_rand;
        }
        return $number;
       
    }
    // public  $userID=''
    
}




