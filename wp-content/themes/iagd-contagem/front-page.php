<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="site-main">
  <section class="hero">
    <div class="container hero-grid">
      <div>
        <p class="highlight">Bem-vindo à</p>
        <h2>Igreja Apostólica da Graça Contagem</h2>
        <p>Uma comunidade cristã com culto, comunhão, discipulado e serviço. Participe dos nossos encontros, conheça os ministérios e caminhe conosco em fé.</p>
        <div style="display:flex; gap:12px; flex-wrap:wrap;">
          <a class="btn btn-primary" href="<?php echo esc_url(iagd_contagem_get_option('church_live_url', '#')); ?>">Assistir transmissão</a>
          <a class="btn btn-secondary" href="#contato">Venha nos visitar</a>
        </div>
      </div>
      <div class="hero-card">
        <h3>Horários dos cultos</h3>
        <p><strong>Domingo</strong> — 9h e 18h</p>
        <p><strong>Quarta-feira</strong> — 19h30</p>
        <p><strong>Sexta-feira</strong> — Culto de oração às 19h30</p>
        <a class="btn btn-primary" href="#agenda">Ver agenda</a>
      </div>
    </div>
  </section>

  <section class="cta-band">
    Venha viver fé, comunhão e propósito conosco em Contagem.
  </section>

  <section class="section">
    <div class="container">
      <h2 class="section-title">Quem somos</h2>
      <p class="section-subtitle">A Igreja Apostólica da Graça Contagem existe para anunciar o evangelho, acolher pessoas, formar discípulos e servir a cidade com amor, verdade e excelência.</p>
      <div class="grid grid-2">
        <div class="card">
          <h3>Nossa missão</h3>
          <p>Levar pessoas a um relacionamento real com Jesus, promovendo crescimento espiritual, vida em comunidade e transformação através da Palavra.</p>
        </div>
        <div class="card">
          <h3>Nossa visão</h3>
          <p>Ser uma igreja relevante, bíblica e acolhedora, comprometida com adoração, discipulado, serviço e expansão do Reino de Deus.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="agenda" class="section section-light">
    <div class="container">
      <h2 class="section-title">Caminhos de conexão</h2>
      <p class="section-subtitle">Participe da vida da igreja por meio dos nossos cultos, ministérios, grupos, batismo e voluntariado.</p>
      <div class="grid grid-4">
        <div class="card"><h3>Grupos</h3><p>Encontre comunhão, discipulado e cuidado em pequenos grupos.</p></div>
        <div class="card"><h3>Batismo</h3><p>Dê seu próximo passo público de fé em Cristo.</p></div>
        <div class="card"><h3>Seja membro</h3><p>Conheça o processo de integração e membresia.</p></div>
        <div class="card"><h3>Voluntariado</h3><p>Use seus dons e talentos para servir com propósito.</p></div>
      </div>
    </div>
  </section>

  <section class="section section-dark">
    <div class="container">
      <h2 class="section-title">Ministérios</h2>
      <p class="section-subtitle">Áreas de cuidado, serviço e desenvolvimento para todas as idades.</p>
      <div class="grid grid-3">
        <div class="card"><h3>Infantil</h3><p>Ensino bíblico com alegria e cuidado para crianças.</p></div>
        <div class="card"><h3>Jovens</h3><p>Ambiente de crescimento, comunhão e propósito.</p></div>
        <div class="card"><h3>Louvor</h3><p>Adoração com excelência e sensibilidade espiritual.</p></div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <h2 class="section-title">Mensagem em destaque</h2>
      <p class="section-subtitle">Acompanhe nossas ministrações e fortaleça sua fé durante a semana.</p>
      <div class="grid grid-2">
        <div class="card">
          <h3>Última mensagem</h3>
          <p>Adicione aqui o vídeo principal do YouTube ou o resumo da última ministração.</p>
          <a class="btn btn-primary" href="<?php echo esc_url(iagd_contagem_get_option('church_youtube', '#')); ?>">Ver canal</a>
        </div>
        <div class="card">
          <h3>Pedidos de oração</h3>
          <form class="form-grid">
            <input type="text" placeholder="Seu nome">
            <input type="email" placeholder="Seu e-mail">
            <textarea placeholder="Escreva seu pedido de oração"></textarea>
            <button class="btn btn-primary" type="button">Enviar pedido</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-light">
    <div class="container">
      <h2 class="section-title">Contribua</h2>
      <p class="section-subtitle">Sua contribuição fortalece a obra e amplia o alcance da missão da igreja.</p>
      <div class="card">
        <p><strong>Chave PIX:</strong> <?php echo esc_html(iagd_contagem_get_option('church_pix', 'defina a chave PIX no personalizador')); ?></p>
      </div>
    </div>
  </section>

  <section id="contato" class="section">
    <div class="container">
      <h2 class="section-title">Contato</h2>
      <div class="grid grid-2">
        <div class="card">
          <h3>Informações</h3>
          <p><strong>Telefone:</strong> <?php echo esc_html(iagd_contagem_get_option('church_phone', '(00) 0000-0000')); ?></p>
          <p><strong>WhatsApp:</strong> <?php echo esc_html(iagd_contagem_get_option('church_whatsapp', '(00) 00000-0000')); ?></p>
          <p><strong>Endereço:</strong> <?php echo esc_html(iagd_contagem_get_option('church_address', 'Contagem - MG')); ?></p>
        </div>
        <div class="card">
          <h3>Redes sociais</h3>
          <p><a href="<?php echo esc_url(iagd_contagem_get_option('church_instagram', '#')); ?>">Instagram</a></p>
          <p><a href="<?php echo esc_url(iagd_contagem_get_option('church_youtube', '#')); ?>">YouTube</a></p>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
