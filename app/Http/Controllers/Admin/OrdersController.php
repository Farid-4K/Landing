<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
   public function complete(Request $request)
   {
      if ($request->filled('id')) {
         $id = $request->get('id');
         if (Order::complete($id)) {
            return response('Заказ завершен - ' . $id);
         } else {
            return response('Ошибка', 500);
         }
      }
   }

   public function delete(Request $request)
   {
      if ($request->filled('id')) {
         $id = $request->get('id');
         if (Order::trash($id)) {
            return response('Заказ удален - ' . $id);
         } else {
            return response('Ошибка', 500);
         }
      }
   }

   public function show()
   {
      $uncompleted = Order::query()->where('complete', false)->get();
      $completed = Order::query()->where('complete', true)->get();

      $data = [
         'uncompleted' => $uncompleted,
         'completed'   => $completed,
      ];

      return view('admin.orders', $data);
   }
}
