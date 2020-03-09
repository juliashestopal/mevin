<?php /* Template Name: Test */ ?>
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
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<form action="">
				<input type="text" name="sound_quality" placeholder="sound_quality">
				<input type="text" name="battery_life" placeholder="battery_life">
				<input type="text" name="rating" placeholder="rating">
				<input type="text" name="price" placeholder="price">
				<input type="submit">
			</form>
		</div>
		<hr>
		<div class="row">





		<!-- Query start -->
		<?php
			$product_cat = 'bluetooth-headphones';
			require('product-query.inc.php');
		?>
		<article>
			<?php
				require('product-loop.inc.php');
			?>

		</article>


				<!-- Query end -->

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
