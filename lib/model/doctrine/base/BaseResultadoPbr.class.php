<?php

/**
 * BaseResultadoPbr
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $grado
 * @property string $criterio
 * @property Doctrine_Collection $InjertoEvoluciones
 * @property Doctrine_Collection $InjertoEvolucionPbr
 * 
 * @method integer             getId()                  Returns the current record's "id" value
 * @method string              getGrado()               Returns the current record's "grado" value
 * @method string              getCriterio()            Returns the current record's "criterio" value
 * @method Doctrine_Collection getInjertoEvoluciones()  Returns the current record's "InjertoEvoluciones" collection
 * @method Doctrine_Collection getInjertoEvolucionPbr() Returns the current record's "InjertoEvolucionPbr" collection
 * @method ResultadoPbr        setId()                  Sets the current record's "id" value
 * @method ResultadoPbr        setGrado()               Sets the current record's "grado" value
 * @method ResultadoPbr        setCriterio()            Sets the current record's "criterio" value
 * @method ResultadoPbr        setInjertoEvoluciones()  Sets the current record's "InjertoEvoluciones" collection
 * @method ResultadoPbr        setInjertoEvolucionPbr() Sets the current record's "InjertoEvolucionPbr" collection
 * 
 * @package    transplantes
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseResultadoPbr extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('resultado_pbr');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('grado', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('criterio', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('InjertoEvolucion as InjertoEvoluciones', array(
             'refClass' => 'InjertoEvolucionPbr',
             'local' => 'resultado_pbr_id',
             'foreign' => 'injerto_evolucion_id'));

        $this->hasMany('InjertoEvolucionPbr', array(
             'local' => 'id',
             'foreign' => 'resultado_pbr_id'));
    }
}