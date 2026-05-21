<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="site-main">
  <section class="section">
    <div class="container content-area">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <span class="mini-meta"><?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name ?? 'Conteúdo'); ?></span>
        <h1 class="section-title"><?php the_title(); ?></h1>
        <?php if (has_post_thumbnail()) : ?>
          <div style="margin-bottom:24px; border-radius:20px; overflow:hidden;">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>
        <div class="content-area">
          <?php the_content(); ?>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
