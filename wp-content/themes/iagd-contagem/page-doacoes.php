<?php
/*
Template Name: Doações
*/
if (! defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main class="site-main">
  <section class="section section-light">
    <div class="container">
      <span class="mini-meta">Doações</span>
      <h1 class="section-title"><?php the_title(); ?></h1>
      <div class="grid grid-2">
        <div class="card">
          <h3>Contribua com a obra</h3>
          <p><?php echo wp_kses_post(iagd_contagem_get_option('church_donation_text', 'Sua contribuição fortalece a missão da igreja.')); ?></p>
          <p><strong>PIX:</strong> <?php echo esc_html(iagd_contagem_get_option('church_pix', '')); ?></p>
          <p><strong>CNPJ:</strong> <?php echo esc_html(iagd_contagem_get_option('church_cnpj', '')); ?></p>
        </div>
        <div class="card">
          <h3>Orientações</h3>
          <p>Use esta página para informar formas de contribuição, campanhas específicas, projetos missionários e prestação de contas resumida.</p>
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('/contato')); ?>">Falar com a igreja</a>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
