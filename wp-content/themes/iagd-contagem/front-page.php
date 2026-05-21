<?php
if (! defined('ABSPATH')) {
    exit;
}

$hero_text = iagd_contagem_get_option('church_hero_text', 'Um lugar para conhecer Jesus, crescer em fé e viver em família.');
$hero_subtext = iagd_contagem_get_option('church_hero_subtext', 'Cultos presenciais, comunhão, discipulado, ministérios e uma comunidade pronta para receber você em Contagem.');

get_header();
?>
<main class="site-main">
  <section class="hero">
    <div class="container hero-grid">
      <div>
        <span class="mini-meta">Seja bem-vindo</span>
        <h2><?php echo esc_html($hero_text); ?></h2>
        <p><?php echo esc_html($hero_subtext); ?></p>
        <div style="display:flex; gap:12px; flex-wrap:wrap;">
          <a class="btn btn-primary" href="<?php echo esc_url(iagd_contagem_get_option('church_live_url', '#')); ?>">Assistir transmissão</a>
          <a class="btn btn-secondary" href="#contato">Venha nos visitar</a>
        </div>
      </div>
      <div class="hero-card">
        <h3>Horários dos cultos</h3>
        <p><strong>Domingo</strong> — 9h e 18h</p>
        <p><strong>Quarta-feira</strong> — 19h30</p>
        <p><strong>Sexta-feira</strong> — Oração às 19h30</p>
        <div class="notice-box">
          <strong>Endereço</strong><br>
          <?php echo esc_html(iagd_contagem_get_option('church_address', 'Contagem - MG')); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="cta-band">Igreja Apostólica da Graça Contagem — adoração, Palavra e comunhão para toda a família.</section>

  <section class="section">
    <div class="container">
      <span class="mini-meta">Quem Somos</span>
      <h2 class="section-title">Uma igreja para acolher, discipular e enviar</h2>
      <p class="section-subtitle">Nossa missão é anunciar o evangelho com fidelidade bíblica, formar discípulos de Jesus e servir a cidade de Contagem com amor, graça e excelência.</p>
      <div class="grid grid-3">
        <div class="card">
          <h3>Missão</h3>
          <p>Conduzir pessoas a um relacionamento real com Cristo e à maturidade espiritual por meio da Palavra, comunhão e serviço.</p>
        </div>
        <div class="card">
          <h3>Visão</h3>
          <p>Ser uma igreja viva, relevante e comprometida com o Reino de Deus em Contagem e além.</p>
        </div>
        <div class="card">
          <h3>Valores</h3>
          <p>Fé, santidade, acolhimento, discipulado, família, excelência e compaixão.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-light">
    <div class="container">
      <span class="mini-meta">Conecte-se</span>
      <h2 class="section-title">Encontre seu lugar na igreja</h2>
      <p class="section-subtitle">Participe dos nossos grupos, ministérios e próximos passos de fé.</p>
      <div class="grid grid-4">
        <div class="card"><h3>Grupos</h3><p>Pequenos grupos para comunhão, discipulado e cuidado pastoral.</p></div>
        <div class="card"><h3>Batismo</h3><p>Assuma publicamente sua fé em Jesus e celebre esse novo tempo.</p></div>
        <div class="card"><h3>Seja membro</h3><p>Conheça nossa visão e faça parte oficialmente da família da fé.</p></div>
        <div class="card"><h3>Voluntariado</h3><p>Sirva com seus dons e talentos nas áreas da igreja.</p></div>
      </div>
    </div>
  </section>

  <section class="section section-dark">
    <div class="container">
      <span class="mini-meta">Ministérios</span>
      <h2 class="section-title">Cuidado e serviço para todas as fases da vida</h2>
      <p class="section-subtitle">Conheça alguns dos ministérios que fortalecem a vida da igreja.</p>
      <div class="grid grid-3 posts-grid">
        <?php
        $ministerios = new WP_Query([
            'post_type' => 'ministerio',
            'posts_per_page' => 3,
        ]);
        if ($ministerios->have_posts()) :
            while ($ministerios->have_posts()) : $ministerios->the_post(); ?>
              <article class="card">
                <h3><?php the_title(); ?></h3>
                <p><?php echo esc_html(get_the_excerpt() ?: wp_trim_words(get_the_content(), 20)); ?></p>
                <a class="btn btn-primary" href="<?php the_permalink(); ?>">Saiba mais</a>
              </article>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
          <div class="card"><h3>Infantil</h3><p>Ensino bíblico com amor e cuidado para as crianças.</p></div>
          <div class="card"><h3>Jovens</h3><p>Comunhão, identidade e propósito para a nova geração.</p></div>
          <div class="card"><h3>Louvor</h3><p>Um ministério de adoração com excelência e sensibilidade espiritual.</p></div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <span class="mini-meta">Eventos e Mensagens</span>
      <h2 class="section-title">Acompanhe a programação da igreja</h2>
      <div class="grid grid-2">
        <div>
          <h3>Próximos eventos</h3>
          <div class="grid">
            <?php
            $eventos = new WP_Query([
                'post_type' => 'evento',
                'posts_per_page' => 2,
            ]);
            if ($eventos->have_posts()) :
                while ($eventos->have_posts()) : $eventos->the_post(); ?>
                  <article class="card">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo esc_html(get_the_excerpt() ?: wp_trim_words(get_the_content(), 18)); ?></p>
                    <a class="btn btn-dark" href="<?php the_permalink(); ?>">Ver evento</a>
                  </article>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
              <div class="card"><h3>Conferência da Família</h3><p>Cadastre seus próximos eventos no painel para exibir aqui automaticamente.</p></div>
              <div class="card"><h3>Vigília de Oração</h3><p>Espaço reservado para agenda dinâmica da igreja.</p></div>
            <?php endif; ?>
          </div>
        </div>
        <div>
          <h3>Mensagens recentes</h3>
          <div class="grid">
            <?php
            $mensagens = new WP_Query([
                'post_type' => 'mensagem',
                'posts_per_page' => 2,
            ]);
            if ($mensagens->have_posts()) :
                while ($mensagens->have_posts()) : $mensagens->the_post(); ?>
                  <article class="card">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo esc_html(get_the_excerpt() ?: wp_trim_words(get_the_content(), 18)); ?></p>
                    <a class="btn btn-dark" href="<?php the_permalink(); ?>">Ouvir mensagem</a>
                  </article>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
              <div class="card"><h3>Mensagem em destaque</h3><p>Cadastre ministrações para exibir automaticamente nesta área.</p></div>
              <div class="card"><h3>Série atual</h3><p>Espaço para mensagens recentes, sermões e conteúdos edificantes.</p></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-light">
    <div class="container">
      <span class="mini-meta">Contribua</span>
      <h2 class="section-title">Sua oferta fortalece a missão</h2>
      <p class="section-subtitle">Contribua com dízimos e ofertas para apoiar a obra, os projetos e a expansão do evangelho.</p>
      <div class="card">
        <p><strong>Chave PIX:</strong> <?php echo esc_html(iagd_contagem_get_option('church_pix', 'defina a chave PIX no personalizador')); ?></p>
      </div>
    </div>
  </section>

  <section id="contato" class="section">
    <div class="container">
      <span class="mini-meta">Contato</span>
      <h2 class="section-title">Venha nos visitar</h2>
      <div class="grid grid-2">
        <div class="card">
          <h3>Informações</h3>
          <p><strong>Telefone:</strong> <?php echo esc_html(iagd_contagem_get_option('church_phone', '(00) 0000-0000')); ?></p>
          <p><strong>WhatsApp:</strong> <?php echo esc_html(iagd_contagem_get_option('church_whatsapp', '(00) 00000-0000')); ?></p>
          <p><strong>E-mail:</strong> <?php echo esc_html(iagd_contagem_get_option('church_email', 'contato@igreja.com')); ?></p>
          <p><strong>Endereço:</strong> <?php echo esc_html(iagd_contagem_get_option('church_address', 'Contagem - MG')); ?></p>
        </div>
        <div class="card">
          <h3>Fale conosco</h3>
          <form class="form-grid">
            <input type="text" placeholder="Seu nome">
            <input type="email" placeholder="Seu e-mail">
            <textarea placeholder="Escreva sua mensagem"></textarea>
            <button type="button" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
