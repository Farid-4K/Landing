<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function show()
   {
      $users = User::all();
      $data = [
        'users' => $users,
      ];

      return view('admin.orders', $data);
   }

   public function delete(Request $request)
   {
      if ($request->filled('id')) {
         $id = $request->get('id');
         if (User::trash($id)) {
            return response('Заказ удален - ' . $id);
         } else {
            return response('Ошибка', 500);
         }
      }
   }
}
