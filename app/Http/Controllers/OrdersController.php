<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
   public function show()
   {
      $uncomplete = Order::where('complete', false)->get();
      $complete = Order::where('complete', true)->get();

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
         if(Order::trash($id)) {
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
         if(Order::complete($id)) {
            return response('Заказ завершен - ' . $id);
         } else {
            return response('Ошибка', 500);
         }
      }
   }
}
