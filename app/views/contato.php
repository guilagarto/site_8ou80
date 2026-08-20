<?php
// 1. Importa o cabeçalho do site (onde fica o menu, CSS e o topo)
require_once __DIR__ . '/components/header.php';
?>

<!-- 2. Conteúdo exclusivo da Página Inicial -->
<main class="container">
    <section class="hero-section">
        <h1>🏠 ENTRE EM CONTATO</h1>
        <p>Começe hoje uma nova etapa no seu empreendimento</p>
    </section>

    <section class="features">
        <!-- Exibe alertas na tela caso o controller envie alguma resposta -->
<?php if (isset($mensagem_sucesso)): ?>
    <div style="color: green; font-weight: bold; margin-bottom: 20px;"><?= $mensagem_sucesso ?></div>
<?php endif; ?>

<?php if (isset($mensagem_erro)): ?>
    <div style="color: red; font-weight: bold; margin-bottom: 20px;"><?= $mensagem_erro ?></div>
<?php endif; ?>

<!-- O action aponta para a própria rota de contato -->
<form action="contato" method="POST">
    <input type="text" name="nome" placeholder="Seu Nome" required>
    <input type="email" name="email" placeholder="Seu E-mail" required>
    <input type="text" name="telefone" placeholder="Seu Telefone/WhatsApp">
    <textarea name="mensagem" placeholder="Como podemos ajudar a sua empresa?" required></textarea>
    
    <button type="submit">Enviar Mensagem</button>
</form>

    </section>

    <!-- Exemplo de link usando a rota configurada -->
    <p>Quer saber mais? <a href="sobre" class="btn">Visite a página Sobre Nós</a></p>
</main>

<?php
// 3. Importa o rodapé do site (onde ficam os scripts JS e as tags de fechamento)
require_once __DIR__ . '/components/footer.php';
?>
