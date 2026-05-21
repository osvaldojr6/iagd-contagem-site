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
    wp_enqueue_style('iagd-contagem-style', get_stylesheet_uri(), [], '4.1.0');
    wp_enqueue_script('iagd-contagem-script', get_template_directory_uri() . '/assets/js/main.js', [], '4.1.0', true);
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
        'church_map_embed' => 'Embed do mapa (iframe)',
        'church_cnpj' => 'CNPJ',
        'church_first_visit_url' => 'URL Primeira Visita',
        'church_donation_text' => 'Texto de doações',
        'church_logo_text' => 'Texto complementar do logo',
        'church_youtube_embed' => 'Embed da transmissão (iframe)',
    ];

    foreach ($settings as $key => $label) {
        $wp_customize->add_setting($key, [
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        ]);

        $wp_customize->add_control($key, [
            'label'   => __($label, 'iagd-contagem'),
            'section' => 'iagd_contagem_theme_options',
            'type'    => 'textarea',
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
        'labels' => ['name' => __('Ministérios', 'iagd-contagem'), 'singular_name' => __('Ministério', 'iagd-contagem')],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'rewrite' => ['slug' => 'ministerios'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ]);

    register_post_type('evento', [
        'labels' => ['name' => __('Eventos', 'iagd-contagem'), 'singular_name' => __('Evento', 'iagd-contagem')],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'rewrite' => ['slug' => 'eventos'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ]);

    register_post_type('mensagem', [
        'labels' => ['name' => __('Mensagens', 'iagd-contagem'), 'singular_name' => __('Mensagem', 'iagd-contagem')],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-audio',
        'rewrite' => ['slug' => 'mensagens'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ]);

    register_post_type('celula', [
        'labels' => ['name' => __('Células', 'iagd-contagem'), 'singular_name' => __('Célula', 'iagd-contagem')],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-networking',
        'rewrite' => ['slug' => 'celulas'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
        'show_in_rest' => true,
        'hierarchical' => true,
    ]);
}
add_action('init', 'iagd_contagem_register_post_types');

function iagd_contagem_register_meta_boxes() {
    add_meta_box('iagd_evento_meta', __('Detalhes do Evento', 'iagd-contagem'), 'iagd_contagem_evento_meta_box', 'evento', 'normal', 'high');
    add_meta_box('iagd_mensagem_meta', __('Detalhes da Mensagem', 'iagd-contagem'), 'iagd_contagem_mensagem_meta_box', 'mensagem', 'normal', 'high');
    add_meta_box('iagd_ministerio_meta', __('Detalhes do Ministério', 'iagd-contagem'), 'iagd_contagem_ministerio_meta_box', 'ministerio', 'normal', 'high');
    add_meta_box('iagd_celula_meta', __('Detalhes da Célula', 'iagd-contagem'), 'iagd_contagem_celula_meta_box', 'celula', 'normal', 'high');
}
add_action('add_meta_boxes', 'iagd_contagem_register_meta_boxes');

function iagd_contagem_evento_meta_box($post) {
    wp_nonce_field('iagd_save_evento_meta', 'iagd_evento_nonce');
    $date = get_post_meta($post->ID, '_iagd_event_date', true);
    $time = get_post_meta($post->ID, '_iagd_event_time', true);
    $place = get_post_meta($post->ID, '_iagd_event_place', true);
    $link = get_post_meta($post->ID, '_iagd_event_link', true);
    echo '<p><label>Data</label><br><input type="date" name="iagd_event_date" value="' . esc_attr($date) . '" style="width:100%"></p>';
    echo '<p><label>Horário</label><br><input type="text" name="iagd_event_time" value="' . esc_attr($time) . '" style="width:100%" placeholder="19h30"></p>';
    echo '<p><label>Local</label><br><input type="text" name="iagd_event_place" value="' . esc_attr($place) . '" style="width:100%"></p>';
    echo '<p><label>Link de inscrição</label><br><input type="url" name="iagd_event_link" value="' . esc_attr($link) . '" style="width:100%"></p>';
}

function iagd_contagem_mensagem_meta_box($post) {
    wp_nonce_field('iagd_save_mensagem_meta', 'iagd_mensagem_nonce');
    $speaker = get_post_meta($post->ID, '_iagd_message_speaker', true);
    $video = get_post_meta($post->ID, '_iagd_message_video', true);
    $series = get_post_meta($post->ID, '_iagd_message_series', true);
    echo '<p><label>Pregador</label><br><input type="text" name="iagd_message_speaker" value="' . esc_attr($speaker) . '" style="width:100%"></p>';
    echo '<p><label>Série</label><br><input type="text" name="iagd_message_series" value="' . esc_attr($series) . '" style="width:100%"></p>';
    echo '<p><label>URL do vídeo (YouTube)</label><br><input type="url" name="iagd_message_video" value="' . esc_attr($video) . '" style="width:100%"></p>';
}

function iagd_contagem_ministerio_meta_box($post) {
    wp_nonce_field('iagd_save_ministerio_meta', 'iagd_ministerio_nonce');
    $leader = get_post_meta($post->ID, '_iagd_ministry_leader', true);
    $schedule = get_post_meta($post->ID, '_iagd_ministry_schedule', true);
    $contact = get_post_meta($post->ID, '_iagd_ministry_contact', true);
    echo '<p><label>Líder</label><br><input type="text" name="iagd_ministry_leader" value="' . esc_attr($leader) . '" style="width:100%"></p>';
    echo '<p><label>Horário/Encontro</label><br><input type="text" name="iagd_ministry_schedule" value="' . esc_attr($schedule) . '" style="width:100%"></p>';
    echo '<p><label>Contato</label><br><input type="text" name="iagd_ministry_contact" value="' . esc_attr($contact) . '" style="width:100%"></p>';
}

function iagd_contagem_celula_meta_box($post) {
    wp_nonce_field('iagd_save_celula_meta', 'iagd_celula_nonce');
    $leader = get_post_meta($post->ID, '_iagd_celula_lider', true);
    $meeting = get_post_meta($post->ID, '_iagd_celula_encontro', true);
    $address = get_post_meta($post->ID, '_iagd_celula_endereco', true);
    echo '<p><label>Líder da célula</label><br><input type="text" name="iagd_celula_lider" value="' . esc_attr($leader) . '" style="width:100%"></p>';
    echo '<p><label>Dia/Horário do encontro</label><br><input type="text" name="iagd_celula_encontro" value="' . esc_attr($meeting) . '" style="width:100%"></p>';
    echo '<p><label>Endereço / Região</label><br><input type="text" name="iagd_celula_endereco" value="' . esc_attr($address) . '" style="width:100%"></p>';
    echo '<p>Use o campo <strong>Atributos da página > Pai</strong> para montar o organograma em níveis como pai, filho e neto.</p>';
}

function iagd_contagem_save_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['iagd_evento_nonce']) && wp_verify_nonce($_POST['iagd_evento_nonce'], 'iagd_save_evento_meta')) {
        update_post_meta($post_id, '_iagd_event_date', sanitize_text_field($_POST['iagd_event_date'] ?? ''));
        update_post_meta($post_id, '_iagd_event_time', sanitize_text_field($_POST['iagd_event_time'] ?? ''));
        update_post_meta($post_id, '_iagd_event_place', sanitize_text_field($_POST['iagd_event_place'] ?? ''));
        update_post_meta($post_id, '_iagd_event_link', esc_url_raw($_POST['iagd_event_link'] ?? ''));
    }

    if (isset($_POST['iagd_mensagem_nonce']) && wp_verify_nonce($_POST['iagd_mensagem_nonce'], 'iagd_save_mensagem_meta')) {
        update_post_meta($post_id, '_iagd_message_speaker', sanitize_text_field($_POST['iagd_message_speaker'] ?? ''));
        update_post_meta($post_id, '_iagd_message_series', sanitize_text_field($_POST['iagd_message_series'] ?? ''));
        update_post_meta($post_id, '_iagd_message_video', esc_url_raw($_POST['iagd_message_video'] ?? ''));
    }

    if (isset($_POST['iagd_ministerio_nonce']) && wp_verify_nonce($_POST['iagd_ministerio_nonce'], 'iagd_save_ministerio_meta')) {
        update_post_meta($post_id, '_iagd_ministry_leader', sanitize_text_field($_POST['iagd_ministry_leader'] ?? ''));
        update_post_meta($post_id, '_iagd_ministry_schedule', sanitize_text_field($_POST['iagd_ministry_schedule'] ?? ''));
        update_post_meta($post_id, '_iagd_ministry_contact', sanitize_text_field($_POST['iagd_ministry_contact'] ?? ''));
    }

    if (isset($_POST['iagd_celula_nonce']) && wp_verify_nonce($_POST['iagd_celula_nonce'], 'iagd_save_celula_meta')) {
        update_post_meta($post_id, '_iagd_celula_lider', sanitize_text_field($_POST['iagd_celula_lider'] ?? ''));
        update_post_meta($post_id, '_iagd_celula_encontro', sanitize_text_field($_POST['iagd_celula_encontro'] ?? ''));
        update_post_meta($post_id, '_iagd_celula_endereco', sanitize_text_field($_POST['iagd_celula_endereco'] ?? ''));
    }
}
add_action('save_post', 'iagd_contagem_save_meta');

function iagd_contagem_render_celula_tree($parent_id = 0, $level = 0) {
    $items = get_posts([
        'post_type' => 'celula',
        'posts_per_page' => -1,
        'post_parent' => $parent_id,
        'orderby' => 'menu_order title',
        'order' => 'ASC',
    ]);

    if (! $items) {
        return '';
    }

    $html = '<ul class="org-tree level-' . intval($level) . '">';
    foreach ($items as $item) {
        $leader = get_post_meta($item->ID, '_iagd_celula_lider', true);
        $meeting = get_post_meta($item->ID, '_iagd_celula_encontro', true);
        $address = get_post_meta($item->ID, '_iagd_celula_endereco', true);
        $thumb = get_the_post_thumbnail($item->ID, 'thumbnail', ['class' => 'org-avatar']);
        $html .= '<li>';
        $html .= '<div class="org-card level-' . intval($level) . '">';
        $html .= '<span class="org-badge">Nível ' . intval($level + 1) . '</span>';
        if ($thumb) {
            $html .= $thumb;
        } else {
            $html .= '<div class="org-avatar org-avatar-placeholder">C</div>';
        }
        $html .= '<h3>' . esc_html(get_the_title($item)) . '</h3>';
        if ($leader) {
            $html .= '<p><strong>Líder:</strong> ' . esc_html($leader) . '</p>';
        }
        if ($meeting) {
            $html .= '<p><strong>Encontro:</strong> ' . esc_html($meeting) . '</p>';
        }
        if ($address) {
            $html .= '<p><strong>Região:</strong> ' . esc_html($address) . '</p>';
        }
        $html .= '<p><a class="btn btn-dark" href="' . esc_url(get_permalink($item)) . '">Ver célula</a></p>';
        $html .= '</div>';
        $html .= iagd_contagem_render_celula_tree($item->ID, $level + 1);
        $html .= '</li>';
    }
    $html .= '</ul>';

    return $html;
}
