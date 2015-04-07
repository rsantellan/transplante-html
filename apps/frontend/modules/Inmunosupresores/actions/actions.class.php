<?php

/**
 * donanteCausaMuerte actions.
 *
 * @package    transplantes
 * @subpackage donanteCausaMuerte
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InmunosupresoresActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->list = InmunoSupresoresHandler::retrieveAll();
	//Inmunosupresores
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new InmunosupresoresForm();
    
    $body = $this->getPartial('small_form', array('form'=>$this->form));
    
    return $this->renderText(mdBasicFunction::basic_json_response(true, array('body' => $body)));    
  }

  
  public function executeSave(sfWebRequest $request)
  {
      $auxForm = new InmunosupresoresForm();
      $parameters = $request->getParameter($auxForm->getName());
      $id = $parameters["id"];
      $isNew = true;
      if($id)
      {
		$inmunosupresor = Doctrine_Core::getTable('Inmunosupresores')->find($id);
		$this->forward404Unless($inmunosupresor);
		$form = new InmunosupresoresForm($inmunosupresor);		
        $isNew = false;
      }
      else
      {
        
        $form = new InmunosupresoresForm(); 
      }
      $form->bind($parameters);
      if ($form->isValid())
      {
        $inmunosupresor = $form->save();
        $form = new InmunosupresoresForm($inmunosupresor);
        $body = $this->getPartial('small_form', array('form'=>$form));
        
        return $this->renderText(mdBasicFunction::basic_json_response(true, array('isnew'=>$isNew, 'id'=>$inmunosupresor->getId(), 'nombre'=>$inmunosupresor->getNombre(), 'body' => $body)));
      }
      else
      {
        $body = $this->getPartial('small_form', array('form'=>$form));
        return $this->renderText(mdBasicFunction::basic_json_response(false, array('body' => $body)));
      }
  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();

    $this->forward404Unless($inmunosupresor = Doctrine_Core::getTable('Inmunosupresores')->find(array($request->getParameter('id'))), sprintf('Object Inmunosupresores does not exist (%s).', $request->getParameter('id')));
    try
    {
      if($inmunosupresor->delete())
      {  
        return $this->renderText(mdBasicFunction::basic_json_response(true, array('id'=>$request->getParameter('id'))));
      }
      else
      {
        return $this->renderText(mdBasicFunction::basic_json_response(false, array()));
      }      
    }catch(Exception $e)
    {
      
      return $this->renderText(mdBasicFunction::basic_json_response(false, array("error" => $e->getCode())));
    }
	
    //$this->redirect('donanteCausaMuerte/index');
  }  

  public function executeEdit(sfWebRequest $request)
  {
    $inmunosupresor = Doctrine_Core::getTable('Inmunosupresores')->find($request->getParameter('id'));
    $this->forward404Unless($inmunosupresor);
    
    $this->form = new InmunosupresoresForm($inmunosupresor);
    
    $body = $this->getPartial('small_form', array('form'=>$this->form));
    
    return $this->renderText(mdBasicFunction::basic_json_response(true, array('body' => $body)));
  }  

}
