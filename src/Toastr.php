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
     * Allowed toast types.
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
        return '<script type="text/javascript">' . $this->options() . $this->notificationsAsString() . '</script>';
    }

    /**
     * Get global toastr options.
     *
     * @return string
     */
    public function options()
    {
        return 'toastr.options = '.json_encode(config('toastr.options')).';';
    }

    /**
     * Create a single toastr.
     *
     * @param string $type
     * @param string $message
     * @param string|null $title
     * @param string|null $options
     *
     * @return string
     */
    public function toastr(string $type, string $message, string $title = null, string $options = null)
    {
        return "toastr.${$type}(${$message}, ${$title}, ${$options});";
    }

    /**
     * map over all notifications and create an array of toastrs.
     *
     * @return array
     */
    public function notifications()
    {
        return array_map(function ($n) {
            return $this->toastr($n['type'], $n['message'], $n['title'], json_encode($n['options']));
        }, session('toastr::notifications', []));
    }

    /**
     * @return string
     */
    public function notificationsAsString()
    {
        return implode('', $this->notifications());
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
