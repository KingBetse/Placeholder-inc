<?php
class Profile{
  private $error='';
public function getProf($data){
  $DB= new Database();
  $usernum=$_SESSION['placeholder_userid'];
  $query2="select * from users where user_id ='$usernum' limit 1";
  $result=$DB->read($query2);

    $firstName= addsLashes($data['firstName']);
    $lastName=addsLashes($data['lastName']);
    $phoneNum= addsLashes($data['phoneNum']);
    $birthDate=addsLashes($data['birthDate']);
    $gender=addsLashes($data['gender']);
    $education=addsLashes($data['education']);
    $country=addsLashes($data['country']);
    $photo=addsLashes($data['photo']);
    $skills=addsLashes($data['skils']);
   
    // if($result=""){
    //   echo "unkown account";
    // }
    // else{
      $query="update users set first_name = '$firstName', last_name = '$lastName',phone_number = '$phoneNum', birth_date = '$birthDate', gender = '$gender', education = '$education', country = '$country', skills = '$skills' where user_id = '$usernum'";
    // // $query="insert into users (first_name,last_name,phone_number,birth_date,gender,education,country,skills) values ('$firstName',' $lastName','$phoneNum','$birthDate','$gender','$education','$country','$skills')";
    $DB->insert($query);
    // }
}
public function evaluate($data){
 


  foreach($data as $key => $value){
if($key== 'firstName')
      if(is_numeric($value)){

          return $this->error.="first name can never be numbers";
      }
  }
  if($key== 'lastName')
      if(is_numeric($value)){

         return  $this->error.="last name can never be numbers";
      }
  }
}

?>