<?php

/**
 * BasePhoto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $location
 * @property string $description
 * @property boolean $is_public
 * @property string $path
 * @property Doctrine_Collection $CategoryValues
 * @property Doctrine_Collection $PhotoCategoryValues
 * 
 * @method string              getName()                Returns the current record's "name" value
 * @method string              getLocation()            Returns the current record's "location" value
 * @method string              getDescription()         Returns the current record's "description" value
 * @method boolean             getIsPublic()            Returns the current record's "is_public" value
 * @method string              getPath()                Returns the current record's "path" value
 * @method Doctrine_Collection getCategoryValues()      Returns the current record's "CategoryValues" collection
 * @method Doctrine_Collection getPhotoCategoryValues() Returns the current record's "PhotoCategoryValues" collection
 * @method Photo               setName()                Sets the current record's "name" value
 * @method Photo               setLocation()            Sets the current record's "location" value
 * @method Photo               setDescription()         Sets the current record's "description" value
 * @method Photo               setIsPublic()            Sets the current record's "is_public" value
 * @method Photo               setPath()                Sets the current record's "path" value
 * @method Photo               setCategoryValues()      Sets the current record's "CategoryValues" collection
 * @method Photo               setPhotoCategoryValues() Sets the current record's "PhotoCategoryValues" collection
 * 
 * @package    photka
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePhoto extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('photo');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('location', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 4000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 4000,
             ));
        $this->hasColumn('is_public', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('path', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('CategoryValue as CategoryValues', array(
             'refClass' => 'PhotoCategoryValue',
             'local' => 'photo_id',
             'foreign' => 'category_value_id'));

        $this->hasMany('PhotoCategoryValue as PhotoCategoryValues', array(
             'local' => 'id',
             'foreign' => 'photo_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}