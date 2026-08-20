<?php
// 1. Importa o cabeçalho do site exatamente igual ao modelo da sua Home
require_once __DIR__ . '/components/header.php';
?>

<!-- 🎨 ESTILIZAÇÃO INTERNA DAS SOLUÇÕES -->
<style>
    .secao-solucoes {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        text-align: center;
    }

    .titulo-principal {
        font-size: 2.5rem;
        color: #1a202c;
        margin-bottom: 10px;
        font-weight: 800;
    }

    .subtitulo-principal {
        font-size: 1.1rem;
        color: #4a5568;
        margin-bottom: 40px;
    }

    .grid-solucoes {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
        margin-top: 20px;
        text-align: left;
    }

    .card-servico {
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-servico:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.05);
        border-color: #007bff;
    }

    .titulo-servico {
        font-size: 1.3rem;
        color: #1a202c;
        margin-bottom: 12px;
        font-weight: 700;
    }

    .descricao-servico {
        font-size: 0.95rem;
        color: #4a5568;
        line-height: 1.6;
        flex-grow: 1;
    }

    .preco-container {
        margin-top: 20px;
    }

    .preco-servico {
        display: inline-block;
        font-size: 0.9rem;
        font-weight: 600;
        color: #2b6cb0;
        background: #ebf8ff;
        padding: 6px 12px;
        border-radius: 6px;
    }
</style>

<!-- 2. Conteúdo exclusivo da Página de Soluções -->
<main class="secao-solucoes">
    <h1 class="titulo-principal">Nossas Soluções</h1>
    <p class="subtitulo-principal">Estratégias sob medida para acelerar o crescimento do seu negócio digital</p>

    <div class="grid-solucoes">
        <?php if (!empty($lista_solucoes)): ?>
            <?php foreach ($lista_solucoes as $servico): ?>
                <div class="card-servico">
                    <div>
                        <h3 class="titulo-servico"><?= htmlspecialchars($servico['titulo']) ?></h3>
                        <p class="descricao-servico"><?= nl2br(htmlspecialchars($servico['descricao'])) ?></p>
                    </div>
                    
                    <?php if (!empty($servico['preco']) && $servico['preco'] > 0): ?>
                        <div class="preco-container">
                            <span class="preco-servico">A partir de R$ <?= number_format($servico['preco'], 2, ',', '.') ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="grid-column: 1/-1; color: #718096; padding: 40px; text-align: center; width: 100%;">
                Nossos serviços estão sendo atualizados. Volte em instantes!
            </p>
        <?php endif; ?>
    </div>
</main>

<?php
// 3. Importa o rodapé do site exatamente igual ao modelo da sua Home
require_once __DIR__ . '/components/footer.php';
?>
