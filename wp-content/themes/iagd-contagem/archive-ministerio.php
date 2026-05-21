<?php
/**
 * Template archive for ministérios.
 */
if (! defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main class="site-main">
  <section class="section section-light">
    <div class="container">
      <span class="mini-meta">Ministérios</span>
      <h1 class="section-title">Ministérios da igreja</h1>
      <p class="section-subtitle">Conheça as áreas de cuidado, discipulado e serviço da Igreja Apostólica da Graça Contagem.</p>
      <?php if (have_posts()) : ?>
        <div class="archive-list">
          <?php while (have_posts()) : the_post(); ?>
            <article class="card">
              <h3><?php the_title(); ?></h3>
              <p><?php echo esc_html(get_the_excerpt() ?: wp_trim_words(get_the_content(), 22)); ?></p>
              <a class="btn btn-primary" href="<?php the_permalink(); ?>">Conhecer ministério</a>
            </article>
          <?php endwhile; ?>
        </div>
      <?php else : ?>
        <div class="card"><p>Cadastre ministérios no painel para exibir aqui.</p></div>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
