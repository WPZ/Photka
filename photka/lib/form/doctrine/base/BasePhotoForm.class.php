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
      'id'          => new sfWidgetFormInputHidden(),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false)),
      'name'        => new sfWidgetFormInputText(),
      'location'    => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'token'       => new sfWidgetFormInputText(),
      'is_public'   => new sfWidgetFormInputCheckbox(),
      'path'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'location'    => new sfValidatorString(array('max_length' => 255)),
      'description' => new sfValidatorString(array('max_length' => 4000)),
      'token'       => new sfValidatorString(array('max_length' => 255)),
      'is_public'   => new sfValidatorBoolean(array('required' => false)),
      'path'        => new sfValidatorString(array('max_length' => 255)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Photo', 'column' => array('token')))
    );

    $this->widgetSchema->setNameFormat('photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Photo';
  }

}
