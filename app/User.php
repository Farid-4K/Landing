<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
   protected $fillable
     = [
       'name',
       'email',
       'phone',
       'count',
       'message',
       'grant',
     ];

   public static function trash($id)
   {
      $row = self::query()->find($id);
      $row->delete();
      return true;
   }
}
