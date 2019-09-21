<?php
include ("connection.php");
 if(isset($_GET['id']))
{
$id = $_GET['id'];
$sqli = " DELETE FROM `admindetails` WHERE id ='$id'";
if($query=mysqli_query($con,$sqli))
{
header("location: viewowner.php");
}
else{
echo "Owner has not been deleted";
}
}
?>
