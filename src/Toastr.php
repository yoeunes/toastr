<?php

/*
 * This file is part of the yoeunes/toastr package.
 * (c) Younes KHOUBZA <younes.khoubza@gmail.com>
 */

namespace Yoeunes\Toastr;

use Flasher\Toastr\Prime\ToastrFactory;

class Toastr
{
    const ERROR = 'error';
    const INFO = 'info';
    const SUCCESS = 'success';
    const WARNING = 'warning';

    /**
     * @var ToastrFactory
     */
    private $toastrFactory;

    /**
     * @var array<string, mixed>
     */
    private $options;

    /**
     * @param array<string, mixed> $options
     */
    public function __construct(ToastrFactory $toastrFactory, array $options = array())
    {
        $this->toastrFactory = $toastrFactory;
        $this->options = $options;
    }

    /**
     * Shortcut for adding an error notification.
     *
     * @param string               $message The notification's message
     * @param string               $title   The notification's title
     * @param array<string, mixed> $options The notification's options
     *
     * @return Toastr
     */
    public function error($message, $title = '', array $options = array())
    {
        return $this->addNotification(self::ERROR, $message, $title, $options);
    }

    /**
     * Shortcut for adding an info notification.
     *
     * @param string               $message The notification's message
     * @param string               $title   The notification's title
     * @param array<string, mixed> $options The notification's options
     *
     * @return Toastr
     */
    public function info($message, $title = '', array $options = array())
    {
        return $this->addNotification(self::INFO, $message, $title, $options);
    }

    /**
     * Shortcut for adding a success notification.
     *
     * @param string               $message The notification's message
     * @param string               $title   The notification's title
     * @param array<string, mixed> $options The notification's options
     *
     * @return Toastr
     */
    public function success($message, $title = '', array $options = array())
    {
        return $this->addNotification(self::SUCCESS, $message, $title, $options);
    }

    /**
     * Shortcut for adding a warning notification.
     *
     * @param string               $message The notification's message
     * @param string               $title   The notification's title
     * @param array<string, mixed> $options The notification's options
     *
     * @return Toastr
     */
    public function warning($message, $title = '', array $options = array())
    {
        return $this->addNotification(self::WARNING, $message, $title, $options);
    }

    /**
     * Add a notification.
     *
     * @param string               $type    could be error, info, success, or warning
     * @param string               $message The notification's message
     * @param string               $title   The notification's title
     * @param array<string, mixed> $options The notification's options
     *
     * @return Toastr
     */
    public function addNotification($type, $message, $title = '', array $options = array())
    {
        @trigger_error('yoeunes/toastr is deprecated please use PHPFlasher instead. see https://php-flasher.io/', \E_USER_DEPRECATED);

        $options = array_merge($this->options, $options);

        $this->toastrFactory->addFlash($type, $message, $title, $options);

        return $this;
    }
}
