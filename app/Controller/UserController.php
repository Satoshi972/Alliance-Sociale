<?php

;

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;
use \vendor\phpmailer\phpmailer\PHPMailerAutoload;



use Respect\Validation\Validator as v;
//namespace Model;
date_default_timezone_set('America/Martinique');


class UserController extends Controller
{
    
    public function login()
	{
        
                $this->show('login_logout/login');
            }
    
    
    public function ajax_login()
    {
        
        $login = new AuthentificationModel();
        $find = new UsersModel();
        
        $post = [];
        $errors = [];

        if(!empty($_POST)){
            // Nettoyage des données
            foreach($_POST as $key => $value){
                $post[$key] = trim(strip_tags($value));
            }

            if(!v::filterVar(FILTER_VALIDATE_EMAIL)->validate($post['ident'])){
                $errors[] = 'L\'adresse email est invalide';
            }
            if(!v::stringType()->notEmpty()->validate($post['password'])){
                $errors[] = 'Le mot de passe doit être complété';
            }

            if(count($errors) === 0){


                $enter = new AuthentificationModel();
                $user = $enter->isValidLoginInfo($post['ident'], $post['password']);
                $infos = $find->find($user);
                var_dump($user);
                var_dump($infos);

                    if(!empty($user)){


                            $login->logUserIn($user);
                            echo "Vous êtes connecté";
                 var_dump($_SESSION['user']);
                        }
                        else { // password_verify
                            $errors[] = 'Le couple identifiant/mot de passe est invalide';
                        }
                    }
                    else { // utilisateur inexistant, donc email inexistant en bdd
                        $errors[] = 'Le couple identifiant/mot de passe est invalide';
                    }
                }
        
        
        $this->show('login_logout/ajax_login', ['errors' => $errors]);
        
        
        
        
        
    }
    public function logout()
	{    
      
     if(isset($_GET['logout']) && ($_GET['logout'] == 'yes')){
	 $logout = new AuthentificationModel();
     $logout->logUserOut();
     }   
        
        
     $this->show('login_logout/logout', ['$_SESSION["name"]' => $_SESSION["name"]]);   
        
        
     }
    
}
        
    
    
    
    
    
    
    
    
    
