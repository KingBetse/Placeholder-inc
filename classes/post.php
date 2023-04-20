<?php
class Post{
    public function createUser($data){
        
        $job_title= addsLashes($data['job_title']);
        $job_type=addsLashes($data['job_type']);
        $Work_loc=addsLashes($data['work_location']);
        $vacancies= addsLashes($data['vacancies']);
       
        $needed=addsLashes($data['gender']);
        $salary= addsLashes($data['salary']);
        $work_exp=addsLashes($data['work_exp']);
        $closed= addsLashes($data['closed']);
        $postid = $this->createUserid();
        $userid=$_SESSION['placeholder_userid'];
        
        $DB = new Database();
       $query="insert into post (post_id ,job_title,job_type,work_location,vacancies,needed,work_experiance,salary,closed,user_id) values ('$postid','$job_title','$job_type','$Work_loc','$vacancies','$needed',' $work_exp','$salary','$closed','$userid')";
        
        $DB->insert($query);
        // echo "<pre>";
        // print_r($_POST);
        // echo "<pre>";}
    }
    public function get_post($id){
        $DB = new Database();
       $query="select * from post where user_id='$id' order by id desc limit 10";
       $result=$DB->read($query);
       if($result){ 
                return $result;
    
            }
            else{
                return false;
            }

        
    }
    public function get_all(){
        $DB = new Database();
        $query="select * from post order by id desc limit 10";
        $result=$DB->read($query);
        if($result){ 
                 return $result;
     
             }
             else{
                 return false;
             }

    }
    public function get_some(){
        $DB = new Database();
        $query="select * from post order by id desc limit 5";
        $result=$DB->read($query);
        if($result){ 
                 return $result;
     
             }
             else{
                 return false;
             }
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
}

?>