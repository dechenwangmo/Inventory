<?php
require_once("db_login.php");
session_start();
$db=get_db();
$username = $_POST['username'];
$password = $_POST['password'];

$stmt=$db->prepare("SELECT * FROM users WHERE username=? && password=? LIMIT 1");
$stmt->execute(array($username,$password));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if($result != null) {
  $_SESSION['role'] = $result['role'];
  $_SESSION['username'] = $result['username'];
  $_SESSION['user_id'] = $result['id'];
  $_SESSION['login'] = 1;
  header("Location:dashboard.php");
} else {
  $_SESSION['error'] = 'Incorrect username or password';
  header("Location:index.php");
}
?>