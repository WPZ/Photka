<?php

/**
 * user module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage user
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'sf_guard_user' : 'sf_guard_user_'.$action;
  }
}
