
<!DOCTYPE html>
<html lang="en">
  <head>
  <script language="javascript">
  function check()
{
if(document.form1.fullname.value=="")
  {
    alert("Plese Enter Your Name");
	document.form1.fullname.focus();
	return false;
  }

 if(document.form1.username.value=="")
  {
    alert("Plese Enter Username");
	document.form1.username.focus();
	return false;
  }
 
 if(document.form1.password.value=="")
  {
    alert("Plese Enter Your Password");
	document.form1.password.focus();
	return false;
  } 
  if(document.form1.repeatpassword.value=="")
  {
    alert("Plese Enter Confirm Password");
	document.form1.repeatpassword.focus();
	return false;
  }
  if(document.form1.password.value!=document.form1.repeatpassword.value)
  {
    alert("Confirm Password does not matched");
	document.form1.cpass.focus();
	return false;
  }
  }
  </script>
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

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">blogmythought</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		
          <div class="navbar-form navbar-right">
		 
            <a class="navbar-brand" href="home.php">HOME</a><!--/.navbar-collapse -->
      </div>
	  </div>
	  </div>
    </nav>
	
 <div class="jumbotron">
      <div class="container">
	  <br>
	  <br>
   <form name="form1" method="post" action="check.php" onSubmit="return check();">
				  <div class="row">
				    <div class="large-12 columns" >
				      <center><label>FullName*</label>
				      <input type="text" name="name"  placeholder="Name" class="form-control" />
				    </center>
					</div>
				  </div>
				  <br>
				  <div class="row">
				    <div class="large-4 medium-4 columns">
				      <center><label>Username*</label>
				      <input type="text" placeholder="Username" name="username" class="form-control" />
				    </center>
					</div>
					<br>
				    <div class="large-4 medium-4 columns">
				      <center>
					  <label>Password*</label>
				      <input type="password" placeholder="Password" name="password" class="form-control" />
				    </center>
					</div><br>
					<div class="large-4 medium-4 columns">
				     <center> <label>Confirm Password*</label>
				      <input type="password" placeholder="Confirm Password" name="repeatpassword" class="form-control" />
				    </center>
					</div>

				  </div>
				 <br>
				  <center>  <button type="submit" class="btn btn-success" name="sumbit" >Sign in</button></center>
				</form>   
	   
      	</div>
      </div>
    
	</center>
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
