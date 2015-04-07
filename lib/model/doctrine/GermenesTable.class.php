<?php

/**
 * GermenesTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class GermenesTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object GermenesTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Germenes');
    }
	public function retriveById($id, $hydrationMode = Doctrine_Core::HYDRATE_RECORD)
    {
      $query = $this->createQuery("gg")
                ->addWhere("gg.id = ?", $id);

      $query->setHydrationMode($hydrationMode);
      return $query->fetchOne();
    } 
	
	public function retrieveAll($hydrationMode = Doctrine_Core::HYDRATE_RECORD)
	{
	  $query = $this->createQuery("gg");
	  $query->setHydrationMode($hydrationMode);
	  return $query->execute();
	}	
	
}