<?php
/**
 * ProjetController
 * 
 * @author
 * @version 
 */
require_once 'Zend/Controller/Action.php';
class ProjetController extends Zend_Controller_Action
{
    /**
     * The default action - show the home page
     */
    public function indexAction ()
    {
        // TODO Auto-generated ProjetController::indexAction() default action
    }
     public function inscriptionAction ()
    {
        $AFI = new Application_Form_Projet();
        $this->view->formulaireInscri = $AFI;
        //nous vérifions que les données provenantes du formulaire sont envoyées par la méthode POST
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            /*chargement des données dans la variable $AFI
             $AFI->populate($formData);
             Si le formulaire est vailde, on récupère les données saisies par l'utilisateur à l'aide 
             de getValue */
            if ($AFI->isValid($formData)) {
                $nom = $AFI->getValue('nom');
                $prenom = $AFI->getValue('description');
                $id_man=$AFI->getValue('id_manager');
                $user = new Application_Model_DbTable_Projet();
                $user->addUser($nom, $prenom,$id_man);
                //la redirection de l'utilisateur après inscription
                $this->_helper->redirector('lst');
                 // donner la possibilité à l'utilisateur de réinsérer les données
            } else {
                $AFI->populate($formData);
            }
        }
    }
    
    
    //Cette fonction permet de lister le contenu de la Table "utilisateur"
    public function lstAction ()
    {
        //instanciation du modèle "utilisateur" pour extraire les données de la base de données 
        $ut = new Application_Model_DbTable_Projet();
        /* la fonction "fetchAll" permet de parcourir la base de données et inclure le résultat dans l'objet 
         "users" qui sera parcouru dans la vue "lst" . (voir la vue lst.phtml) */
        
        $this->view->users = $ut->fetchAll();
    }
public function deleteAction ()
    {
        if ($this->getRequest()->isPost()) {
        	
        	/* on récupère dans la variable $del la valeur du champs "del" de notre formulaire qui peut être
        	 soit "YES" soit "NO"*/
            $del = $this->getRequest()->getPost('del');
            //Si la valeur de "del" est "YES" c'est que l'utilisateur a confirmé la suppression
            if ($del == 'YES') {
                //$id = $this->_getParam('id', 0);
                $id = $this->getRequest()->getPost('id');
                $users = new Application_Model_DbTable_Projet();
                $users->deleteUser($id);
            }
            //puis on redirige de nouveau vers l'action "lst" pour revenir à la liste des utilisateurs
            $this->_helper->redirector('lst');
        } else {
            $id = $this->_getParam('id', 0);
            $users = new Application_Model_DbTable_Projet();
            $this->view->users = $users->getUser($id);
        }
    }
    
    public function rechercheAction(){
    	$r= new Application_Form_Recherche();
    	$this->view->formrecherche=$r;
    	
    	if ($this->getRequest()->isPost()){
    		$data=$this->getRequest()->getPost();
    		if ($r->isValid($data)){
    			$mot=$r->getValue("zone");
    			$users = new Application_Model_DbTable_Projet();
    			//$p =$users->fetchAll("nom ='".$mot."'");
    			$p =$users->rechercheUser($mot);
    			$this->view->formre = $p;
    			
    		}
    		
    	}
    	
    }
    
    
}
