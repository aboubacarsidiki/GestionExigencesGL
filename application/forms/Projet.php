<?php
class Application_Form_Projet extends Zend_Form
{
	// la fonction "init" permet d'initialiser un formulaire avec tous 
	//ses �l�ments(text,radio,button,submit,select,etc..)  carine
    public function init ()
    {
        $ut = new Application_Model_DbTable_Manager();
    	$this->setName("FormulaireProjet");
         
        $id= new Zend_Form_Element_Hidden("id");/*on utilise un �l�ment "id" cach� pour passer sa valeur 
        en param�tre lors de la modification ou la suppression d'un utilisateur */
        $nom = new Zend_Form_Element_Text("nom");
        $nom->setLabel("Nom :");
        $nom->setRequired();
        $description = new Zend_Form_Element_Textarea("description");
        $description->setLabel("Description :");          
        $pays= new Zend_Form_Element_Select("id_manager");
        $pays->setLabel("Id de manager : ");
        foreach ($ut->fetchAll() as $user):
        $pays->addMultiOptions(array($user->id=>$user->id));
        endforeach; 
        $valider = new Zend_Form_Element_Submit("ajouter");
        $valider->setLabel("valider");
        $this->addElements(array($id,$nom, $description,$pays,$valider));
    }
}
?>
