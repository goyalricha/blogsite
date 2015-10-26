<?php
include('connect.php');
$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];
$repeatpassword=$_POST['repeatpassword'];
$image_name = $_FILES['image']['name'];
$image_type = $_FILES['image']['type'];
$image_size = $_FILES['image']['size'];
$image_tmp_name= $_FILES['image']['tmp_name'];
move_uploaded_file($image_tmp_name,"photos/$image_name");
//echo $username;
$sql="SELECT * FROM user WHERE username = '$username'";
$result=mysql_query($sql);
if(!mysql_fetch_array($result))
{
$sql = "INSERT INTO user VALUES('', '$name' , '$username' , '$password', '$image_name')";
$result= mysql_query($sql);
//echo "your record has created successfully";
echo "<script> alert('Your record has created successfully');</script>";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.php">';    
//header('location:register.php?rc=1');
}
else
{
//echo "username already taken";
echo "<script> alert('Username already taken');</script>";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=register1.php">';    
    
//header('location:form.php');
}
?>