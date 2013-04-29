<?php
class Application_Form_Recherche extends Zend_Form
{
    public function init ()
    {
        $this->setName("recherche");
        $zone= new Zend_Form_Element_Text("zone");
        
        
        $valider= new Zend_Form_Element_Submit("valider");
        $valider->setLabel("Rechercher");
        
        $this->addElements(array($zone,$valider));
    }
}