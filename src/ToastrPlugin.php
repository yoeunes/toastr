<?php

/*
 * This file is part of the yoeunes/toastr package.
 * (c) Younes KHOUBZA <younes.khoubza@gmail.com>
 */

namespace Yoeunes\Toastr;

use Flasher\Prime\Plugin\Plugin;

class ToastrPlugin extends Plugin
{
    /**
     * {@inheritdoc}
     */
    public function getScripts()
    {
        return array(
            'cdn' => array(
                'https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js',
                'https://cdn.jsdelivr.net/npm/@flasher/flasher-toastr@1.2.4/dist/flasher-toastr.min.js',
            ),
            'local' => array(
                '/vendor/flasher/jquery.min.js',
                '/vendor/flasher/flasher-toastr.min.js',
            ),
        );
    }
}
