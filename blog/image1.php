<html>
<head>
<title>Uploading images</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
Select Image:<input type="file" name="image">
<input type="submit" name="upload" value="Upload Now">
</form>
<?php
if(isset($_POST['upload'])){
$image_name = $_FILES['image']['name'];
$image_type = $_FILES['image']['type'];
$image_size = $_FILES['image']['size'];
$image_tmp_name= $_FILES['image']['tmp_name'];
if($image_name==''){
echo "<script>alert('Please Select an Image')</script>";
exit();
}
else
move_uploaded_file($image_tmp_name,"photos/$image_name");
echo "Image Uploaded Successfully Here is the image";
echo "<img src='photos/$image_name'>";
}
?>
</body>
</html>