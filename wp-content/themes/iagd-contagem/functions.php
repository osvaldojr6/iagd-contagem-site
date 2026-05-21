<?php
if (! defined('ABSPATH')) {
    exit;
}

function iagd_contagem_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('editor-styles');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

    register_nav_menus([
        'primary' => __('Menu Principal', 'iagd-contagem'),
        'footer'  => __('Menu Rodapé', 'iagd-contagem'),
    ]);
}
add_action('after_setup_theme', 'iagd_contagem_setup');

function iagd_contagem_assets() {
    wp_enqueue_style('iagd-contagem-style', get_stylesheet_uri(), [], '2.0.0');
    wp_enqueue_script('iagd-contagem-script', get_template_directory_uri() . '/assets/js/main.js', [], '2.0.0', true);
}
add_action('wp_enqueue_scripts', 'iagd_contagem_assets');

function iagd_contagem_customize_register($wp_customize) {
    $wp_customize->add_section('iagd_contagem_theme_options', [
        'title'    => __('Informações da Igreja', 'iagd-contagem'),
        'priority' => 30,
    ]);

    $settings = [
        'church_phone' => 'Telefone',
        'church_whatsapp' => 'WhatsApp',
        'church_address' => 'Endereço',
        'church_city' => 'Cidade/Estado',
        'church_email' => 'E-mail',
        'church_youtube' => 'YouTube URL',
        'church_instagram' => 'Instagram URL',
        'church_facebook' => 'Facebook URL',
        'church_live_url' => 'URL da transmissão ao vivo',
        'church_pix' => 'Chave PIX',
        'church_hero_text' => 'Texto principal da Home',
        'church_hero_subtext' => 'Subtítulo da Home',
    ];

    foreach ($settings as $key => $label) {
        $wp_customize->add_setting($key, [
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control($key, [
            'label'   => __($label, 'iagd-contagem'),
            'section' => 'iagd_contagem_theme_options',
            'type'    => 'text',
        ]);
    }
}
add_action('customize_register', 'iagd_contagem_customize_register');

function iagd_contagem_get_option($key, $default = '') {
    $value = get_theme_mod($key, $default);
    return $value ?: $default;
}

function iagd_contagem_register_post_types() {
    register_post_type('ministerio', [
        'labels' => [
            'name' => __('Ministérios', 'iagd-contagem'),
            'singular_name' => __('Ministério', 'iagd-contagem'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'rewrite' => ['slug' => 'ministerios'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ]);

    register_post_type('evento', [
        'labels' => [
            'name' => __('Eventos', 'iagd-contagem'),
            'singular_name' => __('Evento', 'iagd-contagem'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'rewrite' => ['slug' => 'eventos'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ]);

    register_post_type('mensagem', [
        'labels' => [
            'name' => __('Mensagens', 'iagd-contagem'),
            'singular_name' => __('Mensagem', 'iagd-contagem'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-audio',
        'rewrite' => ['slug' => 'mensagens'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'iagd_contagem_register_post_types');
