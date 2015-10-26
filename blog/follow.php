<?php
include('connect.php');
session_start();
$user=$_SESSION["user"];
$followed=$_GET["username"];
$sql="SELECT * FROM follow WHERE followed= '$followed' AND follow= '$user'";
$result=mysql_query($sql);
if(!mysql_fetch_array($result))
{
$sql = "INSERT INTO follow VALUES('', '$followed' , '$user')";
$result= mysql_query($sql);
//echo "your record has created successfully";
echo "<script> alert('You followed $followed');</script>";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=welcome.php">';    
//header('location:register.php?rc=1');
}
else
{
//echo "username already taken";
echo "<script> alert('You already followed this user');</script>";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=register1.php">';    
    
//header('location:form.php');
}
 
?>