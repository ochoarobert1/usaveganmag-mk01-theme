<!DOCTYPE html>
<html <?php language_attributes() ?>>

    <head>
        <?php /* MAIN STUFF */ ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset') ?>" />
        <meta name="robots" content="NOODP, INDEX, FOLLOW" />
        <meta name="HandheldFriendly" content="True" />
        <meta name="MobileOptimized" content="320" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="dns-prefetch" href="//connect.facebook.net" />
        <link rel="dns-prefetch" href="//facebook.com" />
        <link rel="dns-prefetch" href="//googleads.g.doubleclick.net" />
        <link rel="dns-prefetch" href="//pagead2.googlesyndication.com" />
        <link rel="dns-prefetch" href="//google-analytics.com" />
        <?php /* FAVICONS */ ?>
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" />
        <?php /* THEME NAVBAR COLOR */ ?>
        <meta name="msapplication-TileColor" content="#454545" />
        <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/win8-tile-icon.png" />
        <meta name="theme-color" content="#454545" />
        <?php /* AUTHOR INFORMATION */ ?>
        <meta name="language" content="<?php echo get_bloginfo('language'); ?>" />
        <meta name="author" content="ADMIN_SITIO" />
        <meta name="copyright" content="DIRECCION_URL" />
        <meta name="geo.position" content="10.333333;-67.033333" />
        <meta name="ICBM" content="10.333333, -67.033333" />
        <meta name="geo.region" content="VE" />
        <meta name="geo.placename" content="DIRECCION_AUTOR" />
        <meta name="DC.title" content="<?php if (is_home()) { echo get_bloginfo('name') . ' | ' . get_bloginfo('description'); } else { echo get_the_title() . ' | ' . get_bloginfo('name'); } ?>" />
        <?php /* MAIN TITLE - CALL HEADER MAIN FUNCTIONS */ ?>
        <?php wp_title('|', false, 'right'); ?>
        <?php wp_head() ?>
        <?php /* OPEN GRAPHS INFO - COMMENTS SCRIPTS */ ?>
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php /* IE COMPATIBILITIES */ ?>
        <!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7" /><![endif]-->
        <!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8" /><![endif]-->
        <!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9" /><![endif]-->
        <!--[if gt IE 8]><!-->
        <html <?php language_attributes(); ?> class="no-js" />
        <!--<![endif]-->
        <!--[if IE]> <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script> <![endif]-->
        <!--[if IE]> <script type="text/javascript" src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script> <![endif]-->
        <!--[if IE]> <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" /> <![endif]-->
        <?php get_template_part('includes/fb-script'); ?>
        <?php get_template_part('includes/ga-script'); ?>
    </head>

    <body class="the-main-body <?php echo join(' ', get_body_class()); ?>" itemscope itemtype="http://schema.org/WebPage">
        <div id="fb-root"></div>
        <header class="container-fluid p-0" role="banner" itemscope itemtype="http://schema.org/WPHeader">
            <div class="row no-gutters">
                <div class="top-bar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="container p-0">
                        <div class="row no-gutters align-items-center">
                            <div class="top-bar-left col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <?php wp_nav_menu(array('theme_location' => 'top_menu')); ?>
                            </div>
                            <div class="top-bar-right col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-instagram"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="the-logo col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="container p-0">
                        <div class="row align-items-center">
                            <div class="logo-container col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <?php $custom_logo_id = get_theme_mod( 'custom_logo' ); ?>
                                <?php $logo = wp_get_attachment_image_src( $custom_logo_id, array('290', '60')); ?>
                                <a href="<?php echo home_url('/'); ?>" title="<?php _e('Back to Home', 'usaveganmag'); ?>">
                                    <?php if ( has_custom_logo() ) { ?>
                                    <?php echo '<img src="'. esc_url( $logo[0] ) .'" width="'. esc_attr($logo[1]) .'" height="'. esc_attr($logo[2]) .'" class="img-fluid img-logo" alt="'. get_bloginfo( 'name' ) .'" />'; ?>

                                    <?php } else { ?>
                                    <?php echo '<h1>'. get_bloginfo( 'name' ) .'</h1>'; ?>
                                    <?php }?>
                                </a>
                            </div>
                            <div class="logo-widget col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <?php if ( is_active_sidebar( 'top_header' ) ) : ?>
                                <ul id="sidebar-header">
                                    <?php dynamic_sidebar( 'top_header' ); ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="the-navbar col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="container">
                        <div class="row">
                            <div class="navbar-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <?php wp_nav_menu(array('theme_location' => 'header_menu', 'walker' => new IBenic_Walker())); ?>
                                <ul>
                                    <li>
                                        <a href=""><i class="fa fa-search"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
