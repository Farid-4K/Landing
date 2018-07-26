<?php

namespace Tests\Unit;

use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SendMailTest extends TestCase
{
    /**
     * Тестирование отправки письма
     *
     * @return void
     */
    public function testOrderShipping()
    {
        /**
         * Окружение
         */
        Mail::fake();
        $user = factory(\App\Admin\Order::class)->make();

        /**
         * Тест
         */
        $mailable = new OrderMail($user);
        Mail::to('farid5ip50@gmail.com')->send($mailable);

        /**
         * Проверка
         */
        Mail::assertSent(OrderMail::class);
    }
}
