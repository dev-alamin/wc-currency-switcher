<?php
add_action( 'wp_enqueue_scripts', 'opl_frontend_assets' );
function opl_frontend_assets(){
    // Check if the current post content contains the specific shortcode
    if ( has_shortcode( get_post()->post_content, 'op_get_price_by_id' ) ) {
        wp_enqueue_style('opl-style', OPL_HELPER_PLUGIN_URL . 'assets/css/style.css', null, time(), 'all');
    }
}