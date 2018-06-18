<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Admin extends Model
{

   protected $table = 'admin';

   protected $fillable
     = [
       'name',
       'email',
       'password',
       'login',
       'vk'
     ];

   public static function set(Request $request, $column)
   {
      $validatedData = $request->validate([
        $column => 'required|min:3|max:50',
      ]);

      $data = self::query()->find(1);
      $data->$column = $validatedData->$column;
      return $data->save() ? 'Сохранено' : false;
   }
}
