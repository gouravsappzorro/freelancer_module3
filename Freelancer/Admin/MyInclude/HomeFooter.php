<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="<?php echo AdminUrl; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Theme -->
	<link href="<?php echo AdminUrl; ?>assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo AdminUrl; ?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo AdminUrl; ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo AdminUrl; ?>assets/css/icons.css" rel="stylesheet" type="text/css" />

	<!-- Login -->
	<link href="<?php echo AdminUrl; ?>assets/css/login.css" rel="stylesheet" type="text/css" />

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

	<script type="text/javascript" src="<?php echo AdminUrl; ?>bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo AdminUrl; ?>assets/js/libs/lodash.compat.min.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="assets/js/libs/html5shiv.js"></script>
	<![endif]-->

	<!-- Beautiful Checkboxes -->
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/uniform/jquery.uniform.min.js"></script>

	<!-- Form Validation -->
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/validation/jquery.validate.min.js"></script>

	<!-- Slim Progress Bars -->
	<script type="text/javascript" src="<?php echo AdminUrl; ?>plugins/nprogress/nprogress.js"></script>

	<!-- App -->
	<script type="text/javascript" src="<?php echo AdminUrl; ?>assets/js/login.js"></script>
	<script>
	$(document).ready(function(){
		"use strict";

		Login.init(); // Init login JavaScript
	});
	</script>