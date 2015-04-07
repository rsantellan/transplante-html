<?php

/**
 * EvolucionTrasplanteEcgTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EvolucionTrasplanteEcgTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EvolucionTrasplanteEcgTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('EvolucionTrasplanteEcg');
    }
    
    public function retrieveAll($trasplanteId, $hydrationMode = Doctrine_Core::HYDRATE_RECORD)
    {
      $query = $this->createQuery("etEcg");
      $query->addWhere("etEcg.trasplante_id = ?", $trasplanteId );
      $query->setHydrationMode($hydrationMode);
      return $query->execute();
    }
    
    public function retriveById($id, $hydrationMode = Doctrine_Core::HYDRATE_RECORD)
    {
      $query = $this->createQuery("etEcg")
                ->addWhere("etEcg.id = ?", $id);
      $query->setHydrationMode($hydrationMode);
      return $query->fetchOne();
    }    
}