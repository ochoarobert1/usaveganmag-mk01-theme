<footer class="container-fluid p-0" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
    <div class="row no-gutters">
        <div class="the-footer col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background: <?php echo get_theme_mod( 'footer_color' ); ?> url(<?php echo get_theme_mod( 'footer_background' ); ?>);">
            <div class="footer-wrapper col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="container">
                    <div class="row">
                        <?php if ( is_active_sidebar( 'footer_section' ) ) : ?>
                        <div class="footer-item col">
                            <ul class="footer-section">
                                <?php dynamic_sidebar( 'footer_section' ); ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <?php if ( is_active_sidebar( 'footer_section-2' ) ) : ?>
                        <div class="footer-item col">
                            <ul class="footer-section">
                                <?php dynamic_sidebar( 'footer_section-2' ); ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <?php if ( is_active_sidebar( 'footer_section-3' ) ) : ?>
                        <div class="footer-item col">
                            <ul class="footer-section">
                                <?php dynamic_sidebar( 'footer_section-3' ); ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                    </div>
                    <div class="row align-items-center justify-content-center">
                        <div class="footer-line col-10">
                            <hr>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="footer-subfooter col-4">
                            <?php $footer_logo = get_theme_mod('footer_logo'); ?>
                            <?php if ($footer_logo != '') { ?>
                            <img src="<?php echo $footer_logo; ?>" alt="<?php echo get_bloginfo('name'); ?>" class="img-fluid img-footer-logo">
                            <?php } ?>
                        </div>
                        <div class="footer-subfooter col-4">
                            <h3><?php _e('About Us', 'usaveganmag'); ?></h3>
                            <p>712 H Street NE Suite 1091 Washington, DC 20002</p>
                            <p>PHONE: 202.656.8101</p>
                            <br />
                            <p>Contact us: info@usaveganmag.com</p>
                        </div>
                        <div class="footer-subfooter col-4">
                            <h3><?php _e('Follow Us', 'usaveganmag'); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copy col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="container p-0">
                <div class="row no-gutters align-items-center">
                    <div class="footer-copy-left col-6">
                        <h6>&copy; 2019 - USA Vegan Magazine - <?php _e('All Rights Reserved')?></h6>
                    </div>
                    <div class="footer-copy-right col-6">
                        <?php wp_nav_menu(array('theme_location' => 'footer_menu')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>

</html>
