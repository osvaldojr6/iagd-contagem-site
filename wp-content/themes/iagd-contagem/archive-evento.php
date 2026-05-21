<?php
/**
 * Template archive for eventos.
 */
if (! defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main class="site-main">
  <section class="section">
    <div class="container">
      <span class="mini-meta">Eventos</span>
      <h1 class="section-title">Próximos eventos</h1>
      <p class="section-subtitle">Acompanhe conferências, cultos especiais, encontros e programações da igreja.</p>
      <?php if (have_posts()) : ?>
        <div class="archive-list">
          <?php while (have_posts()) : the_post(); ?>
            <article class="card">
              <h3><?php the_title(); ?></h3>
              <p><?php echo esc_html(get_the_excerpt() ?: wp_trim_words(get_the_content(), 22)); ?></p>
              <a class="btn btn-primary" href="<?php the_permalink(); ?>">Ver evento</a>
            </article>
          <?php endwhile; ?>
        </div>
      <?php else : ?>
        <div class="card"><p>Cadastre eventos no painel para exibir aqui.</p></div>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
