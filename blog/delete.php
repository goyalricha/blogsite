<?php 
include('connect.php');
session_start();
$blog_no=$_GET["no"];
echo $blog_no;
$sql="DELETE FROM blogs WHERE blog_id= '$blog_no'";
$result=mysql_query($sql);
echo "<script> alert('Your Post has deleted!!'); </script>";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=create.php">'; 
?>