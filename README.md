# supero
Teste Supero

Desafio criar um simples todo list, utilizando laravel, css3, sass, webpack, jquery
Para o deploy é necessário seguir os seguintes passos:

#Install
1 Abrir o terminar
2 Clone repo
    https://github.com/AlexsandroAndre/supero.git

3 Após terminado
    cd supero

4 Instalar as dependencias
    composer install

5 Copiar .env
    cp .env.example .env

6 Gerar  a chave da aplicação key:generate
    php artisan key:generate

7 Permissao na pasta de cache caso estiver usando linux
    sudo chmod -R 777 storage bootstrap/cache

8 em config/database.php comente o trecho  'options' => array_filter([ PDO::MYSQL_ATTR_SSL_CA => env 'MYSQL_ATTR_SSL_CA'), ])

9 Migration
    php artisan migrate

10 Opcional, criar dados fakes
    php artisan db:seed

11 rodar a aplicacao
    php artisan serve

12 Abrir em seu navegador
    http://localhost:8000/


#Development
Open your terminal and change directory to supero.

Make sure you have nodejs installed and run this command:

 npm install
Make sure you have bower installed and run this command:

 bower install
Make sure you have gulp installed and run this command:

 gulp watch
All files (components, etc) are located in resources/assets.

