<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<style type="text/css">
<!--
.style1 {
        font-size: 36px;
        font-weight: bold;
}
.style3 {
        font-family: "Courier New", Courier, monospace;
        font-style: italic;
        font-weight: bold;
        font-size: 24px;
}
.style4 {font-size: 24px}
-->
</style>
</head>
<?php
echo $_SESSION['adminid'];

?><?php
echo $_SESSION['adminid'];

?>

<body>
<span class="style1">
  <marquee direction="left">
  You have login successfully, Thank You.
   </marquee>
   </span>
<div align="left" class="blink style3">ADD NEW USER?? </div>
  <div align="center"><a href="userregister.php" class="style29 style4">REGISTER HERE</a> </div>
<div align="center"><strong><em><a href="viewuser.php" class="style4">View Users</a></em></strong></div>
</td>

  </td>
</body>
</html>
