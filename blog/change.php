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

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
					<li class="current_page_item"><a href="welcome.php">Homepage</a></li>
					<li><a href="create.php">Create</a></li>
					<li><a href="#">Photos</a></li>
					<li><a href="#">About</a></li>
					<li><a href="register1.php">HI!<?php session_start(); echo $_SESSION["user"];?></a></li>
					
					
				</ul>
			</div>
			
		</div>
		<div id="banner"></div>
		<!-- end #header -->
		<div id="page">
			<div id="content">
			<?php
				include('connect.php');
				session_start();
				$user=$_SESSION["user"];
				$user1=$_GET["userid"];
				$blogno=$_GET["blogno"];
				$sql="SELECT * FROM user WHERE username= '$user' OR username= '$user1'";
				$result=mysql_query($sql) or die('could not connect');
				$row=mysql_fetch_array($result);
				$user_id=$row['user_id'];
			
				?>
				<div class="post">
				
						<form  method="post">
				<?php $image_name=$row['image'];
						//echo $image_name;?>
						<center><input type="file" value="<?php echo "<img src='photos/$image_name' alt='Smiley face' class='img-circle'>";?>"></center>
						<label>Name:</label>
&nbsp;
&nbsp;
&nbsp;
<input type="text" name="name" value ="<?php echo $row['name'];?>" class="form-control">
<br>
<b>Username:</b>
&nbsp;
<input type="text" name="username" value="<?php echo $row['username'];?>" class="form-control" >
<br>

<input type="submit" value="save" name="save" class="btn btn-success">
</form>
						
					
				</div>
				<?php
if(isset($_POST["save"]))
{
	$name=$_POST['name'];
	$username=$_POST['username'];
	$sql="SELECT * FROM user WHERE username = '$username'";
$result=mysql_query($sql);
if(!mysql_fetch_array($result))
{
$sql="UPDATE user SET name= '$name' , username= '$username'";
	$result=mysql_query($sql) or die('could not connect');
	echo "<script> alert('Your profile is updated');</script>";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=profile.php">';
}
else
{
//echo "username already taken";
echo "<script> alert('Username already taken');</script>";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=register1.php">';    
    
//header('location:form.php');
}
	 
	//echo "blog is edited";
	//header("location:create.php");
}
?>
				
				<?php
				include('connect.php');
				//echo $blogno;
				$sql="SELECT * FROM blogs WHERE user_id= '$user_id' AND blog_id != '$blogno' ORDER BY blog_id";
				$result=mysql_query($sql)or die('could not connect');
				$flag=0;
				while($row=mysql_fetch_array($result))
				{
					
				?>
				<div class="post">
				<h2 class="title"><?php if($flag==0){?>Related Posts:<?php  $flag=1;} ?> 
					<h2 class="title"><a href="#"><?php echo $row['title']; ?></a></h2>
					<p class="meta"><span class="date"><?php echo $row['last_date']; ?></span><span class="posted">Posted by <a href="#"><?php echo $row['user_id']; ?></a></span></p>
					<div style="clear: both;">&nbsp;</div>
					<div class="entry">
					<span class="posted">Related To: <?php echo $row['related']; ?></span></p>
						<p> <?php echo $row['content']; ?></p>
						<?php $image_name=$row['image'];
						//echo $image_name;?>
						<center><p><?php echo "<img src='photos/$image_name'>";?></p></center>
						
					</div>
				</div>
				<?php } ?>
				
				
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
