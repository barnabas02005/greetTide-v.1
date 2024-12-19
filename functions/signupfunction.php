<?php

include("../config/db.php");

if(isset($_POST["signup"])) {


	if(empty($_POST['fullname']) || empty($_POST['displayname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirmpass'])){ 
				echo "<script>alert('All the fields must be filled');</script>";
	}
	

			else{
				$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
				$displayname = mysqli_real_escape_string($conn, $_POST['displayname']);
				$email = mysqli_real_escape_string($conn, $_POST['email']);
				$password = mysqli_real_escape_string($conn, $_POST['password']);
				$pass2 =    mysqli_real_escape_string($conn, $_POST['confirmpass']);


				$con_u = "SELECT * FROM members WHERE displayname='".$displayname."'";
				$rel_u = mysqli_query($conn, $con_u);
				if(mysqli_num_rows($rel_u) > 0) {
							header("location: signup.php?error=@$displayname - This displayname is taken already!!");
							exit();
				}

				
				$con_e = "SELECT * FROM members WHERE email='".$email."'";
				$rel_e = mysqli_query($conn, $con_e);
				if(mysqli_num_rows($rel_e) > 0) {
							header("location: signup.php?error=<span style='overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width: 200px;'>@$email</span> has been used already!!");
							exit();
				}

				if($password != $pass2) {
							header("location: signup.php?error=Confirm password doesn't not match the password!!");
							exit();
				}

				if(strlen($password) < 5) {
							header("location: signup.php?error=Password must be more than 5 characters!!");
							exit(); 
				}

				$options = [
							'memory_cost' => 1<<17, // 128 Mb
							'time_cost'   => 4,
							'threads'     => 3,
					];

				if($password == $pass2) {

				$password = password_hash($password, PASSWORD_ARGON2ID, $options);
	
	$sql = "INSERT INTO members (`id`, `fullname`, `displayname`, `email`, `password` , `date_joined`) VALUES(NULL, '".$fullname."', '".$displayname."', '$email', '".$password."', now())";


	$row= $conn->query($sql);

	if($row > 0) {
					//$_SESSION["displayname"] = $displayname;
					$_SESSION["id"] = $id;
					//$_SESSION["epmail"] = $epmail;
					$_SESSION["displaymail"] = $displayname;


	header("location: index_load.php?Welcome");

}
				}
				
	
	else {
				echo"Error Signing you up!!";
	}
}
}


?>