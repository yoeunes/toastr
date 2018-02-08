<?php

namespace Yoeunes\Toastr\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Yoeunes\Toastr\ToastrServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ToastrServiceProvider::class,
        ];
    }
}
