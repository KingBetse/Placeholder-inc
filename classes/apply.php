<?php


class Apply{
    public function apply($data){
        $DB= new Database();      
        
  $usernum=$_SESSION['placeholder_userid'];
 $post_id=$_GET['id'];
    $description=addsLashes($data['apply']);

    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
      $upload_dir = 'uploads/CV/'; // Specify the upload directory
      $file_name = basename($_FILES['cv']['name']); // Get the file name
      $target_file = $upload_dir . $file_name; // Set the target file path

      // Check if the file is a PDF
      $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      if ($file_type == 'pdf') {
          // Move the uploaded file to the target directory
          if (move_uploaded_file($_FILES['cv']['tmp_name'], $target_file)) {
        //     $sql="INSERT INTO apply(CV) VALUES('$target_file')";
        //     $DB= new Database();
        // $DB->insert($sql);    
        $query="insert into apply (user_id,post_id,description,CV) values ('$usernum','$post_id','$description','$target_file')";
          $DB->insert($query);
          header("Location:job.html");
    die;
        
              // echo "Your CV has been uploaded successfully.";
          } else {
              echo "An error occurred while uploading your CV.";
              header("'Location:requirment.php?id=. echo $post_id;'");
          die;
          }
      } else {
          echo "Only PDF files are allowed.";
          header("'Location:requirment.php?id=. echo $post_id;'");
          die;
      }
  } else {
      echo "No file was uploaded or there was an error during the upload.";
      header("'Location:requirment.php?id=. echo $post_id;'");
      die;
  }
    

  // $query="insert into apply (user_id,post_id,description,CV) values ('$usernum','$post_id','$description','$target_file')";
  // $DB->insert($query);
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
public function show($id){
      
  $DB = new Database();
  $query="select * from apply where post_id= '$id' ";
  $result=$DB->read($query);
  if($result){ 
    return $result;
}
else{
    return false;
}
    
}
public function description(){
      
  $DB = new Database();
  $query="select * from apply where post_id= '' ";
  $result=$DB->read($query);
  if($result){ 
    return $result;
}
else{
    return false;
}

}

// public function upload($data){
//   $DB = new Database();
//   if($data)
// {   
     
//   if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
//     $upload_dir = 'uploads/CV/'; // Specify the upload directory
//     $file_name = basename($_FILES['cv']['name']); // Get the file name
//     $target_file = $upload_dir . $file_name; // Set the target file path

//     // Check if the file is a PDF
//     $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//     if ($file_type == 'pdf') {
//         // Move the uploaded file to the target directory
//         if (move_uploaded_file($_FILES['cv']['tmp_name'], $target_file)) {
//             echo "Your CV has been uploaded successfully.";
//         } else {
//             echo "An error occurred while uploading your CV.";
//         }
//     } else {
//         echo "Only PDF files are allowed.";
//     }
// } else {
//     echo "No file was uploaded or there was an error during the upload.";
// }
// } else {
// echo "Invalid request.";
// }

// }
}
?>