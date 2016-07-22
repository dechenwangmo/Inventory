<?php
	require 'login_check.php';

	if(isset($_POST['submit']))
 	 {
		$link = mysqli_connect("localhost", "root", "", "project");
 
		// Check connection
		if($link === false){
		    die("ERROR: Could not connect. " . mysqli_connect_error());
		}

		
		$username = $_SESSION['username'];
		
		$password_confirm = $_POST['password_confirm'];
		echo $password_confirm;
		
		$login_update= "UPDATE users SET password = '$password_confirm' WHERE username = '$username' ";

					if(mysqli_query($link, $login_update))
					{
					header('Location: ' . $_SERVER["HTTP_REFERER"] );
					} else{
					    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
					}
 			
	}else
		{
			echo "incorrect";
		}


?>
