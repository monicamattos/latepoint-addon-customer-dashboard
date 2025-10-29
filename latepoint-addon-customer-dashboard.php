<?php
/*
Plugin Name: LatePoint Add-on – Customer Dashboard
Plugin URI: https://github.com/monicamattos/latepoint-addon-customer-dashboard
Description: Extensão personalizada do LatePoint que cria um painel do cliente com informações de agendamentos e histórico.
Version: 1.0.0
Author: Monica Mattos / MM Soluções Digitais
Author URI: https://mmsolucoesdigitais.com
License: MIT
*/

if ( ! defined( 'ABSPATH' ) ) exit;

// Define constantes do plugin
define( 'LATEPOINT_ADDON_CUSTOMER_DASHBOARD_PATH', plugin_dir_path( __FILE__ ) );
define( 'LATEPOINT_ADDON_CUSTOMER_DASHBOARD_URL', plugin_dir_url( __FILE__ ) );

class LatePointAddonCustomerDashboard {
    public function __construct() {
        // Garante que só carrega depois do LatePoint
        add_action( 'latepoint_loaded', [ $this, 'init_addon' ] );
    }

    public function init_addon() {
        // Inclui a classe principal
        require_once LATEPOINT_ADDON_CUSTOMER_DASHBOARD_PATH . 'includes/class-customer-dashboard.php';
        new LTP_Customer_Dashboard();
    }
}

new LatePointAddonCustomerDashboard();
