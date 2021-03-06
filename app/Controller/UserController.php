<?php


namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;
use \vendor\phpmailer\phpmailer\PHPMailerAutoload;
use \W\Security\AuthorizationModel;


use Respect\Validation\Validator as v;
//namespace Model;
date_default_timezone_set('America/Martinique');


class UserController extends Controller
{
    
    public function login()
	{
        
        $login = new AuthentificationModel();
        $find = new UsersModel();
        $autorisation = new AuthorizationModel();
        
        $post = [];
        $errors = [];
        $result = false;

        if(!empty($_POST)){
            // Nettoyage des données
            foreach($_POST as $key => $value){
                $post[$key] = trim(strip_tags($value));
            }

            if(!v::filterVar(FILTER_VALIDATE_EMAIL)->validate($post['ident'])){
                $errors[] = 'L\'adresse email est invalide';
            }
            if(!v::alnum('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->notEmpty()->validate($post['password'])){
                $errors[] = 'Le mot de passe doit être complété';
            }

            if(count($errors) === 0){


                $user = $login->isValidLoginInfo($post['ident'], $post['password']);
                $infos = $find->find($user);
                

                    if(!empty($user)){

                            $login->logUserIn($infos);

                            $app = getApp();
                            $roleProperty = $app->getConfig('security_role_property');

                            //récupère les données en session sur l'utilisateur
                            $loggedUser = $login->getLoggedUser();
                            // var_dump($loggedUser);
                            // Si utilisateur non connecté
                            if (!$loggedUser){
                                // Redirige vers le login
                                $this->redirectToLogin();
                            }

                            if (!empty($loggedUser[$roleProperty]) && $loggedUser[$roleProperty] === 'admin'){

                                $this->redirectToRoute('admin');

                            } elseif
                                (!empty($loggedUser[$roleProperty]) && $loggedUser[$roleProperty] === 'editor'){

                                $this->redirectToRoute('admin');

                            } elseif 
                                (!empty($loggedUser[$roleProperty]) && $loggedUser[$roleProperty] === 'member'){

                                $this->redirectToRoute('default_home');

                            }

                            /*return false;
                            }*/
                            
                    } else { // password_verify
                        $errors[] = 'Le couple identifiant/mot de passe est invalide'; 
                    }
                } else { // utilisateur inexistant, donc email inexistant en bdd
                        $errors[] = 'Le couple identifiant/mot de passe est invalide';
                }
        }
        
        
        $this->show('login_logout/login', ['errors' => $errors]);
    }
    
    
    public function ajax_login()
    {
        
       
           
    }

    public function logout()
	{    
     $find = new UsersModel();
        
     if (isset($_SESSION["user"])){
         
        $infos = $find->find($_SESSION['user']['id']);
       
        $this->show('login_logout/logout', ['infos' => $infos,
                                           ]);   
         
     } else {
         
        $this->show('login_logout/logout');
        }    
	
     }   
        
        
     public function ajax_logout(){
         
         $logout = new AuthentificationModel();
         $logout->logUserOut();

         $result = '<div class="alert alert-success" style="text-align:center">Vous êtes déconnecté</div>';

         echo $result; // On envoi le résultat

         $this->show('login_logout/ajax_logout');
         
     }
        
        
}