<?php
namespace Ds\Base\Helpers;

use Ds\Base\Base\Singleton;

/**
 * Class Helper
 * @package Ds\Base\Helpers
 */
class Helper extends Singleton
{
    /**
     * @return BxHelper
     */
    public function bx()
    {
        return BxHelper::getInstance();
    }

    /**
     * @return HlHelper
     */
    public function hl()
    {
        return HlHelper::getInstance();
    }
}
