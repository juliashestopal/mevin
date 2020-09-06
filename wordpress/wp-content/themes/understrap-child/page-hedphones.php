<?php /* Template Name: Hedphones form */ ?>
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;


$container = get_theme_mod('understrap_container_type');
$product_cat = 'wireless-headphones';
$atag = $_GET['amz_tag'] ?: $_COOKIE['atag'];
$was_cookie_set = false;
$keywords_library = get_option('url_params_headphones');
$keywords = array();

$keywords[0] = 'Bluetooth';
$keywords[1] = 'Headphones';

foreach ($keywords_library as $keys) {
    if ($keys['amz_tag'] === $atag) {
        $keywords[0] = $keys['keyword1'];
        $keywords[1] = $keys['keyword2'];
        if (!$was_cookie_set) {
            setcookie('atag', $atag, 0, '/');
        }
        $was_cookie_set = true;
    }
}

function thousandsCurrencyFormat($num) {
    $num = (int) $num;
    if($num>1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display;

    }

    return $num;
}

get_header();
?>

<script src="<?php echo get_stylesheet_directory_uri() . '/js/ParentCheckBox.plugin.js' ?>"></script>
<div class="wrapper" id="page-wrapper">

    <div class="questionnaire <?php echo esc_attr($container); ?>" id="content" tabindex="-1">
        <header>
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>
        </header>

        <div class="top-container d-none d-md-block">
            <h4> Find the right <?php echo $keywords[0] . " " . $keywords[1]; ?></h4>
            <span> Get detailed research on the best Wireless Headphones that meet your needs based on hundreds of professional reviews. </span>
            <div class="tags">
                <span class="tag-1">Sound quality</span>
                <span class="tag-2">Noise Cancellation</span>
                <span class="tag-3">Battery life</span>
                <span class="tag-4">Your needs</span>
            </div>
        </div>

        <h4 class="top-promotion-head d-xs-block d-md-none"> The best <?php echo $keywords[0] . " " . $keywords[1]; ?></h4>
        <div class="top-promotions d-xs-block d-md-none">
            <?php

            $args = array(
                'post_type' => 'product',
                'product_cat' => 'bluetooth-headphones-home',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );
            $posts = new WP_Query($args);
            while ($posts->have_posts()) : $posts->the_post();
                $product = wc_get_product( $post->ID );
                $purl    = $product->get_product_url();
                if ( ! empty( $amz_tag ) ) {
                    $link = str_replace( 'askmevin06-20', $amz_tag, $purl );
                } else {
                    $link = $purl;
                }
            if(get_the_post_thumbnail_url( $post->ID )): ?>
                <div class="card home-card">
                    <a class="product-title-link" href="<?php echo $link; ?>">
                        <div class="card-img-placeholder" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID ); ?>')">
                        </div>
                        <span class="brand"><?php echo $product->get_attribute( 'pa_brand' ); ?></span>
                        <h2 class="card-title"><?php echo $post->post_title; ?></h2>
                        <div class="starts-placeholder">
                            <i class="fa rating rating-<?php echo number_format( round( get_post_meta( $post->ID, 'rating', true ) / 5, 1 ) * 5, 1, '-', ',' ); ?>"></i>
                            <span class="rating-number"><?php echo thousandsCurrencyFormat((get_post_meta($post->ID, 'review_count', true))); ?></span>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
            <?php endwhile; ?>
        </div>

        <span class="title-match">Find the perfect match</span>

        <main class="site-main" id="main">
            <!-- Questionnaire start -->
            <section class="questionnaire">
                <form method="get" id="advanced-searchform" role="search" action="results/">
                    <input type="hidden" name="product_cat" value="wireless-headphones">
                    <input type="hidden" name="atag" value="<?php echo $atag; ?>">

                    <h3 id="headphones-head">Do you prefer a specific type of headphones?</h3>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="1-2" name="over_ear" value="1" class="custom-control-input">
                            <label class="custom-control-label" for="1-2">
                                <i class="icon icon-over-ear"></i>
                                <span class="label-wrap">
                                        <span class="text-head">Over-ear</span> 
                                        <span class="text-desc">Excellent comfort.</span>
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="1-1" name="on_ear" value="1" class="custom-control-input">
                            <label class="custom-control-label" for="1-1">
                                <i class="icon icon-on-ear"></i>
                                <span class="label-wrap">
                                        <span class="text-head">On-ear</span> 
                                        <span class="text-desc">Comfortable and portable.</span>
                                    </span>
                            </label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="1-3" name="in_ear" value="1" class="custom-control-input">
                            <label class="custom-control-label" for="1-3">
                                <i class="icon icon-in-ear"></i>
                                <span class="label-wrap">
                                        <span class="text-head">In-ear</span> 
                                        <span class="text-desc">Ultra-portable design.</span>
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="1-4" name="any" value="form" class="custom-control-input">
                            <label class="custom-control-label" for="1-4">
                                    <span class="label-wrap">
                                        <span class="text-head">Don't care</span>    
                                    </span>
                            </label>
                        </div>
                    </div>

                    <h3>What will you use them for?</h3>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="2-1" name="any" value="use" class="custom-control-input">
                            <label class="custom-control-label" for="2-1">
                                    <span class="label-wrap">
                                        <span class="text-head">Music</span>
                                        <span class="text-desc">Most headphones are designed for music.</span>
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="2-2" name="latency" value="1" class="custom-control-input">
                            <label class="custom-control-label" for="2-2">
                                    <span class="label-wrap">
                                        <span class="text-head">Video</span>
                                        <span class="text-desc">Low latency between sound and video is important.</span>
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="2-3" name="latency" value="1" class="custom-control-input">
                            <input type="checkbox" id="2-3-1" name="microphone" value="1" hidden>
                            <script>
                                jQuery("#2-3").parentCheckBox("#2-3-1");
                            </script>
                            <label class="custom-control-label" for="2-3">
                                    <span class="label-wrap">
                                        <span class="text-head">Gaming</span>
                                        <span class="text-desc">Low latency and a microphone are recommended.</span>
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="2-4" name="microphone" value="1"
                                   class="custom-control-input">
                            <label class="custom-control-label" for="2-4">
                                    <span class="label-wrap">
                                        <span class="text-head">Calls</span>
                                        <span class="text-desc">You'll need a microphone for calls.</span>
                                    </span>
                            </label>
                        </div>
                    </div>

                    <h3>Where will you use them?</h3>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="3-1" name="any" value="place" class="custom-control-input">
                            <label class="custom-control-label" for="3-1">
                                   <span class="label-wrap">
                                        <span class="text-head">Home and Office</span>
                                   </span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="3-2" name="one_ear" value="1" class="custom-control-input">
                            <label class="custom-control-label" for="3-2">
                                    <span class="label-wrap">
                                        <span class="text-head">Driving</span>    
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="3-3" name="foldable" value="1" class="custom-control-input">
                            <label class="custom-control-label" for="3-3">
                                    <span class="label-wrap">
                                        <span class="text-head">Travel and Commute</span>    
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="3-4" name="sweat_resistant" value="1"
                                   class="custom-control-input">
                            <label class="custom-control-label" for="3-4">
                                    <span class="label-wrap">
                                        <span class="text-head">Running and Working Out</span>    
                                    </span>
                            </label>
                        </div>
                    </div>


                    <h3>How much will you use them in a day?</h3>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="4-1" name="battery_life" value="1" class="custom-control-input">
                            <label class="custom-control-label" for="4-1">
                                    <span class="label-wrap">
                                        <span class="text-head">1 hour or less</span>    
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="4-2" name="battery_life" value="2" class="custom-control-input">
                            <label class="custom-control-label" for="4-2">
                                    <span class="label-wrap">
                                        <span class="text-head">2 hours</span>    
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="4-3" name="battery_life" value="3" class="custom-control-input">
                            <label class="custom-control-label" for="4-3">
                                    <span class="label-wrap">
                                        <span class="text-head">3 hours</span>    
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="4-4" name="battery_life" value="4" class="custom-control-input">
                            <label class="custom-control-label" for="4-4">
                                    <span class="label-wrap">
                                        <span class="text-head">4 hours</span>    
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="4-5" name="battery_life" value="5" class="custom-control-input">
                            <label class="custom-control-label" for="4-5">
                                    <span class="label-wrap">
                                        <span class="text-head">5 hours</span>    
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="4-6" name="battery_life" value="6" class="custom-control-input">
                            <label class="custom-control-label" for="4-6">
                                    <span class="label-wrap">
                                        <span class="text-head">6 hours</span>    
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="4-7" name="battery_life" value="7" class="custom-control-input">
                            <label class="custom-control-label" for="4-7">
                                    <span class="label-wrap">
                                        <span class="text-head">7 hours or more</span>    
                                    </span>
                            </label>
                        </div>
                    </div>


                    <h3>Is sound quality important to you?</h3>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="5-1" name="sound_quality" value="4.5"
                                   class="custom-control-input">
                            <label class="custom-control-label" for="5-1">
                                    <span class="label-wrap">
                                        <span class="text-head">Important</span>
                                        <span class="text-desc">If you listen to high-res audio files and care about sound quality.</span>
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="5-2" name="sound_quality" value="1"
                                   class="custom-control-input">
                            <label class="custom-control-label" for="5-2">
                                    <span class="label-wrap">
                                        <span class="text-head">Don't care</span>    
                                    </span>
                            </label>
                        </div>
                    </div>


                    <h3>Is noise cancellation important to you?</h3>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="6-1" name="noise_cancellation" value="1"
                                   class="custom-control-input">
                            <label class="custom-control-label" for="6-1">
                                    <span class="label-wrap">
                                        <span class="text-head">Important</span>
                                        <span class="text-desc">Recommended if you're spending a lot of time in noisy environments.</span>
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="6-2" name="noise_cancellation" value="0"
                                   class="custom-control-input">
                            <label class="custom-control-label" for="6-2">
                                    <span class="label-wrap">
                                        <span class="text-head">Don't care</span>    
                                    </span>
                            </label>
                        </div>
                    </div>


                    <h3>Do you have a budget?</h3>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="7-1" name="price" value="50" class="custom-control-input">
                            <label class="custom-control-label" for="7-1">
                                    <span class="label-wrap">
                                        <span class="text-head">Up to $50</span>    
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="7-2" name="price" value="75" class="custom-control-input">
                            <label class="custom-control-label" for="7-2">
                                    <span class="label-wrap">
                                        <span class="text-head">$50 - $100</span>    
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="7-3" name="price" value="125" class="custom-control-input">
                            <label class="custom-control-label" for="7-3">
                                    <span class="label-wrap">
                                        <span class="text-head">$100 - $150</span>    
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="7-4" name="price" value="200" class="custom-control-input">
                            <label class="custom-control-label" for="7-4">
                                    <span class="label-wrap">
                                        <span class="text-head">$150 - $250</span>    
                                    </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="7-5" name="price" value="250" class="custom-control-input">
                            <label class="custom-control-label" for="7-5">
                                    <span class="label-wrap">
                                        <span class="text-head">$250 or more</span>    
                                    </span>
                            </label>
                        </div>

                    </div>


                    <input type="submit" class="btn btn-primary btn-quest" value="Submit">
                </form>
            </section>
            <!-- Questionnaire start -->


        </main><!-- #main -->


    </div><!-- .row -->

</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
