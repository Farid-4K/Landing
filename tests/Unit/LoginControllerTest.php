<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginControllerTest extends TestCase
{
   use RefreshDatabase;

   public function testRedirectIfNotLogin()
   {
      /**
       * Окружение
       */
      $this->seed('AdminSeed');
      \Auth::logout();

      /**
       * Тест
       */
      $this->get('/admin');
      $this->assertRedirectedTo('/login');

      $this->get('/admin/about');
      $this->assertRedirectedTo('/login');

      $this->get('/v2');
      $this->assertRedirectedTo('/login');

      $this->get('/admin/table/');
      $this->assertRedirectedTo('/login');

      $this->get('/admin/orders');
      $this->assertRedirectedTo('/login');

      $this->get('/admin/landing/preview');
      $this->assertRedirectedTo('/login');
   }

   public function testLogin()
   {
      /**
       * Окружение
       */
      $this->seed('AdminSeed');
      \Auth::logout();

      /**
       * Тест
       */
      $this->post(
        '/login', [
        'login'    => 'admin',
        'password' => 'admin',
      ]);

      /**
       * Проверка
       */
      $this->assertResponseStatus(302);
      $this->assertRedirectedTo('/admin');
   }
}
