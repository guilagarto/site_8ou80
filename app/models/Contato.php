<?php
// app/models/Contato.php
// app/models/Contato.php - Linha 4 (ou 3)
// Usamos dirname(__DIR__) para subir até a pasta 'app' com segurança e entrar em 'config'
require_once dirname(__DIR__) . '/config/database.php';


class Contato {
    // Função responsável por salvar o lead no banco de dados
    public static function salvar($nome, $email, $telefone, $mensagem) {
        $conexao = Database::conectar();

        $stmt = $conexao->prepare("INSERT INTO contatos (nome, email, telefone, text_mensagem) VALUES (?, ?, ?, ?)");
        
        // Se na sua tabela a coluna chamar 'mensagem', ajuste o comando acima para (nome, email, telefone, mensagem)
        $stmt = $conexao->prepare("INSERT INTO contatos (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)");
        
        $stmt->bind_param("ssss", $nome, $email, $telefone, $mensagem);
        $executou = $stmt->execute();

        $stmt->close();
        $conexao->close();

        return $executou;
    }
}
