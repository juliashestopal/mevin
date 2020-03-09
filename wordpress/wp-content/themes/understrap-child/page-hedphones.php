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
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
$product_cat = 'bluetooth-headphones';
$atag = $_GET['amz_tag'];

?>
<script src="<?php echo get_stylesheet_directory_uri() . '/js/ParentCheckBox.plugin.js' ?>"></script>
<div class="wrapper" id="page-wrapper">

	<div class="questionnaire <?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<header>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_title( '<h1>', '</h1>' ); ?>
				<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
		</header>

		<div>

			<main class="site-main" id="main">
				<!-- Questionnaire start -->
        <section class="questionnaire">
          <form method="get" id="advanced-searchform" role="search" action="results/">
            <input type="hidden" name="product_cat" value="bluetooth-headphones">
            <input type="hidden" name="atag" value="<?php echo $atag;?>">

	  			    <h3>Do you prefer a specific type of headphones?</h3>
	  			    <div class="form-group">
		            <div class="custom-control custom-checkbox">
		                <input type="checkbox" id="1-1" name="on_ear" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="1-1">
											<i class="icon icon-on-ear"></i>On-ear
											<span class="text-muted">Comfortable and portable.</span>
										</label>
		            </div>
		            <div class="custom-control custom-checkbox">
		                <input type="checkbox" id="1-2" name="over_ear" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="1-2">
											<i class="icon icon-over-ear"></i>Over-ear
											<span class="text-muted">Excellent comfort.</span>
										</label>
		            </div>
		            <div class="custom-control custom-checkbox">
		                <input type="checkbox" id="1-3" name="in_ear" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="1-3">
											<i class="icon icon-in-ear"></i>In-ear
											<span class="text-muted">Ultra-portable design.</span>
										</label>
		            </div>
		            <div class="custom-control custom-checkbox">
		                <input type="checkbox" id="1-4" name="any" value="form" class="custom-control-input">
                    <label class="custom-control-label" for="1-4">Don't care</label>
		            </div>
      				</div>

	  			    <h3>What will you use them for?</h3>
	  			    <div class="form-group">
		            <div class="custom-control custom-checkbox">
		                <input type="checkbox" id="2-1" name="any" value="use" class="custom-control-input">
                    <label class="custom-control-label" for="2-1">Music</label>
		            </div>
		            <div class="custom-control custom-checkbox">
		                <input type="checkbox" id="2-2" name="latency" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="2-2">Video</label>
		            </div>
		            <div class="custom-control custom-checkbox">
		                <input type="checkbox" id="2-3" name="latency" value="1" class="custom-control-input">
										<input type="checkbox" id="2-3-1" name="microphone" value="1" hidden>
										<script>
											jQuery("#2-3").parentCheckBox("#2-3-1");
										</script>
                    <label class="custom-control-label" for="2-3">Gaming</label>
		            </div>
		            <div class="custom-control custom-checkbox">
		                <input type="checkbox" id="2-4" name="microphone" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="2-4">Calls</label>
		            </div>
      				</div>

							<h3>Where will you use them?</h3>
	  			    <div class="form-group">
		            <div class="custom-control custom-checkbox">
		                <input type="checkbox" id="3-1" name="any" value="place" class="custom-control-input">
                    <label class="custom-control-label" for="3-1">Home and Office</label>
		            </div>
		            <div class="custom-control custom-checkbox">
		                <input type="checkbox" id="3-2" name="one_ear" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="3-2">Driving</label>
		            </div>
		            <div class="custom-control custom-checkbox">
		                <input type="checkbox" id="3-3" name="foldable" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="3-3">Travel and Commute</label>
		            </div>
		            <div class="custom-control custom-checkbox">
		                <input type="checkbox" id="3-4" name="sweat_resistant" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="3-4">Running and Working Out</label>
		            </div>
      				</div>


							<h3>How much will you use them in a day?</h3>
	  			    <div class="form-group">
		            <div class="custom-control custom-radio">
		                <input type="radio" id="4-1" name="battery_life" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="4-1">1 hour or less</label>
		            </div>
		            <div class="custom-control custom-radio">
		                <input type="radio" id="4-2" name="battery_life" value="2" class="custom-control-input">
                    <label class="custom-control-label" for="4-2">2 hours</label>
		            </div>
		            <div class="custom-control custom-radio">
		                <input type="radio" id="4-3" name="battery_life" value="3" class="custom-control-input">
                    <label class="custom-control-label" for="4-3">3 hours</label>
		            </div>
		            <div class="custom-control custom-radio">
		                <input type="radio" id="4-4" name="battery_life" value="4" class="custom-control-input">
                    <label class="custom-control-label" for="4-4">4 hours</label>
		            </div>
		            <div class="custom-control custom-radio">
		                <input type="radio" id="4-5" name="battery_life" value="5" class="custom-control-input">
                    <label class="custom-control-label" for="4-5">5 hours</label>
		            </div>
		            <div class="custom-control custom-radio">
		                <input type="radio" id="4-6" name="battery_life" value="4" class="custom-control-input">
                    <label class="custom-control-label" for="4-6">6 hours</label>
		            </div>
		            <div class="custom-control custom-radio">
		                <input type="radio" id="4-7" name="battery_life" value="4" class="custom-control-input">
                    <label class="custom-control-label" for="4-7">7 hours or more</label>
		            </div>
      				</div>


							<h3>Is sound quality important to you?</h3>
	  			    <div class="form-group">
		            <div class="custom-control custom-radio">
		                <input type="radio" id="5-1" name="sound_quality" value="4.5" class="custom-control-input">
                    <label class="custom-control-label" for="5-1">Important</label>
		            </div>
		            <div class="custom-control custom-radio">
		                <input type="radio" id="5-2" name="sound_quality" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="5-2">Don't care</label>
		            </div>
      				</div>


							<h3>Is noise cancellation important to you?</h3>
	  			    <div class="form-group">
		            <div class="custom-control custom-radio">
		                <input type="radio" id="6-1" name="noise_cancellation" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="6-1">Important</label>
		            </div>
		            <div class="custom-control custom-radio">
		                <input type="radio" id="6-2" name="any" value="noise_cancellation" class="custom-control-input">
                    <label class="custom-control-label" for="6-2">Don't care</label>
		            </div>
      				</div>


							<h3>Do you have a budget?</h3>
	  			    <div class="form-group">
		            <div class="custom-control custom-radio">
		                <input type="radio" id="7-1" name="price" value="50" class="custom-control-input">
                    <label class="custom-control-label" for="7-1">Up to $50</label>
		            </div>
		            <div class="custom-control custom-radio">
		                <input type="radio" id="7-2" name="price" value="75" class="custom-control-input">
                    <label class="custom-control-label" for="7-2">$50 - $100</label>
		            </div>
		            <div class="custom-control custom-radio">
		                <input type="radio" id="7-3" name="price" value="125" class="custom-control-input">
                    <label class="custom-control-label" for="7-3">$100 - $150</label>
		            </div>
		            <div class="custom-control custom-radio">
		                <input type="radio" id="7-4" name="price" value="200" class="custom-control-input">
                    <label class="custom-control-label" for="7-4">$150 - $250</label>
		            </div>
		            <div class="custom-control custom-radio">
		                <input type="radio" id="7-5" name="price" value="250" class="custom-control-input">
                    <label class="custom-control-label" for="7-5">$250 or more</label>
		            </div>

      				</div>


							<input type="submit" class="btn btn-primary" value="Submit">
			      </form>
        </section>
        <!-- Questionnaire start -->



			</main><!-- #main -->


		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
