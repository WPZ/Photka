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
  public function executeIndex(sfWebRequest $request)
  { 
    $user = $this->getUser()->getGuardUser();
    //var_dump($user); die;
    $this->my_photos = PhotoTable::getInstance()->findByUserId($user->getId());
    $this->other_photos = PhotoTable::getInstance()->findAll();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new FrontPhotoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FrontPhotoForm();
    $this->photo = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($photo = Doctrine_Core::getTable('Photo')->find(array($request->getParameter('id'))), sprintf('Object photo does not exist (%s).', $request->getParameter('id')));
    $this->form = new FrontPhotoForm($photo);
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
   // $form = new FrontPhotoForm();
   //  var_dump($request->getPostParameters()); die;
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
        $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
      try {
          // var_dump($form->getObject()); die;
        $photo = $form->save();
        $user_id = $this->getUser()->getGuardUser()->getId();
        $photo->setUserId($user_id);
        $photo->save();
      } catch (Doctrine_Validator_Exception $e) {
          $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        $this->setTemplate('index');
      }
      $this->getUser()->setFlash('notice', $notice);
      $this->redirect('photo/index');
    }else{
        $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  
  }
}
