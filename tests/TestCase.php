<?php

namespace Yoeunes\Toastr\Tests;

use Yoeunes\Toastr\ToastrServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ToastrServiceProvider::class,
        ];
    }
}
