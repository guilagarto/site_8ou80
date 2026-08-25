<?php
// app/controllers/ContatoController.php
require_once __DIR__ . '/../models/Contato.php';

class ContatoController {
    
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $mensagem_sucesso = $_SESSION['sucesso'] ?? null;
        $mensagem_erro = $_SESSION['erro'] ?? null;
        unset($_SESSION['sucesso'], $_SESSION['erro']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (!empty($_POST['address'])) {
                $_SESSION['sucesso'] = "Sua mensagem foi enviada com sucesso! Logo entraremos em contato.";
                header("Location: contato");
                exit;
            }

            $nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
            $email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ?? '';
            $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
            $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';

            if (!empty($nome) && !empty($email) && !empty($mensagem)) {
                
                // 1. Salva primeiro no banco de dados para garantir o lead
                $sucesso = Contato::salvar($nome, $email, $telefone, $mensagem);

                // ==========================================================================
                // 🚀 DISPARO VIA GET SEGURO (MÉTODO ULTRA COMPATÍVEL COM HOSPEDAGENS)
                // ==========================================================================
                $tokenAPI = '8850246552:AAFyB-WP2GLwu7iTn9Xx7dSczAB5hLW7EZk'; 
                $chatID   = '6946692075';       

                // Texto super limpo sem nenhuma tag ou caractere especial
                $textoTelegram = "Novo Lead Recebido no Site\n\nNome: " . $nome . "\nE-mail: " . $_POST['email'] . "\nTelefone: " . $telefone . "\nMensagem: " . $_POST['mensagem'];

                // Monta a URL completa em uma string única enviando por GET
                $urlTelegram = "https://telegram.org" . $tokenAPI . "/sendMessage?chat_id=" . $chatID . "&text=" . urlencode($textoTelegram);

                // Executa via cURL nativo em modo GET
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $urlTelegram);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
                
                $resposta = curl_exec($ch);
                $erroCurl = curl_error($ch);
                curl_close($ch);

                // Se o cURL falhar ou o banco der certo, nós gerenciamos o fluxo aqui
                if ($sucesso) {
                    $_SESSION['sucesso'] = "Sua mensagem foi enviada com sucesso! Logo entraremos em contato.";
                } else {
                    $_SESSION['erro'] = "Erro ao salvar dados.";
                }
                
                header("Location: contato");
                exit;
                
            } else {
                $_SESSION['erro'] = "Por favor, preencha todos os campos obrigatórios com um formato de e-mail válido.";
                header("Location: contato");
                exit;
            }
        }

        require_once __DIR__ . '/../views/contato.php';
    }
}
