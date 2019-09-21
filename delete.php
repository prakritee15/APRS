<?php
include ("connection.php");
 if(isset($_GET['id']))
{
$id = $_GET['id'];
$sqli = " DELETE FROM `userdetails` WHERE id ='$id'";
if($query=mysqli_query($con,$sqli))
{
header("location: viewuser.php");
}
else{
echo "Error to delete user";
}
}
?>
