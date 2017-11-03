<?php
require_once './models/classes/Configurations.php'; 									// Include the project configuration file
require_once './controllers/formProcess.php'; 											// Include the form processing file
$t = NULL;
//$userType = "";
if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }		// Check if the admi is logged in
if(isset($_GET['user-details'])) { $t = $_GET['user-details'];} else{ $AdminClass ->redirect( 'users');}
//if(isset($_GET['userType'])) { $userType = $_GET['userType']; } else { $userType = "";}
$pageName = "Site Details"; 																// Set the page name
require_once './controllers/documentHeader.php'; 										// Include the document header
?>
<!-- Begin page body -->
<body class="fixed-top">

<!-- Begin page header -->
<?php
require_once './views/pageHeader.php'; // Include the page header
?>
<!-- End page header -->

<!-- Begin contents wrapper -->
<div id="container" class="row-fluid sidebar-closed">

    <!-- Begin page left navigation -->
    <?php
    require_once './views/pageLeftNav.php'; // Include the page left navigation
    ?>
    <!-- End page left navigation -->

    <!-- Begin page main contents -->
    <div id="main-content">
        <div class="container-fluid">
            <div style="margin-bottom: 50px;"></div>

            <!-- Begin inner contents -->
            <div id="page" class="dashboard">

                <!-- Begin welcome message -->
<!--                <div class="alert alert-info">-->
<!--                    <button data-dismiss="alert" class="close">×</button>-->
<!--                    Welcome to <strong>theteller Admin Lab</strong>. Please don't forget to log out when you are done!-->
<!--                </div>-->
                <!-- End welcome message -->

                <div class="widget">

                    <!-- Begin content title -->
                    <div class="widget-title">
                        <h4><i class="icon-user"></i>Profile</h4>
                        <span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
								</span>
                    </div>
                    <!-- End content title -->

                    <!-- Begin content body -->

                            <div class="widget-body">
                                <?php
                                $Database = new Database();
                                $Database -> where ( "userID", $t );
                                $admin = $Database -> getOne( "tlr_users" );
//                                print_r($admin);
                                ?>
                                <div class="span3">
                                    <div class="text-center profile-pic">
                                        <img src="./models/img/profile-pic.jpg" alt="">
                                    </div>

                                    <ul class="nav nav-tabs nav-stacked">
                                        <li><a href="javascript:void(0)"><i class="icon-coffee"></i> Portfolio</a></li>
                                        <li><a href="javascript:void(0)"><i class="icon-paper-clip"></i> Projects</a></li>
                                        <li><a href="javascript:void(0)"><i class="icon-picture"></i> Gallery</a></li>
                                    </ul>

                                    <ul class="nav nav-tabs nav-stacked">
                                        <li><a href="javascript:void(0)"><i class="icon-facebook"></i> Facebook</a></li>
                                        <li><a href="javascript:void(0)"><i class="icon-twitter"></i> Twitter</a></li>
                                        <li><a href="javascript:void(0)"><i class="icon-linkedin"></i> LinkedIn</a></li>
                                        <li><a href="history?userKey=<?php echo $admin['userKey']?>"><i class="icon-money"></i> Transaction History</a></li>
                                    </ul>
                                </div>

                                <div class="span9">
                                    <h4>
                                    <table class="table table-borderless">
                                        <tbody>
                                        <tr><td class="span2">First Name :</td><td> <?php echo $admin['userFirstName']; ?> </td></tr>
                                        <tr><td class="span2">Last Name :</td><td> <?php echo $admin['userLastName']; ?> </td></tr>
                                        <tr><td class="span2">Region :</td><td> <?php echo $admin['userRegion']; ?> </td></tr>
                                        <tr><td class="span2">Birthday :</td><td> <?php echo $admin['userDOB']; ?> </td></tr>
<!--                                        <tr><td class="span2">Position :</td><td> --><?php //echo $admin['adminPosition']; ?><!-- </td></tr>-->
                                        <tr><td class="span2">Email :</td><td> <?php echo $admin['userEmail']; ?> </td></tr>
                                        <tr><td class="span2">Mobile :</td><td> <?php echo $admin['userPhone']; ?> </td></tr>
                                        </tbody>
                                    </table></h4><br/>

<!--                                    <h4>Carreer Objectves</h4>-->
<!--                                    <p class="push">--><?php //echo $admin['adminObjectives']; ?><!--</p>-->

                                    <h4>&nbsp;&nbsp;Address</h4>
                                    <div class="well">
                                        <address>
                                            <strong><?php echo $admin['userResAddress']; ?></strong><br>
                                            <abbr title="Phone">P:</abbr> <?php echo $admin['userPhone']; ?>
                                        </address>

                                        <address>
                                            <strong>Email</strong><br>
                                            <a href="mailto:#"><?php echo $admin['userEmail']; ?></a>
                                        </address>
                                    </div><br/>
                                    <h4>&nbsp;&nbsp;User Activities
                                        <table class="table table-borderless">
                                            <tbody>
                                            <tr><td class="span2">Last Login :</td><td> <?php echo $admin['userLastLogin']; ?> </td></tr>
                                            <tr><td class="span2">Login Count :</td><td> <?php echo $admin['userLoginCount']; ?> </td></tr>
                                            </tbody>
                                        </table></h4>
                                </div>

                                <div class="space5"></div>
                                <?php
                                ?>
                            </div>

                    <!-- End content body -->

                </div>
            </div>
            <!-- End inner contents -->

        </div>
    </div>
    <!-- Begin page main contents -->

</div>
<!-- End contents wrapper -->

<!-- Begin page footer -->
<?php
require_once './views/pageFooter.php'; // Include the page footer
?>
<!-- End page footer -->

<!-- Begin page scripts -->
<?php
require_once './controllers/pageScripts.php'; // Include the page scripts
?>
<!-- End page scripts -->

</body>
<!-- End page body -->

</html>