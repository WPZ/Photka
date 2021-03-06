<?php

/**
 * BasePhotoRating
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $rate
 * @property integer $photo_id
 * @property integer $user_id
 * @property Photo $Photo
 * @property sfGuardUser $sfGuardUser
 * 
 * @method integer     getRate()        Returns the current record's "rate" value
 * @method integer     getPhotoId()     Returns the current record's "photo_id" value
 * @method integer     getUserId()      Returns the current record's "user_id" value
 * @method Photo       getPhoto()       Returns the current record's "Photo" value
 * @method sfGuardUser getSfGuardUser() Returns the current record's "sfGuardUser" value
 * @method PhotoRating setRate()        Sets the current record's "rate" value
 * @method PhotoRating setPhotoId()     Sets the current record's "photo_id" value
 * @method PhotoRating setUserId()      Sets the current record's "user_id" value
 * @method PhotoRating setPhoto()       Sets the current record's "Photo" value
 * @method PhotoRating setSfGuardUser() Sets the current record's "sfGuardUser" value
 * 
 * @package    photka
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePhotoRating extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('photo_rating');
        $this->hasColumn('rate', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('photo_id', 'integer', 1000, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 1000,
             ));
        $this->hasColumn('user_id', 'integer', 1000, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 1000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Photo', array(
             'local' => 'photo_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}