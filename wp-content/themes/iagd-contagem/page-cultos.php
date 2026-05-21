<?php
/*
Template Name: Cultos
*/
if (! defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main class="site-main">
  <section class="section section-dark">
    <div class="container">
      <span class="mini-meta">Cultos</span>
      <h1 class="section-title"><?php the_title(); ?></h1>
      <div class="grid grid-3">
        <div class="card"><h3>Domingo Manhã</h3><p>9h</p></div>
        <div class="card"><h3>Domingo Noite</h3><p>18h</p></div>
        <div class="card"><h3>Quarta-feira</h3><p>19h30</p></div>
      </div>
      <div class="card" style="margin-top:24px;">
        <?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
