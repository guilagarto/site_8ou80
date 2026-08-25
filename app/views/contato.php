<?php
// 1. Importa o cabeçalho do site (onde fica o menu, CSS e o topo)

require_once __DIR__ . '/header.php';
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
<!-- 🎨 ESTILIZAÇÃO COMPLETA DO FORMULÁRIO -->
<style>
    .container-contato {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .alerta {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.95rem;
        text-align: center;
    }

    .alerta-sucesso {
        background-color: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #c8e6c9;
    }

    .alerta-erro {
        background-color: #ffebee;
        color: #c62828;
        border: 1px solid #ffcdd2;
    }

    .form-grupo {
        margin-bottom: 20px;
    }

    .form-flex {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
    }

    .form-flex .form-grupo {
        flex: 1;
        margin-bottom: 0;
    }

    .form-controle {
        width: 100%;
        padding: 14px 16px;
        font-size: 1rem;
        color: #333333;
        background-color: #f8f9fa;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        transition: all 0.3s ease;
        outline: none;
    }

    .form-controle:focus {
        background-color: #ffffff;
        border-color: #007bff; /* Cor azul padrão, mude para a cor da sua agência se quiser */
        box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.1);
    }

    textarea.form-controle {
        resize: vertical;
        min-height: 120px;
        font-family: inherit;
    }

    .btn-enviar {
        display: block;
        width: 100%;
        padding: 16px;
        font-size: 1rem;
        font-weight: 700;
        color: #ffffff;
        background-color: #1a202c; /* Escuro elegante combinando com cabeçalhos modernos */
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-enviar:hover {
        background-color: #2d3748;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-enviar:active {
        transform: translateY(0);
    }
</style>

<!-- 📄 FORMULÁRIO ENVOLVIDO NA NOVA ESTRUTURA -->
<div class="container-contato">

    <?php if (isset($mensagem_sucesso)): ?>
        <div class="alerta alerta-sucesso"><?= $mensagem_sucesso ?></div>
    <?php endif; ?>

    <?php if (isset($mensagem_erro)): ?>
        <div class="alerta alerta-erro"><?= $mensagem_erro ?></div>
    <?php endif; ?>

    <form action="contato" method="POST">
        <!-- Linha Dupla: Nome e E-mail lado a lado -->
        <div class="form-flex">
            <div class="form-grupo">
                <input type="text" name="nome" class="form-controle" placeholder="Seu Nome" required>
            </div>
            <div class="form-grupo">
                <input type="email" name="email" class="form-controle" placeholder="Seu E-mail" required>
            </div>
        </div>

        <!-- Telefone abaixo -->
        <div class="form-grupo">
            <input type="text" name="telefone" class="form-controle" placeholder="Seu Telefone / WhatsApp">
        </div>

        <!-- Mensagem ampla -->
        <div class="form-grupo">
            <textarea name="mensagem" class="form-controle" placeholder="Como a nossa agência pode ajudar o seu empreendimento?" required></textarea>
        </div>
        
        <button type="submit" class="btn-enviar">Enviar Mensagem</button>
    </form>
</div>


    </section>

    <!-- Exemplo de link usando a rota configurada -->
    <p>Quer saber mais? <a href="sobre" class="btn">Visite a página Sobre Nós</a></p>
</main>

<?php
// 3. Importa o rodapé do site (onde ficam os scripts JS e as tags de fechamento)
require_once __DIR__ . '/footer.php';
?>
