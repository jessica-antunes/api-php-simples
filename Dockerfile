# Imagem leve com PHP CLI
FROM php:8.2-cli

# Cria diretório da app
WORKDIR /app

# Copia apenas a pasta public (onde está o index.php)
COPY public/ public/

# Expõe a porta padrão que o Render usa (se PORT não vier, usa 10000)
EXPOSE 10000

# Sobe o servidor embutido do PHP
# - Binda no 0.0.0.0 para aceitar conexões externas
# - Usa a pasta public como docroot
# - Usa public/index.php como "router" (assim /contatos funciona sem .htaccess)
CMD ["sh","-lc","php -S 0.0.0.0:${PORT:-10000} -t public public/index.php"]
