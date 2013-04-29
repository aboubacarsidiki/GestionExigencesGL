<?php
class Application_Form_Inscription extends Zend_Form
{
	// la fonction "init" permet d'initialiser un formulaire avec tous 
	//ses éléments(text,radio,button,submit,select,etc..) 
    public function init ()
    {
        $this->setName("FormulaireInscription");
         
        $id= new Zend_Form_Element_Hidden("id");/*on utilise un élément "id" caché pour passer sa valeur 
        en paramètre lors de la modification ou la suppression d'un utilisateur */
        $nom = new Zend_Form_Element_Text("nom");
        $nom->setLabel("Nom :");
        $nom->setRequired();
        $prenom = new Zend_Form_Element_Text("prenom");
        $prenom->setLabel("Prenom :");
        
        $sexe= new Zend_Form_Element_Radio("sexe");
        $sexe->setLabel("Sexe : ");
        $sexe->addMultiOption("Homme","Homme");
        $sexe->addMultiOption("Femme","Femme");
                
        $pays= new Zend_Form_Element_Select("pays");
        $pays->setLabel("Pays : ");
        $pays->addMultiOptions(array('Tunisie'=>"Tunisie",'France'=>"France",'Allemagne'=>"Allemagne"));
        $adresse = new Zend_Form_Element_Text("adresse");
        $adresse->setLabel("Adresse :");
        $login = new Zend_Form_Element_Text("login");
        $login->setLabel("Login :");
        $password = new Zend_Form_Element_Password("password");
        $password->setLabel("Mot de Passe :");
        $valider = new Zend_Form_Element_Submit("ajouter");
        $valider->setLabel("valider");
        $this->addElements(array($id,$nom, $prenom,$sexe,$pays, $adresse,$login,$password, $valider));
    }
}
?>