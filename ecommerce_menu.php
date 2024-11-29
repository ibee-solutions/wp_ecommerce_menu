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

    // Descuentos
    add_menu_page(
        __('Descuentos', 'custom-editor-menu'), // Page title
        __('Descuentos', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'descuentos', // Slug
        function() { wp_redirect('/backoffice/edit.php?post_type=shop_coupon'); exit; }, // Redirect
        $icon_base_url . 'descuentos.svg', // Icon
        6 // Position
    );

        // Cupones
        add_submenu_page(
            'descuentos', // Parent slug
            __('Cupones', 'custom-editor-menu'), // Page title
            __('Cupones', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'descuentos-cupones', // Slug
            function() { wp_redirect('/backoffice/edit.php?post_type=shop_coupon'); exit; } // Redirect
        );

    // Google
    add_menu_page(
        __('Google', 'custom-editor-menu'), // Page title
        __('Google', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'google', // Slug
        function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/google/start'); exit; }, // Redirect
        $icon_base_url . 'google.svg', // Icon
        7 // Position
    );

        // Integración
        add_submenu_page(
            'google', // Parent slug
            __('Integración', 'custom-editor-menu'), // Page title
            __('Integración', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'google-integracion', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-admin&path=/google/start'); exit; } // Redirect
        );

        // Site Kit
        add_submenu_page(
            'google', // Parent slug
            __('Site Kit', 'custom-editor-menu'), // Page title
            __('Site Kit', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'google-site-kit', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=googlesitekit-splash'); exit; } // Redirect
        );

    // Meta
    add_menu_page(
        __('Meta', 'custom-editor-menu'), // Page title
        __('Meta', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'meta', // Slug
        function() { wp_redirect('/backoffice/admin.php?page=wc-facebook'); exit; }, // Redirect
        $icon_base_url . 'meta.svg', // Icon
        8 // Position
    );

        // Facebook
        add_submenu_page(
            'meta', // Parent slug
            __('Facebook', 'custom-editor-menu'), // Page title
            __('Facebook', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'meta-facebook', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-facebook'); exit; } // Redirect
        );

        // Pixel
        add_submenu_page(
            'meta', // Parent slug
            __('Pixel', 'custom-editor-menu'), // Page title
            __('Pixel', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'meta-pixel', // Slug
            function() { wp_redirect('/backoffice/options-general.php?page=facebook_pixel_options'); exit; } // Redirect
        );

    // TikTok
    add_menu_page(
        __('TikTok', 'custom-editor-menu'), // Page title
        __('TikTok', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'tiktok', // Slug
        function() { wp_redirect('/backoffice/admin.php?page=tiktok'); exit; }, // Redirect
        $icon_base_url . 'tiktok.svg', // Icon
        9 // Position
    );

    // WhatsApp
    add_menu_page(
        __('WhatsApp', 'custom-editor-menu'), // Page title
        __('WhatsApp', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'whatsapp', // Slug
        function() { wp_redirect('/backoffice/admin.php?page=click-to-chat'); exit; }, // Redirect
        $icon_base_url . 'whatsapp.svg', // Icon
        10 // Position
    );

        // Ajustes
        add_submenu_page(
            'whatsapp', // Parent slug
            __('Ajustes', 'custom-editor-menu'), // Page title
            __('Ajustes', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'whatsapp-ajustes', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=click-to-chat'); exit; } // Redirect
        );

        // Saludos
        add_submenu_page(
            'whatsapp', // Parent slug
            __('Saludos', 'custom-editor-menu'), // Page title
            __('Saludos', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'whatsapp-saludos', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=click-to-chat-greetings'); exit; } // Redirect
        );
    
    // Mailchimp
    add_menu_page(
        __('Mailchimp', 'custom-editor-menu'), // Page title
        __('Mailchimp', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'mailchimp', // Slug
        function() { wp_redirect('/backoffice/admin.php?page=mailchimp-woocommerce'); exit; }, // Redirect
        $icon_base_url . 'mailchimp.svg', // Icon
        11 // Position
    );

    // Mercado Pago
    add_menu_page(
        __('Mercado Pago', 'custom-editor-menu'), // Page title
        __('Mercado Pago', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'mercado-pago', // Slug
        function() { wp_redirect('/backoffice/admin.php?page=mercadopago-settings'); exit; }, // Redirect
        $icon_base_url . 'mercado-pago.svg', // Icon
        12 // Position
    );

    // Payway
    add_menu_page(
        __('Payway', 'custom-editor-menu'), // Page title
        __('Payway', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'payway', // Slug
        function() { wp_redirect('/backoffice/admin.php?page=payway_admin_promotions'); exit; }, // Redirect
        $icon_base_url . 'payway.svg', // Icon
        13 // Position
    );

        // Promociones
        add_submenu_page(
            'payway', // Parent slug
            __('Promociones', 'custom-editor-menu'), // Page title
            __('Promociones', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'payway-promociones', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=payway_admin_promotions'); exit; } // Redirect
        );

        // Bancos
        add_submenu_page(
            'payway', // Parent slug
            __('Bancos', 'custom-editor-menu'), // Page title
            __('Bancos', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'payway-bancos', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=payway_admin_banks'); exit; } // Redirect
        );

        // Tarjetas
        add_submenu_page(
            'payway', // Parent slug
            __('Tarjetas', 'custom-editor-menu'), // Page title
            __('Tarjetas', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'payway-tarjetas', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=payway_admin_cards'); exit; } // Redirect
        );

        // Ajustes
        add_submenu_page(
            'payway', // Parent slug
            __('Ajustes', 'custom-editor-menu'), // Page title
            __('Ajustes', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'payway-ajustes', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-settings&tab=checkout&section=payway_gateway'); exit; } // Redirect
        );

    // Transferencia Bancaria
    add_menu_page(
        __('Transferencia Bancaria', 'custom-editor-menu'), // Page title
        __('Transferencia Bancaria', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'transferencia-bancaria', // Slug
        function() { wp_redirect('/backoffice/admin.php?page=wc-settings&tab=checkout&section=bacs'); exit; }, // Redirect
        $icon_base_url . 'transferencia-bancaria.svg', // Icon
        14 // Position
    );

    // Correo Argentino
    add_menu_page(
        __('Correo Argentino', 'custom-editor-menu'), // Page title
        __('Correo Argentino', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'correo-argentino', // Slug
        function() { wp_redirect('/backoffice/admin.php?page=correoargentino-orders'); exit; }, // Redirect
        $icon_base_url . 'correo-argentino.svg', // Icon
        15 // Position
    );

        // Órdenes
        add_submenu_page(
            'correo-argentino', // Parent slug
            __('Órdenes', 'custom-editor-menu'), // Page title
            __('Órdenes', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'correo-argentino-ordenes', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=correoargentino-orders'); exit; } // Redirect
        );

        // Conexión API
        add_submenu_page(
            'correo-argentino', // Parent slug
            __('Conexión API', 'custom-editor-menu'), // Page title
            __('Conexión API', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'correo-argentino-conexion-api', // Slug
            function() { wp_redirect('/backoffice/admin.php?page=wc-settings&tab=shipping&section=correoargentino_shipping_method&form=service-selector'); exit; } // Redirect
        );

    // Páginas
    add_menu_page(
        __('Páginas', 'custom-editor-menu'), // Page title
        __('Páginas', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'paginas', // Slug
        function() { wp_redirect('/backoffice/edit.php?post_type=page'); exit; }, // Redirect
        $icon_base_url . 'paginas.svg', // Icon
        16 // Position
    );

        // Todas las páginas
        add_submenu_page(
            'paginas', // Parent slug
            __('Todas las páginas', 'custom-editor-menu'), // Page title
            __('Todas las páginas', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'paginas-todas-las-paginas', // Slug
            function() { wp_redirect('/backoffice/edit.php?post_type=page'); exit; } // Redirect
        );

        // Añadir nueva página
        add_submenu_page(
            'paginas', // Parent slug
            __('Añadir nueva página', 'custom-editor-menu'), // Page title
            __('Añadir nueva página', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'paginas-anadir-nueva-pagina', // Slug
            function() { wp_redirect('/backoffice/post-new.php?post_type=page'); exit; } // Redirect
        );

    // Medios
    add_menu_page(
        __('Medios', 'custom-editor-menu'), // Page title
        __('Medios', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'medios', // Slug
        function() { wp_redirect('/backoffice/upload.php'); exit; }, // Redirect
        $icon_base_url . 'medios.svg', // Icon
        17 // Position
    );

        // Biblioteca
        add_submenu_page(
            'medios', // Parent slug
            __('Biblioteca', 'custom-editor-menu'), // Page title
            __('Biblioteca', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'medios-biblioteca', // Slug
            function() { wp_redirect('/backoffice/upload.php'); exit; } // Redirect
        );

        // Añadir nuevo archivo de medios
        add_submenu_page(
            'medios', // Parent slug
            __('Añadir nuevo archivo de medios', 'custom-editor-menu'), // Page title
            __('Añadir nuevo archivo de medios', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'medios-anadir-nuevo-archivo-de-medios', // Slug
            function() { wp_redirect('/backoffice/media-new.php'); exit; } // Redirect
        );

    // Apariencia
    add_menu_page(
        __('Apariencia', 'custom-editor-menu'), // Page title
        __('Apariencia', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'apariencia', // Slug
        function() { wp_redirect('/backoffice/nav-menus.php'); exit; }, // Redirect
        $icon_base_url . 'apariencia.svg', // Icon
        18 // Position
    );

        // Menús
        add_submenu_page(
            'apariencia', // Parent slug
            __('Menús', 'custom-editor-menu'), // Page title
            __('Menús', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'apariencia-menus', // Slug
            function() { wp_redirect('/backoffice/nav-menus.php'); exit; } // Redirect
        );

        // Favicon
        add_submenu_page(
            'apariencia', // Parent slug
            __('Favicon', 'custom-editor-menu'), // Page title
            __('Favicon', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'apariencia-favicon', // Slug
            function() { wp_redirect('/backoffice/themes.php?page=favicon-by-realfavicongenerator/admin/class-favicon-by-realfavicongenerator-admin.phpfavicon_appearance_menu'); exit; } // Redirect
        );

    // Usuarios
    add_menu_page(
        __('Usuarios', 'custom-editor-menu'), // Page title
        __('Usuarios', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'usuarios', // Slug
        function() { wp_redirect('/backoffice/profile.php'); exit; }, // Redirect
        $icon_base_url . 'profile.svg', // Icon
        19 // Position
    );

    // Herramientas
    add_menu_page(
        __('Herramientas', 'custom-editor-menu'), // Page title
        __('Herramientas', 'custom-editor-menu'), // Menu title
        'read', // Capability
        'herramientas', // Slug
        function() { wp_redirect('/backoffice/import.php'); exit; }, // Redirect
        $icon_base_url . 'herramientas.svg', // Icon
        20 // Position
    );

        // Importar
        add_submenu_page(
            'herramientas', // Parent slug
            __('Importar', 'custom-editor-menu'), // Page title
            __('Importar', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'herramientas-importar', // Slug
            function() { wp_redirect('/backoffice/import.php'); exit; } // Redirect
        );

        // Exportar
        add_submenu_page(
            'herramientas', // Parent slug
            __('Exportar', 'custom-editor-menu'), // Page title
            __('Exportar', 'custom-editor-menu'), // Menu title
            'read', // Capability
            'herramientas-exportar', // Slug
            function() { wp_redirect('/backoffice/export.php'); exit; } // Redirect
        );
}
