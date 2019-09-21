<?php
session_start();
if(isset($_SESSION['Email_ID']))
{
unset($_SESSION['Email_ID']);
"You have logged out successfully";
}
header('location:userregister.php');
?>
