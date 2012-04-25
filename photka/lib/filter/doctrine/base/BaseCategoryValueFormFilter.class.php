<?php

/**
 * CategoryValue filter form base class.
 *
 * @package    photka
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCategoryValueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'value'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'category_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'is_published' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'photos_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Photo')),
    ));

    $this->setValidators(array(
      'value'        => new sfValidatorPass(array('required' => false)),
      'category_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'id')),
      'is_published' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'photos_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Photo', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category_value_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addPhotosListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.PhotoCategoryValue PhotoCategoryValue')
      ->andWhereIn('PhotoCategoryValue.photo_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'CategoryValue';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'value'        => 'Text',
      'category_id'  => 'ForeignKey',
      'is_published' => 'Boolean',
      'photos_list'  => 'ManyKey',
    );
  }
}
