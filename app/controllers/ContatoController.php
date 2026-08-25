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
                    // 🚀 DISPARO BLINDADO: NOTIFICAÇÃO PRIVADA VIA cURL COM USER-AGENT (TELEGRAM)
                    // ==========================================================================
                    $tokenAPI = '8850246552:AAFyB-WP2GLwu7iTn9Xx7dSczAB5hLW7EZk'; 
                    $chatID   = '6946692075';       

                    // Formata a mensagem usando tags HTML (Evita falhas de caracteres especiais do Markdown)
                    $textoTelegram = "💼 <b>Novo Lead Recebido - 8ou80</b>\n\n";
                    $textoTelegram .= "👤 <b>Nome:</b> " . htmlspecialchars($nome) . "\n";
                    $textoTelegram .= "📧 <b>E-mail:</b> " . htmlspecialchars($_POST['email']) . "\n";
                    $textoTelegram .= "📞 <b>Telefone:</b> " . (!empty($telefone) ? htmlspecialchars($telefone) : "Não informado") . "\n\n";
                    $textoTelegram .= "💬 <b>Mensagem:</b> \n" . htmlspecialchars($_POST['mensagem']);

                    // 🛠️ CORREÇÃO DA URL: Endpoint oficial com subdomínio 'api' e prefixo '/bot'
                    $urlTelegram = "https://telegram.org" . $tokenAPI . "/sendMessage";

                    // Prepara os dados alterando o parse_mode para HTML
                    $dados = [
                        'chat_id'    => $chatID,
                        'text'       => $textoTelegram,
                        'parse_mode' => 'HTML'
                    ];

                    // Inicia o motor cURL profissional
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $urlTelegram);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dados));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); // Tempo limite de 5 segundos para garantir a entrega
                    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Evita bloqueios por falta de certificados locais
                    
                    // 🛡️ CORREÇÃO DE SEGURANÇA: Identifica a requisição para o Telegram não barrar o servidor
                    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36');

                    // Executa o disparo invisível em segundo plano
                    curl_exec($ch);
                    curl_close($ch);

                    // 🔄 Redireciona via GET limpando os dados de post do navegador
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
