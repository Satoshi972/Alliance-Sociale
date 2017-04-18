<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ContactsModel;


class ContactController extends MasterController
{
	public function contactList()
	{
        $roles = ['admin','editor'];
        $this->allowTo($roles);

        $errors = [];
        $post = [];
        $donnees= [];
        
        $select = new ContactsModel();
        
                
        $order = '';
        // On vérifie que les paramètres d'url sont définis
        if(isset($_GET['order']) && isset($_GET['column'])){

        	// Attention aux fautes de frappes :
        	// Le paramètre GET doit correspondre à ce qui est envoyé dans l'url
        	if($_GET['column'] == 'date'){
        		$order = 'date';
        	}
        	// L'opérateur de comparaison == permet de comparer l'égalité entre deux données
        	// L'opérateur d'affectation = permet de définir une valeur à une variable
        	elseif($_GET['column'] == 'titre'){
        		$order = 'title';
        	}
        	elseif($_GET['column'] == 'email'){
        		$order = 'mail';
        	}
            elseif($_GET['column'] == 'view'){
        		$order = 'staut';
        	}

        	if($_GET['order'] == 'asc'){
        		$order2= 'ASC';
        	}
        	elseif($_GET['order'] == 'desc'){
        		$order2= 'DESC';
        	}
            
                 

                $contacts = $select->findAll($orderBy = $order, $orderDir = $order2, $limit = null, $offset = null);
            
                $params = ["contacts" => $contacts];
                $this->show('contacts/contact_list', $params);  
            
                
                } elseif(!empty($_POST)){
            

        	// équivalent au foreach de nettoyage
        	$post = array_map('trim', array_map('strip_tags', $_POST)); 
            
            if(isset($post['search'])) {
                
            if(strlen($post['search']) < 1){
        		$errors[] = 'Il faut au moins rentrer un caractère';
        	}    
            $chainesearch = $post['search'];  
                
                if(count($errors) === 0){
                
                $findall = new ContactsModel();
                $donnees = $findall->findAllsearch($chainesearch);
                    
                $params = ["donnees" => $donnees, "chainesearch" => $chainesearch];
                $this->show('contacts/contact_list', $params);  
                    
                }else{
                $contacts = $select->findAll();    
                $textErrors = implode('<br>', $errors);
        		$params = ["contacts" => $contacts,
                           "errors" => $textErrors];
                $this->show('contacts/contact_list', $params);  
        	} 
            }    
            }else {
                $contacts = $select->findAll();
                
                $params = ["contacts" => $contacts];
                $this->show('contacts/contact_list', $params);  
                
            }
                
    }
    
    public function ajaxDeleteContact()
	{
        $select = new ContactsModel();
        $redirect =new Controller;
        
        if(!empty($_POST)){
            // Nettoyage des données
            foreach($_POST as $key => $value){
            $post[$key] = trim(strip_tags($value));
                

	   
            
           
            $select->delete($post['hidden']);
            
        $redirect->redirectToRoute('contactList');
        $this->show('contacts/ajax_del_contacts');
        
        
    }
    }
    }
    
     public function updateCheck()
	{
        $roles = ['admin','editor'];
        $this->allowTo($roles);
        
        $select = new ContactsModel();
        $redirect =new Controller;
        
        
        if(!empty($_POST)){
            // Nettoyage des données
            foreach($_POST as $key => $value){
            $post[$key] = trim(strip_tags($value));
        
        
        $update = $select->update(["staut"=> 1,],$post["hidden"]);
        
        $result = '<div class="alert alert-success">Le message est maintenant marqué comme lu !</div>';
            
        echo $result; // On envoi le résultat
        
        }
        
        }
        $redirect->redirectToRoute('contactList');
        $this->show('contacts/updateCheck');
        
    }
    
}