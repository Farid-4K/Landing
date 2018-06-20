# Лэндинг
### Быстрый старт
1. Откройте файл .env в корневой директории сайта (если нет переименуйте файл .env.example -> .env), заполните поля для подключения к БД, и ,если нужно, привязку к вк.
1. Пример настройки сервера Nginx для работы сайта:
```
server {
      server_name landing;
      server_name_in_redirect  off;
      root /var/www/landing/public;
      index index.html index.php;

       location / {
         try_files $uri $uri/ /index.php?$args;
       }

       location ~ \.php$ {
         try_files $uri =404;
         fastcgi_index index.php;
         fastcgi_pass 127.0.0.1:9000;
         #fastcgi_pass unix:/var/run/php/php7.2-fpm.sock
         include fastcgi_params;
         fastcgi_param SCRIPT_FILENAME $request_filename;
       }
    }
```
1. Откройте терминал и напишите: 
```
php artisan key:generate 
php artisan migrate:fresh
php artisan db:seed
```
Готово! ваш лэндинг готов к работе.