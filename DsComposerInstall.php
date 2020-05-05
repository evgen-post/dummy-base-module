<?php

/**
 * Class EvkComposerInstall
 */
class DsComposerInstall
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
            return !in_array($dir, ['.','..','.git','EvkComposerInstall.php','composer.json','vendor']);
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
            'DS_BASE_',
            ' ds_base',
            '2020-01-01 00:00:00',
            'ds.base',
            ' Ds\Base'
        ], [
            strtoupper($this->moduleClassName).'_',
            ' '.$this->moduleClassName,
            date('Y-m-d H:i:s'),
            $this->moduleDirName,
            ' '.$this->moduleNamespace,
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
new DsComposerInstall();
