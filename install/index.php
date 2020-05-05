<?php
use Bitrix\Main\Localization\Loc;

Loc::loadLanguageFile(__FILE__);
/**
 * Class #TEMPLATE_MODULE_CLASS_NAME#
 */
class #TEMPLATE_MODULE_CLASS_NAME# extends CModule
{
    public $MODULE_ID = "#TEMPLATE_MODULE_ID#";

    public $MODULE_NAME;
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_DESCRIPTION;
    public $PARTNER_NAME;
    public $PARTNER_URI;

    public $MODULE_GROUP_RIGHTS = 'Y';

    /**
     * #TEMPLATE_MODULE_CLASS_NAME# constructor.
     */
    public function __construct()
    {
        /**
         * @global array $arModuleVersion
         */
        include(__DIR__ . '/version.php');
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        $this->MODULE_NAME = Loc::getMessage('#TEMPLATE_MODULE_LOC_KEY#_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('#TEMPLATE_MODULE_LOC_KEY#_MODULE_DESCRIPTION');
        $this->PARTNER_NAME = Loc::getMessage('#TEMPLATE_MODULE_LOC_KEY#_PARTNER_NAME');
        $this->PARTNER_URI = Loc::getMessage('#TEMPLATE_MODULE_LOC_KEY#_PARTNER_URI');
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
