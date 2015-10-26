<?php
	include('connect.php');
	//echo "hello1";
    if(isset($_GET['id'])) {
		$id=$_GET['id'];
        $sql = "SELECT * FROM blogs WHERE blog_id='$id'";
		//echo "hello";
		//echo "<script> alert('Welcome $username'); </script>";
		
		$result = mysql_query($sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());
		$row = mysql_fetch_array($result);
		//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=welcome.php">'; 
		header("Content-type:image/jpeg");
        echo $row['image'];
	}
	
?>