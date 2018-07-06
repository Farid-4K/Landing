# Лэндинг
## Быстрый старт
1. Зайдите в корневую директорию проекта и выполните команду
`composer install`
1. Откройте файл .env в корневой директории сайта (если нет переименуйте файл .env.example -> .env), заполните поля для подключения к БД, и ,если нужно, привязку к вк и настройки для google captcha.

#### Конфигурация .env
##### Пример настрйки БД
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=root
```
##### Пример настройки Вконтакте
```
VK_ID=vkId
VK_SECRET=vk_secret_key
VKONTAKTE_REDIRECT_URI=http://YOURDOMAIN/login/vk/callback
```
##### Пример настройки Google recaptcha
```
RECAPTCHA_SITE_KEY=
RECAPTCHA_SECRET=
```
##### Пример настройки сервера Nginx для работы сайта:
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
         include fastcgi_params;
         fastcgi_param SCRIPT_FILENAME $request_filename;
       }
    }
```
##### Откройте терминал и напишите последовательно: 
```
php artisan key:generate 
php artisan migrate:fresh
php artisan db:seed
```
Готово! Ваш лэндинг готов к работе. Если произошли ошибки, вы не верно сконфигурировали **.env**.
##### Примечание
Папки **public storage bootstrap resourses** должны быть открыты для записи.