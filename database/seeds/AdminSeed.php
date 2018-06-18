<?php

use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {

      DB::table('admin')->truncate();

      DB::table('admin')->insert([
        'name'     => 'admin',
        'email'    => 'email@email.em',
        'password' => bcrypt('admin'),
        'login'    => 'admin ',
      ]);

   }
}
