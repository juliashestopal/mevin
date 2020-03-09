// Add your custom JS here.
jQuery(document).ready( function() {
   jQuery(".track-click").click( function(e) {
      e.preventDefault();
      post_id = jQuery(this).attr("data-post_id");
      console.log(post_id)
      nonce = jQuery(this).attr("data-nonce");
      jQuery.ajax({
         method : "POST",
         url : WPURLS.cssurl+'/includes/add-click.inc.php',
         data : {action: "addClick", post_id : post_id, nonce: nonce},
      })
      .done(function(response) {
        console.log( "success" );
      })
      .fail(function() {
        console.log( "error" );
      })
      .always(function(response) {
        console.log( response );
      });
   });
});
