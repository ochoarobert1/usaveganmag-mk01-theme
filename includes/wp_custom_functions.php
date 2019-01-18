<?php
/* IMAGES RESPONSIVE ON ATTACHMENT IMAGES */
function image_tag_class($class) {
    $class .= ' img-fluid';
    return $class;
}
add_filter('get_image_tag_class', 'image_tag_class' );

/* ADD CONTENT WIDTH FUNCTION */

function usaveganmag_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'usaveganmag_content_width', 1170 );
}
add_action( 'after_setup_theme', 'usaveganmag_content_width', 0 );

/* ADD CONTENT WIDTH FUNCTION */

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
    $classes[] = 'nav-item';
    if( in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

// let's add our custom class to the actual link tag

function atg_menu_classes($classes, $item, $args) {
    if($args->theme_location == 'topnav') {
        $classes[] = 'nav-link';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function usaveganmag_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'usaveganmag_pingback_header' );

function get_category_posts_menu($cat_id) {

    return '<div class="co22l">hola soy una categoria</div>';
}


/* --------------------------------------------------------------
CUSTOM WIDGETS
-------------------------------------------------------------- */

class IBenic_Walker extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $object = $item->object;
        $cat_id = $item->object_id;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;


        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        if ($type == 'taxonomy') {
            if( $permalink && $permalink != '#' ) {
                $output .= '<a href="' . $permalink . '">';
            } else {
                $output .= '<span>';
            }
            $output .= $title;
            if( $permalink && $permalink != '#' ) {
                $output .= '</a>';
            } else {
                $output .= '</span>';
            }

            $output .= get_category_posts_menu($cat_id);


        } else {

            //Add SPAN if no Permalink
            if( $permalink && $permalink != '#' ) {
                $output .= '<a href="' . $permalink . '">';
            } else {
                $output .= '<span>';
            }

            $output .= $title;
            if( $description != '' && $depth == 0 ) {
                $output .= '<small class="description">' . $description . '</small>';
            }
            if( $permalink && $permalink != '#' ) {
                $output .= '</a>';
            } else {
                $output .= '</span>';
            }

        }

    }

}

/* --------------------------------------------------------------
CUSTOM WIDGETS
-------------------------------------------------------------- */

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/* --------------------------------------------------------------
CUSTOM WIDGETS
-------------------------------------------------------------- */
/* RECENT POSTS - UPGRADED */
class recent_posts_widget extends WP_Widget {

    /*** Register widget with WordPress. ***/
    function __construct() {
        parent::__construct(
            'recent_posts_extended',
            esc_html__( 'Recent Posts - Extended', 'usaveganmag' ),
            array( 'description' => esc_html__( 'Widget for Recent Posts - Default for Site', 'usaveganmag' ), )
        );
    }

    /*** Front-end display of widget. ***/
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        $posts_page = 3;

        $array_posts = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'posts_per_page' => $posts_page, 'order' => 'DESC', 'orderby' => 'date' ));
        if ($array_posts->have_posts()) :
        while ($array_posts->have_posts()) : $array_posts->the_post();
?>
<div class="widget-recent-posts-item">
    <div class="row align-items-center">
        <div class="widget-recent-posts-item-image col-3">
            <a href="<?php the_permalink(); ?>" title="<?php _e('View this post', 'usaveganmag'); ?>">
                <?php the_post_thumbnail(array(60, 60), array('class' => 'img-fluid')); ?>
            </a>
        </div>
        <div class="widget-recent-posts-item-content col-9">
            <a href="<?php the_permalink(); ?>" title="<?php _e('View this post', 'usaveganmag'); ?>">
                <h4><?php the_title(); ?></h4>
            </a>
        </div>
    </div>

</div>
<?php
        endwhile;
        endif;
        wp_reset_query();

        echo $args['after_widget'];
    }

    /*** Back-end widget form. ***/
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Recent Posts', 'usaveganmag' );
?>
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
        <?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
</p>
<?php
    }

    /*** WP_Widget::update() ***/
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

        return $instance;
    }

}
