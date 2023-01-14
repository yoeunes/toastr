<?php

/*
 * This file is part of the yoeunes/toastr package.
 * (c) Younes KHOUBZA <younes.khoubza@gmail.com>
 */

namespace Yoeunes\Toastr;

use Flasher\Prime\Notification\NotificationBuilder;

/**
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
final class ToastrBuilder extends NotificationBuilder
{
    /**
     * Enable a close button.
     *
     * @param bool $closeButton
     *
     * @return static
     */
    public function closeButton($closeButton = true)
    {
        $this->option('closeButton', $closeButton);

        return $this;
    }

    /**
     * @param string $closeClass
     *
     * @return static
     */
    public function closeClass($closeClass)
    {
        $this->closeButton();

        $this->option('closeClass', $closeClass);

        return $this;
    }

    /**
     * @param int $closeDuration
     *
     * @return static
     */
    public function closeDuration($closeDuration)
    {
        $this->option('closeDuration', $closeDuration);

        return $this;
    }

    /**
     * @param string $closeEasing
     *
     * @return static
     */
    public function closeEasing($closeEasing)
    {
        $this->option('closeEasing', $closeEasing);

        return $this;
    }

    /**
     * Override the close button's HTML.
     *
     * @param string $closeHtml
     *
     * @return static
     */
    public function closeHtml($closeHtml)
    {
        $this->option('closeHtml', $closeHtml);

        return $this;
    }

    /**
     * @param string $closeMethod
     *
     * @return static
     */
    public function closeMethod($closeMethod)
    {
        $this->option('closeMethod', $closeMethod);

        return $this;
    }

    /**
     * @param bool $closeOnHover
     *
     * @return static
     */
    public function closeOnHover($closeOnHover = true)
    {
        $this->option('closeOnHover', $closeOnHover);

        return $this;
    }

    /**
     * @param string $containerId
     *
     * @return static
     */
    public function containerId($containerId)
    {
        $this->option('containerId', $containerId);

        return $this;
    }

    /**
     * @param bool $debug
     *
     * @return static
     */
    public function debug($debug = true)
    {
        $this->option('debug', $debug);

        return $this;
    }

    /**
     * In case you want to escape HTML characters in title and message.
     *
     * @param bool $escapeHtml
     *
     * @return static
     */
    public function escapeHtml($escapeHtml = true)
    {
        $this->option('escapeHtml', $escapeHtml);

        return $this;
    }

    /**
     * How long the toast will display after a user hovers over it.
     *
     * @param int $extendedTimeOut
     *
     * @return static
     */
    public function extendedTimeOut($extendedTimeOut)
    {
        $this->option('extendedTimeOut', $extendedTimeOut);

        return $this;
    }

    /**
     * Specifies the time during which the pop-up closes in ms.
     *
     * @param int $hideDuration
     *
     * @return static
     */
    public function hideDuration($hideDuration)
    {
        $this->option('hideDuration', $hideDuration);

        return $this;
    }

    /**
     * Indicates the entry transition of the pop-up.
     *
     * @param string $hideEasing
     *
     * @return static
     */
    public function hideEasing($hideEasing)
    {
        $this->option('hideEasing', $hideEasing);

        return $this;
    }

    /**
     * Indicates the opening animation of the pop-up.
     *
     * @param string $hideMethod
     *
     * @return static
     */
    public function hideMethod($hideMethod)
    {
        $this->option('hideMethod', $hideMethod);

        return $this;
    }

    /**
     * @param string $iconClass
     *
     * @return static
     */
    public function iconClass($iconClass)
    {
        $this->option('iconClass', $iconClass);

        return $this;
    }

    /**
     * @param string $messageClass
     *
     * @return static
     */
    public function messageClass($messageClass)
    {
        $this->option('messageClass', $messageClass);

        return $this;
    }

    /**
     * Show newest toast at bottom (top is default).
     *
     * @param bool $newestOnTop
     *
     * @return static
     */
    public function newestOnTop($newestOnTop = true)
    {
        $this->option('newestOnTop', $newestOnTop);

        return $this;
    }

    /**
     * @param string $onHidden
     *
     * @return static
     */
    public function onHidden($onHidden)
    {
        $this->option('onHidden', $onHidden);

        return $this;
    }

    /**
     * @param string $onShown
     *
     * @return static
     */
    public function onShown($onShown)
    {
        $this->option('onShown', $onShown);

        return $this;
    }

    /**
     * @param string $positionClass
     *
     * @return static
     */
    public function positionClass($positionClass)
    {
        $this->option('positionClass', $positionClass);

        return $this;
    }

    /**
     * Rather than having identical toasts stack, set the preventDuplicates property to true. Duplicates are matched to
     * the previous toast based on their message content.
     *
     * @param bool $preventDuplicates
     *
     * @return static
     */
    public function preventDuplicates($preventDuplicates = true)
    {
        $this->option('preventDuplicates', $preventDuplicates);

        return $this;
    }

    /**
     * Visually indicate how long before a toast expires.
     *
     * @param bool $progressBar
     *
     * @return static
     */
    public function progressBar($progressBar = true)
    {
        $this->option('progressBar', $progressBar);

        return $this;
    }

    /**
     * @param string $progressClass
     *
     * @return static
     */
    public function progressClass($progressClass)
    {
        $this->option('progressClass', $progressClass);

        return $this;
    }

    /**
     * Flip the toastr to be displayed properly for right-to-left languages.
     *
     * @param bool $rtl
     *
     * @return static
     */
    public function rtl($rtl = true)
    {
        $this->option('rtl', $rtl);

        return $this;
    }

    /**
     * Specifies the time during which the pop-up opens in ms.
     *
     * @param int $showDuration
     *
     * @return static
     */
    public function showDuration($showDuration)
    {
        $this->option('showDuration', $showDuration);

        return $this;
    }

    /**
     * Indicates the entry transition of the pop-up.
     *
     * @param string $showEasing
     *
     * @return static
     */
    public function showEasing($showEasing)
    {
        $this->option('showEasing', $showEasing);

        return $this;
    }

    /**
     * Indicates the opening animation of the pop-up.
     *
     * @param string $showMethod
     *
     * @return static
     */
    public function showMethod($showMethod)
    {
        $this->option('showMethod', $showMethod);

        return $this;
    }

    /**
     * Forces the user to validate the pop-up before closing.
     *
     * @param bool $tapToDismiss
     *
     * @return static
     */
    public function tapToDismiss($tapToDismiss = true)
    {
        $this->option('tapToDismiss', $tapToDismiss);

        return $this;
    }

    /**
     * @param string $target
     *
     * @return static
     */
    public function target($target)
    {
        $this->option('target', $target);

        return $this;
    }

    /**
     * How long the toast will display without user interaction.
     *
     * @param int $timeOut
     * @param int $extendedTimeOut
     *
     * @return static
     */
    public function timeOut($timeOut, $extendedTimeOut = null)
    {
        $this->option('timeOut', $timeOut);

        if (null !== $extendedTimeOut) {
            $this->extendedTimeOut($extendedTimeOut);
        }

        return $this;
    }

    /**
     * @param string $titleClass
     *
     * @return static
     */
    public function titleClass($titleClass)
    {
        $this->option('titleClass', $titleClass);

        return $this;
    }

    /**
     * @param string $toastClass
     *
     * @return static
     */
    public function toastClass($toastClass)
    {
        $this->option('toastClass', $toastClass);

        return $this;
    }

    /**
     * Prevent from Auto Hiding.
     *
     * @return static
     */
    public function persistent()
    {
        $this->timeOut(0);
        $this->extendedTimeOut(0);

        return $this;
    }
}
