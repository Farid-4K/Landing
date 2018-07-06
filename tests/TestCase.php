<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
   use CreatesApplication;
   public $baseUrl = 'http://landing';

}
