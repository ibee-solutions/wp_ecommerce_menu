<?php
/**
 * Plugin Name: iBee Ecommerce Menu
 * Description: Replaces the default admin menu for iBee structure.
 * Version: 1.0
 * Author: Nicolas Dominguez
 */

add_action('admin_menu', 'custom_editor_menu', 999);

function custom_editor_menu() {
    // Check if the current user has the 'editor' role
    if (!current_user_can('editor')) {
        return;
    }

    // Remove all existing menu items
    global $menu, $submenu;
    $menu = [];
    $submenu = [];

    // Define plugin directory for SVGs
    $icon_base_url = plugin_dir_url(__FILE__) . 'icons/';

    // Inicio
    add_menu_page(
        __('Inicio', 'custom-editor-menu'), // Page title
        __('Inicio', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'inicio', // Slug
        function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/analytics/overview'); exit; }, // Redirect
        $icon_base_url . 'inicio.svg', // Icon
        1 // Position
    );

    // Pedidos
    add_menu_page(
        __('Pedidos', 'custom-editor-menu'), // Page title
        __('Pedidos', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'pedidos', // Slug
        function() { wp_redirect('/backoffice/admin.php?page=wc-orders'); exit; }, // Redirect
        $icon_base_url . 'pedidos.svg', // Icon
        2 // Position
    );

    // Clientes
    add_menu_page(
        __('Clientes', 'custom-editor-menu'), // Page title
        __('Clientes', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'clientes', // Slug
        function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/customers'); exit; }, // Redirect
        $icon_base_url . 'clientes.svg', // Icon
        3 // Position
    );

    // Productos
    add_menu_page(
        __('Productos', 'custom-editor-menu'), // Page title
        __('Productos', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'productos', // Slug
        function() { wp_redirect('/backoffice/edit.php?post_type=product'); exit; }, // Redirect
        $icon_base_url . 'productos.svg', // Icon
        4 // Position
    );

        // Todos los productos
        add_submenu_page(
            'productos', // Parent slug
            __('Todos los productos', 'custom-editor-menu'), // Page title
            __('Todos los productos', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'productos-todos-los-productos', // Slug
            function() { wp_redirect('/backoffice/edit.php?post_type=product'); exit; } // Redirect
        );

        // Añadir nuevo producto
        add_submenu_page(
            'productos', // Parent slug
            __('Añadir nuevo producto', 'custom-editor-menu'), // Page title
            __('Añadir nuevo producto', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'productos-anadir-nuevo-producto', // Slug
            function() { wp_redirect('/backoffice/post-new.php?post_type=product'); exit; } // Redirect
        );

        // Categorías
        add_submenu_page(
            'productos', // Parent slug
            __('Categorías', 'custom-editor-menu'), // Page title
            __('Categorías', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'productos-categorias', // Slug
            function() { wp_redirect('/backoffice/edit-tags.php?taxonomy=product_cat&post_type=product'); exit; } // Redirect
        );
        
        // Marcas
        add_submenu_page(
            'productos', // Parent slug
            __('Marcas', 'custom-editor-menu'), // Page title
            __('Marcas', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'productos-marcas', // Slug
            function() { wp_redirect('/backoffice/edit-tags.php?taxonomy=berocket_brand&post_type=product'); exit; } // Redirect
        );

        // Etiquetas
        add_submenu_page(
            'productos', // Parent slug
            __('Etiquetas', 'custom-editor-menu'), // Page title
            __('Etiquetas', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'productos-etiquetas', // Slug
            function() { wp_redirect('/backoffice/edit-tags.php?taxonomy=product_tag&post_type=product'); exit; } // Redirect
        );

        // Atributos
        add_submenu_page(
            'productos', // Parent slug
            __('Atributos', 'custom-editor-menu'), // Page title
            __('Atributos', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'productos-atributos', // Slug
            function() { wp_redirect('/backoffice/edit.php?post_type=product&page=product_attributes'); exit; } // Redirect
        );

        // Valoraciones
        add_submenu_page(
            'productos', // Parent slug
            __('Valoraciones', 'custom-editor-menu'), // Page title
            __('Valoraciones', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'productos-valoraciones', // Slug
            function() { wp_redirect('/backoffice/edit.php?post_type=product&page=product-reviews'); exit; } // Redirect
        );
    
    // Estadísticas
    add_menu_page(
        __('Estadísticas', 'custom-editor-menu'), // Page title
        __('Estadísticas', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'estadisticas', // Slug
        function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/analytics/overview'); exit; }, // Redirect
        $icon_base_url . 'estadisticas.svg', // Icon
        5 // Position
    );

        // General
        add_submenu_page(
            'estadisticas', // Parent slug
            __('General', 'custom-editor-menu'), // Page title
            __('General', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'estadisticas-general', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/analytics/overview'); exit; } // Redirect
        );

        // Productos
        add_submenu_page(
            'estadisticas', // Parent slug
            __('Productos', 'custom-editor-menu'), // Page title
            __('Productos', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'estadisticas-productos', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/analytics/products'); exit; } // Redirect
        );

        // Rentabilidad
        add_submenu_page(
            'estadisticas', // Parent slug
            __('Rentabilidad', 'custom-editor-menu'), // Page title
            __('Rentabilidad', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'estadisticas-rentabilidad', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/analytics/revenue'); exit; } // Redirect
        );

        // Pedidos
        add_submenu_page(
            'estadisticas', // Parent slug
            __('Pedidos', 'custom-editor-menu'), // Page title
            __('Pedidos', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'estadisticas-pedidos', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/analytics/orders'); exit; } // Redirect
        );

        // Variaciones
        add_submenu_page(
            'estadisticas', // Parent slug
            __('Variaciones', 'custom-editor-menu'), // Page title
            __('Variaciones', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'estadisticas-variaciones', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/analytics/variations'); exit; } // Redirect
        );

        // Categorías
        add_submenu_page(
            'estadisticas', // Parent slug
            __('Categorías', 'custom-editor-menu'), // Page title
            __('Categorías', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'estadisticas-categorias', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/analytics/categories'); exit; } // Redirect
        );

        // Cupones
        add_submenu_page(
            'estadisticas', // Parent slug
            __('Cupones', 'custom-editor-menu'), // Page title
            __('Cupones', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'estadisticas-cupones', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/analytics/coupons'); exit; } // Redirect
        );

        // Impuestos
        add_submenu_page(
            'estadisticas', // Parent slug
            __('Impuestos', 'custom-editor-menu'), // Page title
            __('Impuestos', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'estadisticas-impuestos', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/analytics/taxes'); exit; } // Redirect
        );

        // Descargas
        add_submenu_page(
            'estadisticas', // Parent slug
            __('Descargas', 'custom-editor-menu'), // Page title
            __('Descargas', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'estadisticas-descargas', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/analytics/downloads'); exit; } // Redirect
        );

        // Stock
        add_submenu_page(
            'estadisticas', // Parent slug
            __('Stock', 'custom-editor-menu'), // Page title
            __('Stock', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'estadisticas-stock', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/analytics/stock'); exit; } // Redirect
        );

        // Ajustes
        add_submenu_page(
            'estadisticas', // Parent slug
            __('Ajustes', 'custom-editor-menu'), // Page title
            __('Ajustes', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'estadisticas-ajustes', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/analytics/settings'); exit; } // Redirect
        );
}
