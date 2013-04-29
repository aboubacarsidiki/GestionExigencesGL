<?php
/**
 * Exigences
 * 
 * @author FANTINE
 * @version 
 */
require_once 'Zend/Db/Table/Abstract.php';
class Application_Model_DbTable_Exigences extends Zend_Db_Table_Abstract
{
    /**
     * The default table name 
     */
    protected $_name = 'exigences';
    public function addUser ($nom, $id_collaborateur,$dd,$df,$etav,$priorite,$id_projet)
    {
        $data = array('nom' => $nom, 'id_collaborateur' => $id_collaborateur,'date_debut'=>$dd,'date_fin'=>$df,'etat_avance'=>$etav,'priorite'=>$priorite,'id_projet'=>$id_projet);
        //Plus besoin d'écrire une reqûete, la fonction "insert" le fait automatiquement à notre place
        $this->insert($data);
    }
    
public function updateUser ($id,$nom, $id_collaborateur,$dd,$df,$etav,$priorite,$id_projet)
    {
       $data = array('nom' => $nom, 'id_collaborateur' => $id_collaborateur,'date_debut'=>$dd,'date_fin'=>$df,'etat_avance'=>$etav,'priorite'=>$priorite,'id_projet'=>$id_projet);
        $this->update($data, 'id=' . (int) $id);
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
