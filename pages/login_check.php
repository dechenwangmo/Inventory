<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if($_SESSION["login"] != 1) {
	session_unset();
	$_SESSION['error'] = 'Please login first!';
   	header("Location: index.php");
	exit();
}
?>