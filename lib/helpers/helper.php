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
    public function bx(): BxHelper
    {
        return BxHelper::getInstance();
    }

    /**
     * @return D7Helper
     */
    public function d7(): D7Helper
    {
        return D7Helper::getInstance();
    }
}
