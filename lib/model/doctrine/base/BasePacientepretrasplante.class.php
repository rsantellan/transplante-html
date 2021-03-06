<?php

/**
 * BasePacientepretrasplante
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $paciente_id
 * @property integer $the
 * @property date $fecha_ingreso_lista
 * @property date $fecha_egreso
 * @property enum $modalidad_d
 * @property enum $diabetes
 * @property enum $imc
 * @property enum $origen
 * @property integer $pbr
 * @property integer $hta
 * @property integer $obesidad
 * @property integer $dislipemia
 * @property integer $tabaquismo
 * @property integer $iam
 * @property integer $ave
 * @property integer $revasc_cardio
 * @property integer $meses_en_lista
 * @property Pacientes $Pacientes
 * @property Doctrine_Collection $Trasplante
 * @property Doctrine_Collection $PacientePerdidaInjerto
 * 
 * @method integer               getId()                     Returns the current record's "id" value
 * @method integer               getPacienteId()             Returns the current record's "paciente_id" value
 * @method integer               getThe()                    Returns the current record's "the" value
 * @method date                  getFechaIngresoLista()      Returns the current record's "fecha_ingreso_lista" value
 * @method date                  getFechaEgreso()            Returns the current record's "fecha_egreso" value
 * @method enum                  getModalidadD()             Returns the current record's "modalidad_d" value
 * @method enum                  getDiabetes()               Returns the current record's "diabetes" value
 * @method enum                  getImc()                    Returns the current record's "imc" value
 * @method enum                  getOrigen()                 Returns the current record's "origen" value
 * @method integer               getPbr()                    Returns the current record's "pbr" value
 * @method integer               getHta()                    Returns the current record's "hta" value
 * @method integer               getObesidad()               Returns the current record's "obesidad" value
 * @method integer               getDislipemia()             Returns the current record's "dislipemia" value
 * @method integer               getTabaquismo()             Returns the current record's "tabaquismo" value
 * @method integer               getIam()                    Returns the current record's "iam" value
 * @method integer               getAve()                    Returns the current record's "ave" value
 * @method integer               getRevascCardio()           Returns the current record's "revasc_cardio" value
 * @method integer               getMesesEnLista()           Returns the current record's "meses_en_lista" value
 * @method Pacientes             getPacientes()              Returns the current record's "Pacientes" value
 * @method Doctrine_Collection   getTrasplante()             Returns the current record's "Trasplante" collection
 * @method Doctrine_Collection   getPacientePerdidaInjerto() Returns the current record's "PacientePerdidaInjerto" collection
 * @method Pacientepretrasplante setId()                     Sets the current record's "id" value
 * @method Pacientepretrasplante setPacienteId()             Sets the current record's "paciente_id" value
 * @method Pacientepretrasplante setThe()                    Sets the current record's "the" value
 * @method Pacientepretrasplante setFechaIngresoLista()      Sets the current record's "fecha_ingreso_lista" value
 * @method Pacientepretrasplante setFechaEgreso()            Sets the current record's "fecha_egreso" value
 * @method Pacientepretrasplante setModalidadD()             Sets the current record's "modalidad_d" value
 * @method Pacientepretrasplante setDiabetes()               Sets the current record's "diabetes" value
 * @method Pacientepretrasplante setImc()                    Sets the current record's "imc" value
 * @method Pacientepretrasplante setOrigen()                 Sets the current record's "origen" value
 * @method Pacientepretrasplante setPbr()                    Sets the current record's "pbr" value
 * @method Pacientepretrasplante setHta()                    Sets the current record's "hta" value
 * @method Pacientepretrasplante setObesidad()               Sets the current record's "obesidad" value
 * @method Pacientepretrasplante setDislipemia()             Sets the current record's "dislipemia" value
 * @method Pacientepretrasplante setTabaquismo()             Sets the current record's "tabaquismo" value
 * @method Pacientepretrasplante setIam()                    Sets the current record's "iam" value
 * @method Pacientepretrasplante setAve()                    Sets the current record's "ave" value
 * @method Pacientepretrasplante setRevascCardio()           Sets the current record's "revasc_cardio" value
 * @method Pacientepretrasplante setMesesEnLista()           Sets the current record's "meses_en_lista" value
 * @method Pacientepretrasplante setPacientes()              Sets the current record's "Pacientes" value
 * @method Pacientepretrasplante setTrasplante()             Sets the current record's "Trasplante" collection
 * @method Pacientepretrasplante setPacientePerdidaInjerto() Sets the current record's "PacientePerdidaInjerto" collection
 * 
 * @package    transplantes
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePacientepretrasplante extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('paciente_pre_trasplante');
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
        $this->hasColumn('the', 'integer', 4, array(
             'type' => 'integer',
             'unique' => true,
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('fecha_ingreso_lista', 'date', 25, array(
             'type' => 'date',
             'notnull' => true,
             'length' => 25,
             ));
        $this->hasColumn('fecha_egreso', 'date', 25, array(
             'type' => 'date',
             'length' => 25,
             ));
        $this->hasColumn('modalidad_d', 'enum', 11, array(
             'type' => 'enum',
             'length' => 11,
             'values' => 
             array(
              0 => 'HD',
              1 => 'DPCA',
              2 => 'HD+DPCA',
              3 => 'TR',
              4 => 'HD+TR',
              5 => 'DPCA+TR',
              6 => 'HD+TR+DPCA',
              7 => 'TM',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('diabetes', 'enum', 8, array(
             'type' => 'enum',
             'length' => 8,
             'values' => 
             array(
              0 => 'No',
              1 => 'Tipo I',
              2 => 'Tipo II',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('imc', 'enum', 14, array(
             'type' => 'enum',
             'length' => 14,
             'values' => 
             array(
              0 => '<20',
              1 => 'entre 20 y 25',
              2 => '>25',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('origen', 'enum', 4, array(
             'type' => 'enum',
             'length' => 4,
             'values' => 
             array(
              0 => 'MSP',
              1 => 'IAMC',
              2 => 'Otra',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('pbr', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'length' => 1,
             ));
        $this->hasColumn('hta', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'length' => 1,
             ));
        $this->hasColumn('obesidad', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'length' => 1,
             ));
        $this->hasColumn('dislipemia', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'length' => 1,
             ));
        $this->hasColumn('tabaquismo', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'length' => 1,
             ));
        $this->hasColumn('iam', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'length' => 1,
             ));
        $this->hasColumn('ave', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'length' => 1,
             ));
        $this->hasColumn('revasc_cardio', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'length' => 1,
             ));
        $this->hasColumn('meses_en_lista', 'integer', 2, array(
             'type' => 'integer',
             'default' => 0,
             'length' => 2,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Pacientes', array(
             'local' => 'paciente_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Trasplante', array(
             'local' => 'id',
             'foreign' => 'paciente_pre_trasplante_id'));

        $this->hasMany('PacientePerdidaInjerto', array(
             'local' => 'id',
             'foreign' => 'paciente_pre_trasplante_id'));
    }
}