<?php

/**
 * PhotoCategoryValue form base class.
 *
 * @method PhotoCategoryValue getObject() Returns the current form's model object
 *
 * @package    photka
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePhotoCategoryValueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'photo_id'          => new sfWidgetFormInputHidden(),
      'category_value_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'photo_id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('photo_id')), 'empty_value' => $this->getObject()->get('photo_id'), 'required' => false)),
      'category_value_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('category_value_id')), 'empty_value' => $this->getObject()->get('category_value_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('photo_category_value[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PhotoCategoryValue';
  }

}
