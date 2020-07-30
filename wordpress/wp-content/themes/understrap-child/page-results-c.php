<?php /* Template Name: Global results page - C no match count */ ?>
<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();

$container = get_theme_mod( 'understrap_container_type' );
$max_items_per_screen = 10;
$display_amazon_data = false;
$display_sales = false;
$display_mach_count = false;


if (!empty($_GET['atag'])) {
	$amz_tag = $_GET['atag'];
}
?>

<div class="wrapper" id="results-wrapper">
	

	<div class="questionnaire <?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
            <div id="top-container" class="top-container col-md col-xl">
                <h4> Find the right <?php echo $keywords[0] . " " . $keywords[1]; ?></h4>
                <span> Get detailed research on the best Air Fryers that meet your needs based on hundreds of reviews. </span>
                <div class="tags">
                    <span class="tag-1">COSORI</span>
                    <span class="tag-2">Ninja</span>
                    <span class="tag-3">GoWise</span>
                    <span class="tag-4">BLACK+DECKER </span>
                    <span class="tag-5">+28 more compared</span>
                </div>
            </div>
        </div>


			<!-- Do the left sidebar check -->
			<!-- <?php get_template_part( 'global-templates/left-sidebar-check' ); ?> -->

			<main class="site-main" id="main">


					<!-- Query start -->
					<?php
						//$product_cat = 'bluetooth-headphones';
						require('includes/product-query.inc.php');
					?>
					<?php
						require('includes/product-loop.inc.php');
					?>


			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>


	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer(); ?>
