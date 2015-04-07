<?php

/**
 * BasePacientePerdidaInjerto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $paciente_id
 * @property integer $paciente_causa_perdida_injerto_id
 * @property date $fecha_perdida
 * @property integer $paciente_pre_trasplante_id
 * @property Pacientes $Pacientes
 * @property Pacientepretrasplante $Pacientepretrasplante
 * @property PacienteCausaPerdidaInjerto $PacienteCausaPerdidaInjerto
 * 
 * @method integer                     getId()                                Returns the current record's "id" value
 * @method integer                     getPacienteId()                        Returns the current record's "paciente_id" value
 * @method integer                     getPacienteCausaPerdidaInjertoId()     Returns the current record's "paciente_causa_perdida_injerto_id" value
 * @method date                        getFechaPerdida()                      Returns the current record's "fecha_perdida" value
 * @method integer                     getPacientePreTrasplanteId()           Returns the current record's "paciente_pre_trasplante_id" value
 * @method Pacientes                   getPacientes()                         Returns the current record's "Pacientes" value
 * @method Pacientepretrasplante       getPacientepretrasplante()             Returns the current record's "Pacientepretrasplante" value
 * @method PacienteCausaPerdidaInjerto getPacienteCausaPerdidaInjerto()       Returns the current record's "PacienteCausaPerdidaInjerto" value
 * @method PacientePerdidaInjerto      setId()                                Sets the current record's "id" value
 * @method PacientePerdidaInjerto      setPacienteId()                        Sets the current record's "paciente_id" value
 * @method PacientePerdidaInjerto      setPacienteCausaPerdidaInjertoId()     Sets the current record's "paciente_causa_perdida_injerto_id" value
 * @method PacientePerdidaInjerto      setFechaPerdida()                      Sets the current record's "fecha_perdida" value
 * @method PacientePerdidaInjerto      setPacientePreTrasplanteId()           Sets the current record's "paciente_pre_trasplante_id" value
 * @method PacientePerdidaInjerto      setPacientes()                         Sets the current record's "Pacientes" value
 * @method PacientePerdidaInjerto      setPacientepretrasplante()             Sets the current record's "Pacientepretrasplante" value
 * @method PacientePerdidaInjerto      setPacienteCausaPerdidaInjerto()       Sets the current record's "PacienteCausaPerdidaInjerto" value
 * 
 * @package    transplantes
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePacientePerdidaInjerto extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('paciente_perdida_injerto');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('paciente_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('paciente_causa_perdida_injerto_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('fecha_perdida', 'date', 25, array(
             'type' => 'date',
             'notnull' => true,
             'length' => 25,
             ));
        $this->hasColumn('paciente_pre_trasplante_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Pacientes', array(
             'local' => 'paciente_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Pacientepretrasplante', array(
             'local' => 'paciente_pre_trasplante_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('PacienteCausaPerdidaInjerto', array(
             'local' => 'paciente_causa_perdida_injerto_id',
             'foreign' => 'id'));
    }
}