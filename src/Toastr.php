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

    public function __construct()
    {
        $this->notifications = session('toastr::notifications', []);
    }

    /**
     * Allowed toast types.
     *
     * @var array
     */
    protected $allowedTypes = [self::ERROR, self::INFO, self::SUCCESS, self::WARNING];

    /**
     * Shortcut for adding an error notification.
     *
     * @param string $message The notification's message
     * @param string $title The notification's title
     * @param array $options
     */
    public function error(string $message, string $title = '', array $options = [])
    {
        $this->addNotification(self::ERROR, $message, $title, $options);
    }

    /**
     * Shortcut for adding an info notification.
     *
     * @param string $message The notification's message
     * @param string $title The notification's title
     * @param array $options
     */
    public function info(string $message, string $title = '', array $options = [])
    {
        $this->addNotification(self::INFO, $message, $title, $options);
    }

    /**
     * Shortcut for adding a success notification.
     *
     * @param string $message The notification's message
     * @param string $title The notification's title
     * @param array $options
     */
    public function success(string $message, string $title = '', array $options = [])
    {
        $this->addNotification(self::SUCCESS, $message, $title, $options);
    }

    /**
     * Shortcut for adding a warning notification.
     *
     * @param string $message The notification's message
     * @param string $title The notification's title
     * @param array $options
     */
    public function warning(string $message, string $title = '', array $options = [])
    {
        $this->addNotification(self::WARNING, $message, $title, $options);
    }

    /**
     * Add a notification.
     *
     * @param string $type Could be error, info, success, or warning.
     * @param string $message The notification's message
     * @param string $title The notification's title
     * @param array $options
     */
    public function addNotification(string $type, string $message, string $title = '', array $options = [])
    {
        $this->notifications[] = [
            'type'    => in_array($type, $this->allowedTypes) ? $type : self::WARNING,
            'title'   => $this->escapeSingleQuote($title),
            'message' => $this->escapeSingleQuote($message),
            'options' => json_encode($options),
        ];

        session()->flash('toastr::notifications', $this->notifications);
    }

    /**
     * Render the notifications' script tag.
     *
     * @return string
     *
     * @internal param bool $flashed Whether to get the
     */
    public function render()
    {
        return '<script type="text/javascript">'.$this->options().$this->notificationsAsString().'</script>';
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
     * @return string
     */
    public function notificationsAsString()
    {
        return implode('', $this->notifications());
    }

    /**
     * map over all notifications and create an array of toastrs.
     *
     * @return array
     */
    public function notifications()
    {
        return array_map(
            function ($n) {
                return $this->toastr($n['type'], $n['message'], $n['title'], $n['options']);
            },
            session('toastr::notifications', [])
        );
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
    public function toastr(string $type, string $message = '', string $title = '', string $options = '')
    {
        return "toastr.$type('$message', '$title', $options);";
    }

    /**
     * Clear all notifications.
     */
    public function clear()
    {
        $this->notifications = [];
    }

    /**
     * helper function to escape single quote for example for french words.
     *
     * @param string $value
     *
     * @return string
     */
    private function escapeSingleQuote(string $value)
    {
        return str_replace("'", "\\'", $value);
    }
}
