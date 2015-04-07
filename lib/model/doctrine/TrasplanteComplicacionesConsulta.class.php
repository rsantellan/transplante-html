<?php

/**
 * TrasplanteComplicacionesConsulta
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    transplantes
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TrasplanteComplicacionesConsulta extends BaseTrasplanteComplicacionesConsulta
{
  const INFECCIOSAS = "TrasplanteComplicacionesInfecciosas";
  const NOINFECCIOSAS = "TrasplanteComplicacionesNoInfecciosas";
  
  
  /**
   * Lo que hace es que rellena los arrays para que no queden saltos.
   * 
   * @param type $unit 
   */
  public static function formatReturnData($unit, $list)
  {
    $auxList = range(0, $unit);
    $return = array();
    foreach($list as $row)
    {
      $return[(int)$row['u']] = (int)$row['c'];
      
    }
    foreach($auxList as $number)
    {
      if(!isset($return[$number]))
      {
        $return[(int)$number] = (int) 0;
      }
    }
    ksort($return);
    $aux = array();
    foreach($return as $key => $value)
    {
      $aux[] = array($key, $value);
    }
    
    return $aux;
  }
}