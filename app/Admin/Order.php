<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
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

   protected $table = 'orders';

   public static function complete($id)
   {
      $row = self::query()->find($id);
      $row->complete = true;
      $row->save();
      return true;
   }

   public static function trash($id)
   {
      $row = self::query()->find($id);
      $row->delete();
      return true;
   }
}
