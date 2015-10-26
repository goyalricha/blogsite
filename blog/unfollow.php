<?php
include('connect.php');
session_start();
$user=$_SESSION["user"];
$followed=$_GET["username"];
$sql="DELETE FROM follow WHERE followed= '$followed' AND follow= '$user'";
$result=mysql_query($sql);
echo "<script> alert('You unfollowed $followed');</script>";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=welcome.php">';    

?>

 
