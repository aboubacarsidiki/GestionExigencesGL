<?php
/*la classe doit commencer obligatoirement par "Application_Form" 
et doit hériter de la classe "Zend_Form", 
il s'agit là d'une convention de Zend */

class Application_Form_Authentification extends Zend_Form
{
    /* la fonction init() permet d'initialiser le formulaire */
	public function init ()
    {
        /* la méthode "setName" permet d'attribuer un nom au formulaire 
        qui sera affiché dans le html*/
    	$this->setName("FormulaireAuthentification");
        
    	/*créer une variable dans laquelle on instancie 
    	 la classe "Zend_Form_Element_Text"*/
        $login = new Zend_Form_Element_Text("login");
        $login->setRequired();
        $login->setAttribs(array('style' => 'background:#7EDB39;'));
        //$login->setAttribs(array('style' => 'font:"Lucida Grande","Lucida Unicode"'));
        /*la variable doit avoir un label en utilsant la fonction "setLabel" */
        $login->setLabel("Login : ");
        
		/*on fait pareil pour le mot de passe*/
        $password = new Zend_Form_Element_Password("password");
        $password->setRequired();
        $password->setAttribs(array('style' => 'background:#7EDB39;'));
        $password->setLabel("Mot de passe : ");
        
        /* on fait pareil pour le bouton*/
        $valider = new Zend_Form_Element_Submit("valider");
        $valider->setLabel("Valider");
        
        /*la fonction "addElements" permet de prendre en charge
          tous les éléments HTML d'un formaulire dans un tableau*/
        $this->addElements(array($login, $password, $valider));
    }
}
?>