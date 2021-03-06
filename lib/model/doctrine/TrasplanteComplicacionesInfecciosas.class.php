<?php

/**
 * TrasplanteComplicacionesInfecciosas
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    transplantes
 * @subpackage model
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TrasplanteComplicacionesInfecciosas extends BaseTrasplanteComplicacionesInfecciosas
{
  public function showDate()
  {
	sfContext::getInstance()->getConfiguration()->loadHelpers(array('Date'));
	return format_date($this->getFecha(), 'D');
  }
  
  public function getObjectClass()
  {
    return get_class($this);
  }
}
