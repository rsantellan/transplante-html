<?php

/**
 * BasePacienteMuerte
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $paciente_id
 * @property integer $causa_muerte_id
 * @property date $fecha_muerte
 * @property integer $transplante_funcionando
 * @property Pacientes $Pacientes
 * @property PacienteCausaMuerte $PacienteCausaMuerte
 * 
 * @method integer             getId()                      Returns the current record's "id" value
 * @method integer             getPacienteId()              Returns the current record's "paciente_id" value
 * @method integer             getCausaMuerteId()           Returns the current record's "causa_muerte_id" value
 * @method date                getFechaMuerte()             Returns the current record's "fecha_muerte" value
 * @method integer             getTransplanteFuncionando()  Returns the current record's "transplante_funcionando" value
 * @method Pacientes           getPacientes()               Returns the current record's "Pacientes" value
 * @method PacienteCausaMuerte getPacienteCausaMuerte()     Returns the current record's "PacienteCausaMuerte" value
 * @method PacienteMuerte      setId()                      Sets the current record's "id" value
 * @method PacienteMuerte      setPacienteId()              Sets the current record's "paciente_id" value
 * @method PacienteMuerte      setCausaMuerteId()           Sets the current record's "causa_muerte_id" value
 * @method PacienteMuerte      setFechaMuerte()             Sets the current record's "fecha_muerte" value
 * @method PacienteMuerte      setTransplanteFuncionando()  Sets the current record's "transplante_funcionando" value
 * @method PacienteMuerte      setPacientes()               Sets the current record's "Pacientes" value
 * @method PacienteMuerte      setPacienteCausaMuerte()     Sets the current record's "PacienteCausaMuerte" value
 * 
 * @package    transplantes
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePacienteMuerte extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('paciente_muerte');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('paciente_id', 'integer', 4, array(
             'type' => 'integer',
             'unique' => true,
             'length' => 4,
             ));
        $this->hasColumn('causa_muerte_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('fecha_muerte', 'date', 25, array(
             'type' => 'date',
             'notnull' => true,
             'length' => 25,
             ));
        $this->hasColumn('transplante_funcionando', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Pacientes', array(
             'local' => 'paciente_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('PacienteCausaMuerte', array(
             'local' => 'causa_muerte_id',
             'foreign' => 'id'));
    }
}