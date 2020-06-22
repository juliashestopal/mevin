<?php
$product_cat          = (string) $_GET['product_cat'];
$strings              = (object) json_decode( file_get_contents( get_stylesheet_directory_uri() . "/includes/strings.json" ), false )->$product_cat;
$requirement_template = $strings->strings->requirements;
$requirements         = (object) $requirements;
foreach ( $requirement_template as $key => $value ) {
	if ( $requirements->$key ) {
		$requirement_template->$key->value = $requirements->$key;
	} else {
		unset( $requirement_template->$key );
	}
}
$requirements = $requirement_template;


$promotions_args = array(
    'post_type' => 'product',
    'product_cat' => $_GET['product_cat'] . '-promotions',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);
$promotion_query = new WP_Query($promotions_args);
$product_promotions = $promotion_query->posts;
shuffle($product_promotions);

?>

<div class="requirement-block">

        <div class="row justify-content-md-center">
            <div class="col-md-8 col-xs-12">
                <div class="requirement">
                    <h1>You Asked For:</h1>
                    <ul>
						<?php foreach ( $requirements as $requirement => $key ) {
							echo "<span class='disc' style='background-color: {$key->color}'></span><li>" . str_replace( '%s%', $key->value, $key->description ) . "</li>";
						} ?>
                    </ul>

                </div>
                <div class="col-md-12 col-xs-12 block-start_over">
                    <div class="start-over">
                        <a href="javascript:window.history.back()" class="start-over_link">
                            <svg width="25" height="28" viewBox="0 0 25 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.8471 9.05507C22.4178 8.34832 21.5306 8.11274 20.8152 8.5249C20.0997 8.96678 19.8993 9.90912 20.3286 10.6452C21.3303 12.3238 21.8168 14.3262 21.6165 16.476C21.1872 21.0109 17.5526 24.6037 13.1453 24.9276C7.79353 25.3104 3.32893 20.8931 3.38616 15.4747C3.44342 10.4391 7.45006 6.25757 12.3439 6.16925C12.3725 6.16925 12.4012 6.16925 12.4012 6.16925V8.4071C12.4012 9.05507 13.088 9.46723 13.6318 9.11386L19.4987 5.3447C20.0138 5.02064 20.0138 4.25507 19.4987 3.9312L13.6604 0.132352C13.1166 -0.221024 12.4298 0.191136 12.4298 0.839104V3.10666C5.47538 3.16544 -0.0767081 9.23165 0.438408 16.5055C0.867704 22.6012 5.64708 27.519 11.5712 27.9607C18.6687 28.5201 24.5928 22.719 24.5928 15.5337C24.6215 13.1778 23.9632 10.9397 22.8471 9.05507Z" fill="#188EE9"/>
                            </svg>

                            <span class="start-over_text">Start over</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

</div>

<div class="result-main_block">
    <div class="col-md-12 reviews-scanned">
        <div class="count">
            <svg
 xmlns="http://www.w3.org/2000/svg"
 xmlns:xlink="http://www.w3.org/1999/xlink"
 width="27px" height="27px">
<path fill-rule="evenodd"  fill="rgb(60, 190, 149)"
 d="M24.272,12.110 L24.501,12.353 L26.998,14.996 L23.866,17.100 L23.589,17.285 L23.680,17.606 L24.671,21.116 L20.929,21.513 L20.597,21.548 L20.528,21.877 L19.786,25.447 L16.288,24.047 L15.979,23.923 L15.767,24.182 L13.462,26.995 L11.011,24.119 L10.793,23.863 L10.487,23.993 L7.147,25.406 L6.305,21.714 L6.230,21.386 L5.897,21.357 L2.289,21.046 L3.248,17.382 L3.332,17.059 L3.051,16.877 L-0.002,14.913 L2.539,12.116 L2.764,11.868 L2.600,11.579 L0.803,8.409 L4.342,7.122 L4.657,7.008 L4.645,6.673 L4.517,3.028 L8.248,3.545 L8.576,3.590 L8.720,3.287 L10.289,0.000 L13.354,2.203 L13.624,2.397 L13.891,2.198 L16.798,0.021 L18.494,3.404 L18.644,3.703 L18.972,3.651 L22.553,3.083 L22.493,6.873 L22.488,7.209 L22.803,7.316 L26.233,8.489 L24.432,11.816 L24.272,12.110 ZM20.074,6.890 C18.391,5.196 16.067,4.148 13.499,4.148 C10.932,4.148 8.607,5.196 6.925,6.890 C5.242,8.584 4.202,10.924 4.202,13.509 C4.202,16.094 5.242,18.434 6.925,20.128 C8.607,21.822 10.932,22.870 13.499,22.870 C16.067,22.870 18.391,21.822 20.074,20.128 C21.756,18.434 22.797,16.094 22.797,13.509 C22.797,10.924 21.756,8.584 20.074,6.890 ZM13.498,21.936 C11.184,21.936 9.088,20.992 7.571,19.465 C6.055,17.938 5.117,15.828 5.117,13.498 C5.117,11.168 6.055,9.058 7.571,7.531 C9.088,6.004 11.184,5.059 13.498,5.059 C15.812,5.059 17.908,6.004 19.424,7.531 C20.941,9.058 21.879,11.168 21.879,13.498 C21.879,15.828 20.941,17.938 19.424,19.465 C17.908,20.992 15.812,21.936 13.498,21.936 ZM18.178,9.610 C17.999,9.429 17.709,9.429 17.530,9.610 L11.378,15.804 L9.054,13.465 C8.875,13.285 8.585,13.285 8.406,13.465 C8.228,13.645 8.228,13.937 8.406,14.117 L11.054,16.783 C11.233,16.963 11.523,16.963 11.702,16.783 L11.704,16.780 L18.178,10.262 C18.357,10.082 18.357,9.790 18.178,9.610 Z"/>
