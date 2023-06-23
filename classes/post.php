<?php
class Post{
    public function createUser($data){
        $DB = new Database();
       
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


        $skills=$data['skill'];
  
        if($skills){
        foreach($skills as $row){
          $queryy="insert into post_skill (post_id,skills) values ('$postid','$row')";
          $DB->insert($queryy);
        }
      }


        
        $DB = new Database();
       $query="insert into post (post_id ,job_title,job_type,work_location,vacancies,needed,work_experiance,salary,closed,user_id) values ('$postid','$job_title','$job_type','$Work_loc','$vacancies','$needed',' $work_exp','$salary','$closed','$userid')";
        
        $DB->insert($query);
     
    }
    public function get_post($id){
        $DB = new Database();
       
       $query="select * from post where user_id='$id' order by id desc limit 10";
       $result=$DB->read($query);
       if($result ){ 
                return $result;
    
            }
            else{
                return false;
            }

        
    }
    public function name($id){
        $DB = new Database();
        $query2="select * from users where user_id='$id' limit 1";;
        $nam= $DB->read($query2);
        if($nam){
            return $nam;
        }
        else{
            return false;
        }
    }
    public function get_saved($idd){
        $DB = new Database();
        $query="select * from post JOIN saved where  `saved`.`post_id` = `post`.`post_id` AND  `saved`.`user_id` ='$idd' ";
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
        $query="select * from post order by id desc";
        $result=$DB->read($query);
        if($result){ 
                 return $result;
     
             }
             else{
                 return false;
             }

    }
    public function get_moderate($limit, $offset){
        $DB = new Database();
        $query="select * from post order by id desc limit $limit offset $offset ";
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
    public function get_one($id){
        $DB = new Database();
        $query="select * from post where user_id='$id' ";
        $result=$DB->read($query);
        if($result){ 
                 return $result;
     
             }
             else{
                 return false;
             }
    }
    public function post_all($id){
        $DB = new Database();
        $query="select * from post where post_id='$id' ";
        $result=$DB->read($query);
        if($result){ 
                 return $result;
     
             }
             else{
                 return false;
             }
    }
    public function get_skills($id){
        $DB = new Database();
    $query="select skill from skills where user_id ='$id'";
    $result=$DB->read($query);
if($result)return $result;
else return false;
}


    public function IDK($id){
        $DB = new Database();
    $query="select skill from skills where user_id ='$id'";
    $result=$DB->read($query);
    // print_r($result);
    echo"<br>";
    if($result){
        $out=array();
        
        foreach($result as $row){
            $sk= $row['skill'];
            $query2="SELECT post_id FROM post_skill where skills = '$sk' " ;
            // print($query2);
            $post_id= $DB->read($query2);
            // print_r($post_id);
    echo"<br>";

            // POST ID IS EITHER FALSE OR SOME 1/2D ARRAY
            if( $post_id){ 
            foreach($post_id as $r){
            $id=$r['post_id'];
            $query3="select * from post  where post_id= '$id'";
            // echo"<br>". $query3 ."<br>";
            $all=$DB->read($query3);
            if( $all){ 

    // echo"<br>";

    //             print_r($all);
    // echo"<br>";


    $out=array_merge($all,$out);
            };
        };
        }
        }
        // echo "<br><br><br><br>";
        // print_r($out);
        // echo "<br><br><br><br>";
        return $out;

    }
    else
    {
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