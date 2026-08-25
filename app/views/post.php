<?php
// Importação do cabeçalho global dinâmico
require_once __DIR__ . '/header.php';
?>

<main class="main-container">
    <!-- Botão de Voltar Minimalista -->
    <div style="margin-bottom: 30px;">
        <a href="<?php echo $base_url; ?>/blog" class="case-link" style="font-weight: 600; text-decoration: none;">&larr; Voltar para o Blog</a>
    </div>

    <!-- Cabeçalho Interno do Artigo -->
    <header class="page-intro" style="text-align: left; margin-bottom: 40px;">
        <div class="blog-meta" style="margin-bottom: 10px;">
            <span class="blog-date"><?= date('d/m/Y', strtotime($artigoCompleto['publicado_em'])) ?></span>
            <span class="blog-category" style="color: var(--dourado); font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;"><?= htmlspecialchars($artigoCompleto['categoria']) ?></span>
        </div>
        <h1 style="font-size: 36px; line-height: 1.2; letter-spacing: -1px; margin-bottom: 20px; color: var(--texto-escuro); font-weight: 700;">
            <?= htmlspecialchars($artigoCompleto['titulo']) ?>
        </h1>
        <p style="font-size: 18px; line-height: 1.6; color: var(--texto-mutado); font-style: italic; max-width: 100%; margin: 0;">
            <?= htmlspecialchars($artigoCompleto['resumo']) ?>
        </p>
    </header>

    <!-- Caixa de Leitura do Conteúdo Completo (Herdando as classes do CSS unificado) -->
    <article class="legal-content" style="box-shadow: none; border: none; background: transparent; padding: 0;">
        <div class="legal-section" style="font-size: 16px; line-height: 1.8; color: var(--texto-escuro);">
            <!--nl2br preserva as quebras de linha digitadas no painel/banco -->
            <?= nl2br(htmlspecialchars($artigoCompleto['conteudo_completo'])) ?>
        </div>
    </article>

    <!-- Rodapé de Engajamento Interno -->
    <section class="hero-card border-top-dourado" style="margin-top: 60px;">
        <span class="subtitle-badge">Transformação Digital</span>
        <h2>Gostou deste insight técnico? Vamos aplicar na sua empresa.</h2>
        <p>A 8ou80 projeta a infraestrutura tecnológica e as campanhas estratégicas ideais para gerar resultados reais para o seu modelo de negócio.</p>
        <div class="cta-section" style="margin-top: 20px;">
            <a href="<?php echo $base_url; ?>/contato" class="btn-primary">Fale com a Nossa Equipe</a>
        </div>
    </section>
</main>

<?php
// Importação do rodapé global dinâmico
require_once __DIR__ . '/footer.php';
?>
