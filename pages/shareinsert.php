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
		$name = mysqli_real_escape_string($link, $_POST['name']);
	$no_of_shares = mysqli_real_escape_string($link, $_POST['no_of_shares']);
	$share_value = mysqli_real_escape_string($link, $_POST['share_value']);
	$company = mysqli_real_escape_string($link, $_POST['company']);
	$status = mysqli_real_escape_string($link, $_POST['status']);
	if($status == 'Returned' || $status == 'OAG') {
				$date_time = mysqli_real_escape_string($link, $_POST['date_time']);
				$to_whom = mysqli_real_escape_string($link, $_POST['to_whom']);
				$by_whom = mysqli_real_escape_string($link, $_POST['by_whom']);
				$witness = mysqli_real_escape_string($link, $_POST['witness']);
						

			} else { // when status is under custody
				$date_time = null;
				$to_whom = null;
				$by_whom = null;
				$witness = null;
				
			}
	$seizure_id = mysqli_real_escape_string($link, $_POST['seizure_id']);
	$ims_id = mysqli_real_escape_string($link, $_POST['ims_id']);

// 	    $imgFile = $_FILES['user_image']['name'];
// 		$tmp_dir = $_FILES['user_image']['tmp_name'];
// 		$imgSize = $_FILES['user_image']['size'];
		
		
		 
// if(empty($imgFile))
// 		 	{
// 			$errMSG = "Please Select Image File.";
// 			}
// 		else
// 			{
// 			$upload_dir = 'user_images/'; // upload directory
	
// 			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
// 		// 	// valid image extensions
// 			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
// 		// 	// rename uploading image
// 			$userpic = rand(1000,1000000).".".$imgExt;
				
// 		// 	// allow valid image file formats
// 					if(in_array($imgExt, $valid_extensions))
// 					{			
// 		// 		// Check file size '5MB'
// 						if($imgSize < 5000000)				
// 						{
// 							move_uploaded_file($tmp_dir,$upload_dir.$userpic);
// 						}
// 						else
// 						{
// 							$errMSG = "Sorry, your file is too large.";
// 						}
// 			}
// 			else
// 				{
// 				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
// 		 	    }
// 		 	}
		
		if($errMSG == null)
		{
			$sql = "INSERT INTO shares (name, no_of_shares, share_value, company,  status, date_time, to_whom, by_whom, witness, userPic, seizure_id) 
				VALUES ('$name', '$no_of_shares', '$share_value', '$company', '$status', '$date_time', '$to_whom', '$by_whom', '$witness', '$userpic', '$seizure_id')" ;

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
