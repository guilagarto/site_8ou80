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
                
                // ==========================================================================
                // 🚀 PASSO 1: DISPARO DO TELEGRAM ANTES DO BANCO (BLINDAGEM E TESTE SEGURO)
                // ==========================================================================
                $tokenAPI = '8850246552:AAFyB-WP2GLwu7iTn9Xx7dSczAB5hLW7EZk'; 
                $chatID   = '6946692075';       

                // Texto limpo sem formatação complexa para garantir que o Telegram não rejeite
                $textoTelegram = "💼 Novo Lead Recebido - 8ou80\n\n";
                $textoTelegram .= "👤 Nome: " . $nome . "\n";
                $textoTelegram .= "E-mail: " . $_POST['email'] . "\n";
                $textoTelegram .= "📞 Telefone: " . (!empty($telefone) ? $telefone : "Nao informado") . "\n\n";
                $textoTelegram .= "💬 Mensagem: " . $_POST['mensagem'];

                $urlTelegram = "https://telegram.org" . $tokenAPI . "/sendMessage";

                $dados = [
                    'chat_id' => $chatID,
                    'text'    => $textoTelegram
                ];

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $urlTelegram);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dados));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); // Aumentado para garantir conexão lenta
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');

                // Executa o envio e captura a resposta do Telegram para diagnóstico interno
                $respostaTelegram = curl_exec($ch);
                curl_close($ch);

                // ==========================================================================
                // 🚀 PASSO 2: SALVAMENTO NO BANCO DE DADOS
                // ==========================================================================
                $sucesso = Contato::salvar($nome, $email, $telefone, $mensagem);
                
                if ($sucesso) {
                    $_SESSION['sucesso'] = "Sua mensagem foi enviada com sucesso! Logo entraremos em contato.";
                } else {
                    // Se o banco falhar na Hostinger, avisamos na tela, mas o Telegram já disparou acima!
                    $_SESSION['sucesso'] = "Sua mensagem foi processada com sucesso comerciais.";
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
