<?php
	$pageName = "Log In"; // Set the page name
	
	require_once './models/classes/Configurations.php'; // Include the project configuration file
	require_once './models/classes/Database.php'; // Include the database class
	
	require_once './controllers/formProcess.php'; // Include the form processing file
	if( $AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'dashboard' ); }
?>

<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8"></html><![endif]--><!--[if IE 9]><html lang="en" class="ie9"></html><![endif]--><!--[if !IE]><!-->
	<html lang="en">
		<!--<![endif]-->
		
		<head>
			<meta charset="utf-8" />
			<title><?php echo $pageName . " - " . COMPANYNAME; ?></title>
			<meta content="width=device-width, initial-scale=1.0" name="viewport" />
			<meta content="" name="description" />
			<meta content="" name="author" />
			
			<link href="./controllers/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
			<link href="./controllers/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
			<link href="./controllers/css/style.min.css" rel="stylesheet" />
			<link href="./controllers/css/style_responsive.css" rel="stylesheet" />
			<link href="./controllers/css/style_default.css" rel="stylesheet" id="style_color" />
			
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		</head>
		
		<body id="login-body">
<!--			<div class="login-header">-->
				

			
<!--			</div>-->
<!--            <div id="logo" class="center">-->


<!--            </div>-->
<div id="logo" class="center">
    <img src="./models/img/logoAdmin1.png" alt="logo" class="center" /></div>

			<div id="login">
				
				<?php if( isset( $message ) ) { echo $message; } ?>
				
				<form id="loginform" class="form-vertical no-padding no-margin" method="post" action="">
					
					<div class="lock">
						<i class="icon-lock"></i>
					</div>
					
					<div class="control-wrap">
						<h4>User Login</h4>
						<div class="control-group">

							<div class="controls">
								<div class="input-prepend">
									<span class="add-on"><i class="icon-envelope"></i></span>
									<input id="input-email" type="email" name="adminEmail" placeholder="Email" />
								</div>
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls">

								<div class="input-prepend">
									<span class="add-on"><i class="icon-key"></i></span>
									<input id="input-password" type="password" name="adminPassword" placeholder="Password" />
								</div>

								<div class="mtop10">
									<div class="block-hint pull-left small">
										<input type="checkbox" id="" /> Remember Me 
									</div>
									<div class="block-hint pull-right">
										<a href="reset-password" class="" id="forget-password">Forgot Password?</a>
									</div>
								</div>
								
								<div class="clearfix space5"></div>
								
							</div>
						</div>
					</div>
					
					<input type="submit" id="login-btn" name="signIn" class="btn btn-block login-btn" value="Login" />
				</form>
				
<!--				<form id="forgotform" class="form-vertical no-padding no-margin hide" action="" >-->
<!--                <div class="block-hint pull-right">-->
<!--                    <a href="javascript:" class="" id="return-in">Sign In</a>-->
<!--                </div>-->
<!--                    <p class="center">Enter your e-mail address below to reset your password.</p>-->
<!---->
<!--					<div class="control-group">-->
<!--						<div class="controls">-->
<!--							<div class="input-prepend">-->
<!--								<span class="add-on"><i class="icon-envelope"></i></span>-->
<!--								<input id="forgot-email" type="email" name="adminEmailReset" placeholder="Email" />-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="space20"></div>-->
<!--					</div>-->
<!--					-->
<!--					<input type="submit" id="forgot-btn" name="requestPasswordReset" class="btn btn-block login-btn" value="Submit" />-->
<!--				</form>-->
				
			</div>
			
			<div id="login-copyright"> <?php // echo date('Y'); ?> &copy; <?php echo COMPANYNAME; ?> Admin Lab. </div>

			<script src="./controllers/js/jquery-1.8.3.min.js"></script>
			<script src="./controllers/assets/bootstrap/js/bootstrap.min.js"></script>
			<script src="./controllers/js/jquery.blockui.js"></script>
			<script src="./controllers/js/scripts.js"></script>
			
			<script>
				jQuery(document).ready(function()
				{
					App.initLogin()
				});
			</script>

		</body>
</html>