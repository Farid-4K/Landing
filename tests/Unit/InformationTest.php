<?php

namespace Tests\Unit;

use App\Admin\Admin;
use GuzzleHttp\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class InformationTests extends TestCase
{
   use WithoutMiddleware;
   use RefreshDatabase;

   public function testInformation()
   {
      $this->seed('DatabaseSeeder');
      Auth::loginUsingId(Admin::query()->first()->id);

      $response = $this->call('GET', '/admin');
      $this->assertEquals(200, $response->status());
   }

   public function testInformation2()
   {
      Auth::loginUsingId(Admin::query()->first()->id);

      $r = $this->get(
        '/admin/table/create?tag_id=' . str_random(5)
        . '&information=asd&description=asd');
      $this->assertResponseStatus(200);
   }

   public function testInformation2Error()
   {
      Auth::loginUsingId(Admin::query()->first()->id);

      $r = $this->get(
        '/admin/table/create?tag_id='.random_int(1,100).'&information=asd&description=asd');
      $this->assertResponseStatus(302);
   }
}