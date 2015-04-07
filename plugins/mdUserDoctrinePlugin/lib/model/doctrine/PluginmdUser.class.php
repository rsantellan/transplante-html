<?php

/**
 * PluginmdUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class PluginmdUser extends BasemdUser
{

    public function __toString() {
        return $this->getEmail();
    }


    public function getObjectClass()
    {
      return get_class($this);
    }
	
    public function delete(Doctrine_Connection $conn = null) {

        sfContext::getInstance()->getLogger()->info("Preparando para borrar el usuario");
        return parent::delete($conn);
    }

    public function postDelete($event)
    {
        if(sfConfig::get('sf_driver_cache'))
        {
            Doctrine::getTable('mdUser')->removeCacheByKey('_md_user_'.$this->getId());
            Doctrine::getTable('mdUser')->removeCacheByKey('_list_md_users_ids');
        }
    }
    
    public function preDelete($event){
        sfContext::getInstance()->getLogger()->info("Preparando para borrar los pasaportes del usuario");
        foreach($this->getMdPassport() as $mdPassport){
            $mdPassport->delete();
        }
        sfContext::getInstance()->getLogger()->info("Preparando para borrar los mdContents del usuario");
        foreach($this->getMdContent() as $mdContent){
            if($mdContent->getObjectClass() !== "mdMediaContent")
            {
                $aux = $mdContent->retrieveObject();
                $aux->delete();
                $mdContent->delete();
            }
            
        }
    }
		
    public static function retrieveMdUsers($page = 1, $limit = 20)
    {
        $mdUsersIds = Doctrine::getTable('mdUser')->retrieveMdUsersReference();

        $contentIds = array();
        $array_contents = array_chunk($mdUsersIds, $limit);

        if(array_key_exists(($page-1), $array_contents))
        {
            $contentIds = $array_contents[$page-1];
        }
        else
        {
            return $contentIds;
        }

        $list = array();
        foreach($contentIds as $arrIds){
            $list[] = Doctrine::getTable('mdUser')->retrieveMdUserById($arrIds[0]);
        }
        return $list;
    }
		
    public function retrieveMdPassport(){
        return Doctrine::getTable('mdPassport')->retrieveMdPassportByUserId($this->getId());
    }
		
    /**
     * 	Salva el objeto mdUSer.
     * Genera el objeto sfGuardUser padre con los datos del mdUser
     * Si el email que se esta queriendo ingresar ya existe, hidrata esta instancia con el mdUser ya existente.
     *
     * @return void
     * @author maui .-
     * */
    public function save(Doctrine_Connection $conn = null) {
        if(sfConfig::get('sf_driver_cache'))
        {
                Doctrine::getTable('mdUser')->removeCacheByKey('_md_user_'.$this->getId());
                Doctrine::getTable('mdUser')->removeCacheByKey('_list_md_users_ids');
        }
        return parent::save($conn);

        /*
        if ($this->isNew()) {
        $mdUser = Doctrine::getTable('mdUser')->retrieveMdUserByEmail($this->getEmail());
        //chequeo si existe un mdUser con el email que se esta usando
        if (!($mdUser)) {
        //le genero el sfGuardUser y le cargo los datos
        $sfGuard = new sfGuardUser();
        $sfGuard->setUsername(md5($this->getEmail()));
        $sfGuard->setPassword(md5($this->getEmail()));
        $this->setsfGuardUser($sfGuard);
        parent::save($conn);
        } else {
        //hidrato esta instancia del objeto con el objecto que ya existe
        //$this->hydrate($mdUser->toArray());
        //seteo el estado del objeto como ya existente - siempre va a devolver Doctrine_Record::STATE_CLEAN (3)
        //$this->state($mdUser->state());
        }
        } else {
        //si el email cambio actualiza los datos del sfGuardUser
        if ($this->isModified()) {

        }
        parent::save($conn);
        }*/
    }

    public function retrieveAllMdUserContents() {
        throw new Exception('Old logic for profile', 102);
        $helper = new mdUserContent();
        $list = Doctrine::getTable('mdContent')->retrieveByMdUserClassName($this->getId(), get_class($helper));
        $returnList = array();
        foreach ($list as $mdContent) {
            array_push($returnList, $mdContent->retrieveObject());
        }
        return $returnList;
    }

    public function getMdUserProfile() {
        return doctrine::getTable('mdUserProfile')->findByMdUserId($this->getId());
    }

    /**
     * Valida que un email sea de un solo usuario si esta desactivado las aplicaciones multiples.
     * @param String $email
     * @return bool | Exception
     * @author Rodrigo Santellan
     */
    public static function validateEmail($email) {
        $multipleAplication = sfConfig::get('app_multiple_active', false);
        if (!$multipleAplication) {
            $mdUser = Doctrine::getTable('mdUser')->findOneby('email', $email);
            if($mdUser){
                throw new Exception("A user exists with that email", 130);
            }
        }
        return true;
    }


}
