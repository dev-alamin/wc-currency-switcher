<div class="wrap">
        <h1><?php _e( 'Trauma Informed Care Course Bundle (12 Months)', 'opl-helper' ); ?> </h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('trauma_informed_care_course_prices');
            do_settings_sections('trauma_informed_care_course_prices');
            submit_button();
            ?>
        </form>
    </div>