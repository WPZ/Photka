<?php

/**
 * Photo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    photka
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Photo extends BasePhoto
{
    public function getAvgRates(){
        $sum = 0;
        $rates = $this->getPhotoRatings();
        foreach($rates as $rate){
            $sum += $rate->getRate();
        }
        
        return $rates->count() ? round($sum / $rates->count(),1) : 0;
    }
    
    public function getRateByUserId($user_id)
    {
        $result = PhotoRatingTable::getInstance()->getOneByPhotoAndUser($this->getId(), $user_id);
        return $result ? (int)$result->getRate() : 0;
    }

}
