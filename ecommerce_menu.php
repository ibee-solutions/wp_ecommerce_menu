<?php
/**
 * Plugin Name: iBee Ecommerce Menu
 * Description: Adds a custom admin menu with configurable options.
 * Version: 1.0
 * Author: Nicolas Dominguez
 */

// Define the menu structure
// EDIT THIS SECTION WHEN VALUES BECOME KNOWN
const CUSTOM_MENU_STRUCTURE = [
    'main' => [
        'page_title'  => 'Main Menu Title',
        'menu_title'  => 'Main Menu',
        'capability'  => 'manage_options',
        'menu_slug'   => 'custom-main-menu',
        'callback'    => 'custom_main_menu_page',
        'icon'        => 'dashicons-admin-generic',
        'position'    => 2,
    ],
    'children' => [
        [
            'page_title' => 'Child Page 1',
            'menu_title' => 'Child Menu 1',
            'capability' => 'manage_options',
            'menu_slug'  => 'custom-child-menu-1',
            'callback'   => 'custom_child_menu_page_1',
        ],
        [
            'page_title' => 'Child Page 2',
            'menu_title' => 'Child Menu 2',
            'capability' => 'manage_options',
            'menu_slug'  => 'custom-child-menu-2',
            'callback'   => 'custom_child_menu_page_2',
        ],
    ],
];

// Hook to admin_menu to register menu items
add_action('admin_menu', 'custom_menu_plugin_register');

function custom_menu_plugin_register() {
    // Register main menu
    $main_menu = CUSTOM_MENU_STRUCTURE['main'];
    add_menu_page(
        $main_menu['page_title'],
        $main_menu['menu_title'],
        $main_menu['capability'],
        $main_menu['menu_slug'],
        $main_menu['callback'],
        $main_menu['icon'],
        $main_menu['position']
    );

    // Register child menus
    foreach (CUSTOM_MENU_STRUCTURE['children'] as $child) {
        add_submenu_page(
            $main_menu['menu_slug'], // Parent slug
            $child['page_title'],
            $child['menu_title'],
            $child['capability'],
            $child['menu_slug'],
            $child['callback']
        );
    }
}

// Callback function for main menu page
function custom_main_menu_page() {
    echo '<h1>Main Menu Page</h1>';
    echo '<p>EDIT THIS CONTENT FROM wp_ecommerce_menu PLUGIN FILES</p>';
}

// Callback function for child menu 1
function custom_child_menu_page_1() {
    echo '<h1>Child Menu 1 Page</h1>';
    echo '<p>EDIT THIS CONTENT FROM wp_ecommerce_menu PLUGIN FILES</p>';
}

// Callback function for child menu 2
function custom_child_menu_page_2() {
    echo '<h1>Child Menu 2 Page</h1>';
    echo '<p>EDIT THIS CONTENT FROM wp_ecommerce_menu PLUGIN FILES</p>';
}
