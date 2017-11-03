<?php
$pageName = "Reset Password"; // Set the page name

require_once './models/classes/Configurations.php'; // Include the project configuration file
require_once './models/classes/Database.php'; // Include the database class

require_once './controllers/formProcess.php'; // Include the form processing file
if( $AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'dashboard' ); }
?>

<!-- Begin page body -->
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

            <!-- Begin form contents -->


    <form id="loginform" class="form-vertical no-padding no-margin" method="post" action="">
                <?php if(isset($_GET['userEmail'])){ $userEmail = $_GET['userEmail']; ?>

                        <div class="block-hint pull-right">
                            <a href="sign-in" class="" id="return-in">Sign In</a>
                        </div>
                        <p class="center">Reset your Password.</p>

                        <div class="control-wrap">
<!--                            <h4>Password Reset</h4>-->
                            <div class="control-group">

                                <div class="controls">
                                    <div class="input-prepend">
                                        <label>New Password</label>
                                        <span class="add-on"><i class="icon-key"></i></span>
                                        <input id="input-password" type="password" name="newPassword" placeholder="Choose a new password" required="" autocomplete="off" />
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">

                                    <div class="input-prepend">
                                        <label>Confirm Password</label>
                                        <span class="add-on"><i class="icon-key"></i></span>
                                        <input id="input-password" type="password" name="confirmNewPassword" placeholder="Confirm the new password" required="" autocomplete="off" />
                                    </div>

                                    <div class="clearfix space5"></div>

                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="adminEmail" value="<?php echo $userEmail; ?>" />

                        <button type="submit" name="resetPassword" class="btn btn-block login-btn">CHANGE PASSWORD</button>
<!--                    </form>-->
                <?php } else { ?>
<!--    <form id="forgotform" class="form-vertical no-padding no-margin hide" action="" >-->
                        <div class="block-hint pull-right">
                            <a href="sign-in" class="" id="return-in">Sign In</a>
                        </div>
                            <p class="center">Enter your e-mail address below to reset your password.</p>

        					<div class="control-group">
        						<div class="controls">
        							<div class="input-prepend">
        								<span class="add-on"><i class="icon-envelope"></i></span>
        								<input type="email" name="adminEmailReset" placeholder="Email" required />
        							</div>
        						</div>
        						<div class="space20"></div>
        					</div>

        					<button type="submit" name="requestPasswordReset" class="btn btn-block login-btn" value="Submit" >RESET PASSWORD</button>

                <?php } ?>
                    </form>
            <!-- End form contents -->



</div>

<div id="login-copyright"> <?php // echo date('Y'); ?> &copy; <?php echo COMPANYNAME; ?> Admin Lab. </div>

<script src="./controllers/js/jquery-1.8.3.min.js"></script>
<script src="./controllers/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="./controllers/js/jquery.blockui.js"></script>
<script src="./controllers/js/scripts.js"></script>

<!--<script>-->
<!--    jQuery(document).ready(function()-->
<!--    {-->
<!--        App.initLogin()-->
<!--    });-->
<!--</script>-->

</body>
</html>