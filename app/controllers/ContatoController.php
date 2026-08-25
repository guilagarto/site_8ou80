<?php
// app/controllers/ContatoController.php
require_once __DIR__ . '/../models/Contato.php';

class ContatoController {
    
    public function index() {
        // Inicializa a sessão se ela ainda não estiver ativa no projeto
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Recupera as mensagens de feedback salvas na sessão e limpa logo em seguida
        $mensagem_sucesso = $_SESSION['sucesso'] ?? null;
        $mensagem_erro = $_SESSION['erro'] ?? null;
        unset($_SESSION['sucesso'], $_SESSION['erro']);

        // Se o formulário foi enviado via POST (Envio de dados)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // 1. 🛡️ TESTE DO HONEYPOT: Bloqueia robôs de spam de forma silenciosa
            if (!empty($_POST['address'])) {
                $_SESSION['sucesso'] = "Sua mensagem foi enviada com sucesso! Logo entraremos em contato.";
                header("Location: contato");
                exit;
            }

            // 2. 🧼 SANITIZAÇÃO RIGIDA: Protege o banco de dados contra códigos maliciosos (XSS)
            $nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
            $email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ?? '';
            $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
            $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';

            // Validação dos campos pós-filtragem
            if (!empty($nome) && !empty($email) && !empty($mensagem)) {
                
                // 3. Salva no banco de dados através do seu Model Híbrido (PDO/MySQLi)
                $sucesso = Contato::salvar($nome, $email, $telefone, $mensagem);
                
                if ($sucesso) {
                    // Guarda o alerta de sucesso na sessão para a View exibir
                    $_SESSION['sucesso'] = "Sua mensagem foi enviada com sucesso! Logo entraremos em contato.";

                    // ==========================================================================
                    // 🚀 ENGENHARIA DE NOTIFICAÇÃO PRIVADA EM SEGUNDO PLANO (TELEGRAM API)
                    // ==========================================================================
                    // Insira aqui os dados que você gerou com o @BotFather e o @userinfobot
                    $tokenAPI = '8850246552:AAFyB-WP2GLwu7iTn9Xx7dSczAB5hLW7EZk';
                    $chatID   = '6946692075';

                    // Formata a mensagem com Markdown para chegar organizada no seu celular
                    $textoTelegram = "💼 *Novo Lead Recebido - 8ou80*\n\n";
                    $textoTelegram .= "👤 *Nome:* " . $nome . "\n";
                    $textoTelegram .= "📧 *E-mail:* " . $_POST['email'] . "\n"; // Exibe o e-mail preenchido
                    $textoTelegram .= "📞 *Telefone:* " . (!empty($telefone) ? $telefone : "Não informado") . "\n\n";
                    $textoTelegram .= "💬 *Mensagem:* \n" . $_POST['mensagem'];

                    // Prepara a rota de disparo HTTP para os servidores do Telegram
                    $urlTelegram = "https://telegram.org" . $tokenAPI . "/sendMessage?chat_id=" . $chatID . "&parse_mode=Markdown&text=" . urlencode($textoTelegram);

                    // Cria um contexto com tempo limite (timeout) para o site não ficar lento
                    $contexto = stream_context_create([
                        'http' => ['timeout' => 3] // Limita a requisição a 3 segundos no máximo
                    ]);

                    // Faz o disparo invisível em segundo plano
                    @file_get_contents($urlTelegram, false, $contexto);

                    // 🔄 Redireciona via GET limpando os dados de post do navegador (Evita duplicações por F5)
                    header("Location: contato");
                    exit;

                } else {
                    $_SESSION['erro'] = "Houve um erro técnico ao salvar sua mensagem. Tente novamente.";
                    header("Location: contato");
                    exit;
                }
            } else {
                $_SESSION['erro'] = "Por favor, preencha todos os campos obrigatórios com um formato de e-mail válido.";
                header("Location: contato");
                exit;
            }
        }

        // Se for uma requisição GET normal (Apenas abrindo a página), carrega a View
        require_once __DIR__ . '/../views/contato.php';
    }
}
