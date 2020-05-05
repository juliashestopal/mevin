<?php

foreach ($_GET as $get=>$parameter) {
    if (is_array($parameter)) {
        $str_arr = preg_split("/\,/", $parameter[0]);
        foreach ($str_arr as $value) {
            list($k, $v) = explode('=', $value);
            $_GET[$k] = $v;
        }
        unset($_GET[$get]);
    }
}

$args = array(
    'post_type' => 'product',
    'product_cat' => $_GET['product_cat'],
    'post_status' => 'publish',
    'posts_per_page' => 100,
    'meta_query' => array(
        array( //hide out of stock (price<1)
            'key' => '_price',
            'value' => 0,
            'compare' => '>',
        )
    )
);

$cat = (string) $_GET['product_cat'];
$strings_json = (object) json_decode( file_get_contents( get_stylesheet_directory_uri() . "/includes/strings.json" ), false )->$cat;

$requirements = $_GET;
$requirements = array_filter($requirements);
unset($requirements['product_cat']);
unset($requirements['atag']);
unset($requirements['any']);
$requirements_count = count($requirements);

// main query functions
function getRelevantPosts($args){
  global $condition_count, $requirements;
  // get the posts but do NOT order them
  $query_posts = new WP_Query( $args );


  // calculate the relevance for each post
  foreach( $query_posts->posts as $post ) {
    $post->relevance = calculate_relevance( $post, $requirements );
  }

  // sorting the posts
  usort( $query_posts->posts, 'compare' );//

  return $query_posts;

}


function calculate_relevance($post, $queryArray)
{
    $raw_score = 1;
    global $requirements_count, $strings_json;
    $rating_boost = (float)get_post_meta($post->ID, 'rating', true) / (float)get_post_meta($post->ID, 'review_count', true);
    foreach ($queryArray as $key => $value) {
        if ($key !== 'any' && $key !== 'product_cat' && $key !== 'atag') { //not "any"
            if ($key == 'price') { //if price then
                $rprice = $value;
                $pprice = get_post_meta($post->ID, '_price', true);
                $gprice = stats_dens_normal($rprice, $rprice * .1, $pprice) / stats_dens_normal($rprice, $rprice * .1, $rprice);
                //$raw_score = $raw_score + (1 / $price);
            } else { // if not price
                $operator = $strings_json->strings->requirements->$key->match_if ?: '>=';
                if (compare_by_operator(get_post_meta($post->ID, $key, true), $operator, $value)) {
                    $raw_score++;
                    $post->requirements_met++;
                }
            }
        }
        if (get_post_meta($post->ID, 'views', true) > 0 && get_post_meta($post->ID, 'clicks', true) > 0) {
            $raw_score = $raw_score + (int)get_post_meta($post->ID, 'clicks', true) / (int)get_post_meta($post->ID, 'views', true);
        }
    }
    //echo $post->post_title .': '.($raw_score) / $condition_count .'<br>';
    if (isset($gprice)) {
        $raw_score = $raw_score * $gprice;
    } //rank price
    if (isset($gprice) && ($gprice >= 0.8 && $gprice <= 1.2)) {
        $post->requirements_met++;
    } //rank price
    //echo $post-> post_title.':'.$gprice.', ';
    //$raw_score = $raw_score / $rating_boost;$condition_count++; //rank price
    $calc_score = sprintf('%0.5f', ($raw_score / $requirements_count));


    return $calc_score;

}


// resolve equivilants
function compare( $a, $b ){
  if(  $a->relevance ==  $b->relevance ) {
    return 0;
  } else {
    return ( $a->relevance > $b->relevance ) ? -1 : 1;
  }
}

// Run search
$posts = getRelevantPosts($args);
