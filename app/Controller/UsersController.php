<?php

namespace Controller;

use \W\Controller\Controller;

class UsersController extends Controller
{
        public function addUsers(){
            $errors = [];
        $post = [];
        
        if(!empty($_POST)){
            
            $post = array_map('trim', array_map('strip_tags', $_POST));
                      
            if(strlen($post['firstname']) < 2) {
                $errors[] = "Le champ Nom doit avoir au minimum 2 caractères";
            }
            
            
            if(strlen($post['lastname']) < 2) {
                $errors[] = "Le prénom doit avoir au minimum 2 caractères";
            }

            
            if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Le champ Email n'est pas conforme";
            }

            if(!is_numeric($post['phone']) || strlen($post['phone']) != 10) {
                $errors[] = "Le champ Téléphone doit avoir 10 chiffres";
	        }
            

                      
            if(count($errors) === 0){
                
                $datas = [
                // colonne sql => valeur à insérer
                'firstname'=> $post['firstname'],
                'lastname' => $post['lastname'],
                'email'    => $post['email'],
                'phone'    => $post['phone'],
                'sms'      => $post['sms'],
                'role'     => $post['role'],
                'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                ];

                $enter = new UsersModel();
                $enter->insert($datas);
            }
            else
            {
                $textErrors = implode('<br>', $errors);
            }
            
        }




    $this->show('users/add_users');
    }
}