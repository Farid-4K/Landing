<?php

namespace App\Http\Controllers;

use Anam\Captcha\Captcha;
use App\Admin\Information;
use App\Admin\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   /**
    * Добавление заказа
    *
    * @param \Illuminate\Http\Request $request
    * @param \Anam\Captcha\Captcha $captcha
    *
    * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
    */
   public function add(Request $request, Captcha $captcha)
   {
      /**
       * Валидация
       */
      $response = $captcha->check($request);
      $validated = $request->validate(
        [
          'name'    => 'required',
          'email'   => 'email',
          'phone'   => 'required|regex:/(^[\W0-9]+)/i',
          'count'   => 'required|max:10',
          'message' => 'required|max:1000',
          'grant'   => 'required',
        ]);

      /**
       * Запись
       */
      if($response->isVerified() == 'true') {
          return Order::query()->create($validated)
           ? response('Запрос отправлен',200)
           : response('Ошибка',500);
      } else {
         return response('Ошибка',402);
      }
   }

   /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
   public function welcome()
   {
      foreach (Information::all() as $col) {
         $data[$col->tag_id] = $col->information;
      }

      return view('landing', $data ?? null);
   }
}
