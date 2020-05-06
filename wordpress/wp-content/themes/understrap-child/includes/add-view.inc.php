<?php
if (empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") {
    if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) { // direct access denied
        header("Location: /403");
        exit;
    }
}
require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
$post_id = $_POST["post_id"];
if ($_POST["action"] == 'addView') {
  $key = 'views';
  //$post_id = get_the_ID();
  $count = (int) get_post_meta( $post_id, $key, true );
  $count++;
  update_post_meta( $post_id, $key, $count );
}
