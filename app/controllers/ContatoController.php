<?php
// app/controllers/ContatoController.php
require_once __DIR__ . '/../models/Contato.php';

class ContatoController {
    
    public function index() {
        // Inicializa a sessão se ela ainda não estiver ativa no projeto
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Recupera os alertas guardados na sessão (caso existam) e limpa em seguida
        $mensagem_sucesso = $_SESSION['sucesso'] ?? null;
        $mensagem_erro = $_SESSION['erro'] ?? null;
        unset($_SESSION['sucesso'], $_SESSION['erro']);

        // Se o formulário foi enviado via POST (Gravação de dados)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Teste do Honeypot anti-spam
            if (!empty($_POST['address'])) {
                $_SESSION['sucesso'] = "Sua mensagem foi enviada com sucesso! Logo entraremos em contato.";
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit;
            }

            // Sanitização e filtragem
            $nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
            $email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ?? '';
            $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
            $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';

            if (!empty($nome) && !empty($email) && !empty($mensagem)) {
                
                // Salva no banco de dados através do Model
                $sucesso = Contato::salvar($nome, $email, $telefone, $mensagem);
                
                if ($sucesso) {
                    // 🚀 SALVA O ALERTA NA SESSÃO E REDIRECIONA (Evita duplicação por F5)
                    $_SESSION['sucesso'] = "Sua mensagem foi enviada com sucesso! Logo entraremos em contato.";
                    
                    // Redireciona limpando os dados de POST do navegador
                    header("Location: contato"); 
                    exit; // Interrompe a execução imediatamente
                } else {
                    $_SESSION['erro'] = "Houve um erro técnico ao salvar sua mensagem. Tente novamente.";
                    header("Location: contato");
                    exit;
                }
            } else {
                $_SESSION['erro'] = "Por favor, preencha todos os campos obrigatórios com e-mail válido.";
                header("Location: contato");
                exit;
            }
        }

        // Se for uma requisição GET comum (Apenas abrindo a página), renderiza a view
        require_once __DIR__ . '/../views/contato.php';
    }
}
