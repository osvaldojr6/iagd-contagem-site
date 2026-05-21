<?php
/*
Template Name: Preview Demo
*/
if (! defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main class="site-main">
  <section class="hero">
    <div class="container hero-grid">
      <div>
        <span class="mini-meta">Pré-visualização</span>
        <h2>Igreja Apostólica da Graça Contagem</h2>
        <p>Uma comunidade cristã acolhedora, bíblica e comprometida com a Palavra, a comunhão e o serviço. Este conteúdo é demonstrativo para avaliação visual do projeto.</p>
        <div style="display:flex; gap:12px; flex-wrap:wrap;">
          <a class="btn btn-primary" href="#ministerios">Ver ministérios</a>
          <a class="btn btn-secondary" href="#contato">Fale conosco</a>
        </div>
      </div>
      <div class="hero-card">
        <h3>Horários demonstrativos</h3>
        <p><strong>Domingo</strong> — 9h e 18h</p>
        <p><strong>Quarta-feira</strong> — 19h30</p>
        <p><strong>Sexta-feira</strong> — 19h30</p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <span class="mini-meta">Quem Somos</span>
      <h2 class="section-title">Uma igreja para toda a família</h2>
      <p class="section-subtitle">Nosso propósito é levar esperança, fé e transformação por meio de Jesus Cristo. Este bloco foi criado como conteúdo fictício para pré-visualização.</p>
      <div class="grid grid-3">
        <div class="card"><h3>Missão</h3><p>Conectar pessoas a Cristo e formar discípulos comprometidos com o Reino.</p></div>
        <div class="card"><h3>Visão</h3><p>Ser uma igreja relevante, acolhedora e cheia da presença de Deus.</p></div>
        <div class="card"><h3>Valores</h3><p>Fé, santidade, serviço, excelência, amor e comunhão.</p></div>
      </div>
    </div>
  </section>

  <section id="ministerios" class="section section-light">
    <div class="container">
      <span class="mini-meta">Ministérios</span>
      <h2 class="section-title">Áreas de atuação</h2>
      <div class="grid grid-3">
        <div class="card"><h3>Ministério Infantil</h3><p>Cuidado e ensino bíblico para crianças em um ambiente seguro e alegre.</p></div>
        <div class="card"><h3>Jovens</h3><p>Encontros de comunhão, discipulado e propósito para a nova geração.</p></div>
        <div class="card"><h3>Louvor</h3><p>Adoração com excelência e sensibilidade espiritual em cada culto.</p></div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <span class="mini-meta">Eventos</span>
      <h2 class="section-title">Próximas programações</h2>
      <div class="grid grid-2">
        <div class="card"><h3>Conferência da Família</h3><p>Um tempo especial de ministrações e comunhão para fortalecer os lares.</p></div>
        <div class="card"><h3>Vigília de Oração</h3><p>Uma noite de intercessão, adoração e busca pela presença de Deus.</p></div>
      </div>
    </div>
  </section>

  <section id="contato" class="section section-light">
    <div class="container">
      <span class="mini-meta">Contato</span>
      <h2 class="section-title">Venha nos visitar</h2>
      <div class="grid grid-2">
        <div class="card">
          <h3>Informações</h3>
          <p><strong>Telefone:</strong> (31) 3333-3333</p>
          <p><strong>WhatsApp:</strong> (31) 99999-9999</p>
          <p><strong>Endereço:</strong> Rua Exemplo, 100 - Contagem/MG</p>
        </div>
        <div class="card">
          <h3>Mensagem</h3>
          <p>Estamos prontos para receber você e sua família. Este bloco pode ser substituído por formulário ou mapa real.</p>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
