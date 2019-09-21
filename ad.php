<?php
include_once("connection.php");
if(isset($_POST['email_id'])&& isset($_POST['password']))
{
$email_id=$_POST['email_id'];
$password=$_POST['password'];
$sqli="select * from admindetails where email_id='".$email_id."'AND password='".$password."' limit 1";
$result=mysqli_query($con,$sqli);
if(mysqli_num_rows($result)==1)
{
header('location:authenticate.php');
 exit();
}
else
{
echo " You Have Entered Incorrect Password";
exit();
}
}
?>
