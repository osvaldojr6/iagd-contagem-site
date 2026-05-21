<?php
/**
 * Template archive for células.
 */
if (! defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main class="site-main">
  <section class="section section-light">
    <div class="container">
      <span class="mini-meta">Células</span>
      <h1 class="section-title">Organograma de células</h1>
      <p class="section-subtitle">Cadastre as células no painel e defina a relação hierárquica usando o campo Pai para representar níveis como pai, filho e neto.</p>
      <div class="card" style="overflow:auto;">
        <?php echo iagd_contagem_render_celula_tree(0); ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
