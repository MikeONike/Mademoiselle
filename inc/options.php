<?php 

    function mademoiselle_option_page() {
        add_menu_page(
            'Option Page',
            'Mademoiselle Options',
            'administrator',
            'option_page',
            'mademoiselle_contact_data',
            'dashicons-id-alt',
            18
        );
    }
    
    add_action('admin_menu', 'mademoiselle_option_page');

    function mademoiselle_contact_settings() {
        register_setting('mademoiselle_contact_data', 'mademoiselle_contact_address_01');
        register_setting('mademoiselle_contact_data', 'mademoiselle_contact_address_02');
        register_setting('mademoiselle_contact_data', 'mademoiselle_contact_phone_number_01');
        register_setting('mademoiselle_contact_data', 'mademoiselle_contact_phone_number_02');
        register_setting('mademoiselle_contact_data', 'mademoiselle_contact_mobile_number_02');
        register_setting('mademoiselle_contact_data', 'mademoiselle_contact_mobile_number_02');
        register_setting('mademoiselle_contact_data', 'mademoiselle_contact_email_01');
        register_setting('mademoiselle_contact_data', 'mademoiselle_contact_email_02');
    };

    add_action('init', 'mademoiselle_contact_settings');

    function mademoiselle_contact_data() {
        ?>
        <h1>Mademoiselle Contact Data</h1>
        <form action="options.php" method="POST">
            <?php 
                settings_fields('mademoiselle_contact_data');
                do_settings_sections('mademoiselle_contact_data');
            ?>
            <table>
                <tr>
                    <th style="text-align:left;">Contact Address 1</th>
                    <td>
                        <input type="text" name='mademoiselle_contact_address_01' value="<?php echo esc_attr(get_option('mademoiselle_contact_address_01')); ?>">
                    </td>
                </tr>
                <tr>
                    <th style="text-align:left;">Contact Address 2</th>
                    <td>
                        <input type="text" name='mademoiselle_contact_address_02' value="<?php echo esc_attr(get_option('mademoiselle_contact_address_02')); ?>">
                    </td>
                </tr>
                <tr>
                    <th style="text-align:left;">Contact Phone Number 1</th>
                    <td>
                        <input type="text" name='mademoiselle_contact_phone_number_01' value="<?php echo esc_attr(get_option('mademoiselle_contact_phone_number_01')); ?>">
                    </td>
                </tr>
                <tr>
                    <th style="text-align:left;">Contact Phone Number 2</th>
                    <td>
                        <input type="text" name='mademoiselle_contact_phone_number_02' value="<?php echo esc_attr(get_option('mademoiselle_contact_phone_number_02')); ?>">
                    </td>
                </tr>
                <tr>
                    <th style="text-align:left;">Contact Mobile Number 1</th>
                    <td>
                        <input type="text" name='mademoiselle_contact_mobile_number_01' value="<?php echo esc_attr(get_option('mademoiselle_contact_mobile_number_01')); ?>">
                    </td>
                </tr>
                <tr>
                    <th style="text-align:left;">Contact Mobile Number 2</th>
                    <td>
                        <input type="text" name='mademoiselle_contact_mobile_number_02' value="<?php echo esc_attr(get_option('mademoiselle_contact_mobile_number_02')); ?>">
                    </td>
                </tr>
                <tr>
                    <th style="text-align:left;">Contact Email 1</th>
                    <td>
                        <input type="text" name='mademoiselle_contact_email_01' value="<?php echo esc_attr(get_option('mademoiselle_contact_email_01')); ?>">
                    </td>
                </tr>
                <tr>
                    <th style="text-align:left;">Contact Email 2</th>
                    <td>
                        <input type="text" name='mademoiselle_contact_email_02' value="<?php echo esc_attr(get_option('mademoiselle_contact_email_02')); ?>">
                    </td>
                </tr>
                
            </table>

            <?php submit_button(); ?>
        </form>
        <?php
    }
?>