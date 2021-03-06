<?php

/**
 * BaseEvolucionTrasplanteEcg
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $trasplante_id
 * @property date $fecha
 * @property enum $rs_ecg
 * @property enum $hvi_ecg
 * @property enum $onda_q_ecg
 * @property Trasplante $Trasplante
 * 
 * @method integer                getId()            Returns the current record's "id" value
 * @method integer                getTrasplanteId()  Returns the current record's "trasplante_id" value
 * @method date                   getFecha()         Returns the current record's "fecha" value
 * @method enum                   getRsEcg()         Returns the current record's "rs_ecg" value
 * @method enum                   getHviEcg()        Returns the current record's "hvi_ecg" value
 * @method enum                   getOndaQEcg()      Returns the current record's "onda_q_ecg" value
 * @method Trasplante             getTrasplante()    Returns the current record's "Trasplante" value
 * @method EvolucionTrasplanteEcg setId()            Sets the current record's "id" value
 * @method EvolucionTrasplanteEcg setTrasplanteId()  Sets the current record's "trasplante_id" value
 * @method EvolucionTrasplanteEcg setFecha()         Sets the current record's "fecha" value
 * @method EvolucionTrasplanteEcg setRsEcg()         Sets the current record's "rs_ecg" value
 * @method EvolucionTrasplanteEcg setHviEcg()        Sets the current record's "hvi_ecg" value
 * @method EvolucionTrasplanteEcg setOndaQEcg()      Sets the current record's "onda_q_ecg" value
 * @method EvolucionTrasplanteEcg setTrasplante()    Sets the current record's "Trasplante" value
 * 
 * @package    transplantes
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEvolucionTrasplanteEcg extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('evolucion_trasplante_ecg');
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
        $this->hasColumn('rs_ecg', 'enum', 8, array(
             'type' => 'enum',
             'length' => 8,
             'values' => 
             array(
              0 => 'Ausente',
              1 => 'Presente',
              2 => 'Falta',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('hvi_ecg', 'enum', 8, array(
             'type' => 'enum',
             'length' => 8,
             'values' => 
             array(
              0 => 'Ausente',
              1 => 'Presente',
              2 => 'Falta',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('onda_q_ecg', 'enum', 8, array(
             'type' => 'enum',
             'length' => 8,
             'values' => 
             array(
              0 => 'Ausente',
              1 => 'Presente',
              2 => 'Falta',
             ),
             'notnull' => true,
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