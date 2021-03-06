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
 * @property integer $user_id
 * @property Doctrine_Collection $CategoryValues
 * @property sfGuardUser $sfGuardUser
 * @property Doctrine_Collection $PhotoCategoryValues
 * @property Doctrine_Collection $PhotoRatings
 * 
 * @method string              getName()                Returns the current record's "name" value
 * @method string              getLocation()            Returns the current record's "location" value
 * @method string              getDescription()         Returns the current record's "description" value
 * @method boolean             getIsPublic()            Returns the current record's "is_public" value
 * @method string              getPath()                Returns the current record's "path" value
 * @method integer             getUserId()              Returns the current record's "user_id" value
 * @method Doctrine_Collection getCategoryValues()      Returns the current record's "CategoryValues" collection
 * @method sfGuardUser         getSfGuardUser()         Returns the current record's "sfGuardUser" value
 * @method Doctrine_Collection getPhotoCategoryValues() Returns the current record's "PhotoCategoryValues" collection
 * @method Doctrine_Collection getPhotoRatings()        Returns the current record's "PhotoRatings" collection
 * @method Photo               setName()                Sets the current record's "name" value
 * @method Photo               setLocation()            Sets the current record's "location" value
 * @method Photo               setDescription()         Sets the current record's "description" value
 * @method Photo               setIsPublic()            Sets the current record's "is_public" value
 * @method Photo               setPath()                Sets the current record's "path" value
 * @method Photo               setUserId()              Sets the current record's "user_id" value
 * @method Photo               setCategoryValues()      Sets the current record's "CategoryValues" collection
 * @method Photo               setSfGuardUser()         Sets the current record's "sfGuardUser" value
 * @method Photo               setPhotoCategoryValues() Sets the current record's "PhotoCategoryValues" collection
 * @method Photo               setPhotoRatings()        Sets the current record's "PhotoRatings" collection
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
        $this->hasColumn('user_id', 'integer', 1000, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 1000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('CategoryValue as CategoryValues', array(
             'refClass' => 'PhotoCategoryValue',
             'local' => 'photo_id',
             'foreign' => 'category_value_id'));

        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('PhotoCategoryValue as PhotoCategoryValues', array(
             'local' => 'id',
             'foreign' => 'photo_id'));

        $this->hasMany('PhotoRating as PhotoRatings', array(
             'local' => 'id',
             'foreign' => 'photo_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}