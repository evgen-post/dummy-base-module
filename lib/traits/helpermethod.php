<?php
namespace Ds\Base\Traits;

use Ds\Base\Helpers\Helper;

/**
 * Trait HelperMethod
 * @package Ds\Base\Traits
 */
trait HelperMethod
{
    /**
     * @return Helper
     */
    public function helper()
    {
        return Helper::getInstance();
    }
}