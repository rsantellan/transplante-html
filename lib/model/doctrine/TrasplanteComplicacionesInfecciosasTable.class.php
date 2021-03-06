<?php

/**
 * TrasplanteComplicacionesInfecciosasTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TrasplanteComplicacionesInfecciosasTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TrasplanteComplicacionesInfecciosasTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TrasplanteComplicacionesInfecciosas');
    }
	
	public function retrieveAllComplicacionesInfecciosas($trasplanteId, $enEvolucion, $isQuery = false, $hydrationMode = Doctrine_Core::HYDRATE_RECORD )
	{
	  $query = $this->createQuery("tci")
                  ->addWhere("tci.trasplante_id = ?", $trasplanteId)
				  ->addWhere("tci.evolucion = ?", $enEvolucion);
	  if($isQuery)
		return $query;
      $query->setHydrationMode($hydrationMode);
      return $query->execute();  
	}	
  
	public function retriveById($id, $hydrationMode = Doctrine_Core::HYDRATE_RECORD)
    {
      $query = $this->createQuery("tci")
                ->addWhere("tci.id = ?", $id);

      $query->setHydrationMode($hydrationMode);
      return $query->fetchOne();
    }  
}
