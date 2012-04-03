<?php

class sfAdminThemeConfiguration extends sfThemeConfiguration
{
  protected
    $theme = 'admin';

  public function setup()
  {
    $this->askForApplication();

    $this->askForModel();

    $this->task->bootstrapSymfony($this->options['application'], $this->options['env']);

    $this->askForOption('module', null, sfInflector::underscore($this->options['model']));
  }

  public function filesToCopy()
  {
    return array(
      'MODULE_DIR/actions'                                         => 'THEME_DIR/skeleton/actions',
      'MODULE_DIR/config'                                          => 'THEME_DIR/skeleton/config',
      'MODULE_DIR/templates'                                       => 'THEME_DIR/skeleton/templates',
      'MODULE_DIR/lib/MODULE_NAMEGeneratorHelper.class.php'        => 'THEME_DIR/skeleton/lib/helper.php',
      'MODULE_DIR/lib/MODULE_NAMEGeneratorConfiguration.class.php' => 'THEME_DIR/skeleton/lib/configuration.php',
      'MODULE_DIR/lib/MODULE_NAMEGeneratorHelper.class.php'        => 'THEME_DIR/skeleton/lib/helper.php',
    );
  }

  public function initConstants()
  {
    parent::initConstants();

    $this->constants['CONFIG'] = sprintf(<<<EOF
    model_class:           %s
    theme:                 %s
    non_verbose_templates: true
    with_show:             false
    singular:              ~
    plural:                ~
    route_prefix:          %s
    with_doctrine_route:   true
    actions_base_class:    sfActions
EOF
      ,
      $this->options['model'],
      $this->theme,
      $this->options['module']
    );
  }

  public function routesToPrepend()
  {
    $primaryKey = Doctrine_Core::getTable($this->options['model'])->getIdentifier();
    $routes = array($this->options['module'] => sprintf(<<<EOF
  class: sfDoctrineRouteCollection
  options:
    model:                %s
    module:               %s
    prefix_path:          /%s
    column:               %s
    with_wildcard_routes: true
EOF
      ,
      $this->options['model'],
      $this->options['module'],
      $this->options['module'],
      $primaryKey
    ));

    return $routes;
  }

  public function filterGeneratedFile($file)
  {
    switch (true)
    {
      // Rename class in actions.class.php
      case strpos($file, 'actions.class.php') !== false:
        $contents = file_get_contents($file);
        $search   = sprintf('abstract class auto%sActions', ucfirst($this->options['module']));
        $replace  = sprintf('class %sActions', $this->options['module']);
        file_put_contents($file, str_replace($search, $replace, $contents));
        break;
    }
  }
}
