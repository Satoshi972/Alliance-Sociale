<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\UsersModel as users;
use \Model\RoleModel as role;
use \Model\ActivityModel as activity;
use Respect\Validation\Validator as v;

class UsersController extends Controller
{
    public function addUsers(){
         
        //  $roles = ['admin'];
        // $this->allowTo($roles);
        $activity = new activity();
        $activities = $activity->findAll();
        $listActivity = [];

        foreach ($activities as $key => $value) 
        {
            $listActivity[] = $value['name'];
        }

        $enter = new users();
        $errors = [];
        $post = [];
        $success = false;
        $displayForm = true;

        $role = new role();
        $roles  = $role->findAll();
        $listRoles = [];

        foreach ($roles as $key => $value) 
        {
            $listRoles[] = $value['name'];
        }
        
        if(!empty($_POST)) {
            
            $post = array_map('trim', array_map('strip_tags', $_POST));
            
            $err = [
            //On vérifie que lastname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alpha('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 30)->validate($post['lastname'])) ? 'Le nom doit contenir entre 2 et 30 caractères' : null,
            
            //On vérifie que firstname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alpha('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 30)->validate($post['firstname'])) ? 'Le prénom doit contenir entre 2 et 30 caractères' : null,
            
            //On vérifie que le champ email soit non vide et qu'il soit valide
            (!v::notEmpty()->email()->validate($post['email'])) ? 'L\'adresse email est invalide' : null,

            (!v::numeric()->length(10, 10)->validate($post['phone'])) ? 'Le numéro de téléphone doit comporter 10 numéros' : null,
            
            //On vérifie que la taille du mot de passe soit comprise entre 8 et 30 caractères
            (!v::notEmpty()->length(8, 30)->validate($post['password'])) ? 'Le mot de passe doit contenir minimum 8 caractères' : null,

            (!preg_match("#^0|1[0-9]{14}#", $post['caf'])) ? 'Le numéro de caf doit faire 15 chiffres' : null,

            (!v::notEmpty()->date('Y-m-d')->validate($post['birthday'])) ? 'Veuillez selectionner une date de naissance correcte' : null,

            (!in_array($post['role'], $listRoles)) ? 'Le role reçu semble avoir un probème' : null,

            (!in_array($post['activity'], $listActivity)) ? 'L\'activité reçue semble avoir un probème' : null,
            ];
            
            $errors = array_filter($err);
            
            if(count($errors) === 0){
                
                $datas = [
                // colonne sql => valeur à insérer
                'firstname'=> $post['firstname'],
                'lastname' => $post['lastname'],
                'email'    => $post['email'],
                'phone'    => $post['phone'],
                'role'     => $post['role'],
                'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                'activity' => $post['activity'],
                'caf'      => $post['caf'],
                'birthday' => $post['birthday']
                ];
                
                //Intègre les donnés dans la base
                $enter->insert($datas);
                
                $success = true;
                $displayForm = false;
            }
            else
            {
                $textErrors = implode('<br>', $errors);
            }
            
        }
        // Les variables que l'on transmet à la vue. Les clés du tableau ci-dessous deviendront les variables qu'on utilisera dans la vue.
        
        $params = [
        'success'     => $success,
        'errors'      => $errors,
        'displayForm' => $displayForm,
        'roles'       => $listRoles,
        'activity'    => $listActivity,
        ];
        
        $this->show('users/add_users', $params);
    }
    
    
    //Liste des users
    public function listUsers()
    {
        //  $roles = ['admin'];
        // $this->allowTo($roles);

        // On instancie le model qui permet d'effectuer un findAll()
        $usersModel = new users();
        $users = $usersModel->findAll();
        
        $params = [
        'users' => $users
        ];
        $this->show('users/list_users', $params);
    }
    
    //Détails des users
    public function detailsUsers($id){
        
        $users = new users(); // liaison avec table article
        $detailid  = $users->find($id);
        
        $this->show('users/details_users',[
        'affiche'=> $detailid,
        ]);
    }

