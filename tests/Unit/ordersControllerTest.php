<?php

namespace Tests\Unit;

use App\Admin\Admin;
use App\Admin\Order;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ordersControllerTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;

    /**
     *
     */
    public function testOrders()
    {
        /**
         * Окружение
         */
        $this->seed('OrdersSeed');
        Auth::loginUsingId(Admin::query()->first()->id);

        /**
         * Тест
         */
        $response = $this->call('GET', '/admin');

        /**
         * Проверка
         */
        $this->assertEquals(200, $response->status());
    }

    public function testOrdersShow()
    {
        /**
         * Окружение
         */

        /**
         * Тест
         */
        $this->get('/admin/orders');

        /**
         * Проверка
         */
        $this->see('Сообщение');
    }

    /**
     *
     */
    public function testOrdersComplete()
    {
        /**
         * Окружение
         */
        $id = Order::query()->first()->id;

        /**
         * Тест
         */
        $this->get('/admin/orders/complete?id=' . $id);

        /**
         * Проверка
         */
        $this->assertResponseStatus(200);
    }

    /**
     *
     */
    public function testOrdersDelete()
    {
        /**
         * Окружение
         */
        $id = Order::query()->first()->id;

        /**
         * Тест
         */
        $this->get('/admin/orders/delete?id=' . $id);

        /**
         * Проверка
         */
        $this->assertResponseStatus(200);
    }

    public function testOrdersDeleteErrors()
    {
        /**
         * Окружение
         */
        $id = 5000;

        /**
         * Тест
         */
        $this->get('/admin/orders/delete?id=' . $id);

        /**
         * Проверка
         */
        $this->assertResponseStatus(500);
    }
}
