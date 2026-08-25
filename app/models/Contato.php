<?php
// app/models/Contato.php

require_once __DIR__ . '/../config/database.php';

class Contato {

    /**
     * Salva os dados do lead de forma compatível com PDO (Local) e MySQLi (Online)
     */
    public static function salvar($nome, $email, $telefone, $mensagem) {
        // 1. Pega a conexão ativa do seu database.php
        $db = Database::conectar();

        // 2. Verifica dinamicamente se a conexão retornada é PDO (Local) ou MySQLi (Online)
        if ($db instanceof PDO) {
            
            // --- CÓDIGO SEGURO PARA O SEU LOCALHOST (PDO) ---
            $stmt = $db->prepare("INSERT INTO contatos (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$nome, $email, $telefone, $mensagem]);

        } else {
            
            // --- CÓDIGO SEGURO PARA O SEU SERVIDOR ONLINE (MYSQLI) ---
            $stmt = $db->prepare("INSERT INTO contatos (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)");
            
            // Se o prepare do MySQLi deu certo, associa os parâmetros e executa
            if ($stmt) {
                $stmt->bind_param("ssss", $nome, $email, $telefone, $mensagem);
                $sucesso = $stmt->execute();
                $stmt->close();
                return $sucesso;
            }
            
            return false;
        }
    }
}
