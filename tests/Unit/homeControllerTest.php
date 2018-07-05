<?php

namespace Tests\Unit;


use Anam\Captcha\Captcha;
use Illuminate\Http\Request;
use Mockery;
use ReCaptcha\Response;
use Tests\TestCase;

class homeControllerTest extends TestCase
{
    /**
     *
     */
    public function testHome()
    {
        /**
         * Тест
         */
        $response = $this->call('GET', '/');

        /**
         * Проверка
         */
        $this->assertEquals(200, $response->status());
    }

    /**
     * Успешный заказ
     */
    public function testHomeAdd()
    {
        /**
         * Окружение
         */
        $user = factory(\App\Admin\Order::class)->make();
        $request = Mockery::mock(Request::class);
        $request->allows()->input('g-recaptcha-response')->andReturn('success');

        $request->allows()->ip()->andReturn('127.0.0.1');

        $captcha = Mockery::mock(Captcha::class)->makePartial();
        $captcha->allows()->verify($request->input('g-recaptcha-response'), $request->ip())
            ->andReturn(new Response(true));

        $captcha->check($request);

        /**
         * Тест
         */
        $this->get('/main/add', [
            'name' => $user['name'],
            'email' => $user['email'],
            'phone' => $user['phone'],
            'count' => $user['count'],
            'message' => $user['message'],
            'grant' => $user['grant'],
        ]);

        /**
         * Проверка
         */
        $this->assertTrue($captcha->isVerified());
        $this->assertResponseStatus(302);
    }

    /**
     * Не введено имя и неверный формат email
     */
    public function testHomeAddErrorValidate()
    {
        /**
         * Окружение
         */
        $user = factory(\App\Admin\Order::class)->make();

        /**
         * Тест
         */
        $this->get('/main/add', [
            'name' => '',
            'email' => $user['email'],
            'phone' => $user['phone'],
            'count' => $user['count'],
            'message' => $user['message'],
            'grant' => $user['grant'],
        ]);

        /**
         * Проверка
         */
        $this->assertResponseStatus(302);
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
