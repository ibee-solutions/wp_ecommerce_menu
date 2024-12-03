<?php
/**
 * Plugin Name: iBee Ecommerce Menu
 * Description: Replaces the default admin menu for iBee structure.
 * Version: 1.0.3
 * Author: Nicolas Dominguez
 */

add_action("admin_menu", "custom_shop_manager_menu", 999);

function custom_shop_manager_menu()
{
    if (current_user_can("shop_manager")) {
        global $menu;
        foreach ($menu as $key => $value) {
            // El índice 2 contiene el slug del menú
            remove_menu_page($value[2]);
        }

        // Define plugin directory for SVGs
        $icon_base_url = plugin_dir_url(__FILE__) . "icons/";

        // --------------------------------------------------------------------------------------------------------
        // Inicio
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Inicio", "custom-editor-menu"),
            __("Inicio", "custom-editor-menu"),
            "read",
            "inicio",
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/analytics/overview"
                );
                exit();
            },
            $icon_base_url . "inicio.svg",
            1
        );

        // --------------------------------------------------------------------------------------------------------
        // Pedidos
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Pedidos", "custom-editor-menu"),
            __("Pedidos", "custom-editor-menu"),
            "edit_shop_orders",
            "admin.php?page=wc-orders",
            "",
            $icon_base_url . "pedidos.svg",
            2
        );

        // --------------------------------------------------------------------------------------------------------
        // Clientes
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Clientes", "custom-editor-menu"),
            __("Clientes", "custom-editor-menu"),
            "read",
            "clientes",
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/customers"
                );
                exit();
            },
            $icon_base_url . "clientes.svg",
            3
        );

        // --------------------------------------------------------------------------------------------------------
        // Productos
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Productos", "custom-editor-menu"),
            __("Productos", "custom-editor-menu"),
            "",
            "productos",
            function () {
                wp_redirect("/backoffice/edit.php?post_type=product");
                exit();
            },
            $icon_base_url . "productos.svg",
            4
        );

        // Añadir nuevo producto
        add_submenu_page(
            "productos",
            __("Añadir nuevo producto", "custom-editor-menu"),
            __("Añadir nuevo producto", "custom-editor-menu"),
            "read",
            "productos-anadir-nuevo-producto",
            function () {
                wp_redirect("/backoffice/post-new.php?post_type=product");
                exit();
            }
        );

        // Categorías
        add_submenu_page(
            "productos",
            __("Categorías", "custom-editor-menu"),
            __("Categorías", "custom-editor-menu"),
            "read",
            "productos-categorias",
            function () {
                wp_redirect(
                    "/backoffice/edit-tags.php?taxonomy=product_cat&post_type=product"
                );
                exit();
            }
        );

        // Marcas
        add_submenu_page(
            "productos",
            __("Marcas", "custom-editor-menu"),
            __("Marcas", "custom-editor-menu"),
            "read",
            "productos-marcas",
            function () {
                wp_redirect(
                    "/backoffice/edit-tags.php?taxonomy=berocket_brand&post_type=product"
                );
                exit();
            }
        );

        // Etiquetas
        add_submenu_page(
            "productos",
            __("Etiquetas", "custom-editor-menu"),
            __("Etiquetas", "custom-editor-menu"),
            "read",
            "productos-etiquetas",
            function () {
                wp_redirect(
                    "/backoffice/edit-tags.php?taxonomy=product_tag&post_type=product"
                );
                exit();
            }
        );

        // Atributos
        add_submenu_page(
            "productos",
            __("Atributos", "custom-editor-menu"),
            __("Atributos", "custom-editor-menu"),
            "read",
            "productos-atributos",
            function () {
                wp_redirect(
                    "/backoffice/edit.php?post_type=product&page=product_attributes"
                );
                exit();
            }
        );

        // Valoraciones
        add_submenu_page(
            "productos",
            __("Valoraciones", "custom-editor-menu"),
            __("Valoraciones", "custom-editor-menu"),
            "read",
            "productos-valoraciones",
            function () {
                wp_redirect(
                    "/backoffice/edit.php?post_type=product&page=product-reviews"
                );
                exit();
            }
        );

        remove_submenu_page("productos", "productos");

        // --------------------------------------------------------------------------------------------------------
        // Estadísticas
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Estadísticas", "custom-editor-menu"),
            __("Estadísticas", "custom-editor-menu"),
            "read",
            "estadisticas",
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/analytics/overview"
                );
                exit();
            },
            $icon_base_url . "estadisticas.svg",
            5
        );

        // General
        add_submenu_page(
            "estadisticas",
            __("General", "custom-editor-menu"),
            __("General", "custom-editor-menu"), 
            "read", 
            "estadisticas-general", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/analytics/overview"
                );
                exit();
            } 
        );

        // Productos
        add_submenu_page(
            "estadisticas", 
            __("Productos", "custom-editor-menu"),
            __("Productos", "custom-editor-menu"), 
            "read", 
            "estadisticas-productos", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/analytics/products"
                );
                exit();
            } 
        );

        // Rentabilidad
        add_submenu_page(
            "estadisticas", 
            __("Rentabilidad", "custom-editor-menu"),
            __("Rentabilidad", "custom-editor-menu"), 
            "read", 
            "estadisticas-rentabilidad", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/analytics/revenue"
                );
                exit();
            } 
        );

        // Pedidos
        add_submenu_page(
            "estadisticas", 
            __("Pedidos", "custom-editor-menu"),
            __("Pedidos", "custom-editor-menu"), 
            "read", 
            "estadisticas-pedidos", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/analytics/orders"
                );
                exit();
            } 
        );

        // Variaciones
        add_submenu_page(
            "estadisticas", 
            __("Variaciones", "custom-editor-menu"),
            __("Variaciones", "custom-editor-menu"), 
            "read", 
            "estadisticas-variaciones", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/analytics/variations"
                );
                exit();
            } 
        );

        // Categorías
        add_submenu_page(
            "estadisticas", 
            __("Categorías", "custom-editor-menu"),
            __("Categorías", "custom-editor-menu"), 
            "read", 
            "estadisticas-categorias", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/analytics/categories"
                );
                exit();
            } 
        );

        // Cupones
        add_submenu_page(
            "estadisticas", 
            __("Cupones", "custom-editor-menu"),
            __("Cupones", "custom-editor-menu"), 
            "read", 
            "estadisticas-cupones", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/analytics/coupons"
                );
                exit();
            } 
        );

        // Impuestos
        add_submenu_page(
            "estadisticas", 
            __("Impuestos", "custom-editor-menu"),
            __("Impuestos", "custom-editor-menu"), 
            "read", 
            "estadisticas-impuestos", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/analytics/taxes"
                );
                exit();
            } 
        );

        // Descargas
        add_submenu_page(
            "estadisticas", 
            __("Descargas", "custom-editor-menu"),
            __("Descargas", "custom-editor-menu"), 
            "read", 
            "estadisticas-descargas", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/analytics/downloads"
                );
                exit();
            } 
        );

        // Stock
        add_submenu_page(
            "estadisticas", 
            __("Stock", "custom-editor-menu"),
            __("Stock", "custom-editor-menu"), 
            "read", 
            "estadisticas-stock", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/analytics/stock"
                );
                exit();
            } 
        );

        // Ajustes
        add_submenu_page(
            "estadisticas", 
            __("Ajustes", "custom-editor-menu"),
            __("Ajustes", "custom-editor-menu"), 
            "read", 
            "estadisticas-ajustes", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/analytics/settings"
                );
                exit();
            } 
        );
        remove_submenu_page("estadisticas", "estadisticas");

        // --------------------------------------------------------------------------------------------------------
        // Descuentos
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Descuentos", "custom-editor-menu"),
            __("Descuentos", "custom-editor-menu"), 
            "read", 
            "descuentos", 
            function () {
                wp_redirect("/backoffice/edit.php?post_type=shop_coupon");
                exit();
            }, 
            $icon_base_url . "descuentos.svg", 
            6 
        );

        // Cupones
        add_submenu_page(
            "descuentos", 
            __("Cupones", "custom-editor-menu"),
            __("Cupones", "custom-editor-menu"), 
            "read", 
            "descuentos-cupones", 
            function () {
                wp_redirect("/backoffice/edit.php?post_type=shop_coupon");
                exit();
            } 
        );
        remove_submenu_page("descuentos", "descuentos");

        // --------------------------------------------------------------------------------------------------------
        // Google
        // --------------------------------------------------------------------------------------------------------
        /*
        add_menu_page(
            __("Google", "custom-editor-menu"),
            __("Google", "custom-editor-menu"), 
            "read", 
            "google", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/google/start"
                );
                exit();
            }, 
            $icon_base_url . "google.svg", 
            7 
        );

        // Integración
        add_submenu_page(
            "google", 
            __("Integración", "custom-editor-menu"),
            __("Integración", "custom-editor-menu"), 
            "read", 
            "google-integracion", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-admin&path=/google/start"
                );
                exit();
            } 
        );

        // Site Kit
        add_submenu_page(
            "google", 
            __("Site Kit", "custom-editor-menu"),
            __("Site Kit", "custom-editor-menu"), 
            "read", 
            "google-site-kit", 
            function () {
                wp_redirect("/backoffice/admin.php?page=googlesitekit-splash");
                exit();
            } 
        );
        remove_submenu_page("google", "google");
*/
        //	--------------------------------------------------------------------------------------------------------
        // Meta
        // --------------------------------------------------------------------------------------------------------
        /*
        add_menu_page(
            __("Meta", "custom-editor-menu"),
            __("Meta", "custom-editor-menu"), 
            "read", 
            "meta", 
            function () {
                wp_redirect("/backoffice/admin.php?page=wc-facebook");
                exit();
            }, 
            $icon_base_url . "meta.svg", 
            8 
        );

        // Facebook
        add_submenu_page(
            "meta", 
            __("Facebook", "custom-editor-menu"),
            __("Facebook", "custom-editor-menu"), 
            "read", 
            "meta-facebook", 
            function () {
                wp_redirect("/backoffice/admin.php?page=wc-facebook");
                exit();
            } 
        );

        // Pixel
        add_submenu_page(
            "meta", 
            __("Pixel", "custom-editor-menu"),
            __("Pixel", "custom-editor-menu"), 
            "read", 
            "meta-pixel", 
            function () {
                wp_redirect(
                    "/backoffice/options-general.php?page=facebook_pixel_options"
                );
                exit();
            } 
        );
*/
        //--------------------------------------------------------------------------------------------------------
        // TikTok
        // --------------------------------------------------------------------------------------------------------
        /*
        add_menu_page(
            __("TikTok", "custom-editor-menu"),
            __("TikTok", "custom-editor-menu"), 
            "read", 
            "tiktok", 
            function () {
                wp_redirect("/backoffice/admin.php?page=tiktok");
                exit();
            }, 
            $icon_base_url . "tiktok.svg", 
            9 
        );
        */
        // --------------------------------------------------------------------------------------------------------
        // WhatsApp
        // --------------------------------------------------------------------------------------------------------
        /*
        add_menu_page(
            __("WhatsApp", "custom-editor-menu"),
            __("WhatsApp", "custom-editor-menu"), 
            "read", 
            "whatsapp", 
            function () {
                wp_redirect("/backoffice/admin.php?page=click-to-chat");
                exit();
            }, 
            $icon_base_url . "whatsapp.svg", 
            10 
        );
        */
        // --------------------------------------------------------------------------------------------------------
        // Ajustes
        // --------------------------------------------------------------------------------------------------------
        /*
        add_submenu_page(
            "whatsapp", 
            __("Ajustes", "custom-editor-menu"),
            __("Ajustes", "custom-editor-menu"), 
            "read", 
            "whatsapp-ajustes", 
            function () {
                wp_redirect("/backoffice/admin.php?page=click-to-chat");
                exit();
            } 
        );

        // Saludos
        add_submenu_page(
            "whatsapp", 
            __("Saludos", "custom-editor-menu"),
            __("Saludos", "custom-editor-menu"), 
            "read", 
            "whatsapp-saludos", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=click-to-chat-greetings"
                );
                exit();
            } 
        );
        */
        //--------------------------------------------------------------------------------------------------------
        // Mailchimp
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Mailchimp", "custom-editor-menu"),
            __("Mailchimp", "custom-editor-menu"), 
            "read", 
            "mailchimp", 
            function () {
                wp_redirect("/backoffice/admin.php?page=mailchimp-woocommerce");
                exit();
            }, 
            $icon_base_url . "mailchimp.svg", 
            11 
        );

        // --------------------------------------------------------------------------------------------------------
        // Mercado Pago
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Mercado Pago", "custom-editor-menu"),
            __("Mercado Pago", "custom-editor-menu"), 
            "read", 
            "mercado-pago", 
            function () {
                wp_redirect("/backoffice/admin.php?page=mercadopago-settings");
                exit();
            }, 
            $icon_base_url . "mercado-pago.svg", 
            12 
        );

        // --------------------------------------------------------------------------------------------------------
        // Payway
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Payway", "custom-editor-menu"),
            __("Payway", "custom-editor-menu"), 
            "read", 
            "payway", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=payway_admin_promotions"
                );
                exit();
            }, 
            $icon_base_url . "payway.svg", 
            13 
        );

        // Promociones
        add_submenu_page(
            "payway", 
            __("Promociones", "custom-editor-menu"),
            __("Promociones", "custom-editor-menu"), 
            "read", 
            "payway-promociones", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=payway_admin_promotions"
                );
                exit();
            } 
        );

        // Bancos
        add_submenu_page(
            "payway", 
            __("Bancos", "custom-editor-menu"),
            __("Bancos", "custom-editor-menu"), 
            "read", 
            "payway-bancos", 
            function () {
                wp_redirect("/backoffice/admin.php?page=payway_admin_banks");
                exit();
            } 
        );

        // Tarjetas
        add_submenu_page(
            "payway", 
            __("Tarjetas", "custom-editor-menu"),
            __("Tarjetas", "custom-editor-menu"), 
            "read", 
            "payway-tarjetas", 
            function () {
                wp_redirect("/backoffice/admin.php?page=payway_admin_cards");
                exit();
            } 
        );

        // Ajustes
        /*
        add_submenu_page(
            "payway", 
            __("Ajustes", "custom-editor-menu"),
            __("Ajustes", "custom-editor-menu"), 
            "read", 
            "payway-ajustes", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-settings&tab=checkout&section=payway_gateway"
                );
                exit();
            } 
        );
        */

        remove_submenu_page("payway","payway");
        // --------------------------------------------------------------------------------------------------------
        // Transferencia Bancaria
        // --------------------------------------------------------------------------------------------------------
        /*
        add_menu_page(
            __("Transferencia Bancaria", "custom-editor-menu"),
            __("Transferencia Bancaria", "custom-editor-menu"), 
            "read", 
            "transferencia-bancaria", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-settings&tab=checkout&section=bacs"
                );
                exit();
            }, 
            $icon_base_url . "transferencia-bancaria.svg", 
            14 
        );
        */
        // --------------------------------------------------------------------------------------------------------
        // Correo Argentino
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Correo Argentino", "custom-editor-menu"),
            __("Correo Argentino", "custom-editor-menu"), 
            "read", 
            "correo-argentino", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=correoargentino-orders"
                );
                exit();
            }, 
            $icon_base_url . "correo-argentino.svg", 
            15 
        );

        // Órdenes
        /*
        add_submenu_page(
            "correo-argentino", 
            __("Órdenes", "custom-editor-menu"),
            __("Órdenes", "custom-editor-menu"), 
            "read", 
            "correo-argentino-ordenes", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=correoargentino-orders"
                );
                exit();
            } 
        );

        // Conexión API
        add_submenu_page(
            "correo-argentino", 
            __("Conexión API", "custom-editor-menu"),
            __("Conexión API", "custom-editor-menu"), 
            "read", 
            "correo-argentino-conexion-api", 
            function () {
                wp_redirect(
                    "/backoffice/admin.php?page=wc-settings&tab=shipping&section=correoargentino_shipping_method&form=service-selector"
                );
                exit();
            } 
        );
        */
        // --------------------------------------------------------------------------------------------------------
        // Páginas
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Páginas", "custom-editor-menu"),
            __("Páginas", "custom-editor-menu"), 
            "read", 
            "paginas", 
            function () {
                wp_redirect("/backoffice/edit.php?post_type=page");
                exit();
            }, 
            $icon_base_url . "paginas.svg", 
            16 
        );

        // Añadir nueva página
        add_submenu_page(
            "paginas", 
            __("Añadir nueva página", "custom-editor-menu"),
            __("Añadir nueva página", "custom-editor-menu"), 
            "read", 
            "paginas-anadir-nueva-pagina", 
            function () {
                wp_redirect("/backoffice/post-new.php?post_type=page");
                exit();
            } 
        );

        remove_submenu_page("paginas","paginas");

        // --------------------------------------------------------------------------------------------------------
        // Medios
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Archivos", "custom-editor-menu"),
            __("Archivos", "custom-editor-menu"), 
            "read", 
            "archivos", 
            function () {
                wp_redirect("/backoffice/upload.php");
                exit();
            }, 
            $icon_base_url . "medios.svg", 
            17 
        );

        // Biblioteca
        /*
        add_submenu_page(
            "medios", 
            __("Biblioteca", "custom-editor-menu"),
            __("Biblioteca", "custom-editor-menu"), 
            "read", 
            "medios-biblioteca", 
            function () {
                wp_redirect("/backoffice/upload.php");
                exit();
            } 
        );

        // Añadir nuevo archivo de medios
        add_submenu_page(
            "medios", 
            __("Añadir nuevo archivo de medios", "custom-editor-menu"),
            __("Añadir nuevo archivo de medios", "custom-editor-menu"), 
            "read", 
            "medios-anadir-nuevo-archivo-de-medios", 
            function () {
                wp_redirect("/backoffice/media-new.php");
                exit();
            } 
        );
        */
        remove_submenu_page("archivos","archivos");
        // --------------------------------------------------------------------------------------------------------
        // Apariencia
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Apariencia", "custom-editor-menu"),
            __("Apariencia", "custom-editor-menu"), 
            "read", 
            "apariencia", 
            function () {
                wp_redirect("/backoffice/nav-menus.php");
                exit();
            }, 
            $icon_base_url . "apariencia.svg", 
            18 
        );

        // Menús
        add_submenu_page(
            "apariencia", 
            __("Menús", "custom-editor-menu"),
            __("Menús", "custom-editor-menu"), 
            "read", 
            "apariencia-menus", 
            function () {
                wp_redirect("/backoffice/nav-menus.php");
                exit();
            } 
        );

        // Favicon
        add_submenu_page(
            "apariencia", 
            __("Favicon", "custom-editor-menu"),
            __("Favicon", "custom-editor-menu"), 
            "read", 
            "apariencia-favicon", 
            function () {
                wp_redirect(
                    "/backoffice/themes.php?page=favicon-by-realfavicongenerator/admin/class-favicon-by-realfavicongenerator-admin.phpfavicon_appearance_menu"
                );
                exit();
            } 
        );

        remove_submenu_page("apariencia","apariencia");

        // --------------------------------------------------------------------------------------------------------
        // Usuarios
        // --------------------------------------------------------------------------------------------------------
        add_menu_page(
            __("Mi Perfil", "custom-editor-menu"),
            __("Mi Perfil", "custom-editor-menu"), 
            "read", 
            "mi-perfil", 
            function () {
                wp_redirect("/backoffice/profile.php");
                exit();
            }, 
            $icon_base_url . "usuarios.svg", 
            19 
        );

        // Herramientas
        /*
        add_menu_page(
            __("Herramientas 2", "custom-editor-menu"),
            __("Herramientas", "custom-editor-menu"), 
            "read", 
            "herramientas", 
            function () {
                wp_redirect("/backoffice/import.php");
                exit();
            }, 
            $icon_base_url . "herramientas.svg", 
            20 
        );

        // Importar
        add_submenu_page(
            "herramientas", 
            __("Importar", "custom-editor-menu"),
            __("Importar", "custom-editor-menu"), 
            "read", 
            "herramientas-importar", 
            function () {
                wp_redirect("/backoffice/import.php");
                exit();
            } 
        );

        // Exportar
        add_submenu_page(
            "herramientas", 
            __("Exportar", "custom-editor-menu"),
            __("Exportar", "custom-editor-menu"), 
            "read", 
            "herramientas-exportar", 
            function () {
                wp_redirect("/backoffice/export.php");
                exit();
            } 
        );
        */
        }
    return;
}
