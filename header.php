<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title('|'); ?></title>
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-36486343-10"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-36486343-10');
        </script>


		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
		<meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		
		<?php
		wp_head();
		$options = get_option('rh_settings');
		?>

	</head>

	<body <?php body_class('body'); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">
            
            <?php
            if( $options['telephone'] || $options['email_url'] || $options['twitter_url'] || $options['facebook_url'] || $options['instagram_url'] || $options['youtube_url'] || $options['linkedin_url'] || $options['pinterest_url']) {
                echo '<div class="social-fixed">';

                if( $options['telephone'] ) {
                    echo '<a class="tel">'.$options['telephone'].'</a>';
                }

                if( $options['email_url'] ) {
                    echo '<a href="mailto:'.$options['email_url'].'" target="_blank"><i class="fas fa-envelope"></i></a>';
                }

                if( $options['linkedin_url'] ) {
                    echo '<a href="'.$options['linkedin_url'].'" target="_blank"><i class="fab fa-linkedin"></i></a>';
                }

                if( $options['twitter_url'] ) {
                    echo '<a href="'.$options['twitter_url'].'" target="_blank"><i class="fab fa-twitter"></i></a>';
                }

                if( $options['facebook_url'] ) {
                    echo '<a href="'.$options['facebook_url'].'" target="_blank"><i class="fab fa-facebook"></i></a>';
                }

                if( $options['instagram_url'] ) {
                    echo '<a href="'.$options['instagram_url'].'" target="_blank"><i class="fab fa-instagram"></i></a>';
                }

                if( $options['youtube_url'] ) {
                    echo '<a href="'.$options['youtube_url'].'" target="_blank"><i class="fab fa-youtube"></i></a>';
                }

                if( $options['pinterest_url'] ) {
                    echo '<a href="'.$options['pinterest_url'].'" target="_blank"><i class="fab fa-pinterest"></i></a>';
                }

                echo '</div>';
            }
            ?>

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div id="inner-header" class="cf">
					<div class="cf">
                        <?php  echo '<a class="logo" href="'. home_url() .'"></a>'; ?>

                        <a class="menu-button" title="Main Menu">Menu</a>
                        <nav class="main-nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                        <?php
                        wp_nav_menu(array(
                            'container' => false,
                            'container_class' => 'menu cf',
                            'menu' => __( 'The Main Menu', 'bonestheme' ),
                            'menu_class' => 'nav primary-nav cf',
                            'theme_location' => 'main-nav'
                        ));
                        ?>
                        </nav>
                    </div>
				</div>

			</header>
