<?php
/**
 * Projet
 * 
 * @author FANTINE
 * @version 
 */
require_once 'Zend/Db/Table/Abstract.php';
class Application_Model_DbTable_Projet extends Zend_Db_Table_Abstract
{
    /**
     * The default table name 
     */
    protected $_name = 'projet';
     public function addUser ($nom, $description,$id_manager)
    {
        $data = array('nom' => $nom, 'description' => $description,'id_manager'=>$id_manager);
        //Plus besoin d'écrire une reqûete, la fonction "insert" le fait automatiquement à notre place
        $this->insert($data);
    }
    
    
    //cette fonction permet de récupérer un utilisateur à travers son 'id'
    public function getUser ($id)
    {
        $id = (int) $id;
        
        /* la fonction fetchRow permet de parcourir les enregistrement de la BD, la syntaxe ('id = ' . $id) remplace 
         la mot SQL "where", c-a-d (where id = $id) */
        $row = $this->fetchRow('id = '.$id);
        if (! $row) {
            throw new Exception("could not find row $id");
        }
        return $row->toArray();
    }
 public function deleteUser ($id)
    {
        $this->delete('id=' . (int) $id);
    }
    
    
   
    public function rechercheUser($mot){
    	
    	$row = $this->fetchAll("nom = '$mot'");
    	 if (! $row) {
            throw new Exception("could not find row $mot");
        }
        return $row;
    }
    
 
}
