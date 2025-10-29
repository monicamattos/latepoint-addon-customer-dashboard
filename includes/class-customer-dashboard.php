<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class LTP_Customer_Dashboard {

    public function __construct() {
        // Adiciona um item de menu dentro do painel do LatePoint
        add_action( 'admin_menu', [ $this, 'add_admin_page' ] );
        
        // Carrega scripts e estilos próprios
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assets' ] );
    }

    public function add_admin_page() {
        add_submenu_page(
            'latepoint', // slug do menu principal do LatePoint
            'Customer Dashboard', // título da página
            'Customer Dashboard', // nome no menu
            'manage_options', // permissão necessária
            'latepoint-customer-dashboard', // slug único
            [ $this, 'render_dashboard_page' ] // callback
        );
    }

    public function enqueue_assets() {
        wp_enqueue_style(
            'ltp-customer-dashboard-css',
            LATEPOINT_ADDON_CUSTOMER_DASHBOARD_URL . 'assets/css/dashboard.css',
            [],
            '1.0.0'
        );

        wp_enqueue_script(
            'ltp-customer-dashboard-js',
            LATEPOINT_ADDON_CUSTOMER_DASHBOARD_URL . 'assets/js/dashboard.js',
            ['jquery'],
            '1.0.0',
            true
        );
    }

    public function render_dashboard_page() {
        echo '<div class="wrap ltp-customer-dashboard">';
        echo '<h1>📊 Painel do Cliente</h1>';
        echo '<p>Bem-vindo ao painel do cliente do LatePoint Add-on!</p>';
        include LATEPOINT_ADDON_CUSTOMER_DASHBOARD_PATH . 'includes/views/dashboard-view.php';
        echo '</div>';
    }
}
