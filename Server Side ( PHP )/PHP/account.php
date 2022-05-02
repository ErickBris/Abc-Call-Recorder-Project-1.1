<?php
require 'config.php';
  session_start();
  if(!$_SESSION['login_user']) {
    header('location: index.php');  
    exit();
  }
?>
<!DOCTYPE HTML>



<html>
<body>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="X-UA-Compatible" content="IE=10">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="images/favicon.ico">

<title>My Account</title>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/main.css"  rel="stylesheet">
<link href="css/bootstrap-lightbox.min.css"  rel="stylesheet">
<link href="css/bootstrap-select.min.css"  rel="stylesheet">

<style type="text/css">
fieldset {
	width:500px;
	border:5px dashed #CCCCCC;
	margin:0 auto;
	border-radius:5px;
}
 
legend {
	color: blue;
	font-size: 25px;
}
 
dl {
	float: right;
	width: 390px;
}
 
dt {
	width: 180px;
	color: brown;
	font-size: 19px;
}
 
dd {
	width:200px;
	float:left;
}
 
dd input {
	width: 200px;
	border: 2px dashed #DDD;
	font-size: 15px;
	text-indent: 5px;
	height: 28px;
}
 
.btn {
	color: #fff;
	background-color: dimgrey;
	height: 38px;
	border: 2px solid #CCC;
	border-radius: 10px;
	float: right;
}
 
</style>



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
							
							
								<li  ><a href="home.php">
								<i class="glyphicon glyphicon-tasks"></i>
							 	Home
							</a></li>
							
							<li><a href="logout.php"> 
								<i class="glyphicon glyphicon-off"></i>
								Logout
							</a></li>

						</ul>
					</div>
					<!--/.nav-collapse -->
				</div>
			</div>
		</div>
		
		
			
		<!-- Tab Content -->
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<div class="tabContent">
					<div class="tab-content">
						<div class="row">
							
								<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 visible-lg visible-md"></div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 top50">
									
									<h4>Account</h4> 
									<table class="table table-striped thWidth" id="useraccount" >
					
										<tr>
											<th class="tooltips text-muted">Username</th>
											
		<?php
		$username = $_SESSION['login_user'];
		echo "<td>";
		echo $username;
		echo "</td>";
		?>

											
										</tr>
										<tr>
											<th class="tooltips text-muted">Number Of Devices</th>
											<td>1</td>
										</tr>
										
										
										
										
									</table>
									
									
									<div class="alert alert-info">
										<i class="glyphicon glyphicon-info-sign"></i>
										Change Password
									</div>
									
									<table class="table table-striped thWidth" id="usersettings" >
										
										
										
									

 
	<fieldset>
	<?php 
		$username = $_SESSION['login_user'];
		
		if(isset($_POST['re_password']))
		{
		$old_pass= md5($_POST['old_pass']);
		$new_pass= md5($_POST['new_pass']);
		$re_pass= md5($_POST['re_pass']);
		$chg_pwd=mysql_query("select * from login where username='$username'");
		$chg_pwd1=mysql_fetch_array($chg_pwd);
		$data_pwd=$chg_pwd1['password'];
		if($data_pwd==$old_pass){
		if($new_pass==$re_pass){
			$update_pwd=mysql_query("update login set password='$new_pass' where username='$username'");
			echo "<script>alert('Update Sucessfully'); window.location='account.php'</script>";
		}
		else{
			echo "<script>alert('Your new and Retype Password is not match'); window.location='account.php'</script>";
		}
		}
		else
		{
		echo "<script>alert('Your old password is wrong'); window.location='account.php'</script>";
		}}
	?>	
										<form method="post">
										
											<tr>
												<th id="newdevice">
												Old Password
												 </th>
												 
													<td>
														<input type="password" name="old_pass" placeholder="Old Password..." value="" required />
													</td>
													
											</tr>
										
											<tr>
												<th id ="newreport">
												New Password
												</th>
												
													<td>
														<input type="password" name="new_pass" placeholder="New Password..." value=""  required />
													</td>
												
											</tr>
											
											<tr>
												<th id ="newreport">
												Retype New Password
												</th>
												
													<td>
														<input type="password" name="re_pass" placeholder="Retype New Password..." value="" required />
													</td>
												
											</tr>
										<p align="center">
		
		</p>
									
									
									
									</table>
									
									<div class="center-block bottom10">
										
											<input type="submit" class="btn" value="Reset Password" name="re_password" />
									</div>
									
									</form>
									 <div class="alert notifications alert-dismissable" style="display: none;text-align:justify">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                     <i class="glyphicon"></i><b></b>
                                     </div>
									
									
								</div>
								<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 visible-lg visible-md"></div>
								</div>
							</div>
				</div>
				
			</div>
		</div>
		

		
		
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
	

		
		

	
</body>
</html>
