<?php
/*
Plugin Name: Advanced Click Counter
Description: simpele teller die bijhoudt hoe vaak er op een knop is geklikt
Version: 1.1
Author: Jan Honing
*/

if (!defined('ABSPATH')) {
    exit; 
}

function acc_enqueue_scripts() {
    wp_enqueue_script(
        'acc-script',
        plugin_dir_url(__FILE__) . 'acc-script.js',
        ['jquery'],
        '1.1',
        true
    );

    wp_enqueue_style(
        'acc-style',
        plugin_dir_url(__FILE__) . 'acc-style.css',
        [],
        '1.1'
    );

    wp_localize_script('acc-script', 'acc_ajax', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}
add_action('wp_enqueue_scripts', 'acc_enqueue_scripts');

function acc_add_button() {
    $start_value = get_option('acc_start_value', 0);
    echo '<div id="acc-container" style="text-align: center; margin-top: 40px;">
        <button id="acc-button" class="acc-button">Clicked ' . esc_html($start_value) . ' times</button>
    </div>';
}
add_action('wp_footer', 'acc_add_button');

function acc_handle_click() {
    $count = get_option('acc_click_count', get_option('acc_start_value', 0));
    $step = get_option('acc_step_size', 1);
    $count += $step;
    update_option('acc_click_count', $count);
    wp_send_json_success($count);
}
add_action('wp_ajax_acc_update_count', 'acc_handle_click');
add_action('wp_ajax_nopriv_acc_update_count', 'acc_handle_click');

function acc_add_settings_page() {
    add_options_page(
        'Advanced Click Counter Settings',
        'Click Counter',
        'manage_options',
        'advanced-click-counter',
        'acc_render_settings_page'
    );
}
add_action('admin_menu', 'acc_add_settings_page');

function acc_render_settings_page() {
    if ($_POST['acc_save_settings']) {
        update_option('acc_start_value', intval($_POST['acc_start_value']));
        update_option('acc_step_size', intval($_POST['acc_step_size']));
        echo '<div class="updated"><p>Settings saved.</p></div>';
    }

    $start_value = get_option('acc_start_value', 0);
    $step_size = get_option('acc_step_size', 1);

    ?>
    <div class="wrap">
        <h1>Advanced Click Counter Settings</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="acc_start_value">Start Value</label></th>
                    <td><input name="acc_start_value" type="number" id="acc_start_value" value="<?php echo esc_attr($start_value); ?>" class="small-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="acc_step_size">Step Size</label></th>
                    <td><input name="acc_step_size" type="number" id="acc_step_size" value="<?php echo esc_attr($step_size); ?>" class="small-text"></td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="acc_save_settings" id="submit" class="button button-primary" value="Save Changes">
            </p>
        </form>
    </div>
    <?php
}
