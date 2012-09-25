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


      $q = Doctrine_Query::create()
        ->select('photo.name AS name, photo.path AS path,  photo.description AS description, photo_category_value.photo_id, category_value.value, category.name')
        ->from('Photo photo')
        ->innerJoin('photo.PhotoCategoryValues photo_category_value ON photo.id = photo_category_value.photo_id')
        ->innerJoin('photo_category_value.CategoryValue  category_value ON photo_category_value.category_value_id = category_value.id')
        ->innerJoin('category_value.Category AS category ON category_value.category_id = category.id')
        ->where('name LIKE ?', "%$query%")
        ->orwhere('category.name LIKE ?', "%$query%");
// old way
//        $this->photos = Doctrine_Core::getTable('Photo')->createQuery()->where('name LIKE ?', "%$query%")->fetchArray();
        $this->photos = $q->fetchArray();

    } else {
       $this->photos = array();
    }
  }
}
