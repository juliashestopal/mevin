<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
global $product_cat;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133578929-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-133578929-2');
    </script>

    <?php wp_head(); ?>
    <script src="https://www.googleoptimize.com/optimize.js?id=GTM-NL2SNP2"></script>
</head>

<body <?php body_class(); ?>>
<?php do_action('wp_body_open'); ?>
<div class="site" id="page">

    <!-- ******************* The Navbar Area ******************* -->
    <div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

        <a class="skip-link sr-only sr-only-focusable"
           href="#content"><?php esc_html_e('Skip to content', 'understrap'); ?></a>


        <?php if (!in_array($product_cat, array('impact-drivers','smart-tvs'))  || $post->post_title === 'Results' ||  $post->post_title === 'Results - b') { ?>
            <?php if ('container' == $container) : ?>
                <nav class="navbar navbar-expand-md navbar-dark">
                <div class="container">
            <?php endif; ?>
            <a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url($product_cat . '/')); ?>"
               title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url">
                <img class="logo" src="<?php echo esc_url(home_url('/')); ?>wp-content/uploads/askmevin.png"
                     alt="<?php bloginfo('name') . '-' . bloginfo('description'); ?>"><br/>
                <?php if ($post->post_title != 'Results' && $post->post_title != 'Results - b'): ?>
                    <span class="description"><?php bloginfo('description'); ?></span>
                <?php endif; ?>
            </a>
            <?php if ('container' == $container){ ?>
            </div><!-- .container -->
        <?php } ?>
            </nav><!-- .site-navigation -->
        <?php } else { ?>
            <!--HERE-->
            <div class="container-fluid top-background">
                <div class="row">
                    <div class="col-md col-xl top-background_img" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/images/' . $product_cat . '-cover.jpg'; ?>');">
                        <a  id="navbar-brand" class="navbar-brand" rel="home" href="<?php echo esc_url(home_url($product_cat . '/')); ?>"
                           title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url">
                            <img id="logo" class="logo" src="<?php echo get_stylesheet_directory_uri() . '/images/askmevin-logo.svg'; ?>"
                                 alt="<?php bloginfo('name') . '-' . bloginfo('description'); ?>"><br/>
                        </a>
                    </div>
                </div>
            </div>

        <?php }?>


    </div><!-- #wrapper-navbar end -->
