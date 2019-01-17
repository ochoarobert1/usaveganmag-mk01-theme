<?php
/* --------------------------------------------------------------
CUSTOM AREA FOR OPTIONS DATA - usaveganmag
-------------------------------------------------------------- */

/* CUSTOM MENU PAGE AND FUNCTIONS IN ADMIN */
function register_usaveganmag_settings() {
    //register our settings
    register_setting( 'usaveganmag-settings-group', 'usaveganmag_dir' );
    register_setting( 'usaveganmag-settings-group', 'usaveganmag_email' );
    register_setting( 'usaveganmag-settings-group', 'usaveganmag_telf' );
    register_setting( 'usaveganmag-settings-group', 'usaveganmag_mob' );
    register_setting( 'usaveganmag-settings-group', 'usaveganmag_fb' );
    register_setting( 'usaveganmag-settings-group', 'usaveganmag_tw' );
    register_setting( 'usaveganmag-settings-group', 'usaveganmag_ig' );
    register_setting( 'usaveganmag-settings-group', 'usaveganmag_yt' );
}

function my_admin_menu() {
    add_menu_page( 'Opciones del Sitio', 'Opciones del Sitio', 'manage_options', 'usaveganmag_custom_options', 'my_custom_menu_page', get_template_directory_uri() . '/images/plugin-icon.png', 120  );
    /* call register settings function */
    add_action( 'admin_init', 'register_usaveganmag_settings' );
}

add_action( 'admin_menu', 'my_admin_menu' );



/* CUSTOM CSS FOR THIS SECTION */
function load_custom_wp_admin_style($hook) {
    if( $hook != 'toplevel_page_usaveganmag_custom_options' ) {
        return;
    }
    /* ENQUEUE THE CSS */
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i' );
    wp_enqueue_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/custom-wordpress-admin-style.css' );
}

add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/* SEPARATOR FOR STYLING THE CUSTOM PAGE */
function add_admin_menu_separator( $position ) {

    global $menu;

    $menu[ $position ] = array(
        0    =>    '',
        1    =>    'read',
        2    =>    'separator' . $position,
        3    =>    '',
        4    =>    'wp-menu-separator'
    );

}

function set_admin_menu_separator() {  do_action( 'admin_init', 119 );  }

add_action( 'admin_init', 'add_admin_menu_separator' );
add_action( 'admin_menu', 'set_admin_menu_separator' );

/* CUSTOM MENU PAGE CONTENT */
function my_custom_menu_page() { ?>

<div class="usaveganmag_custom_options-header">
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/logo.png" alt="<?php echo get_bloginfo('name'); ?>" class="logo-header" />
    <h1><?php echo get_admin_page_title(); ?></h1>
    <div class="custom-clearfix"></div>
</div>
<div class="usaveganmag_custom_options-content">
    <form method="post" action="options.php">
        <?php settings_fields( 'usaveganmag-settings-group' ); ?>
        <?php do_settings_sections( 'usaveganmag-settings-group' ); ?>
        <table class="form-table">

            <tr valign="top">
                <th scope="row"><?php _e('Dirección', 'usaveganmag'); ?></th>
                <td><textarea name="usaveganmag_dir" cols="95" rows="5"><?php echo esc_attr( get_option('usaveganmag_dir') ); ?></textarea></td>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e('Correo Electrónico', 'usaveganmag'); ?></th>
                <td><input type="text" size="90" name="usaveganmag_email" value="<?php echo esc_attr( get_option('usaveganmag_email') ); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e('Teléfono', 'usaveganmag'); ?></th>
                <td><input type="text" size="90" name="usaveganmag_telf" value="<?php echo esc_attr( get_option('usaveganmag_telf') ); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e('Móvil', 'usaveganmag'); ?></th>
                <td><input type="text" size="90" name="usaveganmag_mob" value="<?php echo esc_attr( get_option('usaveganmag_mob') ); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row" colspan="2"><h3><?php _e('Redes Sociales', 'usaveganmag'); ?></h3></th>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e('Perfil de Facebook', 'usaveganmag'); ?></th>
                <td><input type="text" size="90" name="usaveganmag_fb" value="<?php echo esc_attr( get_option('usaveganmag_fb') ); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e('Perfil de Twitter', 'usaveganmag'); ?></th>
                <td><input type="text" size="90" name="usaveganmag_tw" value="<?php echo esc_attr( get_option('usaveganmag_tw') ); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e('Perfil de Instagram', 'usaveganmag'); ?></th>
                <td><input type="text" size="90" name="usaveganmag_ig" value="<?php echo esc_attr( get_option('usaveganmag_ig') ); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e('Canal de Youtube', 'usaveganmag'); ?></th>
                <td><input type="text" size="90" name="usaveganmag_yt" value="<?php echo esc_attr( get_option('usaveganmag_yt') ); ?>" /></td>
            </tr>

        </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php }
