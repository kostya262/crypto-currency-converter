Console Commands:
 - php console.php convert btc-bitcoin eth-ethereum 1
 - php console.php get_coin btc-bitcoin
 - php console.php get_coins 3

Api Methods:
 - GET  | /api/get_coins | params: limit(int)
 - POST | /api/get_coin | params: id(string)
 - GET  | /api/convert_coin | params: from(string), to(string), amount(int)

Web Client:
 - /

All routes setting in .htaccess

    AddDefaultCharset UTF-8
    RewriteEngine on
    RewriteCond %{REQUEST_URI} ^/api
    RewriteRule (.*) api/index.php [QSA,L]
    RewriteRule !index\.php$ webclient/index.php [L]

Client has 2 logger
 - Console
 - File