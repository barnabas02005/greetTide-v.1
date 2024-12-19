<?php
include("../config/db.php");

if(isset($_POST['signin'])) {


      if(empty($_POST['displaymail'])){ 
            header("location: signin.php?error= Enter your displayname or email!");
            exit();
      }
      if(empty($_POST['password'])){ 
            header("location: signin.php?error= Enter your password!");
            exit();
      }
      else
      {
            $displaymail= mysqli_real_escape_string($conn, $_POST['displaymail']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
      
     

      $sqll = "SELECT * FROM members WHERE (displayname = '$displaymail' || email = '$displaymail')";
      $row = $conn->query($sqll);

     if(mysqli_num_rows($row) > 0) {
      while($result = mysqli_fetch_assoc($row)) {
            if(password_verify($password, $result['password'])) 
            {
                  $_SESSION["displaymail"] = $displaymail;
                  $_SESSION["id"] = $id;
                  header("location: index_load.php");
            }
            else 
            {
                 header("location: signin.php?error=You entered an incorrect password for this account!");
            }
      }

     }
     else {
                  header("location: signin.php?error=This account doesn't exist!");
     }
}
}


?>