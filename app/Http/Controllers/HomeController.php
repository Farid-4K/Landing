<?php

namespace App\Http\Controllers;

use Anam\Captcha\Captcha;
use App\Information;
use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $flights = Information::all();

        $data = [];

        foreach ($flights as $flight) {
            $data[$flight->tag_id] = $flight->information;
        }

        return view('welcome', $data);
    }

    public function add(Request $request, Captcha $captcha)
    {
        $response = $captcha->check($request);
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'email',
                'phone' => 'required|regex:/\+([0-9]\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2})/i',
                'count' => 'required|max:10',
                'message' => 'max:1000',
                'grant' => 'required',
            ]);
        $user = new Order;
        if($response->isVerified() == 'true') {
            $user->fill(
                [
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'] ?: 0,
                    'count' => $validated['count'] ?: 0,
                    'message' => $validated['message'] ?: 'Сообщения нет',
                    'grant' => $validated['grant'],
                ]);
            if ($user->save()) {
                return response('Запрос отправлен');
            } else {
                return response('Ошибка');
            }
        }
        else {
            return response('Ошибка');
        }
    }
}
