
<?php
require 'config.php';
  session_start();
  if(!$_SESSION['login_user']) {
    header('location: index.php');  
    exit();
  }
?>
<html>
<body>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="X-UA-Compatible" content="IE=10">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/main.css"  rel="stylesheet">
<link href="css/bootstrap-lightbox.min.css"  rel="stylesheet">
<link href="css/bootstrap-select.min.css"  rel="stylesheet">

<title>Admin Panel - Abc Call Recorder</title>

<style type="text/css">
            body{
            }
            div.container{
                width: 1000px;
                margin: 0 auto;
                position: relative;
            }
            legend{
                font-size: 30px;
                color: #555;
            }
            .btn_send{
                background: #00bcd4;
            }
            label{
                margin:10px 0px !important;
            }
            textarea{
                resize: none !important;
            }
            .fl_window{
                width: 400px;
                position: absolute;
                right: 0;
                top:100px;
            }
            pre, code {
                padding:10px 0px;
                box-sizing:border-box;
                -moz-box-sizing:border-box;
                webkit-box-sizing:border-box;
                display:block; 
                white-space: pre-wrap;  
                white-space: -moz-pre-wrap; 
                white-space: -pre-wrap; 
                white-space: -o-pre-wrap; 
                word-wrap: break-word; 
                width:100%; overflow-x:auto;
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
							
							
								<li  ><a href="account.php">
								<i class="glyphicon glyphicon-user"></i>
							 	My Account
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
												
												
												
		<?php
        // Enabling error reporting
        error_reporting(-1);
        ini_set('display_errors', 'On');
 
        require_once 'firebase.php';
        require_once 'push.php';
 
        $firebase = new Firebase();
        $push = new Push();
 
        // optional payload
        $payload = array();
        $payload['team'] = 'Nepal';
        $payload['score'] = '5.6';
 
        // notification title
        $title = isset($_GET['title']) ? $_GET['title'] : '';
         
        // notification message
        $message = isset($_GET['message']) ? $_GET['message'] : '';
         
        // push type - topic
        $push_type = isset($_GET['push_type']) ? $_GET['push_type'] : '';
         
        // Preview Image Url 
        $include_image = isset($_GET['include_image']) ? $_GET['include_image'] : '';
 
 
        $push->setTitle($title);
        $push->setMessage($message);
        $push->setImage($include_image);
        $push->setIsBackground(FALSE);
        $push->setPayload($payload);
 
 
        $json = '';
        $response = '';
 
        if ($push_type == 'topic') {
            $json = $push->getPush();
            $response = $firebase->sendToTopic('notificationnn', $json);
			
        } else if ($push_type == 'individual') {
            $json = $push->getPush();
            $regId = isset($_GET['regId']) ? $_GET['regId'] : '';
            $response = $firebase->send($regId, $json);
        }
        ?>
												
												
												
												
												
												
												
												
												
												
												
												
												 <form class="pure-form pure-form-stacked" method="get">
                <fieldset>
                    <legend>Send Notification</legend>
 
                  <label for="title1">Title : </label> 
                    <input type="text" id="title1" name="title" class="pure-input-1-2" placeholder="Enter title"><br>
 <br>
                    <label for="message1">Message : </label>
                    <textarea class="pure-input-1-2" name="message" id="message1" rows="3" placeholder="Notification message!"></textarea>
 <br><br>
 <label for="include_image">Image Url : </label>
                    <input type="text" id="include_image" name="include_image" class="pure-input-1-2" placeholder="Enter Image Url"><br>
 
                    <input type="hidden" name="push_type" value="topic"/>
					<br>
                    <button type="submit" class="pure-button pure-button-primary btn_send">Send Now </button>
                </fieldset>
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