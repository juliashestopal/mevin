<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function understrap_remove_scripts()
{
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');

    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}

add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{

    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get('Version'));
    wp_enqueue_script('jquery');
    wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get('Version'), true);
    wp_localize_script('child-understrap-scripts', 'WPURLS', array('cssurl' => get_stylesheet_directory_uri()));
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

function add_child_theme_textdomain()
{
    load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}

add_action('after_setup_theme', 'add_child_theme_textdomain');

function gt_set_post_view()
{
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int)get_post_meta($post_id, $key, true);
    echo $count;
    $count++;
    update_post_meta($post_id, $key, $count);
}

add_action('woocommerce_product_options_general_product_data', 'change_default_product_type');
function change_default_product_type()
{
    global $post, $product_object; ?>
    <script>
        jQuery(function () {

            if (document.location.href.indexOf('post-new.php?post_type=product') !== -1) {

                // If we have a page of an initially created product(an auto draft)

                // Force the default product type to 'variable'
                jQuery('#product-type')
                    .val('external')
                    .trigger('change');

            }
        });
    </script>

<?php }

function url_register_options_page() {
    add_options_page('URL Settings', 'URL Settings', 'manage_options', 'url', 'url_options_page');
}
add_action('admin_menu', 'url_register_options_page');

function url_options_page(){
    if ( isset( $_POST['submit'] ) ) {
        require_once('includes/url_param_pages/url-param-save-settings.php');
    }
    require_once('includes/url_param_pages/url-param-output-settings.php');
}


function get_category_meta_values($category, $meta)
{
    global $wpdb;
    $sql = "SELECT post_id, (cast(meta_value as UNSIGNED)) as 'value'
                FROM $wpdb->postmeta
                LEFT JOIN $wpdb->posts on post_id = ID
                LEFT JOIN $wpdb->term_relationships as t ON post_id = t.object_id
                WHERE meta_key = '{$meta}'
                AND t.term_taxonomy_id = {$category}
                AND post_status = 'publish'";
    $query = $wpdb->prepare($sql);
    $query_results = $wpdb->get_results($query);
    $final_result = array();

    foreach ($query_results as $result) {
        $final_result[$result->post_id] = (int)$result->value;
    }
    return $final_result;
}

function update_product_percentage_values($post_ID, $post, $update)
{
    global $post;
    if ($post->post_type !== 'product') return;

    $product_category_id = get_the_terms($post->ID, 'product_cat')[0]->term_id;
    $keys_to_change = array();

    foreach (get_fields() as $field => $value) {
        if (strpos($field, '_percentage') !== false) {
            array_push($keys_to_change, explode("_", $field, 2)[0]);
        }
    }

    foreach ($keys_to_change as $key) {
        $category_key_values = get_category_meta_values($product_category_id, $key);
        $category_key_values[$post->ID] = (int)get_post_meta($post->ID, $key, true) ?: 0;
        $highest_value = max($category_key_values);

        foreach ($category_key_values as $product_Id => $value) {
            $category_key_values[$product_Id] = array();
            $category_key_values[$product_Id]['value'] = $value;
            if ($highest_value != 0) {
                if ($value === $highest_value) {
                    $category_key_values[$product_Id]['percentage'] = 100;
                } else {
                    $category_key_values[$product_Id]['percentage'] = round(($value * 100) / $highest_value);
                }
            }
            update_field($key . '_percentage', $category_key_values[$product_Id]['percentage'], $product_Id);
        }
    }
}

add_action('save_post', 'update_product_percentage_values', 10, 3);


function compare_by_operator($a, $operator, $b)
{
    if(strpos($b, '~') !== false){
        $arr = explode("~", $b);
        return $a >= $arr[0] && $a<= $arr[1];
    }

    switch ($operator) {
        case '<':
            return $a < $b;
            break;
        case '<=':
            return $a <= $b;
            break;
        case '>':
            return $a > $b;
            break;
        case '>=':
            return $a >= $b;
            break;
        case '===':
            return $a === $b;
            break;
        default :
            null;
    }
}

//Adding operator metadata to every ACF field
add_action('acf/render_field_settings', 'my_admin_only_render_field_settings');

function my_admin_only_render_field_settings( $field ) {
	
	acf_render_field_setting( $field, array(
		'label'			=> __('Compare by'),
		'instructions'	=> '',
		'name'			=> 'compare',
		'type'			=> 'select',
      		'choices' => array(
			'>=',
			'<=',
			'=='
		),
		'ui'			=> 1,
	), true);
	
}
