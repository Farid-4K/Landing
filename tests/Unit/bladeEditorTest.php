<?php

namespace Tests\Unit;

use App\Admin\Information;
use App\Landing\BladeEditor;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class bladeEditorTest extends TestCase
{
   use WithoutMiddleware;
   use RefreshDatabase;

   const VARIABLE = 'variable';

   public function testFindEcho()
   {
      /**
       * Окружение
       */
      $this->seed(\DatabaseSeeder::class);
      $template = new BladeEditor('../../tests/common/landing');
      $template->template = '{{$variable}}';
      $template->save();
      /**
       * Тестирование
       */
      $regular = $template->findBladeEcho(self::VARIABLE);

      /**
       * Оценка
       */
      $this->assertTrue($regular);
   }

   public function testBladeParser()
   {
      /**
       * Окружение
       */
      $template = new BladeEditor('../../tests/common/landing');

      /**
       * Тестирование
       */
      $first = $template->parseBladeEchos(true);
      $second = $template->parseBladeEchos(false);
      /**
       * Оценка
       */
      $this->assertContains(self::VARIABLE, $first);
   }

   public function testReplaceEcho()
   {
      /**
       * Окружение
       */
      $template = new BladeEditor('../../tests/common/landing');

      /**
       * Тестирование
       */
      $status[0] = $template->replaceBladeEcho(
        'variable', null);
      $template->save();

      /**
       * Оценка
       */
      $this->assertTrue($status[0]);
   }

   public function testSaveTemplate()
   {
      /**
       * Окружение
       */
      $template = new BladeEditor('../../tests/common/landing');

      /**
       * Тестирование
       */
      $status = $template->save();

      /**
       * Оценка
       */
      $this->assertTrue($status);
   }
}
