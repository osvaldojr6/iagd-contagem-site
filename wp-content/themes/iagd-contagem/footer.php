<?php if (! defined('ABSPATH')) { exit; } ?>
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div>
        <h3><?php bloginfo('name'); ?></h3>
        <p>Igreja Apostólica da Graça Contagem. Um lugar para conhecer Jesus, crescer em fé e viver em família.</p>
      </div>
      <div>
        <h3>Contato</h3>
        <p><?php echo esc_html(iagd_contagem_get_option('church_phone', '(00) 0000-0000')); ?></p>
        <p><?php echo esc_html(iagd_contagem_get_option('church_whatsapp', '(00) 00000-0000')); ?></p>
        <p><?php echo esc_html(iagd_contagem_get_option('church_address', 'Contagem - MG')); ?></p>
      </div>
      <div>
        <h3>Contribua</h3>
        <p>PIX: <?php echo esc_html(iagd_contagem_get_option('church_pix', 'cadastre a chave PIX no personalizador')); ?></p>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. Todos os direitos reservados.</p>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
