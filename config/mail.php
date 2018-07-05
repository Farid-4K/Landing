<?php

$pathToConfig = storage_path('/app/mail.json');
if(file_exists($pathToConfig)) {
   $config = json_decode(file_get_contents($pathToConfig), true);
}

return [

  'driver' => $config['driver']??'smtp',

  'host' => $config['host'],

  'port' => $config['port']??587,

  'from' => [
    'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
    'name'    => env('MAIL_FROM_NAME', 'Example'),
  ],

  'encryption' => $config['encryption']??'tls',

  'username' => $config['username']??'example@ex.com',

  'password' => $config['password']??'empty',

  'sendmail' => '/usr/sbin/sendmail -bs',

  'markdown' => [
    'theme' => 'default',

    'paths' => [
      resource_path('views/vendor/mail'),
    ],
  ],

];
