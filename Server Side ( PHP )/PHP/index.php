<?php
require 'config.php';
  session_start();
  if($_SESSION['login_user']) {
    header('location: home.php');  
    exit();
  }
?>




<?php
    if (isset($_POST['submit']))
        {     
    include("config.php");
    session_start();
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $_SESSION['login_user']=$username; 
    $query = mysql_query("SELECT username FROM login WHERE username='$username' and password='$password'");
     if (mysql_num_rows($query) != 0)
    {
     echo "<script language='javascript' type='text/javascript'> location.href='home.php' </script>";   
      }
      else
      {
    echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
    }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="X-UA-Compatible" content="IE=10">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel - Abc Call Recorder</title>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/main.css"  rel="stylesheet">
<link href="css/bootstrap-lightbox.min.css"  rel="stylesheet">
<link href="css/bootstrap-select.min.css"  rel="stylesheet">



</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div style="height: 5px; background: #f47833;"></div>
			</div>
		</div>
				<!-- Header -->
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="navbar navbar-inverse" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href=""> <img alt=""
							src="images/logo.png" class="img-responsive" >
						</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							
							
							

						</ul>
					</div>
					<!--/.nav-collapse -->
				</div>
			</div>
		</div>
		
		
		<!-- Tab Content -->
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<div class="tabContent" >
					
						<!-- Tab panes -->
					<div class="tab-content">
				 		<div class="tab-pane fade in active" id="deviceInfo">
							<!-- Device Info Content -->
							<div class="row top100">
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 visible-lg visible-md"></div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="center-block bottom10">
									
											<div class="alert alert-info">
											
							<form method="post" name="">
							
Username : 
<input type="text" name="username" 
id="username" placeholder="enter username" 
value="" > <br><br>
Password : <input type="password" name="password" id="password" placeholder="enter password" 
value="" > <br><br>

<input name="submit" type="submit" value=
                            "Login"></div>
</form>	
								

								
								
											</div>
									
									</div>
								</div>
							</div>
						</div>
						</div>
					
					</div>
					<script>
					  $(function () {
					    $('#myTab a:first').tab('show')
					  })
					</script>			
	


		<!-- Footer -->
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="gray-bg">
					<div class="row">
						<div class="col-xs-12 col-md-2 center-block">
							
						</div>
						
						
				</div>
			</div>
			
		</div>
		
		<!-- Copyright -->
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center-block">
				<p class="copyright">&copy; 2018 Abc Call Recorder. All rights reserved.</p>
			</div>
		</div>

	</div>
	

		
		

	</div>
	


</body>
</html>