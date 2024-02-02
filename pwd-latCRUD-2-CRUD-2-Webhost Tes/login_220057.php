<?php
	session_start(); // Start the session
	if(isset($_POST['login'])) {  // check POST variable from FORM
		include "connection_220057.php";  // call connection
		
		// make the query based on username
		$query = "SELECT * FROM user_220057 WHERE username_220057='$_POST[username]'";
		
		// run the query
		$login = mysqli_query($db_connection,$query);
		
		if(mysqli_num_rows($login) > 0) {  // check if the username found or not
			$user = mysqli_fetch_assoc($login);  // if user found, extract the data
			
			if(password_verify($_POST['password'], $user['password_220057'])) {  // verify the password
				// if password match, then make session variabel
				$_SESSION['login']=TRUE;
				$_SESSION['user_id']=$user['user_id_220057'];
				$_SESSION['username']=$user['username_220057'];
				$_SESSION['password']=$user['password_220057'];
				$_SESSION['user_type']=$user['usertype_220057'];
				$_SESSION['fullname']=$user['fullname_220057'];
				$_SESSION['user_photo']=$user['user_photo_220057'];
				
				// success login msg
				echo "<script>alert('Login success !'); window.location.replace('index.php');</script>";
				
			} else {  // password did not match
				// wrong password msg then redirect to login form
				echo "<script>alert('Login failed, wrong password !'); window.location.replace('form_login_220057.php');</script>";
			}
			
		} else {
			// login failed msg then redirect to login form
			echo "<script>alert('Login failed, user not found !'); window.location.replace('form_login_220057.php');</script>";
		}	
	}

?>