    //Update users
    public function updateUsers($id){

        //  $roles = ['admin'];
        // $this->allowTo($roles);

        //Connexion à la base pour l'update et pour remplissage du formulaire
        $up = new users(); 
          
        $errors = [];
        $post = [];
        $success = false;
        $displayForm = true;

        $activity = new activity();
        $activities = $activity->findAll();
        $listActivity = [];

        foreach ($activities as $key => $value) 
        {
            $listActivity[] = $value['name'];
        }

        $role = new role();
        $roles  = $role->findAll();
        $listRoles = [];

        foreach ($roles as $key => $value) 
        {
            $listRoles[] = $value['name'];
        }

        if(!empty($_POST)) {
            
            $post = array_map('trim', array_map('strip_tags', $_POST));
            
            $err = [
            //On vérifie que lastname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alpha('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 30)->validate($post['lastname'])) ? 'Le nom doit contenir entre 2 et 30 caractères' : null,
            
            //On vérifie que firstname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alpha('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 30)->validate($post['firstname'])) ? 'Le prénom doit contenir entre 2 et 30 caractères' : null,
            
            //On vérifie que le champ email soit non vide et qu'il soit valide
            (!v::notEmpty()->email()->validate($post['email'])) ? 'L\'adresse email est invalide' : null,

            (!v::numeric()->length(10, 10)->validate($post['phone'])) ? 'Le numéro de téléphone doit comporter 10 numéros' : null,
            
            //On vérifie que la taille du mot de passe soit comprise entre 8 et 30 caractères
            (!v::notEmpty()->length(8, 30)->validate($post['password'])) ? 'Le mot de passe doit contenir minimum 8 caractères' : null,

            (!preg_match("#^0|1[0-9]{14}#", $post['caf'])) ? 'Le numéro de caf doit faire 15 chiffres' : null,

            (!v::notEmpty()->date('Y-m-d')->validate($post['birthday'])) ? 'Veuillez selectionner une date de naissance correcte' : null,

            (!in_array($post['role'], $listRoles)) ? 'Le role reçu semble avoir un probème' : null,

            (!in_array($post['activity'], $listActivity)) ? 'L\'activité reçue semble avoir un probème' : null,
            ];
            
            $errors = array_filter($err);
            
            if(count($errors) === 0){
                
                $datas = [
                // colonne sql => valeur à insérer
                'firstname'=> $post['firstname'],
                'lastname' => $post['lastname'],
                'email'    => $post['email'],
                'phone'    => $post['phone'],
                'role'     => $post['role'],
                'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                'activity' => $post['activity'],
                'caf'      => $post['caf'],
                'birthday' => $post['birthday']
                ];
                
                
                //Met à jour les donnés dans la base
                $up->update($datas,$id);
                $success = true;
                $displayForm = false;

            }

            else
            {
                $textErrors = implode('<br>', $errors);
            }
            
        }
        //Récupère l'id pour le remplissage du formulaire
        $detailid  = $up->find($id);

        // Les variables que l'on transmet à la vue. Les clés du tableau ci-dessous deviendront les variables qu'on utilisera dans la vue.
        
        $params = [
        'success'     => $success,
        'errors'      => $errors,
        'displayForm' => $displayForm,
        'roles'       => $listRoles,
        'activity'    => $listActivity,
        'affiche'     => $detailid,
        ];
        
        $this->show('users/update_users', $params);
    }
    
    //Suppression users

    public function delUsers($id){
        // $roles = ['admin'];
        // $this->allowTo($roles);

        $success = false;
        $del = new users();
        
        $del -> delete($id);
        // $remove = $del -> delete($id);

        // if ($remove) {
        //     $success = true;

        // }

        // $this->show('users/del_users',[
        // 'affiche'=> $remove,
        // 'success'=> $success,
        // ]);

    }   
    
}
