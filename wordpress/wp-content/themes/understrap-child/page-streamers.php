<?php /* Template Name: Streamers form */ ?>
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
$product_cat = 'streamers';
$atag = $_GET['amz_tag'] ?: $_COOKIE['atag'];
$was_cookie_set = false;
$keywords_library = get_option('url_params_headphones');
$keywords = array();

$keywords[0] = 'Streamers';
$keywords[1] = '';

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

get_header();


$questions = (object)json_decode(file_get_contents(get_stylesheet_directory_uri() . "/includes/questions-streamers.json"), false);

?>


<script src="<?php echo get_stylesheet_directory_uri() . '/js/ParentCheckBox.plugin.js' ?>"></script>
<div class="wrapper" id="page-wrapper">

    <div class="questionnaire <?php echo esc_attr($container); ?>" id="content" tabindex="-1">
        <header>
            <?php while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>
        </header>

        <div class="top-container">
            <h4> Find the right <?php echo $keywords[0] . " " . $keywords[1]; ?></h4>
            <span> Get detailed research on the best Streamer Boxes that meet your needs based on hundreds of reviews. </span>
            <div class="tags">
                <span class="tag-1">Casting</span>
                <span class="tag-2">Streaming</span>
                <span class="tag-3">4K & HDR</span>
                <span class="tag-4">Android TV</span>
            </div>
        </div>
        <div>

            <main class="site-main" id="main">
                <!-- Questionnaire start -->
                <section class="questionnaire">
                    <form method="get" id="advanced-searchform" role="search" action="results/">
                        <input type="hidden" name="product_cat" value="streamers">
                        <input type="hidden" name="atag" value="<?php echo $atag; ?>">

                        <?php
                        foreach ($questions as $question => $object) {
                            $i = 0;
                            ?>
                            <h3><?php echo $object->question; ?></h3>
                                <span class="question-description"><?php echo $object->description; ?></span>
                            <div class="form-group">
                                <?php foreach ($object->answers as $answer => $key) {
                                    $i++;
                                    $id = $question . '-' . $i;
                                    ?>
                                    <div class="custom-control custom-<?php echo $object->type; ?>">
                                        <input type="<?php echo $object->type; ?>" id="<?php echo $id; ?>"
                                               name="<?php echo $key->name; ?>" value="<?php echo $key->value; ?>"
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="<?php echo $id; ?>">
                                           <?php if($key->icon){ ?>
                                                <i class="icon <?php echo $key->icon; ?>"></i>
                                            <?php } ?>
                                            <span class="label-wrap">
                                        <span class="text-head"><?php echo $key->title; ?> </span>
                                        <span class="text-desc"><?php echo $key->description; ?> </span>
                                    </span>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>

                        <?php }

                        ?>

                        <input type="submit" class="btn btn-primary btn-quest" value="Submit">

                    </form>
                </section>
                <!-- Questionnaire start -->


            </main><!-- #main -->


        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
