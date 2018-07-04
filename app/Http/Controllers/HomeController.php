<?php

namespace App\Http\Controllers;

use Anam\Captcha\Captcha;
use App\Admin\{
    Information, Order
};
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
                'name' => 'required',
                'email' => 'email',
                'phone' => 'required|regex:/(^[\W0-9]+)/i',
                'count' => 'required',
                'message' => 'required|max:1000',
                'grant' => 'required',
            ]);

        /**
         * Запись
         */
        if ($response->isVerified() == 'true') {
            if (Order::query()->create($validated)) {
                Mail::send(new OrderMail($validated));
                return response('Запрос отправлен', 200);
            } else {
                return response('Ошибка', 500);
            }

        } else {
            return response('Ошибка', 402);
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
