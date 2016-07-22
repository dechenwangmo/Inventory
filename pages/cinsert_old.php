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

$cash_amount = mysqli_real_escape_string($link, $_POST['cash_amount']);
$currency = mysqli_real_escape_string($link, $_POST['currency']);
$deno = mysqli_real_escape_string($link, $_POST['deno']);
$cash_location = mysqli_real_escape_string($link, $_POST['cash_location']);
$statuscu = mysqli_real_escape_string($link, $_POST['statuscu']);
$date = mysqli_real_escape_string($link, $_POST['date']);
$time = mysqli_real_escape_string($link, $_POST['time']);
$to_whom = mysqli_real_escape_string($link, $_POST['to_whom']);
$by_whom = mysqli_real_escape_string($link, $_POST['by_whom']);
$witness = mysqli_real_escape_string($link, $_POST['witness']);


$seizure_id = mysqli_real_escape_string($link, $_POST['seizure_id']);
$ims_id = mysqli_real_escape_string($link, $_POST['ims_id']);




 
// attempt insert query execution
$sql = "INSERT INTO cash ( cash_amount, currency, denomination, location, status, date, time, to_whom, by_whom, witness, seizure_id) 
VALUES ('$cash_amount', '$currency', '$deno', '$cash_location', '$statuscu', '$date', '$time', '$to_whom', '$by_whom', '$witness', '$seizure_id')" ;
/*
$sql = "INSERT INTO buildings (address, reg_owner, house_no_, description, status) VALUES ('$address', '$reg_owner', '$house_no', '$description', '$status')";
*/
if(mysqli_query($link, $sql)){

    $_SESSION["message"] = "Records inserted successfully!";
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