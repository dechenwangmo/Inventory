<?php
require 'admin_role.php';
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security

/*$email_id = mysqli_real_escape_string($link, $_POST['email_id']);*/
		$address = mysqli_real_escape_string($link, $_POST['address']);
		$reg_owner = mysqli_real_escape_string($link, $_POST['reg_owner']);
		$house_no = mysqli_real_escape_string($link, $_POST['house_no']);
		$description = mysqli_real_escape_string($link, $_POST['description']);
		$freeze_order = mysqli_real_escape_string($link, $_POST['bfreeze_order']);
		if($freeze_order == 'Yes') {
						$freeze_order_ref = mysqli_real_escape_string($link, $_POST['freeze_order_ref']);
					} else { // when status is under custody
						$freeze_order_ref = null;
					}

		$status = mysqli_real_escape_string($link, $_POST['status']);
		$date_time = mysqli_real_escape_string($link, $_POST['date_time']);
		$to_whom = mysqli_real_escape_string($link, $_POST['to_whom']);
		$by_whom = mysqli_real_escape_string($link, $_POST['by_whom']);
		$witness = mysqli_real_escape_string($link, $_POST['witness']);
		$seizure_id = mysqli_real_escape_string($link, $_POST['seizure_id']);
		$ims_id = mysqli_real_escape_string($link, $_POST['ims_id']);

		

 
// attempt insert query execution
$sql = "INSERT INTO buildings (address, reg_owner, house_no, description, freeze_order, freeze_order_ref, status, date_time, to_whom, by_whom, witness, userPic, seizure_id) VALUES  ('$address', '$reg_owner', '$house_no', '$description', '$freeze_order', '$freeze_order_ref', '$status', '$date_time', '$to_whom', '$by_whom', '$witness', '$userpic', '$seizure_id')" ;
/*
$sql = "INSERT INTO buildings (address, reg_owner, house_no_, description, status) VALUES ('$address', '$reg_owner', '$house_no', '$description', '$status')";
*/
if(mysqli_query($link, $sql)){
   echo  "Records inserted successfully!";
    ?>
     <script type="text/javascript">
		window.location.href = "edit.php?ims_id=<?php echo $ims_id; ?>";
	</script>
    
<?php
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>