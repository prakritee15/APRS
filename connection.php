<?php
//This is connection file for php

$con=mysqli_connect("localhost","admin","root@ELITE1","reporting");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>
