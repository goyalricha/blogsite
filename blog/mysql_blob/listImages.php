<?php
    include('connect.php');
    $sql = "SELECT * FROM blogs"; 
    $result = mysql_query($sql) or die('could not connect');
?>
<HTML>
<HEAD>
<TITLE>List BLOB Images</TITLE>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<?php
	while($row = mysql_fetch_array($result)) {
		//echo "hello";
		//echo $row['blog_id'];
	?>
		<img src="imageView.php?id=<?php echo $row['blog_id']; ?>" /><br/>
		
	
	<?php echo "hello";} ?>
</BODY>
</HTML>