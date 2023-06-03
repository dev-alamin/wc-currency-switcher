<?php
function vicarious_trauma_product_price_admin_init() {
    register_setting('vicarious_trauma_product_price', 'vicarious_trauma_australian_price', 'opl_sanitize_float');
    register_setting('vicarious_trauma_product_price', 'vicarious_trauma_australian_sale_price', 'opl_sanitize_float');
    register_setting('vicarious_trauma_product_price', 'vicarious_trauma_british_price', 'opl_sanitize_float');
    register_setting('vicarious_trauma_product_price', 'vicarious_trauma_british_sale_price', 'opl_sanitize_float');
    register_setting('vicarious_trauma_product_price', 'vicarious_trauma_bangladeshi_price', 'opl_sanitize_float');
    register_setting('vicarious_trauma_product_price', 'vicarious_trauma_bangladeshi_sale_price', 'opl_sanitize_float');
    register_setting('vicarious_trauma_product_price', 'vicarious_trauma_default_price', 'opl_sanitize_float');
    register_setting('vicarious_trauma_product_price', 'vicarious_trauma_default_sale_price', 'opl_sanitize_float');

    add_settings_section('vicarious_trauma_product_price_section', 'Update Vicarious Trauma Price', '', 'vicarious_trauma_product_price');

    add_settings_field('vicarious_trauma_australian_price_field', 'Australian Price (AUD)', 'vicarious_trauma_australian_price_field_callback', 'vicarious_trauma_product_price', 'vicarious_trauma_product_price_section');
    add_settings_field('vicarious_trauma_australian_sale_price_field', 'Australian Sale Price (AUD)', 'vicarious_trauma_australian_sale_price_field_callback', 'vicarious_trauma_product_price', 'vicarious_trauma_product_price_section');
    add_settings_field('vicarious_trauma_british_price_field', 'UK Price (GBP)', 'vicarious_trauma_british_price_field_callback', 'vicarious_trauma_product_price', 'vicarious_trauma_product_price_section');
    add_settings_field('vicarious_trauma_british_sale_price_field', 'UK Sale Price (GBP)', 'vicarious_trauma_british_sale_price_field_callback', 'vicarious_trauma_product_price', 'vicarious_trauma_product_price_section');
    add_settings_field('vicarious_trauma_bangladeshi_price_field', 'Bangladeshi Price (BDT)', 'vicarious_trauma_bangladeshi_price_field_callback', 'vicarious_trauma_product_price', 'vicarious_trauma_product_price_section');
    add_settings_field('vicarious_trauma_bangladeshi_sale_price_field', 'Bangladeshi Sale Price (BDT)', 'vicarious_trauma_bangladeshi_sale_price_field_callback', 'vicarious_trauma_product_price', 'vicarious_trauma_product_price_section');
    add_settings_field('vicarious_trauma_default_price_field', 'Default Price', 'vicarious_trauma_default_price_field_callback', 'vicarious_trauma_product_price', 'vicarious_trauma_product_price_section');
    add_settings_field('vicarious_trauma_default_sale_price_field', 'Default Sale Price', 'vicarious_trauma_default_sale_price_field_callback', 'vicarious_trauma_product_price', 'vicarious_trauma_product_price_section');
}

function vicarious_trauma_australian_price_field_callback() {
    $vicarious_australian_price = get_option('vicarious_trauma_australian_price', 0);
    echo '<input type="text" name="vicarious_trauma_australian_price" value="' . $vicarious_australian_price . '">';
}

function vicarious_trauma_australian_sale_price_field_callback() {
    $vicarious_australian_sale_price = get_option('vicarious_trauma_australian_sale_price', 0);
    echo '<input type="text" name="vicarious_trauma_australian_sale_price" value="' . $vicarious_australian_sale_price . '">';
}

function vicarious_trauma_british_price_field_callback() {
    $vicarious_british_price = get_option('vicarious_trauma_british_price', 0);
    echo '<input type="text" name="vicarious_trauma_british_price" value="' . $vicarious_british_price . '">';
}

function vicarious_trauma_british_sale_price_field_callback() {
    $vicarious_british_sale_price = get_option('vicarious_trauma_british_sale_price', 0);
    echo '<input type="text" name="vicarious_trauma_british_sale_price" value="' . $vicarious_british_sale_price . '">';
}

function vicarious_trauma_bangladeshi_price_field_callback() {
    $vicarious_bangladeshi_price = get_option('vicarious_trauma_bangladeshi_price', 0);
    echo '<input type="text" name="vicarious_trauma_bangladeshi_price" value="' . $vicarious_bangladeshi_price . '">';
}

function vicarious_trauma_bangladeshi_sale_price_field_callback() {
    $vicarious_bangladeshi_sale_price = get_option('vicarious_trauma_bangladeshi_sale_price', 0);
    echo '<input type="text" name="vicarious_trauma_bangladeshi_sale_price" value="' . $vicarious_bangladeshi_sale_price . '">';
}

function vicarious_trauma_default_price_field_callback() {
    $vicarious_default_price = get_option('vicarious_trauma_default_price', 0);
    echo '<input type="text" name="vicarious_trauma_default_price" value="' . $vicarious_default_price . '">';
}

function vicarious_trauma_default_sale_price_field_callback() {
    $vicarious_default_sale_price = get_option('vicarious_trauma_default_sale_price', 0);
    echo '<input type="text" name="vicarious_trauma_default_sale_price" value="' . $vicarious_default_sale_price . '">';
}
