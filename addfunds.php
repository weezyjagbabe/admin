<?php
session_start();
require_once './models/classes/Configurations.php'; 														// Include the project configuration file
require_once './controllers/processing.php'; 																// Include the form processing file

require_once './controllers/formProcess.php'; 																// Include the form processing file
if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }
if( !$AdminClass -> isSupperAdmin() ) { $AdminClass -> redirect( '404' ); }

require_once './models/classes/Service.php'; 																// Include the service class
//if( isset( $_GET['t'] ) ) { $t = $_GET['t']; }

//	if( isset( $_GET['action'] ) ) { $action = $_GET['action']; $Service -> updateServiceStatus( $action ); } 	// Get the status Value

$pageName = 'Add Funds'; 																			// Set the page name
require_once './controllers/documentHeader.php'; 															// Include the document header
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
                <div class="widget">

                    <!-- Begin content title -->
                    <div class="widget-title">
                        <h4><i class="icon-columns"></i><?php //echo $companyName; ?> Payment Source</h4>
                        <span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
								</span>
                    </div>
                    <!-- Begin content title -->

                    <!-- Begin content body -->
                    <div class="widget-body">
                        <!-- Begin right side contents -->
                        <div class="span9">
                            <div style="margin-bottom: 25px">
                                <h4>Update Source of Fund</h4>

                                <?php if( isset( $message ) ) { echo $message; } ?>

                                    <form action="" method="post" enctype="multipart/form-data">
                                    <!-- Begin serviceName field -->
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="input-icon left">
                                                <i class="icon-home"></i>
                                                <input type="text" class="span12" name="sourceName" placeholder="Payment Source Name" required />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End serviceName field -->

                                    <!-- Begin companyLogo field -->
                                    <div class="control-group">
                                        <label class="control-label">Attach Payment Logo (If Any)</label>
                                        <div class="controls">
                                            <div class="fileupload fileupload-new span12" data-provides="fileupload">
                                                <input type="hidden" name="sourceLogo" />
                                                <div class="input-append">
                                                    <div class="uneditable-input" style="width: 625px;">
                                                        <!--																<i class="icon-file fileupload-exists"></i>-->

                                                        <!--                                                                <span class="fileupload-preview"></span>-->
                                                    </div>
                                                    <span class="btn btn-file">
<!--																<span class="fileupload-new">Select Logo</span>-->
                                                        <!--																<span class="fileupload-exists">Change Logo-->
																<input class="default" type="file" name="sourceLogo" required/>
															</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End companyLogo field -->

                                    <!-- Begin categoryID field -->
                                    <div class="control-group">
                                        <div class="controls">
                                            <select class="span12" name="categoryID" data-placeholder="Choose a Category" tabindex="1" required>
                                                <option value="">Select Payment Source Category</option>
                                                <?php
                                                $columns		= Array( "paymentSourceCatID, categoryName, paymentSourceCatKey" );
                                                $categories 	= $Database -> get( "tlr_payment_source_category", null, $columns );
                                                if( $Database -> count > 0 )
                                                    foreach( $categories as $category )
                                                    {
                                                        ?>
                                                        <option value="<?php echo $category['paymentSourceCatID'].$category['paymentSourceCatKey']; ?>">
                                                            <?php echo $category['categoryName']; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End categoryID field -->

                                    <!-- Begin service charge field -->

                                    <!-- End service charge field -->

                                    <!-- Begin categoryID field -->
                                    <div class="control-group">
                                        <div class="controls">
                                            <textarea class="span12" name="sourceDesc" rows="4" required></textarea>
                                        </div>
                                    </div>

<!--                                    <input type="hidden" name="sourceKey" />-->

                                    <!-- Begin submit button -->
                                    <button type="submit" name="AddSource" class="btn btn-success" style="width: 230px;">Add Fund Source</button>
                                        <input type="button" name="cancel" class="btn" value="Cancel" onclick="sample()"/>
                                    <!-- End submit button -->

                                    </form>
                            </div>
                            <!-- End add service form -->

                        </div>
                        <!-- End right side contents -->

                        <div class="space5"></div>
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
<script>
    function sample(){
        window.location.href = 'source-of-fund';
    }
</script>
</body>
<!-- End page body -->

</html>