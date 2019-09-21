<?php
include_once("connection.php");
$username = "";
$email = "";
if(isset($_POST['submitted'])){
$name=$_POST['name'];
$email=$_POST['email'];
$phoneno=$_POST['phone'];
$carmodelno=$_POST['carmodelno'];
$licence=$_POST['licence'];
$password=$_POST['password'];
$sqli="Insert into userdetails (User_Name,Email_Id,Phone_No,Car_Model_NO,Licence_Id,password) values ('".$name."','".$email."','".$phoneno."','".$carmodelno."','".$licence."','".$password."')";
if($query=mysqli_query($con,$sqli))
{
header('location:thank-you.html');
}
else
{
die(mysql_error());
}
}
?>
