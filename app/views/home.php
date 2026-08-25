<?php
// 1. Configurações de erro e importação do cabeçalho global
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/header.php';
?>

<!-- 2. Conteúdo da Home Page da 8ou80 Soluções Digitais -->
<main class="main-container">

    <!-- SEÇÃO 1: HERO (Primeira dobra de alto impacto) -->
    <section class="hero-card">
        <span class="subtitle-badge">Da ideia ao resultado</span>
        <h1>Soluções digitais que unem estratégia de negócios, desenvolvimento web e marketing de performance.</h1>
        <p>
            Transformamos necessidades comerciais em canais de vendas estruturados e sistemas eficientes. 
            Da arquitetura do código à gestão de tráfego pago, desenhamos e executamos a presença digital 
            que sua empresa precisa para crescer de forma previsível.
        </p>
        <div class="cta-section" style="margin-top: 25px;">
            <a href="contato" class="btn-primary">Iniciar um Projeto</a>
            <a href="solucoes" class="case-link" style="margin-left: 20px; font-weight: 600;">Conhecer Nossas Soluções &rarr;</a>
        </div>
    </section>

    <!-- SEÇÃO 2: PROBLEMA / OPORTUNIDADE -->
    <section class="about-sections" style="margin-top: 50px;">
        <header class="page-intro" style="margin-bottom: 30px;">
            <span class="subtitle-badge">Diagnóstico Digital</span>
            <h2>O ambiente digital mudou. Ter apenas um site ou publicar sem estratégia já não é suficiente.</h2>
            <p>
                Muitas empresas investem em ferramentas isoladas e não entendem por que os resultados não aparecem. 
                O erro comum não está nas ferramentas, mas na falta de conexão entre elas.
            </p>
        </header>

        <div class="features-grid">
            <div class="feature-box">
                <h3>Canais digitais sem conversão</h3>
                <p>Sites institucionais antigos que funcionam como cartões de visita estáticos, incapazes de reter o visitante ou gerar novos leads qualificados para a equipe comercial.</p>
            </div>
            <div class="feature-box">
                <h3>Investimento ineficiente em anúncios</h3>
                <p>Campanhas de tráfego pago que até atraem cliques, mas falham na conversão final porque a página de destino não foi projetada estrategicamente para vender.</p>
            </div>
            <div class="feature-box">
                <h3>Processos lentos e manuais</h3>
                <p>Demandas diárias de atendimento, vendas ou organização interna que consomem tempo valioso da equipe e poderiam ser resolvidas com automações simples ou aplicações web sob medida.</p>
            </div>
            <div class="feature-box">
                <h3>Falta de clareza nos dados</h3>
                <p>Decisões tomadas com base em suposições, sem o rastreamento correto do comportamento do usuário dentro das páginas e do retorno real sobre o investimento (ROI).</p>
            </div>
        </div>
    </section>
    <!-- SEÇÃO 3: NOSSA PROPOSTA -->
    <section class="hero-card border-top-dourado" style="margin-top: 60px; text-align: left;">
        <span class="subtitle-badge">Nosso Diferencial</span>
        <h2>Onde o marketing encontra a tecnologia.</h2>
        <p style="text-align: left; margin-top: 10px;">
            A <strong>8ou80</strong> nasceu para preencher a lacuna entre a agência criativa tradicional e a empresa de desenvolvimento de sistemas pura. 
            Nós não entregamos layouts isolados ou códigos sem propósito comercial. Nós analisamos o gargalo do seu negócio, planejamos a estratégia de posicionamento, 
            desenvolvemos a infraestrutura tecnológica necessária e gerenciamos os canais de atração. É a união exata entre pensamento estratégico, 
            marketing digital e engenharia de software para construir soluções digitais de ponta a ponta.
        </p>
    </section>

    <!-- SEÇÃO 4: SOLUÇÕES (Vitrine de Serviços Otimizada para SEO) -->
    <section class="about-sections" style="margin-top: 60px;">
        <header class="page-intro">
            <span class="subtitle-badge">O Que Fazemos</span>
            <h2>Infraestrutura e posicionamento para empresas em crescimento.</h2>
            <p>Soluções digitais integradas para profissionalizar sua operação e escalar sua captação de clientes.</p>
        </header>

        <div class="features-grid">
            <!-- Desenvolvimento Web -->
            <div class="feature-box">
                <h3>Desenvolvimento Web & Criação de Sites</h3>
                <p>Construção de sites profissionais, landing pages de alta conversão e portfólios institucionais com código limpo, veloz e otimizado.</p>
                <p><strong>Benefício principal:</strong> Páginas rápidas e estruturadas nativamente para converter visitantes em oportunidades de negócio.</p>
                <a href="solucoes" class="case-link">Detalhes de Desenvolvimento &rarr;</a>
            </div>

            <!-- Marketing Digital -->
            <div class="feature-box">
                <h3>Marketing Digital & Estratégia</h3>
                <p>Planejamento de presença digital e posicionamento de marca para alinhar toda a comunicação da sua empresa aos reais objetivos de venda.</p>
                <p><strong>Benefício principal:</strong> Construção de autoridade de mercado e fim das ações isoladas sem retorno financeiro direto.</p>
                <a href="solucoes" class="case-link">Detalhes de Estratégia &rarr;</a>
            </div>

            <!-- Tráfego Pago -->
            <div class="feature-box">
                <h3>Tráfego Pago & Performance</h3>
                <p>Criação, gerenciamento e otimização constante de campanhas de anúncios patrocinados no Google Ads e Meta Ads (Instagram e Facebook).</p>
                <p><strong>Benefício principal:</strong> Atração imediata de público qualificado com intenção de compra real, maximizando o seu faturamento.</p>
                <a href="solucoes" class="case-link">Detalhes de Tráfego Pago &rarr;</a>
            </div>

            <!-- SEO -->
            <div class="feature-box">
                <h3>SEO (Otimização para Motores de Busca)</h3>
                <p>Otimização técnica estrutural e de conteúdo para indexar seu site de forma orgânica nas primeiras posições dos mecanismos de busca.</p>
                <p><strong>Benefício principal:</strong> Atração constante de acessos qualificados a longo prazo, diminuindo a dependência de anúncios pagos.</p>
                <a href="solucoes" class="case-link">Detalhes de SEO &rarr;</a>
            </div>

            <!-- Sistemas -->
            <div class="feature-box">
                <h3>Sistemas e Aplicações Web</h3>
                <p>Desenvolvimento de sistemas internos, painéis administrativos integrados e ferramentas web personalizadas para organizar serviços online.</p>
                <p><strong>Benefício principal:</strong> Sistemas seguros rodando sob medida que resolvem gargalos operacionais específicos do seu modelo de negócio.</p>
                <a href="solucoes" class="case-link">Detalhes de Sistemas &rarr;</a>
            </div>

            <!-- Automação -->
            <div class="feature-box">
                <h3>Automação & Soluções Personalizadas</h3>
                <p>Integração entre plataformas digitais, automação de fluxos de atendimento e criação de rotinas automatizadas de coleta de dados.</p>
                <p><strong>Benefício principal:</strong> Eliminação de tarefas manuais repetitivas, liberando sua equipe para focar no fechamento de contratos.</p>
                <a href="solucoes" class="case-link">Detalhes de Automações &rarr;</a>
            </div>
        </div>
    </section>
    <!-- SEÇÃO 5: COMO TRABALHAMOS (Metodologia) -->
    <section class="about-sections" style="margin-top: 60px;">
        <header class="page-intro">
            <span class="subtitle-badge">Metodologia</span>
            <h2>Nosso Método: Menos suposições, mais execução.</h2>
            <p>Um processo linear desenhado para garantir previsibilidade e total clareza em cada etapa do desenvolvimento do projeto.</p>
        </header>

        <div class="features-grid">
            <div class="feature-box" style="border-left: 3px solid var(--azul-metalico);">
                <strong>01 — Entendemos</strong>
                <p style="margin-top: 5px; margin-bottom: 0;">Mergulhamos no seu modelo de negócio para compreender o cenário atual, o comportamento do seu cliente ideal e o principal gargalo comercial que precisa ser resolvido.</p>
            </div>
            <div class="feature-box" style="border-left: 3px solid var(--dourado);">
                <strong>02 — Planejamos</strong>
                <p style="margin-top: 5px; margin-bottom: 0;">Desenhamos a arquitetura tecnológica e a estratégia de marketing digital adequadas. Definimos prioridades claras e cronogramas reais antes de escrever qualquer código.</p>
            </div>
            <div class="feature-box" style="border-left: 3px solid var(--azul-metalico);">
                <strong>03 — Desenvolvemos</strong>
                <p style="margin-top: 5px; margin-bottom: 0;">Transformamos o escopo técnico em realidade. Construímos interfaces modernas, desenvolvemos sistemas rápidos e configuramos campanhas com foco absoluto em usabilidade.</p>
            </div>
            <div class="feature-box" style="border-left: 3px solid var(--dourado);">
                <strong>04 — Medir</strong>
                <p style="margin-top: 5px; margin-bottom: 0;">Implementamos ferramentas de análise de dados para monitorar com precisão o comportamento do usuário, a velocidade de carregamento das páginas e a taxa de conversão.</p>
            </div>
            <div class="feature-box" style="border-left: 3px solid var(--azul-metalico);">
                <strong>05 — Evoluímos</strong>
                <p style="margin-top: 5px; margin-bottom: 0;">Analise periódica dos relatórios de performance para aplicar melhorias contínuas. No ambiente digital, o refinamento constante é o que garante a sustentabilidade dos lucros.</p>
            </div>
        </div>
    </section>

    <!-- SEÇÃO 6: PROJETOS / PORTFÓLIO -->
    <section class="hero-card" style="margin-top: 60px;">
        <span class="subtitle-badge">Portfólio</span>
        <h2>Soluções entregues e resultados em movimento.</h2>
        <p>
            Acreditamos que a qualidade técnica se prova na prática. Cada projeto que desenvolvemos reflete nosso 
            compromisso com a clareza visual, código limpo e conformidade estrita com os objetivos comerciais de nossos clientes.
        </p>
        <div class="cta-section" style="margin-top: 15px;">
            <a href="cases" class="case-link" style="font-weight: 600;">Conhecer Nossos Cases de Sucesso &rarr;</a>
        </div>
    </section>

    <!-- SEÇÃO 7: SOBRE A Empresa -->
    <section class="about-card border-top-azul" style="margin-top: 60px;">
        <span class="subtitle-badge">Quem Somos</span>
        <h2>Engenharia e estratégia orientadas ao crescimento do seu negócio.</h2>
        <p>
            A <strong>8ou80 Soluções Digitais</strong> nasceu com um objetivo transparente: eliminar o amadorismo e a complexidade desnecessária do mercado de tecnologia. 
            Desenvolvemos uma estrutura corporativa moderna baseada na transparência e na alta capacidade de execução. Combinamos o rigor analítico do 
            desenvolvimento de sistemas à agilidade do marketing de performance para construir canais digitais sólidos, duradouros e lucrativos para nossos clientes. 
            Não buscamos fórmulas mágicas; estruturamos tecnologia e inteligência para viabilizar negócios.
        </p>
    </section>

    <!-- SEÇÃO 8: CTA FINAL -->
    <section class="hero-card border-top-dourado" style="margin-top: 60px; background-color: var(--bg-sutil);">
        <span class="subtitle-badge">Vamos Começar?</span>
        <h2>Tem um objetivo de negócio? Nós desenhamos a tecnologia e a estratégia para alcançá-lo.</h2>
        <p>Se você precisa profissionalizar sua presença digital, automatizar um processo operacional ou escalar sua geração de leads qualificados, a 8ou80 possui o método para executar.</p>
        <div class="cta-section" style="margin-top: 20px;">
            <a href="contato" class="btn-primary">Fale com a 8ou80</a>
        </div>
    </section>

</main>

<?php
// 3. Importação do rodapé global do site
require_once __DIR__ . '/footer.php';
?>
