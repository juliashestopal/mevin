<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('check_admin_referer')) {
    check_admin_referer('styles_settings');
}

$url_params_headphones = isset($_POST['url_params_headphones']) ? $_POST['url_params_headphones'] : array();
update_option('url_params_headphones', array_values($url_params_headphones));

?>
<div class="updated"><p><strong>Params saved</strong></p></div>
