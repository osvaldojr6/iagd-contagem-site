<?php
/*
Template Name: Contato
*/
if (! defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main class="site-main">
  <section class="section">
    <div class="container">
      <span class="mini-meta">Contato</span>
      <h1 class="section-title"><?php the_title(); ?></h1>
      <div class="grid grid-2">
        <div class="card">
          <h3>Fale conosco</h3>
          <form class="form-grid">
            <input type="text" placeholder="Seu nome">
            <input type="email" placeholder="Seu e-mail">
            <input type="text" placeholder="Seu telefone">
            <textarea placeholder="Escreva sua mensagem"></textarea>
            <button type="button" class="btn btn-primary">Enviar</button>
          </form>
          <p style="margin-top:12px;">Para formulário funcional, integre com WPForms, Fluent Forms ou Contact Form 7.</p>
        </div>
        <div class="card embed-box">
          <h3>Informações</h3>
          <div class="meta-list">
            <div><strong>Telefone:</strong> <?php echo esc_html(iagd_contagem_get_option('church_phone', '')); ?></div>
            <div><strong>WhatsApp:</strong> <?php echo esc_html(iagd_contagem_get_option('church_whatsapp', '')); ?></div>
            <div><strong>E-mail:</strong> <?php echo esc_html(iagd_contagem_get_option('church_email', '')); ?></div>
            <div><strong>Endereço:</strong> <?php echo esc_html(iagd_contagem_get_option('church_address', '')); ?></div>
          </div>
          <div style="margin-top:20px;">
            <?php echo wp_kses_post(iagd_contagem_get_option('church_map_embed', '<p>Adicione o mapa no personalizador.</p>')); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
