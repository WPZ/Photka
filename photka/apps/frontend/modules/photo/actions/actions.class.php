<?php

/**
 * photo actions.
 *
 * @package    photka
 * @subpackage photo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class photoActions extends sfActions
{
  public function executeSearch(sfWebRequest $request)
  {
    $this->forwardUnless($query = $request->getParameter('query'), 'photo', 'index');
 
    $this->jobs = Doctrine_Core::getTable('Photo') ->getForLuceneQuery($query);
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->photos = Doctrine_Core::getTable('Photo')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PhotoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PhotoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($photo = Doctrine_Core::getTable('Photo')->find(array($request->getParameter('id'))), sprintf('Object photo does not exist (%s).', $request->getParameter('id')));
    $this->form = new PhotoForm($photo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($photo = Doctrine_Core::getTable('Photo')->find(array($request->getParameter('id'))), sprintf('Object photo does not exist (%s).', $request->getParameter('id')));
    $this->form = new PhotoForm($photo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($photo = Doctrine_Core::getTable('Photo')->find(array($request->getParameter('id'))), sprintf('Object photo does not exist (%s).', $request->getParameter('id')));
    $photo->delete();

    $this->redirect('photo/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $photo = $form->save();

      $this->redirect('photo/edit?id='.$photo->getId());
    }
  }
}
