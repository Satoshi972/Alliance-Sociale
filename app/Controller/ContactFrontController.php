<?php

namespace Controller;

use \W\Controller\Controller;
use Model\ContactsModel;
use Respect\Validation\Validator as v;

class ContactFrontController extends MasterController
{
    public function addContact()
    {
        $contact = new ContactsModel();
        $errors = [];
        $post = [];
        // $success = false;
        $result = false;

        if(!empty($_POST)) {
            $post = array_map('trim', array_map('strip_tags', $_POST));
            $err = [
                //On vérifie que le titre ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
                (!v::notEmpty()->alNum('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 30)->validate($post['title'])) ? 'Le titre doit contenir entre 2 et 30 caractères' : null,
                
                //On vérifie que le champ email soit non vide et qu'il soit valide
                (!v::notEmpty()->email()->validate($post['mail'])) ? 'L\'adresse email est invalide' : null,
                
                //On vérifie que le contenu ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 250 caractères
                (!v::notEmpty()->alNum('-?!\'+*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 600)->validate($post['content'])) ? 'Le contenu doit contenir entre 2 et 600 caractères' : null,
            ];

            $errors = array_filter($err);

            if(count($errors) === 0){

                $datas = [
                'title'   => $post['title'],
                'mail'    => $post['mail'],
                'content' => $post['content'],
                'date'    => date("Y-m-d  H:i:s"),
                ];
            	
                $contact->insert($datas);
                       
                $result = "success";
                // $result = '<p class="alert-dismissable alert-success">Votre formulaire a bien été envoyé</p>';
            }
            else {
                // $result = implode('<br>', $errors);
                $result = '<p class="alert-dismissable alert-danger">'.implode('<br>', $errors).'</p>';
                // $textErrors = implode('<br>', $errors);
            }
    	}
        else
        {
           $this->show('contact_front/contact_front');
        }

      echo $result;
    }
}