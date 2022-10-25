<?php

/*
 * This file is part of the yoeunes/toastr package.
 * (c) Younes KHOUBZA <younes.khoubza@gmail.com>
 */

use Yoeunes\Toastr\Toastr;

if (!function_exists('toastr')) {
    /**
     * @see https://php-flasher.io/
     *
     * @param string               $message The notification's message
     * @param string               $type    could be error, info, success, or warning
     * @param string               $title   The notification's title
     * @param array<string, mixed> $options The notification's options
     *
     * @return Toastr
     */
    function toastr($message = null, $type = 'success', $title = '', array $options = array())
    {
        if (null === $message) {
            return app('toastr');
        }

        return app('toastr')->addNotification($type, $message, $title, $options);
    }
}
