<?php

namespace Tests\Unit;

use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
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
      $name = 'Smith';
      $email = 'smith@test.com';
      $phone = '+7(999)999-99-99';
      $count = '11';
      $message = 'Test text';
      $grant = 'on';

      /**
       * Тест
       */
      $this->get(
        '/main/add?name=' . $name . '&email=' . $email . '&phone=' . $phone . '&count='
        . $count .
        '&message=' . $message . '&grant=' . $grant);

      /**
       * Проверка
       */
      $this->assertResponseStatus(200);
   }

   public function testHomeAddError()
   {
      /**
       * Окружение
       */
      $name = 'Smith';
      $email = 'smith@test.com';
      $phone = '+7(999)999-99-99';
      $count = '11';
      $message = 'Test text';
      $grant = 'on';

      /**
       * Тест
       */
      $this->get(
        '/main/add?name=' . $name . '&email=' . $email . '&phone=' . $phone . '&count='
        . $count . '&message=' . $message . '&grant=' . $grant);

      /**
       * Проверка
       */
      $this->assertResponseStatus(402);
   }

   /**
    * Не введено имя и неверный формат email
    */
   public function testHomeAddErrorValidate()
   {
      /**
       * Окружение
       */
      $name = '';
      $email = 'smith@test';
      $phone = '+7(999)999-99-99';
      $count = '11';
      $message = 'Test text';
      $grant = 'on';

      /**
       * Тест
       */
      $this->get(
        '/main/add?name=' . $name . '&email=' . $email . '&phone=' . $phone . '&count='
        . $count . '&message=' . $message . '&grant=' . $grant);

      /**
       * Проверка
       */
      $this->assertResponseStatus(302);
   }

   public function testOrderShipping()
   {
      Mail::fake();

      $about = [
        'name'    => 'John',
        'email'   => 'farid5ip50@gmail.com',
        'phone'   => '+7(920)459-99-99',
        'count'   => '7',
        'message' => 'message',
        'grant'   => 'on',
      ];

      Mail::send($about);
      // Assert a mailable was sent twice...
      Mail::assertSent(OrderMail::class);
   }
}
