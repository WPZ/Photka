<?php

/**
 * index actions.
 *
 * @package    photka
 * @subpackage index
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class indexActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    // @TODO 
  }
  
  public function executeSearch(sfWebRequest $request)
  {

    if($request->getParameter('query') ){
      $this->forwardUnless($query = $request->getParameter('query'), 'photo', 'index');

//    $this->photos = Doctrine_Core::getTable('Photo')->getForLuceneQuery($query);
      $this->photos = Doctrine_Core::getTable('Photo')->createQuery()->where('name LIKE ?', "%$query%")->fetchArray();

    } else {
       $this->photos = array();
    }
  }
}
