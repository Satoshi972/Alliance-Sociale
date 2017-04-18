<?php

namespace Controller;

use \W\Controller\Controller;
use Model\ContactsModel;
use Respect\Validation\Validator as v;

class ContactFrontController extends MasterController
{
    public function addContact()
    {
         $roles = ['admin','editor'];
        $this->allowTo($roles);
        
        $contact = new ContactsModel();
        $errors = [];
        $post = [];
        $success = false;

        $post = array_map('trim', array_map('strip_tags', $_POST));
    	if(!empty($_POST)) {
        $err = [
            //On vérifie que le titre ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alpha('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 30)->validate($post['title'])) ? 'Le titre doit contenir entre 2 et 30 caractères' : null,
            
            //On vérifie que le champ email soit non vide et qu'il soit valide
            (!v::notEmpty()->email()->validate($post['mail'])) ? 'L\'adresse email est invalide' : null,
            
            //On vérifie que le contenu ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 250 caractères
            (!v::notEmpty()->alpha('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 600)->validate($post['content'])) ? 'Le contenu doit contenir entre 2 et 600 caractères' : null,
        ];

        $errors = array_filter($err);

        if(count($errors) === 0){

            $datas = [
            'title'   => $post['title'],
            'mail'   => $post['mail'],
            'content' => $post['content'],
            ];
        	
            $contact->insert($datas);
                   
                $success = true;
        }
        else {
            $textErrors = implode('<br>', $errors);
        }
        
    	}

            $params = [
           'success' => $success,
           'errors'  => $errors,
           ];

           $this->show('contact_front/contact_front',$params);
    }
}