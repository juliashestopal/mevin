// Add your custom JS here.
jQuery(document).ready( function() {
   jQuery(".track-click").click( function(e) {
      // e.preventDefault();
      post_id = jQuery(this).attr("data-post_id");
      console.log(post_id);
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

   jQuery('.product-image').click(function (e) {
      gtag('event', 'image', {
         'event_category': 'result',
         'value': 0.18
      });
   });

   jQuery('.track-click.btn').click(function (e) {
      gtag('event', 'button', {
         'event_category': 'result',
         'value': 0.18
      });
   });

   jQuery('.card-title, .brand').click(function (e) {
      gtag('event', 'title', {
         'event_category': 'result',
         'value': 0.18
      });
   });

   jQuery('.start-over_link').click(function (e) {
         gtag('event', 'start-over', {
            'event_category': 'search-params',
         });
   });

   jQuery('.top-promotions .product-title-link').click(function (e) {
      gtag('event', 'home', {
         'event_category': 'result',
      });
   });
});
