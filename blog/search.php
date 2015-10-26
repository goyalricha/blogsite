
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
<title>blogmythought</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

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
				<?php
					session_start();
					if(!$_SESSION["user"])
					{
				?>
				<form action="log.php" method="post">
					<li><input type="text" name="username" id="search-text" class="current_page_item"></li>
					<li><input type="password" name="password" id="search-text"></li>
					<li><input type="submit" id="search-submit" value="Login" /></li>
					<li><a href="register1.php">Register</a></li>
					
					</form>
					</ul>
					<?php }
						else
						{
					?>
					<li class="current_page_item"><a href="welcome.php">Homepage</a></li>
					<li><a href="create.php">Create</a></li>
					<li><a href="#">Photos</a></li>
					<li><a href="#">About</a></li>
					<li><a href="register1.php">HI!<?php session_start(); echo $_SESSION["user"];?></a></li>
					
					
				</ul>
						<?php } ?>
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
				$search=$_GET['search'];
				//echo $search;
				$sql="SELECT * FROM blogs WHERE user_id LIKE '%$search%' OR content LIKE '%$search%' OR title LIKE '%$search%' OR related LIKE '%$search'";
				$result=mysql_query($sql) or die('could not connect');
				while($row=mysql_fetch_array($result))
				{
				//$user_id=$row['user_id'];
				?>
				<div class="post">
					<h2 class="title"><a href="#"><?php echo $row['title']; ?></a></h2>
					<p class="meta"><span class="date"><?php echo $row['last_date']; ?></span><span class="posted">Posted by <a href="profile.php?userid=<?php echo $row['user_id']; ?>"><?php echo $row['user_id']; ?></a></span></p>
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
						<div id="search">
						<form method="get" action="search.php" class="form-inline">
								
						<!--		<center><input type="text" name="s" class="form-control" placeholder="Search Here" /></center>
									 <center>  <button type="submit" class="btn btn-success" name="sumbit" >Submit</button></center>-->
									 <div>
									 <input type="text" name="search" id="search-text">
									 
					<button type="button" class="btn btn-primary btn-xs">Search</button>
							</div>
							</form>
							</div>
						<div style="clear: both;">&nbsp;</div>
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
