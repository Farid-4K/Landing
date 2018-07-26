<?php

use Illuminate\Database\Seeder;

class ConfigSeed extends Seeder
{
   const COLS
     = [
       'name',
       'value',
     ];

   const TAGS
     = [
       'MAIL_DRIVER',
       'MAIL_HOST',
       'MAIL_PORT',
       'MAIL_USERNAME',
       'MAIL_PASSWORD',
       'MAIL_ENCRYPTION',
       'SITE_ENABLED'
     ];

   const INF
     = [
       'smtp',
       'smtp.gmail.com',
       '587',
       'farid5ip50@gmail.com',
       'zjlnkshgqxsajiyh',
       'tls',
       'true'
     ];

   const COUNT = 7;

   public function run()
   {
      DB::table('config')->truncate();
      for ($i = 0; $i < self::COUNT; $i++) {
         DB::table('config')->insert(
           [
             self::COLS[0] => self::TAGS[$i],
             self::COLS[1] => self::INF[$i],
           ]);
      }
   }
}
