<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
		wp_localize_script('child-understrap-scripts', 'WPURLS', array( 'cssurl' => get_stylesheet_directory_uri() ));
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

function gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
		echo $count;
    $count++;
    update_post_meta( $post_id, $key, $count );
}

add_action( 'woocommerce_product_options_general_product_data', 'change_default_product_type' );
function change_default_product_type(){
    global $post, $product_object; ?>
    <script>
			jQuery(function() {

				if ( document.location.href.indexOf( 'post-new.php?post_type=product' ) !== -1 ) {

					// If we have a page of an initially created product(an auto draft)

					// Force the default product type to 'variable'
					jQuery( '#product-type' )
							.val( 'external' )
							.trigger( 'change' );

				}
			});
    </script>

    <?php }
