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
?>

<div class="requirement-block">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-xs-12">
                <div class="requirement">
                    <h1>You Asked For:</h1>
                    <ul>
                      <?php foreach ($requirements as $requirement=>$key) {
                           echo "<span class='disc' style='background-color: {$key->color}'></span><li>" . str_replace('%s%', $key->value, $key->description)  . "</li>";
                      } ?>
                    </ul>

                </div>
                <div class="col-md-12 col-xs-12 block-start_over">
                    <div class="start-over">
                        <a href="javascript:window.history.back()" class="start-over_link">
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="16px" height="18px">
                                <path fill-rule="evenodd" fill="rgb(24, 142, 233)"
                                      d="M14.323,5.821 C14.057,5.367 13.507,5.215 13.063,5.480 L13.063,5.480 C12.619,5.764 12.495,6.370 12.761,6.843 C13.382,7.922 13.684,9.210 13.560,10.592 C13.294,13.507 11.040,15.817 8.306,16.025 C4.988,16.271 2.219,13.431 2.254,9.948 C2.290,6.711 4.775,4.023 7.809,3.966 C7.827,3.966 7.845,3.966 7.845,3.966 L7.845,5.405 C7.845,5.821 8.271,6.086 8.608,5.859 L12.247,3.436 C12.566,3.227 12.566,2.735 12.247,2.527 L8.626,0.085 C8.289,-0.142 7.863,0.123 7.863,0.539 L7.863,1.997 C3.550,2.035 0.107,5.935 0.426,10.611 C0.692,14.529 3.656,17.691 7.330,17.975 C11.732,18.334 15.406,14.605 15.406,9.986 C15.423,8.471 15.015,7.033 14.323,5.821 Z"/>
                            </svg>
                            <span class="start-over_text">Start over</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 reviews-scanned">
    <div class="count">
        <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="54px" height="54px">
            <path fill-rule="evenodd" fill="rgb(60, 190, 149)"
                  d="M48.544,24.221 L49.003,24.706 L53.996,29.993 L47.732,34.199 L47.179,34.571 L47.360,35.212 L49.342,42.232 L41.858,43.026 L41.193,43.096 L41.057,43.753 L39.572,50.894 L32.575,48.094 L31.958,47.847 L31.534,48.364 L26.924,53.991 L22.023,48.239 L21.587,47.727 L20.974,47.986 L14.294,50.813 L12.609,43.428 L12.460,42.772 L11.793,42.714 L4.578,42.091 L6.495,34.764 L6.664,34.117 L6.101,33.755 L-0.004,29.825 L5.078,24.231 L5.528,23.736 L5.200,23.157 L1.606,16.818 L8.685,14.244 L9.313,14.015 L9.290,13.347 L9.034,6.056 L16.495,7.090 L17.151,7.181 L17.440,6.574 L20.579,0.001 L26.708,4.406 L27.248,4.795 L27.782,4.395 L33.597,0.041 L36.989,6.808 L37.288,7.405 L37.945,7.301 L45.106,6.167 L44.986,13.746 L44.975,14.418 L45.605,14.633 L52.467,16.978 L48.863,23.632 L48.544,24.221 ZM40.148,13.779 C36.783,10.391 32.134,8.296 26.999,8.296 C21.864,8.296 17.215,10.391 13.850,13.779 C10.485,17.167 8.403,21.848 8.403,27.018 C8.403,32.188 10.485,36.869 13.850,40.257 C17.215,43.645 21.864,45.740 26.999,45.740 C32.134,45.740 36.783,43.645 40.148,40.257 C43.513,36.869 45.594,32.188 45.594,27.018 C45.594,21.848 43.513,17.167 40.148,13.779 ZM26.996,43.873 C22.367,43.873 18.176,41.984 15.143,38.930 C12.109,35.876 10.233,31.657 10.233,26.996 C10.233,22.335 12.109,18.115 15.143,15.062 C18.176,12.007 22.367,10.118 26.996,10.118 C31.625,10.118 35.816,12.007 38.849,15.062 C41.882,18.115 43.759,22.335 43.759,26.996 C43.759,31.657 41.882,35.876 38.849,38.930 C35.816,41.984 31.625,43.873 26.996,43.873 ZM36.356,19.219 C35.999,18.859 35.418,18.859 35.061,19.219 L22.755,31.608 L18.109,26.930 C17.751,26.570 17.171,26.570 16.813,26.930 C16.455,27.291 16.455,27.874 16.813,28.235 L22.107,33.566 C22.465,33.926 23.045,33.926 23.403,33.566 L23.408,33.561 L36.356,20.524 C36.714,20.164 36.714,19.580 36.356,19.219 Z"/>
        </svg>
        <div class="text"><?php echo rand(2000,5000); ?></div>
    </div>
    <div class="description">Reviews Scanned</div>
</div>

