<?php
/**
 * Collaborateur
 * 
 * @author FANTINE
 * @version 
 */
require_once 'Zend/Db/Table/Abstract.php';
class Application_Model_DbTable_Collaborateur extends Zend_Db_Table_Abstract
{
    /**
     * The default table name 
     */
    protected $_name = 'collaborateur';
 public function addUser ($nom, $prenom, $adresse, $login, $password)
    {
        $data = array('nom' => $nom, 'prenom' => $prenom, 'adresse' => $adresse, 
        'login' => $login, 'password' => $password);
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
    
 
    // cette fonction met à jour un enregistrement dans la BD
    public function updateUser ($id, $nom, $prenom, $adresse, $login, $password)
    {
        $data = array('nom' => $nom, 'prenom' => $prenom, 'adresse' => $adresse, 
        'login' => $login, 'password' => $password);
        $this->update($data, 'id=' . (int) $id);
    }
    
    //cette fonction permet la suppression d'un enregistrement de la base de données
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
?>
    
