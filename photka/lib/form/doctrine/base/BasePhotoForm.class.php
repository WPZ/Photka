<?php

/**
 * Photo form base class.
 *
 * @method Photo getObject() Returns the current form's model object
 *
 * @package    photka
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePhotoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(),
      'location'             => new sfWidgetFormInputText(),
      'description'          => new sfWidgetFormTextarea(),
      'is_public'            => new sfWidgetFormInputCheckbox(),
      'path'                 => new sfWidgetFormInputText(),
      'user_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'category_values_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'CategoryValue')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'location'             => new sfValidatorString(array('max_length' => 255)),
      'description'          => new sfValidatorString(array('max_length' => 4000)),
      'is_public'            => new sfValidatorBoolean(array('required' => false)),
      'path'                 => new sfValidatorString(array('max_length' => 255)),
      'user_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
      'category_values_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'CategoryValue', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Photo';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['category_values_list']))
    {
      $this->setDefault('category_values_list', $this->object->CategoryValues->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveCategoryValuesList($con);

    parent::doSave($con);
  }

  public function saveCategoryValuesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['category_values_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->CategoryValues->getPrimaryKeys();
    $values = $this->getValue('category_values_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('CategoryValues', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('CategoryValues', array_values($link));
    }
  }

}
