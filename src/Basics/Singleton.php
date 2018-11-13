<?php

namespace Basics;

class Singleton
{
    private static $instance;

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Locks for contruct, clone, wakeup methods
     */
    public function __construct() {}
    public function __clone() {}
    public function __wakeup() {}

}