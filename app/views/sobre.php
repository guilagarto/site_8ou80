<?php
// 1. Importa o cabeçalho do site (onde fica o menu, CSS e o topo)
require_once __DIR__ . '/components/header.php';
?>

<!-- 2. Conteúdo exclusivo da Página Sobre Nós -->
<main class="container">
    <section class="hero-section">
        <h1>ℹ️ Sobre o Nosso Projeto</h1>
        <p>Esta página demonstra o funcionamento do sistema de rotas dinâmicas utilizando PHP e Apache no XAMPP.</p>
    </section>

    <section class="features">
        <div class="card">
            <h3>Quem Somos</h3>
            <p>Desenvolvedores focados em criar códigos limpos, organizados e fáceis de dar manutenção desde o primeiro dia.</p>
        </div>
        
        <div class="card">
            <h3>Nossa Arquitetura</h3>
            <p>Utilizamos o padrão MVC com Front Controller. Isso significa que suas URLs são limpas, seguras e profissionais.</p>
        </div>
    </section>

    <!-- Link para voltar à Home usando a rota configurada -->
    <p>Quer voltar? <a href="home" class="btn">Voltar para a Página Inicial</a></p>
</main>

<?php
// 3. Importa o rodapé do site
require_once __DIR__ . '/components/footer.php';
?>
