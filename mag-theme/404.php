<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
	<link rel="shortcut icon" href="<?php bloginfo('template_url')?>/assets/images/favicon.png">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	 <div class='wrap'><header class='error-head'><a href="/" class="top-logo">
	 	 	    <div  class="logo">
	 	 	        64mag
	 	 	    </div>
	 	 	</a>			 
	 	 </header>
	 	 	</div>
	 	<div class="error-body">
	 		<div class="error-logo">404</div>
	 	</div>
	 	<footer class="error-footer">
	 		<a class='back-to-site' href="/">Back to site</a>
	 	</footer>
</body>
</html>