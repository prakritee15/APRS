<?php
include("connection.php");
$username = "";
$email = "";
if(isset($_POST['submitted']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
           $sqli="Insert into admindetails (user_name,email_id,phone,password) values ('".$name."','".$email."','".$phone."','".md5($password)."')";
 if($query=mysqli_query($con,$sqli))
 {
 header('location:thank-you1.php');
 }
 else
 {
 die(mysqli_error());
 }
 }

?>


