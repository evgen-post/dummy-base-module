<?php
use Bitrix\Main\Localization\Loc;

Loc::loadLanguageFile(__FILE__);
/**
 * Class ds_base
 */
class ds_base extends CModule
{
    public $MODULE_ID = "ds.base";

    public $MODULE_NAME;
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_DESCRIPTION;
    public $PARTNER_NAME;
    public $PARTNER_URI;

    public $MODULE_GROUP_RIGHTS = 'Y';

    /**
     * ds_base constructor.
     */
    public function __construct()
    {
        /**
         * @global array $arModuleVersion
         */
        include(__DIR__ . '/version.php');
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        $this->MODULE_NAME = Loc::getMessage('DS_BASE_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('DS_BASE_MODULE_DESCRIPTION');
        $this->PARTNER_NAME = Loc::getMessage('DS_BASE_PARTNER_NAME');
        $this->PARTNER_URI = Loc::getMessage('DS_BASE_PARTNER_URI');
    }

    /**
     * Module installation function
     */
    public function DoInstall()
    {
        RegisterModule($this->MODULE_ID);
    }

    /**
     * Module uninstallation function
     */
    public function DoUninstall()
    {
        UnRegisterModule($this->MODULE_ID);
    }

}
