<?php

/**
 * BaseTrasplanteInduccion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $trasplante_id
 * @property integer $induccion_id
 * @property Trasplante $Trasplante
 * @property Induccion $Induccion
 * 
 * @method integer             getTrasplanteId()  Returns the current record's "trasplante_id" value
 * @method integer             getInduccionId()   Returns the current record's "induccion_id" value
 * @method Trasplante          getTrasplante()    Returns the current record's "Trasplante" value
 * @method Induccion           getInduccion()     Returns the current record's "Induccion" value
 * @method TrasplanteInduccion setTrasplanteId()  Sets the current record's "trasplante_id" value
 * @method TrasplanteInduccion setInduccionId()   Sets the current record's "induccion_id" value
 * @method TrasplanteInduccion setTrasplante()    Sets the current record's "Trasplante" value
 * @method TrasplanteInduccion setInduccion()     Sets the current record's "Induccion" value
 * 
 * @package    transplantes
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTrasplanteInduccion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('trasplante_induccion');
        $this->hasColumn('trasplante_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('induccion_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));

        $this->option('symfony', array(
             'form' => false,
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Trasplante', array(
             'local' => 'trasplante_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Induccion', array(
             'local' => 'induccion_id',
             'foreign' => 'id'));
    }
}