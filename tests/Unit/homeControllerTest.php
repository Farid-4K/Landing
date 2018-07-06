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
      /* test */
      $response = $this->call('GET', '/');

      /* check */
      $this->assertEquals(200, $response->status());
   }

   /**
    * Успешный заказ
    */
   public function testHomeAdd()
   {
      /* prepare */
      $user = factory(\App\Admin\Order::class)->make();
      $request = Mockery::mock(Request::class);
      $request->allows()->input('g-recaptcha-response')->andReturn('success');

      $request->allows()->ip()->andReturn('127.0.0.1');

      $captcha = Mockery::mock(Captcha::class)->makePartial();
      $captcha->allows()->verify($request->input('g-recaptcha-response'),
         $request->ip())
         ->andReturn(new Response(true));

      $captcha->check($request);

      /* test */
      $this->get('/main/add', $user->toArray());

      /* check */
      $this->assertTrue($captcha->isVerified());
      $this->assertResponseStatus(302);
   }

   /**
    * Не введено имя и неверный формат email
    */
   public function testHomeAddErrorValidate()
   {
      /* prepare */
      $user = factory(\App\Admin\Order::class)->make();
      unset($user['name']);
      /* test */
      $this->get('/main/add', $user->toArray());

      /* check */
      $this->assertResponseStatus(302);
   }

   public function tearDown()
   {
      Mockery::close();
   }
}
