<?php

namespace Tests\Unit;

use App\Admin\Admin;
use App\Admin\Information;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class informationControllerTests extends TestCase
{
   use WithoutMiddleware;
   use RefreshDatabase;

   public function testInformation()
   {
      /* prepare */
      $this->seed('InformationSeed');

      /* test */
      $response = $this->call('GET', '/admin');

      /* check */
      $this->assertResponseOk();
   }

   /**
    *Успешное создание
    */
   public function testInformationCreate()
   {
      $data = factory(\App\Admin\Information::class)->make();
      unset($data['id']);

      $this->post('/admin/table/create', $data->toArray());

      $this->assertResponseStatus(200);
   }

   /**
    * Успешное создание с изображением
    */
   public function testInformationCreateWithImage()
   {
      /* prepare */
      $tag_id = str_random(5);
      $information = '/image/background-main701-801.png';
      $description = str_random(10);

      /* test */
      $this->post('/admin/table/create', [
         'tag_id' => $tag_id,
         'information' => $information,
         'description' => $description,
      ]);

      /* check */
      $this->assertResponseStatus(200);
   }

   public function testInformationCreateTagIdNumberError()
   {
      /* prepare */
      $data = factory(\App\Admin\Information::class)->make();
      $data['tag_id'] = 10000;
      /* test */
      $this->post('/admin/table/create', $data->toArray());

      /* check */
      $this->assertResponseStatus(302);
   }

   /**
    *tag_id пустое поле
    */
   public function testInformationCreateTagIdNullError()
   {
      /* prepare */
      $tag_id = '';
      $information = str_random(10);
      $description = str_random(10);

      /* test */
      $this->post('/admin/table/create', [
         'tag_id' => $tag_id,
         'information' => $information,
         'description' => $description,
      ]);

      /* check */
      $this->assertResponseStatus(302);
   }

   /**
    *tag_id больше 100 символов
    */
   public function testInformationCreateValidateError()
   {
      /* prepare */
      $field = factory(\App\Admin\Information::class)->create([
         'tag_id' => str_random(105),
      ]);

      /* test */
      $this->post('/admin/table/create', $field->toArray());

      /* check */
      $this->assertResponseStatus(302);
   }

   /**
    *Успешное удаление информации
    */
   public function testInformationDelete()
   {
      /* prepare */
      $field = factory(\App\Admin\Information::class)->create();
      $data = Information::query()->first();
      /* test */
      $this->get('/admin/table/delete', ['id' => $data->id]);

      /* check */
      $this->assertResponseStatus(200);
   }

   /**
    * Создание неиспользуемого тэга
    */
   public function testInformationCreateUnused()
   {
      /* prepare */
      $_token = \Session::token();

      /* test */
      $this->get('/admin/table/create/unused?&test_tag=true');

      /* check */
      $this->assertResponseStatus(200);
   }

   /**
    * Удаление неиспользуемого тэга
    */
   public function testInformationDeleteUnused()
   {
      /* prepare */
      $_token = \Session::token();

      /* test */
      $this->get('/admin/table/delete/unused?&test_tag=true');

      /* check */
      $this->assertResponseStatus(200);
   }
}
