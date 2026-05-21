<?php
/*
Template Name: Quem Somos
*/
if (! defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main class="site-main">
  <section class="section">
    <div class="container content-area">
      <span class="mini-meta">Institucional</span>
      <h1 class="section-title"><?php the_title(); ?></h1>
      <div class="card">
        <?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
