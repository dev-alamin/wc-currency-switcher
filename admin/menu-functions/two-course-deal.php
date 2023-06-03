<?php

function custom_product_price_admin_init() {
    register_setting('custom_product_prices', 'australian_price', 'opl_sanitize_float');
    register_setting('custom_product_prices', 'australian_sale_price', 'opl_sanitize_float');
    register_setting('custom_product_prices', 'british_price', 'opl_sanitize_float');
    register_setting('custom_product_prices', 'british_sale_price', 'opl_sanitize_float');
    register_setting('custom_product_prices', 'bangladeshi_price', 'opl_sanitize_float');
    register_setting('custom_product_prices', 'bangladeshi_sale_price', 'opl_sanitize_float');
    register_setting('custom_product_prices', 'default_price', 'opl_sanitize_float');
    register_setting('custom_product_prices', 'default_sale_price', 'opl_sanitize_float');

    add_settings_section('custom_product_prices_section', '2 Course Deal – Trauma Informed Care + Vicarious Trauma and Compassion Fatigue (12 Months)', '', 'custom_product_prices');

    add_settings_field('australian_price_field', 'Australian Price (AUD)', 'australian_price_field_callback', 'custom_product_prices', 'custom_product_prices_section');
    add_settings_field('australian_sale_price_field', 'Australian Sale Price (AUD)', 'australian_sale_price_field_callback', 'custom_product_prices', 'custom_product_prices_section');
    add_settings_field('british_price_field', 'UK Price (GBP)', 'british_price_field_callback', 'custom_product_prices', 'custom_product_prices_section');
    add_settings_field('british_sale_price_field', 'UK Sale Price (GBP)', 'british_sale_price_field_callback', 'custom_product_prices', 'custom_product_prices_section');
    add_settings_field('bangladeshi_price_field', 'Bangladeshi Price (BDT)', 'bangladeshi_price_field_callback', 'custom_product_prices', 'custom_product_prices_section');
    add_settings_field('bangladeshi_sale_price_field', 'Bangladeshi Sale Price (BDT)', 'bangladeshi_sale_price_field_callback', 'custom_product_prices', 'custom_product_prices_section');
    add_settings_field('default_price_field', 'Default Price', 'default_price_field_callback', 'custom_product_prices', 'custom_product_prices_section');
    add_settings_field('default_sale_price_field', 'Default Sale Price', 'default_sale_price_field_callback', 'custom_product_prices', 'custom_product_prices_section');
}

function australian_price_field_callback() {
    $australian_price = get_option('australian_price', 0);
    echo '<input type="text" name="australian_price" value="' . $australian_price . '">';
}

function australian_sale_price_field_callback() {
    $australian_sale_price = get_option('australian_sale_price', 0);
    echo '<input type="text" name="australian_sale_price" value="' . $australian_sale_price . '">';
}

function british_price_field_callback() {
    $british_price = get_option('british_price', 0);
    echo '<input type="text" name="british_price" value="' . $british_price . '">';
}

function british_sale_price_field_callback() {
    $british_sale_price = get_option('british_sale_price', 0);
    echo '<input type="text" name="british_sale_price" value="' . $british_sale_price . '">';
}

function bangladeshi_price_field_callback() {
    $bangladeshi_price = get_option('bangladeshi_price', 0);
    echo '<input type="text" name="bangladeshi_price" value="' . $bangladeshi_price . '">';
}

function bangladeshi_sale_price_field_callback() {
    $bangladeshi_sale_price = get_option('bangladeshi_sale_price', 0);
    echo '<input type="text" name="bangladeshi_sale_price" value="' . $bangladeshi_sale_price . '">';
}

function default_price_field_callback() {
    $default_price = get_option('default_price', 0);
    echo '<input type="text" name="default_price" value="' . $default_price . '">';
}

function default_sale_price_field_callback() {
    $default_sale_price = get_option('default_sale_price', 0);
    echo '<input type="text" name="default_sale_price" value="' . $default_sale_price . '">';
}
