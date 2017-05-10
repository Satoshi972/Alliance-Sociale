<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ContactsModel;
use \Model\ContactsModel as contact;

class ContactController extends MasterController
{
	public function contactList($page)
	{

        // $roles = ['admin','editor'];
        // $this->allowTo($roles);

        
        $contactModel = new contact();
        $contacteach = "";
        
        $ContactPerPages  = 5;
        $nbContact        = $contactModel->nbrTotal();
        $nbPages         = ceil($nbContact/$ContactPerPages);
        
        if(isset($page))
        {
              $currentPage=intval($page);
     
             if($currentPage>$nbPages)
             {
                  $currentPage=$nbPages;
             }
        }
        else
        {
             $currentPage=1; 
        }

        $firstEntry= ($currentPage-1)*$ContactPerPages; 
        //$contacteach= $contactModel->listPageMedias($firstEntry, $ContactPerPages);
        
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
        		$order = 'statut';
        	}

        	if($_GET['order'] == 'asc'){
        		$order2= 'ASC';
        	}
        	elseif($_GET['order'] == 'desc'){
        		$order2= 'DESC';
        	}
            
                 

            $contacts = $select->findAllC($orderBy = $order, $orderDir = $order2,$limit = '', $offset = null,  $firstEntry , $ContactPerPages);

            $params = [
                "contacts" => $contacts,
                "nbPages"  => $nbPages,
			    "page"	   => $page,
            
            ];
            $this->show('contacts/contact_list', $params);  
            
                
        } elseif(!empty($_GET)){
            

        	// équivalent au foreach de nettoyage
        	$get = array_map('trim', array_map('strip_tags', $_GET)); 
            
            if(isset($get['search'])) {
                
            if(strlen($get['search']) < 1){
        		$errors[] = 'Il faut au moins rentrer un caractère';
        	}    
            $chainesearch = $get['search'];  
            
                if(count($errors) === 0){
                
                $findall = new ContactsModel();
                $donnees = $findall->findAllsearch($chainesearch, $orderBy = '', $orderDir = 'ASC', $limit = '', $offset = null, $firstEntry , $ContactPerPages);
                    
                $params = ["donnees" => $donnees, 
                           "chainesearch" => $chainesearch,
                           "nbPages"  => $nbPages,
			               "page"	  => $page,
                          ];
                $this->show('contacts/contact_list', $params);  
                    
                }else{
                $contacts = $select->findAll($orderBy = '', $orderDir = 'ASC', $limit = '', $offset = null, $firstEntry , $ContactPerPages);    
                $textErrors = implode('<br>', $errors);
        		$params = ["contacts" => $contacts,
                           "errors"   => $textErrors,
                           "nbPages"  => $nbPages,
			               "page"	  => $page,
                          
                          
                          
                          
                          ];
                $this->show('contacts/contact_list', $params);  
        	} 
            }    
        }else {
                $contacts = $select->findAll($orderBy = '', $orderDir = 'ASC', $limit = '', $offset = null, $firstEntry , $ContactPerPages);
                
                $params = ["contacts" => $contacts,
                           "nbPages"  => $nbPages,
			               "page"	  => $page,
                          
                          ];
                $this->show('contacts/contact_list', $params);  
                
        }
                
    }
    
    public function ajaxDeleteContact($id)
	{
         $success = false;
        $select = new ContactsModel();
       // $redirect =new Controller;
        
        $select->delete($id);
        /*if(!empty($_POST)){
            // Nettoyage des données
            foreach($_POST as $key => $value){
            $post[$key] = trim(strip_tags($value));
                

	   
            
           
            $select->delete($post['hidden']);

            $redirect->redirectToRoute('contactList');
            $this->show('contacts/ajax_del_contacts');
        
        
            }
        }*/
    }
    
    public function updateCheck()
	{
        
        $select = new ContactsModel();
        $redirect =new Controller;
        
        
        if(!empty($_POST)){
            // Nettoyage des données
            foreach($_POST as $key => $value){
            $post[$key] = trim(strip_tags($value));
        
        
            $update = $select->update(["statut"=> 1,],$post["hidden"]);

            $result = '<div class="alert alert-success">Le message est maintenant marqué comme lu !</div>';

            echo $result; // On envoi le résultat
        
            }
        
        }
        $redirect->redirectToRoute('contactList', ['page' => 1]);
        $this->show('contacts/updateCheck');
        
    }

    public function ListAllContact()
    {
        $contact = new ContactsModel();
        $list = $contact->findAll();
        $this->showJson($list);
    }

    public function deleteAllContact()
    {
        $contact = new ContactsModel();
        $list = $contact->deleteAll();
    }
    
}
