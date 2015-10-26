<?php
include('connect.php');
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$sql="SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result=mysql_query($sql);
if(!mysql_fetch_array($result))
{
echo "<script> alert('Wrong username or password'); </script>";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.php">'; 
//header('location:login.php?rc=1');
//alert('wrong username or password');
//echo "wrong username or password";
}
else
{
	$_SESSION["user"]= $username;
//echo "hello" . $username;
if($username=="admin")
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
else
{
echo "<script> alert('Welcome $username'); </script>";
print_r($_SESSION);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=welcome.php">'; 
}
}

?>