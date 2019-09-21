<?php
include_once("connection.php");
  if(isset($_POST['update']))
{
               $id = $_POST['id'];
                $name=$_POST['name'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $carmodelno=$_POST['carmodelno'];
                $licence=$_POST['licence'];
                $password=$_POST['password'];
 $sqli = " update userdetails set id=$id, User_Name='".$name."',Email_Id='".$email."',Phone_No='".$phone."',Car_Model_NO='".$carmodelno."',Licence_Id='".$licence."', password='".$password."' where id ='".$id."'";
$query = mysqli_query($con,$sqli);

if ($sqli)
{
  header('location:viewuser.php');
}
else {
echo 'Data not Updated';
 }
mysqli_close($con);
}

?>
<!DOCTYPE html>
<html>
<head>
        <style type="text/css">
<!--
.body {
        background-color: #CCCC99;
        margin-left: 3px;
        margin-top: 3px;
        margin-right: 1px;
        margin-bottom: 1px;
        background-repeat: repeat-x;
}</style>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="col-lg-6 m-auto">

 <form method="post">

 <br><br><div class="card">

 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Update Operation </h1>
 </div><br>
 <label> Id: </label>
 <input type="text" name="id" class="form-control"> <br>
  <label> User Name: </label>
 <input type="text" name="name" class="form-control"  maxlength="50" pattern="[a-zA-Z]+" required=""> <br>

<label> Email Id: </label>
 <input type="text" name="email" class="form-control" maxlenth="50" required=""> <br>

<label> Phone No: </label>
 <input type="text" name="phone" class="form-control" maxlenth="50" patter"[0-9]+" required=""> <br>

<label> Car Model No: </label>
 <input type="text" name="carmodelno" class="form-control" maxlenth="50" required=""> <br>

<label> Licence Id: </label>
 <input type="text" name="licence" class="form-control" maxlenth="50" required=""> <br>

  <label> Password: </label>
 <input type="password" name="password" class="form-control" maxlenth="50" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required=""> <br>

  <button class="btn btn-success" type="update" name="update"> Update </button><br>

  </div>
 </form>
 </div>
</body>
</html>
