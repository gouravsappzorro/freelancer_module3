		<!--=== CSS ===-->

	<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<link href="<?php echo AdminUrl; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- jQuery UI -->
	<!--<link href="plugins/jquery-ui/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />-->
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/>
	<![endif]-->

	<!-- Theme -->
  <!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	<link href="<?php echo AdminUrl; ?>assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo AdminUrl; ?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo AdminUrl; ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo AdminUrl; ?>assets/css/icons.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?php echo AdminUrl; ?>assets/css/fontawesome/font-awesome.min.css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

	<!--[if IE 8]>
		<link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	<!--=== JavaScript ===-->

	<script type="text/javascript" src="<?php echo AdminUrl; ?>assets/js/libs/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

	<script type="text/javascript" src="<?php echo AdminUrl; ?>bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>assets/js/libs/lodash.compat.min.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="assets/js/libs/html5shiv.js"></script>
	<![endif]-->

	<!-- Smartphone Touch Events -->
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/event.swipe/jquery.event.move.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/event.swipe/jquery.event.swipe.js"></script>

	<!-- General -->
	<script type="text/javascript" src="<?php echo AdminUrl; ?>assets/js/libs/breakpoints.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/cookie/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>

	<!-- Page specific plugins -->
	<!-- Charts -->
	<!--[if lt IE 9]>
		<script type="text/javascript" src="plugins/flot/excanvas.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/flot/jquery.flot.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/flot/jquery.flot.tooltip.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/flot/jquery.flot.resize.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/flot/jquery.flot.time.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/flot/jquery.flot.growraf.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/blockui/jquery.blockUI.min.js"></script>

	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/fullcalendar/fullcalendar.min.js"></script>

	<!-- Noty -->
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/noty/layouts/top.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/noty/themes/default.js"></script>

	<!-- Forms -->
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/select2/select2.min.js"></script>

	<!-- App -->
	<script type="text/javascript" src="<?php echo AdminUrl; ?>assets/js/app.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>assets/js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>assets/js/plugins.form-components.js"></script>

	<script>
	$(document).ready(function(){
		"use strict";

		App.init(); // Init layout and core plugins
		Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins
	});
	</script>

