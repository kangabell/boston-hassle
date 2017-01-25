<!doctype html>  

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> ><!--<![endif]-->

<head>
	
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<title>
		<?php wp_title('//', true, 'right'); ?>
	</title>
	
	<!-- mobile meta -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">	

	<!-- wordpress head functions -->
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php get_template_part('partials/nav'); ?>