<?php

/*
 * This file is part of the yoeunes/toastr package.
 * (c) Younes KHOUBZA <younes.khoubza@gmail.com>
 */

namespace Yoeunes\Toastr\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Yoeunes\Toastr\Toastr error(string $message, string $title = '', array $options = [])
 * @method static \Yoeunes\Toastr\Toastr info(string $message, string $title = '', array $options = [])
 * @method static \Yoeunes\Toastr\Toastr success(string $message, string $title = '', array $options = [])
 * @method static \Yoeunes\Toastr\Toastr warning(string $message, string $title = '', array $options = [])
 * @method static \Yoeunes\Toastr\Toastr addNotification(string $type, string $message, string $title = '', array $options = [])
 */
class Toastr extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'toastr';
    }
}
