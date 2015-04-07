<?php

/**
 * BaseEvolucionTrasplanteEcografia
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $trasplante_id
 * @property date $fecha
 * @property string $diametros
 * @property integer $dilatacion
 * @property integer $litiasin
 * @property string $vejiga
 * @property integer $espesor
 * @property string $otros
 * @property Trasplante $Trasplante
 * 
 * @method integer                      getId()            Returns the current record's "id" value
 * @method integer                      getTrasplanteId()  Returns the current record's "trasplante_id" value
 * @method date                         getFecha()         Returns the current record's "fecha" value
 * @method string                       getDiametros()     Returns the current record's "diametros" value
 * @method integer                      getDilatacion()    Returns the current record's "dilatacion" value
 * @method integer                      getLitiasin()      Returns the current record's "litiasin" value
 * @method string                       getVejiga()        Returns the current record's "vejiga" value
 * @method integer                      getEspesor()       Returns the current record's "espesor" value
 * @method string                       getOtros()         Returns the current record's "otros" value
 * @method Trasplante                   getTrasplante()    Returns the current record's "Trasplante" value
 * @method EvolucionTrasplanteEcografia setId()            Sets the current record's "id" value
 * @method EvolucionTrasplanteEcografia setTrasplanteId()  Sets the current record's "trasplante_id" value
 * @method EvolucionTrasplanteEcografia setFecha()         Sets the current record's "fecha" value
 * @method EvolucionTrasplanteEcografia setDiametros()     Sets the current record's "diametros" value
 * @method EvolucionTrasplanteEcografia setDilatacion()    Sets the current record's "dilatacion" value
 * @method EvolucionTrasplanteEcografia setLitiasin()      Sets the current record's "litiasin" value
 * @method EvolucionTrasplanteEcografia setVejiga()        Sets the current record's "vejiga" value
 * @method EvolucionTrasplanteEcografia setEspesor()       Sets the current record's "espesor" value
 * @method EvolucionTrasplanteEcografia setOtros()         Sets the current record's "otros" value
 * @method EvolucionTrasplanteEcografia setTrasplante()    Sets the current record's "Trasplante" value
 * 
 * @package    transplantes
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEvolucionTrasplanteEcografia extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('evolucion_trasplante_ecografia');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('trasplante_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('fecha', 'date', 25, array(
             'type' => 'date',
             'notnull' => true,
             'length' => 25,
             ));
        $this->hasColumn('diametros', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
        $this->hasColumn('dilatacion', 'integer', 1, array(
             'type' => 'integer',
             'length' => 1,
             ));
        $this->hasColumn('litiasin', 'integer', 1, array(
             'type' => 'integer',
             'length' => 1,
             ));
        $this->hasColumn('vejiga', 'string', 255, array(
             'type' => 'string',
             'default' => '',
             'length' => 255,
             ));
        $this->hasColumn('espesor', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('otros', 'string', 1000, array(
             'type' => 'string',
             'default' => ' ',
             'length' => 1000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Trasplante', array(
             'local' => 'trasplante_id',
             'foreign' => 'id'));

        $evoluciontrasplantecounterbehavior0 = new EvolucionTrasplanteCounterBehavior();
        $this->actAs($evoluciontrasplantecounterbehavior0);
    }
}