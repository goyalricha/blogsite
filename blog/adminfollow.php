<?php
include('connect.php');
session_start();
if(!$_SESSION["user"])
{
	echo "<script> alert('Please Login First'); </script>";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.php">';
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Captive Green 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20111225

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Captivegreen by TEMPLATED</title>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Marvel' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Marvel|Delius+Unicase' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css' />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="wrapper2">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="#">blogmy <span>thought</span></a></h1>
			</div>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="admin.php">Homepage</a></li>
					<li><a href="create.php">Create</a></li>
					<li><a href="#">Photos</a></li>
					<li><a href="#">About</a></li>
					<li><a href="logout.php">HI!<?php session_start(); echo $_SESSION["user"];?></a></li>
					
					
				</ul>
			</div>
			
		</div>
		<div id="banner"></div>
		<!-- end #header -->
		<div id="page">
			<div id="content">
			<center><h3 class="title">Followers</h3></center>
			<table align="center" class="table table-hover">
	
    <tr>
    	<!--<th width="73" height="50" class="fill"><center>No.</center></th>
        <th width="73" class="fill"><center>Book</center></th>
		<th width="73" class="fill"><center>Author</center></th>-->
        
		 <th width="100"><center>No.</center></th>
		
		  <th width="200"><center>Followers</center></th>
		 
       
        
  </tr>
        <?php
		
			include('connect.php');
			$followed=$_GET["userid"];
			$sql="SELECT * FROM follow WHERE followed= '$followed'";
			$result=mysql_query($sql)or die('could not connect');
			while($row=mysql_fetch_array($result))
			{
				
			
		?>
<tr>
	<td height="30" align="center"><?php $rr++; echo $rr; ?></td>
    <td align="center"><?php echo $row['follow'];?></td>
	
 
</tr>
    
    <?php } ?>
</table>  
				
				
				
				
				<div style="clear: both;">&nbsp;</div>
			</div>
			<!-- end #content -->
			<div id="sidebar">
				<ul>
					<li>
						<div id="search" >
							<form method="get" action="#">
								<div>
									<input type="text" name="s" id="search-text" value="" />
									<input type="submit" id="search-submit" value="GO" />
								</div>
							</form>
						</div>
						<div style="clear: both;">&nbsp;</div>
					</li>
					<li>
						<h2>Aliquam tempus</h2>
						<p>Mauris vitae nisl nec metus placerat perdiet est. Phasellus dapibus semper consectetuer hendrerit.</p>
					</li>
					
					<li>
						<h2>Recent Posts</h2>
						<ul>
						<?php
							include('connect.php');
							$sql="SELECT * FROM blogs ORDER BY blog_id DESC";
							$result=mysql_query($sql);
							while($row=mysql_fetch_array($result))
							{
							?>
							<li><a href="onlysee.php?blogno=<?php echo $row['blog_id'];?>"><?php echo $row['title'];?></a></li>
							<?php  } ?>
							
						</ul>
					</li>
					<li>
						<h2>Blogroll</h2>
						<ul>
							<li><a href="#">Aliquam libero</a></li>
							<li><a href="#">Consectetuer adipiscing elit</a></li>
							<li><a href="#">Metus aliquam pellentesque</a></li>
							<li><a href="#">Suspendisse iaculis mauris</a></li>
							<li><a href="#">Metus aliquam pellentesque</a></li>
							<li><a href="#">Suspendisse iaculis mauris</a></li>
							<li><a href="#">Urnanet non molestie semper</a></li>
							<li><a href="#">Proin gravida orci porttitor</a></li>
						</ul>
					</li>
					<li>
						<h2>Archives</h2>
						<ul>
							<li><a href="#">Aliquam libero</a></li>
							<li><a href="#">Consectetuer adipiscing elit</a></li>
							<li><a href="#">Metus aliquam pellentesque</a></li>
							<li><a href="#">Suspendisse iaculis mauris</a></li>
							<li><a href="#">Urnanet non molestie semper</a></li>
							<li><a href="#">Proin gravida orci porttitor</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- end #sidebar -->
			<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #page -->
		<div id="footer">
			<p>&copy; Untitled. All rights reserved. Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
		</div>
	</div>
</div>
<!-- end #footer -->
</body>
</html>
