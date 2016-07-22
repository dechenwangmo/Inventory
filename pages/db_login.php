<?php
function get_db(){
 $db_name="project"; // Database name
 $host="localhost";
 $username="root";
 $password="";
 $db = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
 return $db;
}
?>