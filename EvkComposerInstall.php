<?php

/**
 * Class EvkComposerInstall
 */
class EvkComposerInstall
{
    protected $moduleClassName;
    protected $moduleDirPath;
    protected $moduleDirName;
    protected $moduleNamespace;

    public function __construct()
    {
        $this->init();
        $this->install();
    }

    /**
     *
     */
    protected function init()
    {
        $this->moduleDirPath = __DIR__;
        $this->moduleDirName = substr($this->moduleDirPath, strrpos($this->moduleDirPath, '/')+1);
        $this->moduleClassName = str_replace('.', '_', $this->moduleDirName);
        $this->moduleNamespace = join('\\', array_map('ucfirst', explode('.', $this->moduleDirName)));
    }

    /**
     * @param $dir
     */
    protected function replaceInDir($dir)
    {
        $dir = rtrim($dir, '/');
        $files = array_filter(scandir($dir), function ($dir){
            return !in_array($dir, ['.','..','.git','EvkComposerInstall.php','composer.json']);
        });
        if (!empty($files)) {
            foreach ($files as $file) {
                if (is_dir($dir.'/'.$file)) {
                    $this->replaceInDir($dir.'/'.$file);
                } elseif(is_file($dir.'/'.$file)) {
                    $this->replaceInFile($dir.'/'.$file);
                }
                echo $file."\n";
            }
        }
    }

    /**
     * @param $file
     */
    protected function replaceInFile($file)
    {
        file_put_contents($file, str_replace([
            '#TEMPLATE_MODULE_LOC_KEY#',
            '#TEMPLATE_MODULE_CLASS_NAME#',
            '#TEMPLATE_MODULE_VERSION_DATE#',
            '#TEMPLATE_MODULE_VERSION#',
            '#TEMPLATE_MODULE_ID#',
        ], [
            strtoupper($this->moduleClassName),
            $this->moduleClassName,
            date('Y-m-d H:i:s'),
            '1.0.0',
            $this->moduleDirName,
        ], file_get_contents($file)));
    }
    /**
     *
     */
    protected function install()
    {
        $this->replaceInDir($this->moduleDirPath);
    }
}
new EvkComposerInstall();