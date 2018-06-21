<?php

use Illuminate\Database\Seeder;

class OrdersSeed extends Seeder
{
   const COLS
     = [
       'name',
       'email',
       'phone',
       'count',
       'message',
       'grant',
       'complete',
     ];

   const NAMES
     = [
       'Ivan',
       'Mark',
       'Steve',
       'Black',
       'Cat',
     ];

   const EMAILS
     = [
       'Even10@ya.ru',
       'Astral421@yarik.su',
       'frank123@st.com',
       'Astral421@yarik.su',
       'frank123@st.com',
     ];

   const PHONES
     = [
       '8985132641',
       '6546543213',
       '65465465431',
       '8985132641',
       '6546543213',
       '65465465431',
     ];

   const COMPLETES
     = [
       '1',
       '0',
       '1',
       '1',
       '0',
       '0',
     ];

   const COUNT = 5;

   public function run()
   {
      DB::table('orders')->truncate();
      for ($i = 0; $i < self::COUNT; $i++) {
         DB::table('orders')->insert(
           [
             self::COLS[0] => self::NAMES[$i],
             self::COLS[1] => self::EMAILS[$i],
             self::COLS[2] => self::PHONES[$i],
             self::COLS[3] => '10',
             self::COLS[4] => str_random(150),
             self::COLS[5] => 'on',
             self::COLS[6] => self::COMPLETES[$i],
           ]);
      }
   }
}
