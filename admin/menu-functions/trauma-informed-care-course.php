<?php

function trauma_informed_care_course_price_admin_init() {
    register_setting('trauma_informed_care_course_prices', 'trauma_informed_australian_price', 'opl_sanitize_float');
    register_setting('trauma_informed_care_course_prices', 'trauma_informed_australian_sale_price', 'opl_sanitize_float');
    register_setting('trauma_informed_care_course_prices', 'trauma_informed_british_price', 'opl_sanitize_float');
    register_setting('trauma_informed_care_course_prices', 'trauma_informed_british_sale_price', 'opl_sanitize_float');
    register_setting('trauma_informed_care_course_prices', 'trauma_informed_bangladeshi_price', 'opl_sanitize_float');
    register_setting('trauma_informed_care_course_prices', 'trauma_informed_bangladeshi_sale_price', 'opl_sanitize_float');
    register_setting('trauma_informed_care_course_prices', 'trauma_informed_default_price', 'opl_sanitize_float');
    register_setting('trauma_informed_care_course_prices', 'trauma_informed_default_sale_price', 'opl_sanitize_float');

    add_settings_section('trauma_informed_care_course_prices_section', 'Update Trauma Informed Care Course Bundle (12 Months) Price', '', 'trauma_informed_care_course_prices');

    add_settings_field('australian_price_field', 'Australian Price (AUD)', 'trauma_informed_australian_price_field_callback', 'trauma_informed_care_course_prices', 'trauma_informed_care_course_prices_section');
    add_settings_field('australian_sale_price_field', 'Australian Sale Price (AUD)', 'trauma_informed_australian_sale_price_field_callback', 'trauma_informed_care_course_prices', 'trauma_informed_care_course_prices_section');
    add_settings_field('british_price_field', 'UK Price (GBP)', 'trauma_informed_british_price_field_callback', 'trauma_informed_care_course_prices', 'trauma_informed_care_course_prices_section');
    add_settings_field('british_sale_price_field', 'UK Sale Price (GBP)', 'trauma_informed_british_sale_price_field_callback', 'trauma_informed_care_course_prices', 'trauma_informed_care_course_prices_section');
    add_settings_field('bangladeshi_price_field', 'Bangladeshi Price (BDT)', 'trauma_informed_bangladeshi_price_field_callback', 'trauma_informed_care_course_prices', 'trauma_informed_care_course_prices_section');
    add_settings_field('bangladeshi_sale_price_field', 'Bangladeshi Sale Price (BDT)', 'trauma_informed_bangladeshi_sale_price_field_callback', 'trauma_informed_care_course_prices', 'trauma_informed_care_course_prices_section');
    add_settings_field('default_price_field', 'Default Price', 'trauma_informed_default_price_field_callback', 'trauma_informed_care_course_prices', 'trauma_informed_care_course_prices_section');
    add_settings_field('default_sale_price_field', 'Default Sale Price', 'trauma_informed_default_sale_price_field_callback', 'trauma_informed_care_course_prices', 'trauma_informed_care_course_prices_section');
}

function opl_sanitize_float( $value ){
    $float_value = floatval($value);
    return number_format($float_value, 2, '.', '');
}
function trauma_informed_australian_price_field_callback() {
    $trauma_informed_australian_price = get_option('trauma_informed_australian_price', 0);
    echo '<input type="text" name="trauma_informed_australian_price" value="' . $trauma_informed_australian_price . '">';
}

function trauma_informed_australian_sale_price_field_callback() {
    $trauma_informed_australian_sale_price = get_option('trauma_informed_australian_sale_price', 0);
    echo '<input type="text" name="trauma_informed_australian_sale_price" value="' . $trauma_informed_australian_sale_price . '">';
}

function trauma_informed_british_price_field_callback() {
    $trauma_informed_british_price = get_option('trauma_informed_british_price', 0);
    echo '<input type="text" name="trauma_informed_british_price" value="' . $trauma_informed_british_price . '">';
}

function trauma_informed_british_sale_price_field_callback() {
    $trauma_informed_british_sale_price = get_option('trauma_informed_british_sale_price', 0);
    echo '<input type="text" name="trauma_informed_british_sale_price" value="' . $trauma_informed_british_sale_price . '">';
}

function trauma_informed_bangladeshi_price_field_callback() {
    $trauma_informed_bangladeshi_price = get_option('trauma_informed_bangladeshi_price', 0);
    echo '<input type="text" name="trauma_informed_bangladeshi_price" value="' . $trauma_informed_bangladeshi_price . '">';
}

function trauma_informed_bangladeshi_sale_price_field_callback() {
    $trauma_informed_bangladeshi_sale_price = get_option('trauma_informed_bangladeshi_sale_price', 0);
    echo '<input type="text" name="trauma_informed_bangladeshi_sale_price" value="' . $trauma_informed_bangladeshi_sale_price . '">';
}

function trauma_informed_default_price_field_callback() {
    $trauma_informed_default_price = get_option('trauma_informed_default_price', 0);
    echo '<input type="text" name="trauma_informed_default_price" value="' . $trauma_informed_default_price . '">';
}

function trauma_informed_default_sale_price_field_callback() {
    $trauma_informed_default_sale_price = get_option('trauma_informed_default_sale_price', 0);
    echo '<input type="text" name="trauma_informed_default_sale_price" value="' . $trauma_informed_default_sale_price . '" pattern="\d+(\.\d{1,2})?">';
}
