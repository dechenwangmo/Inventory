<?php
require 'login_check.php';
$link = mysqli_connect("localhost", "root", "", "project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


if(isset($_GET['elec_id']))
{
$id = $_GET['elec_id'];
$sql = "DELETE FROM electronics WHERE elec_id='$id'";
} 

if(mysqli_query($link, $sql)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);

}

if(isset($_GET['land_id']))
{
$id_land = $_GET['land_id'];
$sql_land = "DELETE FROM land WHERE land_id='$id_land'";
}
if(mysqli_query($link, $sql_land)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);
 

}
if(isset($_GET['building_id']))
{
$id_bu = $_GET['building_id'];
$sql_bu = "DELETE FROM buildings WHERE building_id='$id_bu'";
}
if(mysqli_query($link, $sql_bu)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);
 

}
if(isset($_GET['jew_id']))
{
$id_jew = $_GET['jew_id'];
$sql_jew = "DELETE FROM jewleries WHERE jew_id='$id_jew'";
}
if(mysqli_query($link, $sql_jew)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);
 
}

if(isset($_GET['fa_id']))
{
$id_fa = $_GET['fa_id'];
$sql_fa = "DELETE FROM firearms WHERE fa_id='$id_fa'";
}
if(mysqli_query($link, $sql_fa)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);
 
}

if(isset($_GET['bank_id']))
{
$id_bank = $_GET['bank_id'];
$sql_bank = "DELETE FROM bank WHERE bank_id='$id_bank'";
}
if(mysqli_query($link, $sql_bank)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);
 
}

if(isset($_GET['elec_id']))
{
$id = $_GET['elec_id'];
$sql = "DELETE FROM electronics WHERE elec_id='$id'";
}
if(mysqli_query($link, $sql)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);

}

if(isset($_GET['cash_id']))
{
$id_cash = $_GET['cash_id'];
$sql_cash = "DELETE FROM cash WHERE cash_id='$id_cash'";
}
if(mysqli_query($link, $sql_cash)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);
} 

if(isset($_GET['acc_id']))
{
$id_acc = $_GET['acc_id'];
$sql_acc = "DELETE FROM bankacc WHERE acc_id='$id_acc'";
}
if(mysqli_query($link, $sql_acc)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);
} 


if(isset($_GET['share_id']))
{
$id_share = $_GET['share_id'];
$sql_share = "DELETE FROM shares WHERE share_id='$id_share'";
}
if(mysqli_query($link, $sql_share)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);

}

if(isset($_GET['email_id']))
{
$id_email = $_GET['email_id'];
$sql_email = "DELETE FROM emails WHERE email_id='$id_email'";
}
if(mysqli_query($link, $sql_email)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);
} 


if(isset($_GET['doc_id']))
{
$id_doc = $_GET['doc_id'];
$sql_doc = "DELETE FROM document WHERE doc_id='$id_doc'";
}
if(mysqli_query($link, $sql_doc)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);
} 


if(isset($_GET['vm_id']))
{
$id_vm = $_GET['vm_id'];
$sql_vm = "DELETE FROM vehicles_machineries WHERE vm_id='$id_vm'";
}
if(mysqli_query($link, $sql_vm)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);
} 


if(isset($_GET['others_id']))
{
$id_other = $_GET['others_id'];
$sql_other = "DELETE FROM others WHERE others_id='$id_other'";
}
if(mysqli_query($link, $sql_other)){
	echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);
} 

if(isset($_GET['id']))
{
$id = $_GET['id'];
$sql = "DELETE FROM ims WHERE id='$id'";
}
if(mysqli_query($link, $sql)){
  echo "Records deleted successfully!";
   header('location:' .$_SERVER["HTTP_REFERER"]);
} 

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);



?>