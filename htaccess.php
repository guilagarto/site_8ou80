<IfModule mod_rewrite.c>
    RewriteEngine On
    
    # Redireciona todas as requisições da raiz invisivelmente para a pasta public
    RewriteRule ^$ public/index.php [L]
    
    # Se o arquivo ou pasta não existir na raiz, joga para dentro da pasta public
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
