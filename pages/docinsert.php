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
		$doc_type = mysqli_real_escape_string($link, $_POST['doc_type']);
		$no_of_pages = mysqli_real_escape_string($link, $_POST['no_of_pages']);
		$remarks = mysqli_real_escape_string($link, $_POST['remarks']);
		$location = mysqli_real_escape_string($link, $_POST['location']);
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

		if($errMSG == null)
		{
			$sql = "INSERT INTO document ( doc_type, no_of_pages, remarks, location, status, date_time, to_whom, by_whom, witness,userPic, seizure_id)
         VALUES ('$doc_type', '$no_of_pages', '$remarks', '$location', '$status', '$date_time', '$to_whom', '$by_whom', '$witness', '$userpic', '$seizure_id')" ;
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
