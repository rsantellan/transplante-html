<?php

/**
 * BaseSerolValor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $serol_id
 * @property string $valor
 * @property Serol $Serol
 * @property Doctrine_Collection $DonanteSerol
 * @property Doctrine_Collection $TrasplanteSerol
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method integer             getSerolId()         Returns the current record's "serol_id" value
 * @method string              getValor()           Returns the current record's "valor" value
 * @method Serol               getSerol()           Returns the current record's "Serol" value
 * @method Doctrine_Collection getDonanteSerol()    Returns the current record's "DonanteSerol" collection
 * @method Doctrine_Collection getTrasplanteSerol() Returns the current record's "TrasplanteSerol" collection
 * @method SerolValor          setId()              Sets the current record's "id" value
 * @method SerolValor          setSerolId()         Sets the current record's "serol_id" value
 * @method SerolValor          setValor()           Sets the current record's "valor" value
 * @method SerolValor          setSerol()           Sets the current record's "Serol" value
 * @method SerolValor          setDonanteSerol()    Sets the current record's "DonanteSerol" collection
 * @method SerolValor          setTrasplanteSerol() Sets the current record's "TrasplanteSerol" collection
 * 
 * @package    transplantes
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSerolValor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('serol_valor');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('serol_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('valor', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Serol', array(
             'local' => 'serol_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('DonanteSerol', array(
             'local' => 'id',
             'foreign' => 'serol_valor_id'));

        $this->hasMany('TrasplanteSerol', array(
             'local' => 'id',
             'foreign' => 'serol_valor_id'));
    }
}