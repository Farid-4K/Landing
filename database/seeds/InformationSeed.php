<?php

use Illuminate\Database\Seeder;

class InformationSeed extends Seeder
{
   const COLS
     = [
       'tag_id',
       'information',
     ];

   const TAGS
     = [
       'title',
       'full_title',
       'header_info',
       'main_image',
     ];

   const INF
     = [
       'Лэндинг',
       'Типа.Лэндинг',
       'Text Text Text Text Text Text Text Text Text',
       '/image/custom/default.png',
     ];

   const COUNT = 4;

   public function run()
   {
      DB::table('information')->truncate();
      $tag = &$i;
      $information = &$i;
      for ($i = 0; $i < self::COUNT; $i++) {
         DB::table('information')->insert(
           [
             self::COLS[0] => self::TAGS[$tag],
             self::COLS[1] => self::INF[$information],
           ]);
      }
   }
}
