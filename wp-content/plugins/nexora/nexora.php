<?php
/**
 * Plugin Name: Nexora
 * Description: Handles User Registration and Log In, Profile Dashboard and Connection between two other User
 * Version: 1.0
 * Author: Sahil Singla
 */

if (!defined('ABSPATH')) exit;

define('NEXORA_PATH', plugin_dir_path(__FILE__));
define('NEXORA_URL', plugin_dir_url(__FILE__));

require_once NEXORA_PATH . 'includes/class-cpt.php';
require_once NEXORA_PATH . 'includes/class-registration.php';
require_once NEXORA_PATH . 'includes/class-profile-page.php';
require_once NEXORA_PATH . 'includes/class-login.php';
require_once NEXORA_PATH . 'includes/class-home-page.php';

class NEXORA_System {

    public function __construct() {
        new NEXORA_Registration();
        new NEXORA_Login();
        new NEXORA_CPT();
        new NEXORA_Page();
        new Nexora_Home_Page();

        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
        add_action('after_setup_theme', [$this, 'hide_admin_bar']);
    }

    public function enqueue_assets() {

        wp_enqueue_style(
            'profile-global-style',
            NEXORA_URL . 'assets/css/style.css',
            [],
            '1.0'
        );

        wp_enqueue_script(
            'profile-global-js',
            NEXORA_URL . 'assets/js/script.js',
            ['jquery'],
            '1.0',
            true
        );
    } 

    function hide_admin_bar() {
        if (!current_user_can('administrator')) {
            show_admin_bar(false);
        }
    }
}

new NEXORA_System();


