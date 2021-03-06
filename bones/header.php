<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
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

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

        <header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

            <div class="wrap cf header-inner">

                <?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
                <a class="logo" href="<?php echo home_url(); ?>" rel="nofollow">
                    <img src="<?php echo get_template_directory_uri(); ?>/logo.png">
                </a>

                <?php // if you'd like to use the site description you can un-comment it below ?>
                <?php // bloginfo('description'); ?>


                <nav class="flex-full" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <?php wp_nav_menu(array(
                             'container' => false,                           // remove nav container
                             'container_class' => 'menu cf',                 // class of container (should you choose to use it)
                             'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
                             'menu_class' => 'nav top-nav cf',               // adding custom nav class
                             'theme_location' => 'main-nav',                 // where it's located in the theme
                             'before' => '',                                 // before the menu
                               'after' => '',                                  // after the menu
                               'link_before' => '',                            // before each link
                               'link_after' => '',                             // after each link
                               'depth' => 0,                                   // limit the depth of the nav
                             'fallback_cb' => ''                             // fallback function (if there is one)
                    ));
                    ?>

                </nav>
                <div class="header-mainBtn">
                    <button id="formModalBtn" class="btn green-btn">
                        Получить прайс лист
                    </button>
                </div>
                <button id="mobMenuBtn" class="mob-menu-btn" >
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                    </svg>
                </button>


            </div>

            <div class="mob-menu">
                <?php  wp_nav_menu(array(
                           'container' => false,                           // remove nav container
                           'container_class' => 'menu cf',                 // class of container (should you choose to use it)
                           'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
                           'menu_class' => 'nav top-nav cf',               // adding custom nav class
                           'theme_location' => 'main-nav',                 // where it's located in the theme
                           'before' => '',                                 // before the menu
                             'after' => '',                                  // after the menu
                             'link_before' => '',                            // before each link
                             'link_after' => '',                             // after each link
                             'depth' => 0,                                   // limit the depth of the nav
                           'fallback_cb' => ''                             // fallback function (if there is one)
                  ));
                  ?>
            </div>

        </header>

    <main class="mainPageContainer" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

    <div id="formModal" class="form-modal">
        <div class="form-modal-inner">
            <div class="close-btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                    <path d="M0 0h24v24H0z" fill="none"/>
                </svg>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="161" title="Callback"]'); ?>
        </div>
    </div>
