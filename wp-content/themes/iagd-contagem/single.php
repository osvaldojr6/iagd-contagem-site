<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="site-main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="section">
      <div class="container">
        <h1 class="section-title"><?php the_title(); ?></h1>
        <p><?php echo esc_html(get_the_date()); ?></p>
        <div class="content-area">
          <?php the_content(); ?>
        </div>
      </div>
    </section>
  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
