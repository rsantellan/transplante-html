<?php

/**
 * InmunosupresoresTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class InmunosupresoresTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object InmunosupresoresTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Inmunosupresores');
    }
	
	public function retrieveAll($hydrationMode = Doctrine_Core::HYDRATE_RECORD)
	{
	  $query = $this->createQuery("in");
	  $query->setHydrationMode($hydrationMode);
	  return $query->execute();
	}
	
    public function retriveAllInmunosupresoresByTrasplanteId($trasplanteId, $hydrationMode = Doctrine_Core::HYDRATE_RECORD)
    {
      $query = $this->createQuery("i")
                ->select("i.*")
                ->addFrom("TrasplanteInmunosupresores t")
                ->addWhere("i.id = t.inmunosupresores_id")
                ->addWhere("t.trasplante_id = ?", $trasplanteId);
 
      $query->setHydrationMode($hydrationMode);
      return $query->execute();
    }	
}