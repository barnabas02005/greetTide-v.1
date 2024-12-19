<?php  

include("../config/db.php");
 if(isset($_POST["updateaccount"]))
 {
      $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
      $displayname = mysqli_real_escape_string($conn, $_POST['displayname']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      
            $sql = "UPDATE members SET fullname = '".$fullname."', email = '".$email."', displayname = '".$displayname."' WHERE displayname = '".$memdata["displayname"]."'";  
            mysqli_query($conn, $sql); 
      
      $options = [
            'memory_cost' => 1<<17, // 128 Mb
            'time_cost'   => 4,
            'threads'     => 3,
        ];

      if($password != '') {

                  $password = password_hash($password, PASSWORD_ARGON2ID, $options);
            //update post  
            $sql = "UPDATE members SET `password` = '".$password."'  WHERE displayname = '".$memdata["displayname"]."'";  
            mysqli_query($conn, $sql);  
      }
//   else  
//   {  
//     //insert post  
//     $sql = "INSERT INTO tbl_post(post_title, post_description, post_status) VALUES ('".$post_title."', '".$post_description."', 'draft')";  
//     mysqli_query($connect, $sql);  
//     echo mysqli_insert_id($connect);  
//   }
 }  



 if(isset($_POST["set_theme"]))
 {
      $theme = mysqli_real_escape_string($conn, $_POST['theme']);
      $id = mysqli_real_escape_string($conn, $_POST['member_id']);

      
            $sql = "UPDATE members SET theme = '".$theme."' WHERE id = $id";  
            $result = $conn->query($sql); 
						echo $result;

						
							header("location: ../index.php");
					
 }  
 ?>