<?php 
// Importação correta baseada na raiz da sua pasta views
require_once __DIR__ . '/header.php'; 
?>

<main class="main-container">
    <!-- Cabeçalho da Página de Cases -->
    <header class="page-intro">
        <span class="subtitle-badge">Nossos Resultados</span>
        <h1>Cases de Sucesso</h1>
        <p>Conheça as histórias reais de infraestrutura de alta performance e estratégias sob medida que desenvolvemos para o nosso próprio ecossistema.</p>
    </header>

    <!-- GRID DE CASES DINÂMICO -->
    <section class="cases-grid">
        <?php if (!empty($meusCases)): ?>
            <?php foreach ($meusCases as $case): ?>
                <article class="case-card">
                    <div class="case-badge"><?= htmlspecialchars($case['badge']) ?></div>
                    <h2><?= htmlspecialchars($case['titulo']) ?></h2>
                    <p><?= htmlspecialchars($case['descricao']) ?></p>
                    <div class="case-footer">
                        <span class="case-metric"><?= htmlspecialchars($case['metrica']) ?></span>
                        <a href="contato" class="case-link">Solicitar projeto similar &rarr;</a>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center; color: var(--texto-mutado); width: 100%;">Nenhum caso de sucesso cadastrado no momento.</p>
        <?php endif; ?>
    </section>

    <!-- CTA de Fechamento -->
    <section class="cta-section" style="margin-top: 60px;">
        <span>Pronto para ser o nosso próximo caso de sucesso?</span>
        <a href="contato" class="btn-primary">Fale com a 8ou80</a>
    </section>
</main>

<?php 
require_once __DIR__ . '/footer.php'; 
?>
