<?php
class Application_Form_Exigence extends Zend_Form
{
	// la fonction "init" permet d'initialiser un formulaire avec tous 
	//ses éléments(text,radio,button,submit,select,etc..) 
    public function init ()
    {
        $ut = new Application_Model_DbTable_Collaborateur();
        $at = new Application_Model_DbTable_Projet();
    	$this->setName("FormulaireExigence");
         
        $id= new Zend_Form_Element_Hidden("id");/*on utilise un élément "id" caché pour passer sa valeur 
        en paramètre lors de la modification ou la suppression d'un utilisateur */
        $nom = new Zend_Form_Element_Text("nom");
        $nom->setLabel("Nom :");
        //$nom->setRequired();
        $pays= new Zend_Form_Element_Select("id_collaborateur");
        $pays->setLabel("Id du collaborateur : ");
        foreach ($ut->fetchAll() as $user):
        $pays->addMultiOptions(array($user->id=>$user->id));
        endforeach;
        $dd = new Zend_Form_Element_Text("date_debut");
        $dd->setLabel("Date de debut :");
        $df = new Zend_Form_Element_Text("date_fin");
        $df->setLabel("Date de fin :");
        $etav= new Zend_Form_Element_Select("etat_avance");
        $etav->addMultiOptions(array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10));         
        $etav->setLabel("Etat d'avancement :"); 
        $priorite = new Zend_Form_Element_Text("priorite");
        $priorite->setLabel("Lapriorite :");
        $projet= new Zend_Form_Element_Select("id_projet");
        $projet->setLabel("Id du Projet : ");
        foreach ($at->fetchAll() as $user):
        $projet->addMultiOptions(array($user->id=>$user->id));
        endforeach;
             
        $valider = new Zend_Form_Element_Submit("ajouter");
        $valider->setLabel("valider");
        $this->addElements(array($id,$nom,$pays, $dd,$df,$etav,$priorite,$projet,$valider));
    }
}
?>