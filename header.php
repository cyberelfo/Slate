<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
<!-- Franklin 24/06/2013 -->
	<title><?php wp_title('|'); ?></title>
<!-- /Franklin 24/06/2013 -->
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />
	
	<!-- Media Queries -->
	<meta name ="viewport" content ="width=device-width, minimum-scale=1.0, initial-scale=1.0">
	
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/includes/ie/ie.css" />
	<![endif]-->

	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!--Main Wrapper -->
	<div class="main-wrapper">
		<div class="header-wrapper">
			<div class="header-hidden-wrap">
				<div class="header-hidden-toggle-wrap">
					<div class="header-hidden clearfix">
						<div class="header-hidden-left">
							<?php if ( get_option('okay_theme_customizer_hidden_text') ) { ?>
								<?php echo get_option('okay_theme_customizer_hidden_text'); ?>
							<?php } ?>
						</div>
						<div class="header-hidden-right">
							<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Header Toggle Icons') ) : else : ?>		
							<?php endif; ?>
						</div>
					</div><!-- header hidden -->
					<a href="#" class="hidden-toggle"><i class="icon-plus"></i></a>
				</div><!-- header hidden toggle wrap -->
			</div><!-- header hidden wrap -->
			
			<div class="header">
				<div class="header-left">
					<!-- grab the logo -->
<!-- Franklin 24/06/2013 -->
					<?php if ( get_option('okay_theme_customizer_logo') && is_single()) { ?>
						<h2 class="logo">
							<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_option('okay_theme_customizer_logo'); ?>" alt="<?php the_title(); ?>" /></a>
						</h2>
					<?php } else if (is_single()) { ?>
					    <h2 class="logo-text">
					    	<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name') ?></a>
					    </h2>
					<?php } else if (get_option('okay_theme_customizer_logo')) { ?>
						<h1 class="logo">
							<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_option('okay_theme_customizer_logo'); ?>" alt="<?php the_title(); ?>" /></a>
						</h1>
					<?php } else { ?>
					    <h1 class="logo-text">
					    	<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name') ?></a>
					    </h1>
					<?php } ?>
<!-- /Franklin 24/06/2013 -->
				</div>
				
				<!-- Menu -->
				<div class="header-right">
					<?php wp_nav_menu( array( 'theme_location' => 'header', 'menu_id' => 'nav', 'menu_class' => 'nav' ) ); ?>
					
					<div class="clear"></div>
				</div>
				
				<div class="clear"></div>
			</div><!-- header -->
		</div><!-- header wrapper -->