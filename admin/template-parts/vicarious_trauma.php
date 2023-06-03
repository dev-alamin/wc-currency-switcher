<div class="wrap">
        <h1><?php _e( 'Vicarious Trauma Price', 'opl-helper' ); ?> </h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('vicarious_trauma_product_price');
            do_settings_sections('vicarious_trauma_product_price');
            submit_button();
            ?>
        </form>
    </div>