<?php
require 'admin_role.php';
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$id = mysqli_real_escape_string($link, $_POST['id']);
$case_no = mysqli_real_escape_string($link, $_POST['case_no']);
$investigator = mysqli_real_escape_string($link, $_POST['investigator']);
$suspect = mysqli_real_escape_string($link, $_POST['suspect']);


$sql = "UPDATE ims SET case_no = '$case_no', investigator = '$investigator', suspect='$suspect' WHERE id = '$id' ";
/*
$sql = "INSERT INTO buildings (address, reg_owner, house_no_, description, status) VALUES ('$address', '$reg_owner', '$house_no', '$description', '$status')";
*/
if(mysqli_query($link, $sql)){
  $_SESSION["message"] = "Records updated successfully";
    ?>
    <script type="text/javascript">
        window.location.href = "case_edit.php?id=<?php echo $id; ?>";
    </script>
<?php
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
