<?php
	if ( $pageName == 'Dashboard' ) 
	{
		?>
			<script type="text/javascript" src="./controllers/js/jquery-1.8.3.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/ckeditor/ckeditor.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap/js/bootstrap.min.js"></script>
			
			<script type="text/javascript" src="./controllers/assets/bootstrap/js/bootstrap-fileupload.js"></script>
			<script type="text/javascript" src="./controllers/js/jquery.blockui.js"></script>
			
			<!--[if lt IE 9]>
				<script src="./controllers/js/excanvas.js"></script>
				<script src="./controllers/js/respond.js"></script>
			<![endif]-->

			<script type="text/javascript" src="./controllers/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/uniform/jquery.uniform.min.js"></script>
		<?php
	}

	elseif ( $pageName == 'Users' || $pageName == 'Service Providers' || $pageName == 'Provider Details' || $pageName = "Todays Transactions" || $pageName = "Previous Transactions" || $pageName = "Todays Accounts" || $pageName = "Previous Accounts" ) 
	{
		?>
			<script type="text/javascript" src="./controllers/js/jquery-1.8.3.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="./controllers/js/jquery.blockui.js"></script>
			
			<!--[if lt IE 9]>
				<script src="./controllers/js/excanvas.js"></script>
				<script src="./controllers/js/respond.js"></script>
			<![endif]-->

			<script type="text/javascript" src="./controllers/assets/uniform/jquery.uniform.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/data-tables/jquery.dataTables.js"></script>
			<script type="text/javascript" src="./controllers/assets/data-tables/DT_bootstrap.js"></script>
			
			<script type="text/javascript" src="./controllers/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-daterangepicker/date.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<?php
	}

	elseif ( $pageName == 'Add New Service Provider' || $pageName == 'Provider Details' ) 
	{
		?>
			<script type="text/javascript" src="./controllers/js/jquery-1.8.3.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/ckeditor/ckeditor.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap/js/bootstrap-fileupload.js"></script>
			<script type="text/javascript" src="./controllers/js/jquery.blockui.js"></script>

			<!--[if lt IE 9]>
				<script src="./controllers/js/excanvas.js"></script>
				<script src="./controllers/js/respond.js"></script>
			<![endif]-->

			<script type="text/javascript" src="./controllers/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/uniform/jquery.uniform.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
			<script type="text/javascript" src="./controllers/assets/clockface/js/clockface.js"></script>
			<script type="text/javascript" src="./controllers/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-daterangepicker/date.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/fancybox/source/jquery.fancybox.pack.js"></script>
		<?php
	}
	
	else
	{
		?>
			<script type="text/javascript" src="./controllers/js/jquery-1.8.3.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/ckeditor/ckeditor.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap/js/bootstrap-fileupload.js"></script>
			<script type="text/javascript" src="./controllers/js/jquery.blockui.js"></script>
			
			<!--[if lt IE 9]>
				<script src="./controllers/js/excanvas.js"></script>
				<script src="./controllers/js/respond.js"></script>
			<![endif]-->

			<script type="text/javascript" src="./controllers/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/uniform/jquery.uniform.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
			<script type="text/javascript" src="./controllers/assets/clockface/js/clockface.js"></script>
			<script type="text/javascript" src="./controllers/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-daterangepicker/date.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
			<script type="text/javascript" src="./controllers/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
			<script type="text/javascript" src="./controllers/assets/fancybox/source/jquery.fancybox.pack.js"></script>
		<?php
	}
?>
<script src="./controllers/js/scripts.js"></script>
<script src="./controllers/js/barchart.js"></script>


<script>
	jQuery(document).ready(function()
	{
		App.init()
	});
</script>