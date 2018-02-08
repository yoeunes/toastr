<?php

namespace Yoeunes\Toastr;

class Toastr
{
    const ERROR   = 'error';
    const INFO    = 'info';
    const SUCCESS = 'success';
    const WARNING = 'warning';

    /**
     * Added notifications.
     *
     * @var array
     */
    protected $notifications = [];

    /**
     * Allowed toast types
     *
     * @var array
     */
    protected $allowedTypes = [self::ERROR, self::INFO, self::SUCCESS, self::WARNING];

    /**
     * Render the notifications' script tag.
     *
     * @return string
     *
     * @internal param bool $flashed Whether to get the
     */
    public function render()
    {
        $notifications = session('toastr::notifications', []);

        $output     = '<script type="text/javascript">';
        $lastConfig = [];
        foreach ($notifications as $notification) {
            $config = config('toastr.options');

            if (count($notification['options']) > 0) {
                $config = array_merge($config, $notification['options']);
            }

            if ($config != $lastConfig) {
                $output .= 'toastr.options = '.json_encode($config).';';
                $lastConfig = $config;
            }

            $output .= 'toastr.'.$notification['type']."('".$this->escapeString($notification['message'])."'".(isset($notification['title']) ? ", '".$this->escapeString($notification['title'])."'" : null).');';
        }
        $output .= '</script>';

        return $output;
    }

    public function constructToastr($type, $message, $title, $options)
    {
        $output = "toastr.${$type}(${$message}, ${$title}, ${$options});";

        return $output;
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function escapeString(string $value)
    {
        return str_replace("'", "\\'", $value);
    }

    /**
     * Add a notification.
     *
     * @param string $type Could be error, info, success, or warning.
     * @param string $message The notification's message
     * @param string $title The notification's title
     * @param array $options
     */
    public function add($type, $message, $title = null, $options = [])
    {
        if (! in_array($type, $this->allowedTypes)) {
            $type = self::WARNING;
        }

        $this->notifications[] = [
            'type'    => $type,
            'title'   => $title,
            'message' => $message,
            'options' => $options,
        ];

        session()->flash('toastr::notifications', $this->notifications);
    }

    /**
     * Shortcut for adding an info notification.
     *
     * @param string $message The notification's message
     * @param string $title The notification's title
     * @param array $options
     */
    public function info($message, $title = null, $options = [])
    {
        $this->add(self::INFO, $message, $title, $options);
    }

    /**
     * Shortcut for adding an error notification.
     *
     * @param string $message The notification's message
     * @param string $title The notification's title
     * @param array $options
     */
    public function error($message, $title = null, $options = [])
    {
        $this->add(self::ERROR, $message, $title, $options);
    }

    /**
     * Shortcut for adding a warning notification.
     *
     * @param string $message The notification's message
     * @param string $title The notification's title
     * @param array $options
     */
    public function warning($message, $title = null, $options = [])
    {
        $this->add(self::WARNING, $message, $title, $options);
    }

    /**
     * Shortcut for adding a success notification.
     *
     * @param string $message The notification's message
     * @param string $title The notification's title
     * @param array $options
     */
    public function success($message, $title = null, $options = [])
    {
        $this->add(self::SUCCESS, $message, $title, $options);
    }

    /**
     * Clear all notifications.
     */
    public function clear()
    {
        $this->notifications = [];
    }
}
