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
       'complete',
     ];
   protected $table = 'users';

   public static function trash($id)
   {
      $row = self::query()->find($id);
      $row->delete();
      return true;
   }

   public static function complete($id)
   {
      $row = self::query()->find($id);
      $row->complete = true;
      $row->save();
      return true;
   }
}
