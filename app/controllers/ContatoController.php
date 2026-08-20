<?php
// app/controllers/ContatoController.php
require_once __DIR__ . '/../models/Contato.php';

class ContatoController {
    
    public function index() {
        $mensagem_sucesso = null;
        $mensagem_erro = null;

        // Se o formulário foi enviado via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';
            $telefone = $_POST['telefone'] ?? '';
            $mensagem = $_POST['mensagem'] ?? '';

            if (!empty($nome) && !empty($email) && !empty($mensagem)) {
                // Chama o Model para salvar no banco
                $sucesso = Contato::salvar($nome, $email, $telefone, $mensagem);
                
                if ($sucesso) {
                    $mensagem_sucesso = "Sua mensagem foi enviada com sucesso! Logo entraremos em contato.";
                } else {
                    $mensagem_erro = "Houve um erro técnico ao salvar sua mensagem. Tente novamente.";
                }
            } else {
                $mensagem_erro = "Por favor, preencha todos os campos obrigatórios (Nome, E-mail e Mensagem).";
            }
        }

        // Carrega a view de contato passando os alertas de sucesso ou erro se houverem
        require_once __DIR__ . '/../views/contato.php';
    }
}
