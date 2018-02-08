<?php

if (! function_exists('toastr')) {
    /**
     * @param string $message
     * @param string $type
     * @param string $title
     * @param array $options
     *
     * @return \Illuminate\Foundation\Application|mixed|\Yoeunes\Toastr\Toastr
     */
    function toastr(string $message = null, string $type = 'success', string $title = '', array $options = [])
    {
        if (is_null($message)) {
            return app('toastr');
        }

        return app('toastr')->add($type, $message, $title, $options);
    }
}

if (! function_exists('toastr_js')) {
    /**
     * @param string $version
     * @param string $src
     *
     * @return string
     */
    function toastr_js(string $version = '2.1.4', string $src = null)
    {
        if (null === $src) {
            $src = 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/'.$version.'/toastr.min.js';
        }

        return '<script type="text/javascript" src="'.$src.'"></script>';
    }
}

if (! function_exists('toastr_css')) {
    /**
     * @param string $version
     * @param string $href
     *
     * @return string
     */
    function toastr_css(string $version = '2.1.4', string $href = null)
    {
        if (null === $href) {
            $href = 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/'.$version.'/toastr.min.css';
        }

        return '<link rel="stylesheet" type="text/css" href="'.$href.'">';
    }
}

if (! function_exists('jquery')) {
    /**
     * @param string $version
     * @param string $src
     *
     * @return string
     */
    function jquery(string $version = '3.3.1', string $src = null)
    {
        if (null === $src) {
            $src = 'https://cdnjs.cloudflare.com/ajax/libs/jquery/'.$version.'/jquery.min.js';
        }

        return '<script type="text/javascript" src="'.$src.'"></script>';
    }
}
