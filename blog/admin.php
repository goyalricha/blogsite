
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Marvel' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Marvel|Delius+Unicase' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css' />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" >
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>blogmythought </title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap-3.3.4-dist/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
	<div id="wrapper2">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="#">Captive <span>Green</span></a></h1>
			</div>
			<div id="menu">
				<ul>
				<li><a href="profile.php?userid=<?php session_start(); echo $_SESSION["user"];?>">HI!<?php session_start(); echo $_SESSION["user"];?></a></li>
					<li class="current_page_item"><a href="admin.php">Homepage</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Photos</a></li>
					<li><a href="logout.php">Logout</a></li>
					
					
					
				</ul>
			</div>
			
		</div>
		<div id="banner"></div>
		<!-- end #header -->
		<div id="page">
			<div id="content">
				<div class="post">
					<h2 class="title"><center><a href="#">Users Onboard </a></center></h2>
				
					<div style="clear: both;">&nbsp;</div>
					<div class="entry">
						<!--<p>This is <strong>Captive Green </strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photo used in this template is form <a href="http://pdphoto.org/">pdphoto.org</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you’re pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :)</p>
						<p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem.</p>
						<p class="links"><a href="#" class="more">Read More</a><a href="#" title="b0x" class="comments">Comments</a></p-->
						




<table align="center" class="table table-hover">
	
    <tr>
    	<!--<th width="73" height="50" class="fill"><center>No.</center></th>
        <th width="73" class="fill"><center>Book</center></th>
		<th width="73" class="fill"><center>Author</center></th>-->
        
		 <th><center>No.</center></th>
		 <th><center>Name</center></th>
		 <th><center>Username</center></th>
		  <th><center>Blogs</center></th>
		  <th><center>Followers</center></th>
		 
       
        
  </tr>
        <?php
		
			include('connect.php');
			$sql="SELECT * FROM user WHERE username <> 'admin'";
			$result=mysql_query($sql)or die('could not connect');
			while($row=mysql_fetch_array($result))
			{
				$user=$row['username'];
				$sql1="SELECT * FROM blogs WHERE user_id= '$user'";
				$result1=mysql_query($sql1);
				$no=mysql_num_rows($result1);
				$sql2="SELECT * FROM follow WHERE followed= '$user'";
				$result2=mysql_query($sql2);
				$no1=mysql_num_rows($result2);
			
		?>
<tr>
	<td height="30" align="center"><?php $rr++; echo $rr; ?></td>
    <td align="center"><a href="profile.php?userid=<?php echo $row['username'];?>"><?php echo $row['name'];?></a></td>
	<td align="center"><?php echo $row['username'];?></td>
	<td align="center"><a href="adminblog.php?userid=<?php echo $row['username']; ?>"><?php echo $no;?></a></td>
	<td align="center"><a href="adminfollow.php?userid=<?php echo $row['username']; ?>"><?php echo $no1;?></a></td>
 
</tr>
    
    <?php } ?>
</table>  
			
<?php
if(isset($_POST["save"]))
{
	$title=$_POST['title'];
	$related=$_POST['related'];
	$content=$_POST['content'];
	$sql="UPDATE blogs SET title= '$title' , related= '$related' , content= '$content' WHERE blog_id= '$blog_no'";
	$result=mysql_query($sql) or die('could not connect');
	echo "<script> alert('Your blog is updated');</script>";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=create.php">'; 
	//echo "blog is edited";
	//header("location:create.php");
}
?>



					</div>
				</div>
				
				<div style="clear: both;">&nbsp;</div>
			</div>
			<!-- end #content -->
			<div id="sidebar">
				<ul>
					<li>
						<div id="search" >
							<form method="get" action="#">
								<div>
									
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
						<h2>Categories</h2>
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
