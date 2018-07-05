<?php

namespace Tests\Unit;

use App\Admin\Admin;
use App\Admin\Information;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;


class informationControllerTests extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;

    /**
     *
     */
    public function testInformation()
    {
        /**
         * Окружение
         */
        $this->seed('InformationSeed');
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

    /**
     *Успешное создание
     */
    public function testInformationCreate()
    {
        /**
         * Окружение
         */
        $tag_id = str_random(5);
        $information = str_random(10);
        $description = str_random(10);

        /**
         * Тест
         */
        $this->post('/admin/table/create', [
            'tag_id' => $tag_id,
            'information' => $information,
            'description' => $description,
        ]);

        /**
         * Проверка
         */
        $this->assertResponseStatus(200);
    }

    /**
     * Успешное создание с изображением
     */
    public function testInformationCreateWithImage()
    {
        /**
         * Окружение
         */
        $tag_id = str_random(5);
        $information = '/image/background-main701-801.png';
        $description = str_random(10);

        /**
         * Тест
         */
        $this->post('/admin/table/create', [
            'tag_id' => $tag_id,
            'information' => $information,
            'description' => $description,
        ]);

        /**
         * Проверка
         */
        $this->assertResponseStatus(200);
    }


    /**
     *tag_id только числа
     */
    public function testInformationCreateTagIdNumberError()
    {
        /**
         * Окружение
         */
        $tag_id = 25000;
        $information = str_random(10);
        $description = str_random(10);

        /**
         * Тест
         */
        $this->post('/admin/table/create', [
            'tag_id' => $tag_id,
            'information' => $information,
            'description' => $description,
        ]);

        /**
         * Проверка
         */
        $this->assertResponseStatus(302);
    }

    /**
     *tag_id пустое поле
     */
    public function testInformationCreateTagIdNullError()
    {
        /**
         * Окружение
         */
        $tag_id = '';
        $information = str_random(10);
        $description = str_random(10);

        /**
         * Тест
         */
        $this->post('/admin/table/create', [
            'tag_id' => $tag_id,
            'information' => $information,
            'description' => $description,
        ]);

        /**
         * Проверка
         */
        $this->assertResponseStatus(302);
    }

    /**
     *tag_id больше 100 символов
     */
    public function testInformationCreateValidateError()
    {
        /**
         * Окружение
         */
        $tag_id = str_random(105);
        $information = str_random(10);
        $description = str_random(10);

        /**
         * Тест
         */
        $this->post('/admin/table/create', [
            'tag_id' => $tag_id,
            'information' => $information,
            'description' => $description,
        ]);

        /**
         * Проверка
         */
        $this->assertResponseStatus(302);
    }

    /**
     *Успешное удаление информации
     */
    public function testInformationDelete()
    {
        /**
         * Окружение
         */
        $id = Information::query()->first()->id;

        /**
         * Тест
         */
        $this->get('/admin/table/delete?id=' . $id);


        /**
         * Проверка
         */
        $this->assertResponseStatus(200);
    }

    /**
     * Создание неиспользуемого тэга
     */
    public function testInformationCreateUnused()
    {
        /**
         * Окружение
         */
        $_token = 'XQYPBbyBVAcvXTd29i0VQq1TNa13yrkuD5VGDQNe';

        /**
         * Тест
         */
        $this->get('/admin/table/create/unused?_token=' . $_token . '&test_tag=true');

        /**
         * Проверка
         */
        $this->assertResponseStatus(200);
    }

    /**
     *Создание неиспользуемого тэга без токена
     */
    public function testInformationCreateUnusedWithoutToken()
    {
        /**
         * Тест
         */
        $this->get('/admin/table/create/unused?test_tag=true');

        /**
         * Проверка
         */
        $this->assertResponseStatus(403);
    }

    /**
     * Удаление неиспользуемого тэга
     */
    public function testInformationDeleteUnused()
    {
        /**
         * Окружение
         */
        $_token = 'XQYPBbyBVAcvXTd29i0VQq1TNa13yrkuD5VGDQNe';

        /**
         * Тест
         */
        $this->get('/admin/table/delete/unused?_token=' . $_token . '&test_tag=true');

        /**
         * Проверка
         */
        $this->assertResponseStatus(200);
    }
}