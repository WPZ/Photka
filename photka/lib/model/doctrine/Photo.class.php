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
    public function save(Doctrine_Connection $conn = null)
    {
     
//      $ret = parent::save($conn);
//      $this->updateLuceneIndex();
//      return $ret;
 
      $conn = $conn ? $conn : $this->getTable()->getConnection();
      $conn->beginTransaction();
      try
      {
        $ret = parent::save($conn);
 
        $this->updateLuceneIndex();
 
        $conn->commit();
 
        return $ret;
      }
      catch (Exception $e)
      {
        $conn->rollBack();
        throw $e;
      }

    }

    public function delete(Doctrine_Connection $conn = null)
    {
      $index = JobeetJobTable::getLuceneIndex();
 
      foreach ($index->find('pk:'.$this->getId()) as $hit)
      {
        $index->delete($hit->id);
      }
 
      return parent::delete($conn);
    }

public function updateLuceneIndex()
{
  $index = PhotoTable::getLuceneIndex();
 
  // remove existing entries
  foreach ($index->find('pk:'.$this->getId()) as $hit)
  {
    $index->delete($hit->id);
  }
 
  $doc = new Zend_Search_Lucene_Document();
 
  // store photo primary key to identify it in the search results
  $doc->addField(Zend_Search_Lucene_Field::Keyword('pk', $this->getId()));
 
  // index photo fields
  $doc->addField(Zend_Search_Lucene_Field::UnStored('name', $this->getName(), 'utf-8'));
  //$doc->addField(Zend_Search_Lucene_Field::UnStored('company', $this->getCompany(), 'utf-8'));
  //$doc->addField(Zend_Search_Lucene_Field::UnStored('location', $this->getLocation(), 'utf-8'));
  //$doc->addField(Zend_Search_Lucene_Field::UnStored('description', $this->getDescription(), 'utf-8'));
 
  // add job to the index
  $index->addDocument($doc);
  $index->commit();
}

}
