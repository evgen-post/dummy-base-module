<?php
namespace Ds\Base\Base;

/**
 * Class Helper
 * @package Ds\Base\Helpers
 */
class Singleton
{
    protected static $instances = [];

    /**
     * @return static
     */
    public static function getInstance()
    {
        if (!isset(self::$instances[static::class])) {
            self::$instances[static::class] = new static();
        }
        return self::$instances[static::class];
    }
}
