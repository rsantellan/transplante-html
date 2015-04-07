<?php

/**
 * BaseCmvemfermedades
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre
 * @property Doctrine_Collection $Cmvs
 * @property Doctrine_Collection $CmvUsoEnfermedades
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method string              getNombre()             Returns the current record's "nombre" value
 * @method Doctrine_Collection getCmvs()               Returns the current record's "Cmvs" collection
 * @method Doctrine_Collection getCmvUsoEnfermedades() Returns the current record's "CmvUsoEnfermedades" collection
 * @method Cmvemfermedades     setId()                 Sets the current record's "id" value
 * @method Cmvemfermedades     setNombre()             Sets the current record's "nombre" value
 * @method Cmvemfermedades     setCmvs()               Sets the current record's "Cmvs" collection
 * @method Cmvemfermedades     setCmvUsoEnfermedades() Sets the current record's "CmvUsoEnfermedades" collection
 * 
 * @package    transplantes
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCmvemfermedades extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cmv_emfermedades');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nombre', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Cmv as Cmvs', array(
             'refClass' => 'CmvUsoEnfermedades',
             'local' => 'cmv_emfermedades_id',
             'foreign' => 'cmv_id'));

        $this->hasMany('CmvUsoEnfermedades', array(
             'local' => 'id',
             'foreign' => 'cmv_emfermedades_id'));
    }
}