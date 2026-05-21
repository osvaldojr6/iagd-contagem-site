<?php
if (! defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main class="site-main">
  <section class="section">
    <div class="container content-area">
      <?php if (have_posts()) : while (have_posts()) : the_post();
        $type = get_post_type(); ?>
        <span class="mini-meta"><?php echo esc_html(get_post_type_object($type)->labels->singular_name ?? 'Conteúdo'); ?></span>
        <h1 class="section-title"><?php the_title(); ?></h1>
        <?php if ($type === 'evento') : ?>
          <div class="meta-list">
            <div><strong>Data:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_iagd_event_date', true)); ?></div>
            <div><strong>Horário:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_iagd_event_time', true)); ?></div>
            <div><strong>Local:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_iagd_event_place', true)); ?></div>
          </div>
          <?php $link = get_post_meta(get_the_ID(), '_iagd_event_link', true); if ($link) : ?>
            <p style="margin-top:18px;"><a class="btn btn-primary" href="<?php echo esc_url($link); ?>">Inscrever-se</a></p>
          <?php endif; ?>
        <?php elseif ($type === 'mensagem') : ?>
          <div class="meta-list">
            <div><strong>Pregador:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_iagd_message_speaker', true)); ?></div>
            <div><strong>Série:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_iagd_message_series', true)); ?></div>
          </div>
          <?php $video = get_post_meta(get_the_ID(), '_iagd_message_video', true); if ($video) : ?>
            <p style="margin-top:18px;"><a class="btn btn-primary" href="<?php echo esc_url($video); ?>">Assistir mensagem</a></p>
          <?php endif; ?>
        <?php elseif ($type === 'ministerio') : ?>
          <div class="meta-list">
            <div><strong>Líder:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_iagd_ministry_leader', true)); ?></div>
            <div><strong>Encontro:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_iagd_ministry_schedule', true)); ?></div>
            <div><strong>Contato:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_iagd_ministry_contact', true)); ?></div>
          </div>
        <?php elseif ($type === 'celula') : ?>
          <div class="meta-list">
            <div><strong>Líder:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_iagd_celula_lider', true)); ?></div>
            <div><strong>Encontro:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_iagd_celula_encontro', true)); ?></div>
            <div><strong>Região:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_iagd_celula_endereco', true)); ?></div>
            <?php if (wp_get_post_parent_id(get_the_ID())) : ?>
              <div><strong>Célula Pai:</strong> <?php echo esc_html(get_the_title(wp_get_post_parent_id(get_the_ID()))); ?></div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <?php if (has_post_thumbnail()) : ?>
          <div style="margin:24px 0; border-radius:20px; overflow:hidden;">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>
        <div class="content-area">
          <?php the_content(); ?>
        </div>
        <?php if ($type === 'celula') : ?>
          <div style="margin-top:32px;" class="card">
            <h2>Ramificações desta célula</h2>
            <?php echo iagd_contagem_render_celula_tree(get_the_ID()); ?>
          </div>
        <?php endif; ?>
      <?php endwhile; endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
