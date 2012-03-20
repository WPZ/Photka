<?php

/**
 * photo module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage photo
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePhotoGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'photo' : 'photo_'.$action;
  }
}
