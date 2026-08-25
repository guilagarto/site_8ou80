<?php
require_once __DIR__ . '/header.php';
?>

<main class="main-container">
    <!-- Cabeçalho do Blog -->
    <header class="page-intro">
        <span class="subtitle-badge">Insights & Inteligência</span>
        <h1>Blog 8ou80</h1>
        <p>Acompanhe artigos analíticos sobre tecnologia, marketing de performance, desenvolvimento web e estratégias de negócios.</p>
    </header>

    <!-- GRID DO BLOG DINÂMICO -->
    <section class="blog-feed">
        <?php if (!empty($meusPosts)): ?>
            <?php foreach ($meusPosts as $post): ?>
                <article class="blog-card">
                    <div class="blog-meta">
                        <!-- Formata a data vinda do MySQL (AAAA-MM-DD) para o padrão brasileiro (DD/MM/AAAA) -->
                        <span class="blog-date"><?= date('d/m/Y', strtotime($post['publicado_em'])) ?></span>
                        <span class="blog-category"><?= htmlspecialchars($post['categoria']) ?></span>
                    </div>
                    <!-- No seu app/views/blog.php, altere as tags de link do título e do "Ler mais" para: -->
<h2><a href="<?php echo $base_url; ?>/post?slug=<?= $post['slug'] ?>" class="blog-title-link"><?= htmlspecialchars($post['titulo']) ?></a></h2>
<p><?= htmlspecialchars($post['resumo']) ?></p>
<a href="<?php echo $base_url; ?>/post?slug=<?= $post['slug'] ?>" class="blog-read-more">Ler artigo completo &rarr;</a>

                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center; color: var(--texto-mutado); width: 100%;">Nenhum artigo publicado no momento.</p>
        <?php endif; ?>
    </section>

    <section class="cta-section" style="margin-top: 60px;">
        <span>Precisa de uma solução personalizada para o seu negócio?</span>
        <a href="contato" class="btn-primary">Fale com a 8ou80</a>
    </section>
</main>

<?php
require_once __DIR__ . '/footer.php';
?>
