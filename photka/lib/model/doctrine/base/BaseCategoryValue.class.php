<?php

/**
 * BaseCategoryValue
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $value
 * @property integer $category_id
 * @property boolean $is_published
 * @property Category $Category
 * @property Doctrine_Collection $PhotoCategoryValues
 * @property Doctrine_Collection $Photos
 * 
 * @method string              getValue()               Returns the current record's "value" value
 * @method integer             getCategoryId()          Returns the current record's "category_id" value
 * @method boolean             getIsPublished()         Returns the current record's "is_published" value
 * @method Category            getCategory()            Returns the current record's "Category" value
 * @method Doctrine_Collection getPhotoCategoryValues() Returns the current record's "PhotoCategoryValues" collection
 * @method Doctrine_Collection getPhotos()              Returns the current record's "Photos" collection
 * @method CategoryValue       setValue()               Sets the current record's "value" value
 * @method CategoryValue       setCategoryId()          Sets the current record's "category_id" value
 * @method CategoryValue       setIsPublished()         Sets the current record's "is_published" value
 * @method CategoryValue       setCategory()            Sets the current record's "Category" value
 * @method CategoryValue       setPhotoCategoryValues() Sets the current record's "PhotoCategoryValues" collection
 * @method CategoryValue       setPhotos()              Sets the current record's "Photos" collection
 * 
 * @package    photka
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategoryValue extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('category_value');
        $this->hasColumn('value', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('category_id', 'integer', 100, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('is_published', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Category', array(
             'local' => 'category_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('PhotoCategoryValue as PhotoCategoryValues', array(
             'local' => 'id',
             'foreign' => 'category_value_id'));

        $this->hasMany('Photo as Photos', array(
             'refClass' => 'PhotoCategoryValue',
             'local' => 'category_value_id',
             'foreign' => 'photo_id'));
    }
}