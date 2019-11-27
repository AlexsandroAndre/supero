# supero
Teste Supero

1 php artisan key:generate
2 sudo chmod -R 777 storage bootstrap/cache
3 em config/database.php comente o trecho  'options' => array_filter([ PDO::MYSQL_ATTR_SSL_CA => env 'MYSQL_ATTR_SSL_CA'), ]), 
4 Renomear o arquivo Server.php para index.php
5 php artisan db:seed
