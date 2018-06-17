<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function show()
   {
      $uncomplete = User::where('complete', false)->get();
      $complete = User::where('complete', true)->get();

      $data = [
        'uncomplete' => $uncomplete,
        'complete'   => $complete,
      ];

      return view('admin.orders', $data);
   }

   public function delete(Request $request)
   {
      if($request->filled('id')) {
         $id = $request->get('id');
         if(User::trash($id)) {
            return response('Заказ удален - ' . $id);
         } else {
            return response('Ошибка', 500);
         }
      }
   }

   public function complete(Request $request)
   {
      if($request->filled('id')) {
         $id = $request->get('id');
         if(User::complete($id)) {
            return response('Заказ завершен - ' . $id);
         } else {
            return response('Ошибка', 500);
         }
      }
   }
}