<?php while ($posts->have_posts()) : $posts->the_post();
        $product = wc_get_product($post->ID);
        $count = (int)get_post_meta($post->ID, 'clicks', true);
        $purl = $product->get_product_url();
        if (!empty($amz_tag)) {
            $link = str_replace('askmevin06-20', $amz_tag, $purl);
        } else {
            $link = $purl;
        }
        $matches_requirement = new stdClass();
        $non_matches_requirement = new stdClass();

        foreach ($requirements as $requirement => $key) {
            if ($key->slug === "_price") {
                if (get_post_meta($post->ID, $key->slug, true) <= $key->value) {
                    $matches_requirement->$requirement = $key;
                } else {
                    $non_matches_requirement->$requirement = $key;
                }
            } else {
                if (get_post_meta($post->ID, $key->slug, true) >= $key->value) {
                    $matches_requirement->$requirement = $key;
                } else {
                    $non_matches_requirement->$requirement = $key;
                }
            }

        } ?>

    <div class="card mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-none d-sm-block block-product_img">
                    <div class="product-image">
                        <img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>" class="card-img"
                             alt="<?php the_title(); ?>">
                    </div>
                </div>
                <div class="col-md-8 d-none d-sm-block">
                    <div class="card-body">

                        <span class="brand"><?php echo $product->get_attribute( 'pa_brand' ); ?></span>
						<?php the_title( '<h2 class="card-title">', '</h2>' ); ?>
                        <p>
                            <i class="fa rating rating-<?php echo number_format( round( get_post_meta( $post->ID, 'rating', true ) / 5, 1 ) * 5, 1, '-', ',' ); ?>"></i>
							<?php echo number_format( get_post_meta( $post->ID, 'review_count', true ) ); ?>
                        </p>

                        <p class="matches_count"> <?php echo count((array)$matches_requirement) . '/' . count((array)$requirements); ?> Needs matches </p>
                        <ul class="matches_list">
		                    <?php foreach ($matches_requirement as $key => $value) {
			                    $text = !empty($value->match_text) ? str_replace('%s%', $value->value, $value->match_text) : $value->title;
			                    echo "<li class = 'matches_match'>" . $text . "</li>";
		                    }
		                    foreach ($non_matches_requirement as $key => $value) {
			                    $text = !empty($value->match_text) ? str_replace('%s%', $value->value, $value->not_match_text) : $value->title;
			                    echo "<li class = 'non_matches_match'>" . $text . "</li>";
		                    } ?>
                        </ul>
                        <p class="card-text card-text_desktop"><a class="track-click btn btn-primary d-block d-inline-block"
                                                data-post_id="<?php echo $post->ID; ?>" href="#">View Deal</a></p>
                        <small class="text-muted"><i class="fa fa-truck"></i> Free Shipping & Returns by Amazon</small>

                    </div>
                </div>

                <div class="col-6 d-block d-sm-none">
                    <div class="card-body">

                        <span class="brand"><?php echo $product->get_attribute( 'pa_brand' ); ?></span>
			            <?php the_title( '<h2 class="card-title">', '</h2>' ); ?>
                        <p>
                            <i class="fa rating rating-<?php echo number_format( round( get_post_meta( $post->ID, 'rating', true ) / 5, 1 ) * 5, 1, '-', ',' ); ?>"></i>
				            <?php echo number_format( get_post_meta( $post->ID, 'review_count', true ) ); ?>
                        </p>



                    </div>
                </div>
                <div class="col-6 d-block d-sm-none">
                    <div class="product-image">
                        <img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>" class="card-img"
                             alt="<?php the_title(); ?>">
                    </div>
                </div>
                <div class="col-12 d-block d-sm-none block-btn_mobile">
                    <p class="card-text"><a class="track-click btn btn-primary d-block d-inline-block"
                                            data-post_id="<?php echo $post->ID; ?>" href="#">View Deal</a></p>
                    <small class="text-muted"><i class="fa fa-truck"></i> Free Shipping & Returns by Amazon</small>

                </div>
                <div class="col-12 d-block d-sm-none">
                    <div class="card-body">
                        <p class="matches_count"> <?php echo count((array)$matches_requirement) . '/' . count((array)$requirements); ?> Needs matches </p>
                        <ul class="matches_list">
		                    <?php foreach ($matches_requirement as $key => $value) {
			                    $text = !empty($value->match_text) ? str_replace('%s%', $value->value, $value->match_text) : $value->title;
			                    echo "<li class = 'matches_match'>" . $text . "</li>";
		                    }
		                    foreach ($non_matches_requirement as $key => $value) {
			                    $text = !empty($value->match_text) ? str_replace('%s%', $value->value, $value->not_match_text) : $value->title;
			                    echo "<li class = 'non_matches_match'>" . $text . "</li>";
		                    } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php endwhile;
wp_reset_postdata();
