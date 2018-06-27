<?php

namespace Tests\Unit;

use App\Admin\Admin;
use App\Admin\Information;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;


class InformationTests extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;

    /**
     *
     */
    public function testInformation()
    {
        $this->seed('DatabaseSeeder');
        Auth::loginUsingId(Admin::query()->first()->id);
        $response = $this->call('GET', '/admin');
        $this->assertEquals(200, $response->status());
    }

    /**
     *Успешное создание
     */
    public function testInformationCreate()
    {
        $this->get('/admin/table/create?tag_id=' . str_random(5) . '&information=' . str_random(10) . '&description=' . str_random(10) . '');
        $this->assertResponseStatus(200);
    }

    /**
     *
     */
    public function testInformationCreateValidate()
    {
        $rand = str_random(100);

        $this->get('/admin/table/create?tag_id=' . $rand . '&information=&description=');
        $this->assertResponseStatus(200);
    }

    /**
     *tag_id только числа
     */
    public function testInformationCreateError()
    {

        $this->get('/admin/table/create?tag_id=123&information=' . str_random(10) . '&description=' . str_random(10) . '');
        $this->assertResponseStatus(302);
    }

    /**
     *tag_id пустое поле
     */
    public function testInformationCreateNullError()
    {
        $this->get('/admin/table/create?tag_id=&information=' . str_random(10) . '&description=' . str_random(10) . '');
        $this->assertResponseStatus(302);
    }

    /**
     *tag_id больше 100 символов
     */
    public function testInformationCreateValidateError()
    {
        $rand = str_random(101);
        $this->get('/admin/table/create?tag_id=' . $rand . '&information=&description=');
        $this->assertResponseStatus(302);
    }

    /**
     *Успешное удаление информации
     */
    public function testInformationDelete()
    {
        $this->seed('InformationSeed');
        $this->get('/admin/table/delete?id=' . Information::query()->first()->id);
        $this->assertResponseStatus(200);
    }

    public function testInformationCreateUnused()
    {
        $this->get('/admin/table/create/unused?_token=XQYPBbyBVAcvXTd29i0VQq1TNa13yrkuD5VGDQNe&zaqzqaz=true');
        $this->assertResponseStatus(200);
    }

    public function testInformationCreateUnusedWithoutToken()
    {
        $this->get('/admin/table/create/unused?zaqzqaz=true');
        $this->assertResponseStatus(403);
    }
}