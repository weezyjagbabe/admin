<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8"></html><![endif]--><!--[if IE 9]><html lang="en" class="ie9"></html><![endif]--><!--[if !IE]><!-->

<html lang="en">
	<!--<![endif]-->
	
	<head>
		<meta charset="utf-8" />
		
		<title> <?php echo $pageName . " - " . COMPANYNAME; ?></title>
		
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />

		<link href="./controllers/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="./controllers/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="./controllers/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		
		<link rel="icon" type="image/png" href="models/img/favicon1.png">

		<?php
			if ( $pageName == 'Add New Service Provider' || $pageName == 'Provider Details' || $pageName == 'Sliders and AD Banners' ) 
			{
				?>
					<link href="./controllers/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet">
				<?php
			}
			
		?>

		<link href="./controllers/css/style.min.css" rel="stylesheet" />
		<link href="./controllers/css/style_responsive.css" rel="stylesheet" />
		<link href="./controllers/css/style_default.css" rel="stylesheet" id="style_color" />
		
		<link rel="stylesheet" type="text/css" href="./controllers/assets/bootstrap-datepicker/css/datepicker.css" />
		<link rel="stylesheet" type="text/css" href="./controllers/assets/bootstrap-timepicker/compiled/timepicker.css" />
		<link rel="stylesheet" type="text/css" href="./controllers/assets/data-tables/DT_bootstrap.css" />
		
		<link href="./controllers/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
		<link href="./controllers/assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
		<link href="./controllers/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
		<link href="./controllers/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>