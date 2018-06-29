<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
   /**
    * Завершение заказа
    * @param \Illuminate\Http\Request $request
    *
    * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
    */
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

   /**
    * Удаление заказа
    * @param \Illuminate\Http\Request $request
    *
    * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
    */
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

   /**
    * Вывод всех заказов
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
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
