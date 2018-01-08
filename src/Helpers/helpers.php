<?php

if (! function_exists('toastr')) {
    /**
     * @param string $message
     * @param string $type
     * @param null $title
     * @param array $options
     *
     * @return \Illuminate\Foundation\Application|mixed|\Yoeunes\Toastr\Toastr
     */
    function toastr(string $message = null, string $type = 'success', $title = null, $options = [])
    {
        if(is_null($message)) {
            return app('toastr');
        }

        return app('toastr')->add($type, $message, $title, $options);
    }
}
