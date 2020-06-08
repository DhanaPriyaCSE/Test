<?php
session_start();
$username="";
$email="";
$errors=array();
$db=mysql_connect('localhost','root','practice') or die("no connect");

$username= mysql_real_escape_string($db, $_POST[username]);
$email=mysql_real_escape_string($db, $_POST[email]);
$password= mysql_real_escape_string($db, $_POST[password]);

if(empty($username)){array_push($errors,"username is not required")}
if(empty($email)){array_push($errors,"mail is not required")}
if(empty($password)){array_push($errors,"pass is not required)}

if(count($errors)==0){
 $password= md5($password);
 $query="INSERT INTO user(username,email,password) VALUES ('$username','$email','$password');
 mysql_query($db,$query);
 $SESSION['username']=$username;
 $SESSION['success']="YOU ARE NOW LOGGED IN";
 header('location: index.php');