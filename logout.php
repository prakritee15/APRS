<?php
session_start();
if(isset($_SESSION['Email_ID']))
{
unset($_SESSION['Email_ID']);
echo "You have logged out successfully";
}
header('location:index.php');
?>
