<?php
	require 'admin_role.php';
	$link = mysqli_connect("localhost", "root", "", "project");
 
	if($link === false)
		{
		   die("ERROR: Could not connect. " . mysqli_connect_error());
		}
 if(isset($_POST['btnsave']))
	{
 		$errMSG = null;
		$type = mysqli_real_escape_string($link, $_POST['type']);
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$description = mysqli_real_escape_string($link, $_POST['description']);
		$quantity = mysqli_real_escape_string($link, $_POST['quantity']);
		$status = mysqli_real_escape_string($link, $_POST['status']);

		if($status == 'Returned' || $status == 'OAG') {
		$date_time = mysqli_real_escape_string($link, $_POST['date_time']);
		$to_whom = mysqli_real_escape_string($link, $_POST['to_whom']);
		$by_whom = mysqli_real_escape_string($link, $_POST['by_whom']);
		$witness = mysqli_real_escape_string($link, $_POST['witness']);
			$date_time2 = null;
			$com = null;
			$place_of_auc = null;
			$tot_amt = null;
			$bid_win = null;

		} elseif ($status == 'Auctioned') {
			$date_time2 = mysqli_real_escape_string($link, $_POST['date_time2']);
			$com = mysqli_real_escape_string($link, $_POST['com']);
			$place_of_auc = mysqli_real_escape_string($link, $_POST['place_of_auc']);
			$tot_amt = mysqli_real_escape_string($link, $_POST['tot_amt']);
			$bid_win = mysqli_real_escape_string($link, $_POST['bid_win']);
			$date_time = null;
			$to_whom = null;
			$by_whom = null;
			$witness = null;
		} else { // when status is under custody
			$date_time = null;
			$date_time2 = null;
			$to_whom = null;
			$by_whom = null;
			$witness = null;
			$com = null;
			$place_of_auc = null;
			$tot_amt = null;
			$bid_win = null;
		}
		
		$to_whom = mysqli_real_escape_string($link, $_POST['to_whom']);
		$by_whom = mysqli_real_escape_string($link, $_POST['by_whom']);
		$witness = mysqli_real_escape_string($link, $_POST['witness']);
		

		
		$seizure_id = mysqli_real_escape_string($link, $_POST['seizure_id']);
		$ims_id = mysqli_real_escape_string($link, $_POST['ims_id']);
	    
	 //    $imgFile = $_FILES['user_image']['name'];
		// $tmp_dir = $_FILES['user_image']['tmp_name'];
		// $imgSize = $_FILES['user_image']['size'];
		
		

		// if(empty($imgFile))
		//  	{
		// 	$errMSG = "Please Select Image File.";
		// 	}
		// else
		// 	{
		// 	$upload_dir = 'user_images/'; // upload directory
	
		// 	$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
		// // 	// valid image extensions
		// 	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
		// // 	// rename uploading image
		// 	$userpic = rand(1000,1000000).".".$imgExt;
				
		// // 	// allow valid image file formats
		// 			if(in_array($imgExt, $valid_extensions))
		// 			{			
		// // 		// Check file size '5MB'
		// 				if($imgSize < 5000000)				
		// 				{
		// 					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
		// 				}
		// 				else
		// 				{
		// 					$errMSG = "Sorry, your file is too large.";
		// 				}
		// 	}
		// 	else
		// 		{
		// 		$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
		//  	    }
		//  	}
		
		if($errMSG == null)
		{
			$sql = "INSERT INTO others (type, name, description, quantity, status, userPic, date_time, date_time2, to_whom, by_whom, witness, com, place_of_auc, tot_amt, bid_win, seizure_id) 
			VALUES ('$type','$name', '$description', '$quantity', '$status', '$userpic', '$date_time','$date_time2', '$to_whom', '$by_whom', '$witness', '$com', '$place_of_auc','$tot_amt', '$bid_win', '$seizure_id')" ;

			if(mysqli_query($link, $sql))
			{
			   	$_SESSION["message"] = "Records inserted successfully!";
			    ?>
			    <script type="text/javascript">
			        window.location.href = "edit.php?ims_id=<?php echo $ims_id; ?>";
			    </script>
				<?php
			} 
			else
			{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
 		}else 
 		{
 		
		   	$_SESSION["message"] = $errMSG;
 			?>
 			<script type="text/javascript">
		        window.location.href = "edit.php?ims_id=<?php echo $ims_id; ?>";
		    </script>
	    <?php
 		}

 }
// close connection
