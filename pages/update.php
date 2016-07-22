<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security

/*$email_id = mysqli_real_escape_string($link, $_POST['email_id']);*/
if(isset($_GET['elec_id']))
{
		$elec_id=$_GET['elec_id'];
		if(isset($_POST['submit']))
		{
		/*$case_no = mysqli_real_escape_string($link, $_POST['case_no']); */

		$type = mysqli_real_escape_string($link, $_POST['type']);
		$model = mysqli_real_escape_string($link, $_POST['model']);
		$manufacturer = mysqli_real_escape_string($link, $_POST['manufacturer']);
		$serial_no = mysqli_real_escape_string($link, $_POST['serial_no']);
		$capacity = mysqli_real_escape_string($link, $_POST['capacity']);
		/*$seized_from = mysqli_real_escape_string($link, $_POST['seized_from']);
		$investigator_name = mysqli_real_escape_string($link, $_POST['investigator_name']); */
		$location = mysqli_real_escape_string($link, $_POST['location']);
		$status = mysqli_real_escape_string($link, $_POST['status']);


		// attempt insert query execution

		$sql = "UPDATE electronics SET type = '$type', model = '$model', manufacturer='$manufacturer', serial_no = '$serial_no', capacity = '$capacity', location = '$location'status = '$status' WHERE elec_id = $elec_id";
/*
$sql = "INSERT INTO buildings (address, reg_owner, house_no_, description, status) VALUES ('$address', '$reg_owner', '$house_no', '$description', '$status')";
*/ }
if(mysqli_query($link, $sql)){
    echo "Records updated successfully";
    ?>
    <script type="text/javascript">
        window.location.href = "index.php";
    </script>
<?php
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 }

// close connection
mysqli_close($link);
?>
