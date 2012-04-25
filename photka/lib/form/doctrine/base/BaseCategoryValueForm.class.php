<?php

/**
 * CategoryValue form base class.
 *
 * @method CategoryValue getObject() Returns the current form's model object
 *
 * @package    photka
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCategoryValueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'value'        => new sfWidgetFormInputText(),
      'category_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false)),
      'is_published' => new sfWidgetFormInputCheckbox(),
      'photos_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Photo')),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'value'        => new sfValidatorString(array('max_length' => 255)),
      'category_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
      'is_published' => new sfValidatorBoolean(array('required' => false)),
      'photos_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Photo', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category_value[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CategoryValue';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['photos_list']))
    {
      $this->setDefault('photos_list', $this->object->Photos->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savePhotosList($con);

    parent::doSave($con);
  }

  public function savePhotosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['photos_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Photos->getPrimaryKeys();
    $values = $this->getValue('photos_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Photos', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Photos', array_values($link));
    }
  }

}
