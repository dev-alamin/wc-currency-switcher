<div class="wrap">
        <h1>Onpoint Learning Course Price </h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom_product_prices');
            do_settings_sections('custom_product_prices');
            submit_button();
            ?>
        </form>
    </div>