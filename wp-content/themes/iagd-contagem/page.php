<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="site-main">
  <section class="section">
    <div class="container">
      <span class="mini-meta">Página</span>
      <h1 class="section-title"><?php the_title(); ?></h1>
      <div class="content-area">
        <?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
