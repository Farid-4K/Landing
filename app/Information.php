<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use \Storage;

class Information extends Model
{

   protected $table = 'information';

   public static $message;

   protected $fillable
     = [
       'tag_id',
       'information',
     ];

   public static function trash($id)
   {
      $row = self::query()->find($id);
      $row->delete();
      return true;
   }

   /**
    * @param \Illuminate\Http\Request $request
    *
    * @return bool|\Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
    */
   public static function do_update(Request $request, $input)
   {
      extract($input);
      if ($request->filled($tag)) {
         $data = self::query()->find($request->get($id));
         $data->tag_id = $request->get($tag);
         $data->information = $request->get($inf);
         if ($request->hasFile($img)) {
            $data->information = self::uploadImage($request, $img);
         }
         $data->save();
         self::$message = 'Сохранено';
         return true;
      } else {
         self::$message = 'Неверное имя тега';
         return false;
      }
   }

   public static function checkUploadData($input)
   {
      $directory = env('IMAGES_PATH');
      $destinationPath = public_path() . $directory;
      $filename = str_random(20) . '.' . $input->getClientOriginalExtension()
        ?: 'jpg';
      $output = $directory . '/' . $filename;
      $input->move($destinationPath, $filename);
      Storage::put('images/', $filename);
      self::$message = 'Загружено';
      return $output;
   }

}