</svg>
            <div class="text"><?php echo number_format(rand( 2000, 5000 )); ?></div>
        </div>
        <div class="description">Reviews Scanned</div>
    </div>


	<?php

	$number_of_items = 0;
	while ( $posts->have_posts() ) : $posts->the_post();
        if(!isset($post)){
            continue;
        }

		//increment view count
        if($number_of_items < $max_items_per_screen){
            $views_count = (int) get_post_meta( $post->ID, 'views', true );
            update_post_meta($post->ID, 'views', ($views_count+1) );
        }

		$number_of_items ++;
		$product = wc_get_product( $post->ID );
		$count   = (int) get_post_meta( $post->ID, 'clicks', true );
		$purl    = $product->get_product_url();
		if ( ! empty( $amz_tag ) ) {
			$link = str_replace( 'askmevin06-20', $amz_tag, $purl );
		} else {
			$link = $purl;
		}
		$matches_requirement     = new stdClass();
		$non_matches_requirement = new stdClass();

		foreach ( $requirements as $requirement => $key ) {
			if ( $key->slug === "_price" ) {
				$max_price = $key->value * 1.25;
				if ( get_post_meta( $post->ID, $key->slug, true ) <= $max_price ) {
					$matches_requirement->$requirement = $key;
				} else {
					$non_matches_requirement->$requirement = $key;
				}
			} else {
			    $operator = $strings->strings->requirements->$requirement->match_if ?: '>=';
				if ( compare_by_operator(get_post_meta( $post->ID, $key->slug, true ), $operator, $key->value) ) {
					$matches_requirement->$requirement = $key;
				} else {
					$non_matches_requirement->$requirement = $key;
				}
			}

		} ?>

        <div class="card mb-5<?php if($number_of_items > $max_items_per_screen) echo ' hidden-result-item'; ?>" id="result_item_<?php echo $number_of_items; ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-none d-sm-block block-product_img">
                        <div class="product-image">
                            <span class="product-match-number"
                                  id='product-match-number-<?php echo $number_of_items; ?>'><?php echo $number_of_items == 1 ? "#1 Best Match" : "#{$number_of_items}"; ?></span>
                            <a target="_blank" href="<?php echo $link ?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>" class="card-img track-click"
                                 alt="<?php the_title(); ?>"></a>
                        </div>
                    </div>
                    <div class="col-md-8 d-none d-sm-block block-needs">
                        <div class="card-body">
                            <a target="_blank" href="<?php echo $link ?>" class="product-title-link">
                                <span class="brand"><?php echo $product->get_attribute( 'pa_brand' ); ?></span>
                                <?php the_title( '<h2 class="card-title">', '</h2>' ); ?>
                            </a>
                            <p>
                                <i class="fa rating rating-<?php echo number_format( round( get_post_meta( $post->ID, 'rating', true ) / 5, 1 ) * 5, 1, '-', ',' ); ?>"></i>
								<span class = "rating-number"><?php echo number_format( get_post_meta( $post->ID, 'review_count', true ) ); ?></span>
                            </p>

                            <p class="matches_count"> <?php echo count( (array) $matches_requirement ) . '/' . count( (array) $requirements ); ?>
                                Needs Matched </p>
                            <ul class="matches_list">
								<?php foreach ( $matches_requirement as $key => $value ) {
									$text = ! empty( $value->match_text ) ? str_replace( '%s%', $value->value, $value->match_text ) : $value->title;
                                    $text = str_replace('%p%', get_post_meta($post->ID, str_replace('_percentage', '', $key), true), $text);
									echo "<li class = 'matches_match'>" . $text . "</li>";
								}
								foreach ( $non_matches_requirement as $key => $value ) {
                                    $text = !empty( $value->not_match_text ) ? str_replace( '%s%', $value->value, $value->not_match_text ) : $value->title;
                                    $text = str_replace('%p%', get_post_meta($post->ID, str_replace('_percentage', '', $key), true), $text);
									echo "<li class = 'non_matches_match'>" . $text . "</li>";
								} ?>
                            </ul>
                            <p class="card-text card-text_desktop"><a target="_blank"
                                                                      class="track-click btn btn-primary d-block d-inline-block"
                                                                      data-post_id="<?php echo $post->ID; ?>"
                                                                      href="<?php echo $link ?>">View Deal</a></p>
                            <?php if (!$display_amazon_data) { ?>
                                <small class="text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.996" height="9.998"
                                         viewBox="0 0 42 21" style="margin-bottom: 2px; margin-right: 5px;">

                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #888;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path id="Delivery_Icon" data-name="Delivery Icon" class="cls-1"
                                              d="M170.982,1396.38l-2.832-.58-1.328-4.01a3.524,3.524,0,0,0-3.32-2.38h-2.257v-2.08a1.327,1.327,0,0,0-1.328-1.32H142.346a1.33,1.33,0,0,0-1.328,1.32v14.56a1.335,1.335,0,0,0,1.328,1.33h1.46a3.807,3.807,0,0,0,7.613,0H161.6a3.807,3.807,0,0,0,7.613,0h1.46a1.332,1.332,0,0,0,1.328-1.33v-4.23A1.236,1.236,0,0,0,170.982,1396.38Zm-23.369,8.65a1.81,1.81,0,1,1,0-3.62A1.81,1.81,0,1,1,147.613,1405.03Zm13.632-9.58v-4.06H163.5a1.516,1.516,0,0,1,1.416,1.02l1.018,3.04h-4.691Zm4.2,9.58a1.81,1.81,0,1,1,1.814-1.81A1.853,1.853,0,0,1,165.45,1405.03Zm-27.663-15.93h-6.728a1.06,1.06,0,1,0,0,2.12h6.728a1.079,1.079,0,0,0,1.062-1.06A1.043,1.043,0,0,0,137.787,1389.1Zm0,4.45h-5.046a1.06,1.06,0,1,0,0,2.12h5.046a1.072,1.072,0,0,0,1.062-1.06A1,1,0,0,0,137.787,1393.55Zm0,4.42h-3.364a1.055,1.055,0,1,0,0,2.11h3.364a1.07,1.07,0,0,0,1.062-1.05A1.043,1.043,0,0,0,137.787,1397.97Z"
                                              transform="translate(-130 -1386)"/>
                                    </svg>
                                    Free Shipping & Returns by
                                    Amazon
                                </small>
                            <?php } else {
                                echo "<p class='amazon_product_title'>" . array_shift(get_post_meta($post->ID, '_cegg_data_Amazon')[0])['title'] . "</p>";
                            } ?>

                        </div>
                    </div>

                    <div class="col-6 d-block d-sm-none">
                        <div class="card-body">
                            <span class="product-match-number"
                                  id='product-match-number-<?php echo $number_of_items; ?>'><?php echo $number_of_items == 1 ? "#1 Best Match" : "#{$number_of_items}"; ?></span>
                            <a target="_blank" href="<?php echo $link ?>" class="product-title-link">
                                <span class="brand"><?php echo $product->get_attribute('pa_brand'); ?></span>
                                <?php the_title('<h2 class="card-title">', '</h2>'); ?>
                            </a>
                            <p>
                                <i class="fa rating rating-<?php echo number_format( round( get_post_meta( $post->ID, 'rating', true ) / 5, 1 ) * 5, 1, '-', ',' ); ?>"></i>
								<span class = "rating-number"><?php echo number_format( get_post_meta( $post->ID, 'review_count', true ) ); ?></span>
                            </p>


                        </div>
                    </div>
                    <div class="col-6 d-block d-sm-none">
                        <div class="product-image">
                            <a target="_blank" href="<?php echo $link ?>">
                                <img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>" class="card-img" alt="<?php the_title(); ?>">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 d-block d-sm-none block-btn_mobile">
                        <p class="card-text"><a target="_blank"
                                                class="track-click btn btn-primary d-block d-inline-block"
                                                data-post_id="<?php echo $post->ID; ?>" href="<?php echo $link ?>">View
                                Deal</a></p>
                        <?php if (!$display_amazon_data) { ?>
                            <small class="text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19.996" height="9.998"
                                     viewBox="0 0 42 21"
                                     style="margin-bottom: 2px; margin-right: 5px;">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #888;
                                                fill-rule: evenodd;
                                            }
                                        </style>
                                    </defs>
                                    <path id="Delivery_Icon" data-name="Delivery Icon" class="cls-1"
                                          d="M170.982,1396.38l-2.832-.58-1.328-4.01a3.524,3.524,0,0,0-3.32-2.38h-2.257v-2.08a1.327,1.327,0,0,0-1.328-1.32H142.346a1.33,1.33,0,0,0-1.328,1.32v14.56a1.335,1.335,0,0,0,1.328,1.33h1.46a3.807,3.807,0,0,0,7.613,0H161.6a3.807,3.807,0,0,0,7.613,0h1.46a1.332,1.332,0,0,0,1.328-1.33v-4.23A1.236,1.236,0,0,0,170.982,1396.38Zm-23.369,8.65a1.81,1.81,0,1,1,0-3.62A1.81,1.81,0,1,1,147.613,1405.03Zm13.632-9.58v-4.06H163.5a1.516,1.516,0,0,1,1.416,1.02l1.018,3.04h-4.691Zm4.2,9.58a1.81,1.81,0,1,1,1.814-1.81A1.853,1.853,0,0,1,165.45,1405.03Zm-27.663-15.93h-6.728a1.06,1.06,0,1,0,0,2.12h6.728a1.079,1.079,0,0,0,1.062-1.06A1.043,1.043,0,0,0,137.787,1389.1Zm0,4.45h-5.046a1.06,1.06,0,1,0,0,2.12h5.046a1.072,1.072,0,0,0,1.062-1.06A1,1,0,0,0,137.787,1393.55Zm0,4.42h-3.364a1.055,1.055,0,1,0,0,2.11h3.364a1.07,1.07,0,0,0,1.062-1.05A1.043,1.043,0,0,0,137.787,1397.97Z"
                                          transform="translate(-130 -1386)"/>
                                </svg>
                                Free Shipping & Returns by Amazon

                            </small>
                        <?php } else {
                            echo "<p class='amazon_product_title'>" . array_shift(get_post_meta($post->ID, '_cegg_data_Amazon')[0])['title'] . "</p>";
                        } ?>

                    </div>
                    <div class="col-12 d-block d-sm-none block-needs">
                        <div class="card-body">
                            <p class="matches_count"> <?php echo count( (array) $matches_requirement ) . '/' . count( (array) $requirements ); ?>
                                Needs Matched </p>
                            <ul class="matches_list">
								<?php foreach ( $matches_requirement as $key => $value ) {
                                    $text = ! empty( $value->match_text ) ? str_replace( '%s%', $value->value, $value->match_text ) : $value->title;
                                    $text = str_replace('%p%', get_post_meta($post->ID, str_replace('_percentage', '', $key), true), $text);
									echo "<li class = 'matches_match'>" . $text . "</li>";
								}
								foreach ( $non_matches_requirement as $key => $value ) {
									$text = !empty( $value->not_match_text ) ? str_replace( '%s%', $value->value, $value->not_match_text ) : $value->title;
                                    $text = str_replace('%p%', get_post_meta($post->ID, str_replace('_percentage', '', $key), true), $text);
									echo "<li class = 'non_matches_match'>" . $text . "</li>";
								} ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($product_promotions) && !empty($product_promotions) && sizeof($product_promotions) >= 2 && ($number_of_items === 3 || $number_of_items === $max_items_per_screen)) {

            ($number_of_items === 3) ? $promotion = $product_promotions[0] : $promotion = $product_promotions[1];
            $today = date("F j");
            $promotion_url = wc_get_product($promotion)->get_product_url();
            $promotion_title = $promotion->post_title; ?>

            <div class="col-12 d-block d-sm-none promo">
                <a class="promotion_link" href="<?php echo $promotion_url; ?>" target="_blank">
                    <div class="promotion" id="promotion-<?php echo $number_of_items; ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-2">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tag.svg" alt="">
                                </div>
                                <div class="col-8 promotion-description">
                                    <span>Active amazon promotion (<?php echo $today; ?>)</span>
                                    <span><?php echo $promotion_title; ?></span>
                                </div>
                                <div class="col-2">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                 </a>
            </div>

        <?php }
    endwhile;
    wp_reset_postdata();
    ?>
</div>
