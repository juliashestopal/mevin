<?php
$cat = (string) $_GET['product_cat'];
$strings = (object) json_decode(file_get_contents(dirname(__FILE__)."/strings.json"), false);
$strings = $strings->{0}->$cat->strings->requirements;
$requirements = (object) $requirements;
// output the sorted posts
print_r($requirements);
while ( $posts->have_posts() ) : $posts->the_post();
	$product = wc_get_product( $post->ID );
	$count = (int) get_post_meta( $post->ID, 'clicks', true );
	//print_r($product);
	$purl = $product->get_product_url();
	if (!empty($amz_tag)) {
		$link = str_replace('askmevin06-20', $amz_tag, $purl);
	} else {
		$link = $purl;
	}
//$link = admin_url('admin-ajax.php?action=my_user_like&post_id='.$post->ID.'&nonce='.$nonce);
?>

<div class="card mb-5">
	<div class="row">
		<div class="col-md-3">
			<div class="pimage">
				<img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" class="card-img" alt="<?php the_title();?>">
			</div>
		</div>
		<div class="col-md-9">
			<div class="card-body">
				<div class="row">
	        <div class="col-md-8">
						<span class="brand"><?php echo $product->get_attribute('pa_brand'); ?></span>
						<?php the_title( '<h2 class="card-title">', '</h2>' ); ?>
						<p><i class="fa rating rating-<?php echo number_format(round(get_post_meta($post->ID,'rating', true) / 5, 1) * 5, 1, '-', ',');?>"></i> <?php echo number_format(get_post_meta($post->ID,'review_count', true)); ?></p>
						<p class="card-text"><a class="track-click btn btn-primary d-block d-inline-block" data-post_id="<?php echo $post->ID;?>" href="#">Simulate click</a></p>
						<!-- <p class="card-text"><i style="color: #17ae7a;" class="fa fa-check"></i> View count: <?php gt_set_post_view(); ?>, Click count: <?php echo $count; ?></p>
						<p class="card-text">Price: <?php echo  $product->get_price(); ?></p>
						<p class="card-text">Score: <?php echo $post->relevance; ?>, Sound quality: <?php echo get_post_meta($post->ID,'sound_quality', true); ?>, Mic? <?php echo get_post_meta($post->ID,'microphone', true); ?>, Battery: <?php echo get_post_meta($post->ID,'battery_life', true); ?>, Latency: <?php echo get_post_meta($post->ID,'latency', true); ?></p>

						<small class="text-muted"><i class="fa fa-truck"></i> Free Shipping & Returns by Amazon</small>
						<p class="card-text"><small class="text-muted"><?php echo $link;?></small></p> -->
	        </div>
	        <div class="col-md-4">
	          <p class="text-success text-center font-weight-bold"><?php echo round($post->requirements_met/$requirements_count * 100); ?>% Match</p>
	        </div>
	      </div>


			</div>
		</div>
	</div>
</div>



<?php endwhile;wp_reset_postdata(); ?>
