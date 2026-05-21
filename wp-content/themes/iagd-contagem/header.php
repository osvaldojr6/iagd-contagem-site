<?php if (! defined('ABSPATH')) { exit; } ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
  <div class="container header-inner">
    <div class="branding">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php echo esc_html(iagd_contagem_get_option('church_logo_text', 'Igreja Apostólica da Graça Contagem')); ?></p>
      </a>
    </div>

    <button class="menu-toggle" aria-expanded="false" aria-controls="primary-menu">Menu</button>

    <nav id="primary-menu" class="main-navigation" aria-label="Menu principal">
      <?php
      wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'fallback_cb'    => function () {
              echo '<ul>';
              echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
              echo '<li><a href="' . esc_url(home_url('/quem-somos')) . '">Quem Somos</a></li>';
              echo '<li><a href="' . esc_url(home_url('/cultos')) . '">Cultos</a></li>';
              echo '<li><a href="' . esc_url(get_post_type_archive_link('celula')) . '">Células</a></li>';
              echo '<li><a href="' . esc_url(get_post_type_archive_link('ministerio')) . '">Ministérios</a></li>';
              echo '<li><a href="' . esc_url(get_post_type_archive_link('evento')) . '">Eventos</a></li>';
              echo '<li><a href="' . esc_url(get_post_type_archive_link('mensagem')) . '">Mensagens</a></li>';
              echo '<li><a href="' . esc_url(home_url('/contato')) . '">Contato</a></li>';
              echo '</ul>';
          },
      ]);
      ?>
    </nav>

    <div class="header-actions">
      <a class="btn btn-primary" href="<?php echo esc_url(iagd_contagem_get_option('church_live_url', '#')); ?>">Assista ao vivo</a>
    </div>
  </div>
</header>
