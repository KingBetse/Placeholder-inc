<?php
include("connect.php");
$DB= new Database();     
session_start();
$us= $_SESSION['placeholder_userid'];
$post_id=$_GET['id'];

  // $query="INSERT INTO `saved` (`id`, `user_id`, `post_id`) VALUES (NULL, '$us', '$post_id' )";

  //  WHERE NOT EXISTS(SELECT 1 FROM `saved` WHERE user_id ='$us' AND `post_id`='$post_id' )

  $query="  INSERT INTO saved (id, user_id, post_id)
SELECT NULL, '$us', '$post_id'
WHERE NOT EXISTS (
    SELECT * FROM saved
    WHERE user_id = '$us' AND post_id = '$post_id'
)";

$query2=
"
IF EXISTS (
  SELECT * FROM `saved`
  WHERE `user_id` = '$us' AND pos`t_id = '$post_id'
) 
BEGIN
  DELETE FROM saved
  WHERE `user_id` =' $us' AND `post_id` = '$post_id'
END
ELSE 
BEGIN
INSERT INTO saved (id, user_id, post_id)
  VALUES (NULL,' $us', '$post_id')
END;

"
;
// query to will remove from saved is it is already in saved fix later!!

  $result =$DB->insert($query);


if($result){
  header("Location:../saved.php");
  die;
}


?>