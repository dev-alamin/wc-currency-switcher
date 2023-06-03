<?php
add_action( 'init', function() {
    add_shortcode( 'op_get_price_by_id', 'op_wc_price_shortcode_callback' );
} );

function op_wc_price_shortcode_callback( $atts ) {
    $atts = shortcode_atts( array(
        'id' => null,
    ), $atts, 'bartag' );

    $currency_symbol = get_option('woocommerce_currency');

    if( $currency_symbol == 'BDT' ) {
        $currency_symbol = '৳';
    }elseif( $currency_symbol == 'USD' ) {
        $currency_symbol = '$';
    }elseif( $currency_symbol == 'AUD' ) {
        $currency_symbol = '$';
    }elseif( $currency_symbol == 'GBP' ) {
        $currency_symbol = '£';
    }else{
        $currency_symbol = '$';
    }

    $cache_buster = time(); // Use current timestamp as cache buster

    ob_start();

    if ( intval( $atts['id'] ) > 0 && function_exists( 'wc_get_product' ) ) {
        $_product = wc_get_product( $atts['id'] );
        ?>
        <p class="opl-custom-price">
            <span class="price price-regular"><?php echo $currency_symbol . $_product->get_regular_price(); ?></span>
            <span class="price price-sale"><?php echo $currency_symbol . $_product->get_price(); ?></span>
        </p>
        <script>
            var cacheBuster = <?php echo $cache_buster; ?>;
        </script>
        <?php
    }

    $output = ob_get_clean();
    return $output;
}
