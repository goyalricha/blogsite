<?php
include('connect.php');
session_start();
if(!$_SESSION["user"])
{
echo "please login" ;
}
$userid=$_SESSION["user"];
$title=$_POST['title'];
$related=$_POST['related'];
$content=$_POST['content'];
$content = stripslashes(nl2br($content));
echo $content;
$image_name = $_FILES['image']['name'];
$image_type = $_FILES['image']['type'];
$image_size = $_FILES['image']['size'];
$image_tmp_name= $_FILES['image']['tmp_name'];
move_uploaded_file($image_tmp_name,"photos/$image_name");
//echo "Image Uploaded Successfully Here is the image";
//echo "<img src='photos/$image_name'>";

$sql = "INSERT INTO blogs VALUES('', '$userid', '$title' , '$related' , '$content', '$image_name', now(), '')";
$result= mysql_query($sql);
//echo "your post has recorded successfully";
//echo "<script>alert('Your Post has recorded successfully');</script>";
//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=welcome.php">'; 
?>