<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    set_include_path(sfConfig::get('sf_lib_dir') . '/vendor' . PATH_SEPARATOR . get_include_path());
      
    $this->enablePlugins(array('sfDoctrinePlugin',
                               'sfDoctrineGuardPlugin',
                               'sfDoctrineApplyPlugin',
                               'sfDoctrineChoiceChainPlugin',
                               'sfThemeGeneratorPlugin',
                               'sfHadoriThemePlugin'));
  }
  static protected $zendLoaded = false;

    static public function registerZend() {
        if (self::$zendLoaded) {
            return;
        }
        set_include_path(sfConfig::get('sf_lib_dir') .
                '/vendor' . PATH_SEPARATOR . get_include_path());
        require_once sfConfig::get('sf_lib_dir') .
                '/vendor/Zend/Loader/Autoloader.php';
        Zend_Loader_Autoloader::getInstance();
        self::$zendLoaded = true;
    }

}
