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

/*$case_no = mysqli_real_escape_string($link, $_POST['case_no']); */
$place_of_search = mysqli_real_escape_string($link, $_POST['place_of_search']);
$date = mysqli_real_escape_string($link, $_POST['date']);
$time = mysqli_real_escape_string($link, $_POST['time']);
$search_order = mysqli_real_escape_string($link, $_POST['search_order']);

if($search_order == 'Yes') {
			$search_order_ref = mysqli_real_escape_string($link, $_POST['search_order_ref']);	
		} else { // when status is under custody
			$search_order_ref = null;
							
			}
$seized_ref_no = mysqli_real_escape_string($link, $_POST['seized_ref_no']);
$witness = mysqli_real_escape_string($link, $_POST['witness']);
$ims_id = mysqli_real_escape_string($link, $_POST['ims_id']);

// attempt insert query execution
$sql = "INSERT INTO seizure ( seized_ref_no, place_of_search, date, time, search_order, search_order_ref,  witness, ims_id ) VALUES ( '$seized_ref_no', '$place_of_search', '$date', '$time', '$search_order', '$search_order_ref', '$witness', '$ims_id')" ;

if(mysqli_query($link, $sql)){
    $_SESSION['message'] = 'Records inserted successfully!';
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
