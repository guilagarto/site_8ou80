<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include __DIR__ . '/header.php'; 
?>

<main class="main-container">
    <!-- Cabeçalho da Página -->
    <header class="page-intro text-left-mobile">
        <span class="subtitle-badge">Regras de Utilização</span>
        <h1>Termos de Uso</h1>
        <p class="meta-date">Última atualização: <?php echo date('d/m/Y'); ?></p>
    </header>

    <!-- Conteúdo Legal -->
    <article class="legal-content">
        <section class="legal-section">
            <h2>1. Aceitação dos Termos</h2>
            <p>Ao acessar e navegar pelo site <strong>8ou80.com</strong>, você concorda expressamente em cumprir estes Termos de Uso e todas as leis e regulamentos aplicáveis. Se você não concordar com qualquer um destes termos, fica proibido de usar ou acessar este site.</p>
        </section>

        <section class="legal-section">
            <h2>2. Propriedade Intelectual</h2>
            <p>Todo o conteúdo visual, códigos PHP estruturados, textos, marcas, logotipos e layouts exibidos neste site são de propriedade exclusiva da <strong>8ou80</strong> ou de seus respectivos licenciadores, protegidos pelas leis de direitos autorais.</p>
            <p>É estritamente proibido copiar, modificar, distribuir, republicar ou utilizar comercialmente qualquer elemento do site sem autorização prévia por escrito.</p>
        </section>

        <section class="legal-section">
            <h2>3. Limitação de Responsabilidade</h2>
            <p>O conteúdo deste site é fornecido "como está" e tem caráter meramente informativo sobre os nossos cases e soluções. A <strong>8ou80</strong> não garante que as informações estejam livres de imprecisões técnicas temporárias ou erros tipográficos.</p>
        </section>

        <section class="legal-section">
            <h2>4. Links de Terceiros</h2>
            <p>Nosso site pode conter links para páginas externas (como artigos do blog ou referências de clientes). Não revisamos todo o conteúdo desses sites terceiros e não somos responsáveis pelas práticas de privacidade ou pelo conteúdo dessas páginas externas.</p>
        </section>

        <section class="legal-section">
            <h2>5. Alterações nos Termos</h2>
            <p>Reservamo-nos o direito de revisar e atualizar estes Termos de Uso a qualquer momento, sem aviso prévio. Ao continuar utilizando o site após as modificações, você aceita cumprir a versão atualizada destes termos.</p>
        </section>
    </article>
</main>

<?php include __DIR__ . '/footer.php'; ?>
