<?php

namespace Tests\Unit;

use App\Admin\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class adminControllerTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;

    public function testAdminSetSettings()
    {
        /**
         * Окружение
         */
        $this->seed('AdminSeed');
        Auth::loginUsingId(Admin::query()->first()->id);

        /**
         * Тест
         */
        $this->get(
            '/admin/settings/set/admin/?login=' . str_random(7)
            . '&name=' . str_random(7)
            . '&email=asd@asd.asds');

        /**
         * Проверка
         */
        $this->assertResponseOk();
    }

    public function testAdminSetSettingsInvalid()
    {
        /**
         * Окружение
         */
        $this->seed('AdminSeed');
        Auth::loginUsingId(Admin::query()->first()->id);

        /**
         * Тест
         */
        $this->get(
            '/admin/settings/set/admin?'
            . 'name=' . str_random(55)
            . '&email=asd@asd.asds');

        /**
         * Проверка
         */
        $this->assertResponseStatus(302);
    }

    public function testAdminSetNewPassword()
    {
        /**
         * Окружение
         */
        $testPassword = 'adminTestPassword';

        /**
         * Тест
         */
        $this->get('/admin/settings/set/password?password=' . $testPassword);
//      $this->seed('AdminSeed');

        /**
         * Проверка
         */
        $this->assertResponseStatus(200);
    }

    public function testShowProfile()
    {
        /**
         * Окружение
         */

        /**
         * Тест
         */
        $this->get('/admin/settings/profile');

        /**
         * Проверка
         */
        $this->see('Изменить пароль');
    }

    public function testUnlinkToVK()
    {
        /**
         * Окружение
         */
        $vk = Admin::query()->first();
        $vk->vk = 87491012;
        $vk->save();

        /**
         * Тест
         */
        $this->get('/admin/settings/untie');

        /**
         * Проверка
         */
        $this->assertResponseStatus(302);
        $this->assertRedirectedTo('/admin');
    }

    public function testAdminSetMail()
    {
        /**
         * Окружение
         */
        $this->seed('AdminSeed');
        Auth::loginUsingId(Admin::query()->first()->id);
        $driver = 'smtp';
        $host = 'smtp.gmail.com';
        $username = 'test@gmail.com';
        $password = 'testtset';
        $encryption = 'tls';
        $port = '587';

        /**
         * Тест
         */
        $this->get('/admin/settings/set/mail?driver=' . $driver . '&host=' . $host . '&username='
            . $username . '&password=' . $password . '&encryption=' . $encryption . '&port=' . $port);

        /**
         * Проверка
         */
        $this->assertResponseStatus(200);
    }
}