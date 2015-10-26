
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
				$sql="SELECT * FROM user WHERE username= '$user1'";
				$result=mysql_query($sql) or die('could not connect');
				$row=mysql_fetch_array($result);
				$sql1="SELECT * FROM blogs WHERE user_id= '$user1'";
				$result1=mysql_query($sql1) or die('could not connect');
				$row1=mysql_fetch_array($result1);
				$no=mysql_num_rows($result1);
				$sql2="SELECT * FROM follow WHERE followed= '$user1'";
				$result2=mysql_query($sql2);
				$row2=mysql_fetch_array($result2);
				$no1=mysql_num_rows($result2);
				
				
				$user_id=$row['user_id'];
			
				?>
				<div class="post">
				<?php $image_name=$row['image'];
						//echo $image_name;?>
						<center><p class="bg-success"><?php echo "<img src='photos/$image_name' alt='Smiley face' class='img-circle'>";?></p></center>
					<h3 class="title">Name:&nbsp;&nbsp;<?php echo $row['name']; ?></h3></br>
					<h3 class="title">Username:&nbsp;&nbsp;<?php echo $row['username']; ?></h3></br>
					<h3 class="title">Total Posts:&nbsp;&nbsp;<?php echo $no; ?></h3></br>
					<h3 class="title">Total Followers:&nbsp;&nbsp;<?php echo $no1; ?></h3></br>
					
				<?php if($user==$user1)
				{?>
					<p class="links"><a href="change.php?no=<?php echo $row['user_id']; ?>" class="more">Edit Profile</a>
				<?php }
				else if($user)
				{
					$followed=$row['username'];
					$sql="SELECT * FROM follow WHERE followed= '$followed' AND follow= '$user'";
						$result=mysql_query($sql);
						if(!mysql_fetch_array($result))
						{?>
						<p class="links"><a href="follow.php?username=<?php echo $row['username']; ?>" class="more">Follow</a>
						<?php } 
						else
						{
						?>
						<p class="links"><a href="unfollow.php?username=<?php echo $row['username']; ?>" class="more">Unfollow</a>
						<?php }
				?>	
					
					
				<?php } ?>
					
				</div>
				
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
