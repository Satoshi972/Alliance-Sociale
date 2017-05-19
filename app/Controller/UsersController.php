<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\UsersModel as users;
use \Model\RoleModel as role;
use \Model\ActivityModel as activity;
use \Model\SuscribeToModel as suscribe;
use Respect\Validation\Validator as v;

class UsersController extends Controller
{
    public function addUsers(){
         
        $roles = ['admin'];
        $this->allowTo($roles);
        $suscribe = new suscribe();
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
        $result = false;

        $role = new role();
        $roles  = $role->findAll();
        $listRoles = [];

        foreach ($roles as $key => $value) 
        {
            $listRoles[] = $value['name'];
        }
        //filtrer
        $activitySelected = [];        
        if(!empty($_POST)) {

            if(isset($_POST['activity']))
            {
                $activitySelected = array_map('trim', array_map('strip_tags', $_POST['activity']));
                unset($_POST['activity']);
            }

            $post = array_map('trim', array_map('strip_tags', $_POST));
            
            $err = [
            //On vérifie que lastname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alpha('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 30)->validate($post['lastname'])) ? 'Le nom doit contenir entre 2 et 30 caractères' : null,
            
            //On vérifie que firstname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alpha('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 30)->validate($post['firstname'])) ? 'Le prénom doit contenir entre 2 et 30 caractères' : null,
            
            //On vérifie que le champ email soit non vide et qu'il soit valide
            (!v::notEmpty()->email()->validate($post['email'])) ? 'L\'adresse email est invalide' : null,
            // (!$enter->emailExists($post['email'])) ? 'L\'adresse email existe déjà en base de donnée veuillez en choisir ' ? null,

            (!v::numeric()->length(10, 10)->validate($post['phone'])) ? 'Le numéro de téléphone doit comporter 10 numéros' : null,
            
            //On vérifie que la taille du mot de passe soit comprise entre 8 et 30 caractères
            (!v::notEmpty()->length(8, 30)->validate($post['password'])) ? 'Le mot de passe doit contenir minimum 8 caractères' : null,

            (!preg_match("#[0-9]{7}#", $post['caf'])) ? 'Le numéro de caf doit faire 7 chiffres' : null,

            (!v::notEmpty()->date('Y-m-d')->validate($post['birthday'])) ? 'Veuillez selectionner une date de naissance correcte' : null,

            (!in_array($post['role'], $listRoles)) ? 'Le role reçu semble avoir un probème' : null,

            // (!in_array($post['activity'], $listActivity)) ? 'L\'activité reçue semble avoir un probème' : null,
            ];
            
            $errors = array_filter($err);
            if(!empty($activitySelected))
            {
                foreach ($activitySelected as $key => $value) 
                {
                    if(!in_array($value, $listActivity))
                    {
                        $errors[] = 'Une des activités sélectionnée n\'est pas reconnue';
                    }
                }
            }
            else
            {
                $errors[] = 'Aucune activité sélectionnée';
            }

            if(count($errors) === 0)
            {
                $exist = $enter->searchPeoples($post['firstname']);
                if(!$exist == null)
                {
                    $result = 'Erreur, cette perssone existe déjà';
                }
                else
                {
                    $datas = [
                    // colonne sql => valeur à insérer
                    'firstname'=> $post['firstname'],
                    'lastname' => $post['lastname'],
                    'email'    => $post['email'],
                    'phone'    => $post['phone'],
                    'role'     => $post['role'],
                    'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                    // 'activity' => $post['activity'],
                    'caf'      => $post['caf'],
                    'birthday' => $post['birthday']
                    ];
        
                    //Intègre les donnés dans la base
                    if($enter->insert($datas))
                    {
                        foreach ($activitySelected as $key => $value) 
                        {
                            $data = "";
                            $data = $value;
                            $suscribe->insertTo($data);
                        }
                        $result = "success";
                    }
                }
                
            }
            else
            {
                $result = '<p class="alert-dismissable alert-danger">'.implode('<br>', $errors).'</p>';
            }          
        }
        else
        {
            // Les variables que l'on transmet à la vue. Les clés du tableau ci-dessous deviendront les variables qu'on utilisera dans la vue.
            
            $params = [
            'roles'       => $listRoles,
            'activity'    => $listActivity,
            ];
            
            $this->show('users/add_users', $params);
        }
        echo $result;
    }
    
    
    //Liste des users
    public function listUsers($page, $age1, $age2)
    {
        $roles = ['admin'];
        $this->allowTo($roles);

        $usersModel = new users();
        $users = "";

        #convertion age en jours
        $age1 = $age1*365;
        $age2 = $age2*365;

        # doc https://zestedesavoir.com/tutoriels/351/paginer-avec-php-et-mysql/

        $PeoplePerPages  = 50;
        $nbPoeple        = $usersModel->nbrTotal();
        $nbPages         = ceil($nbPoeple/$PeoplePerPages);

        
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

        $firstEntry= ($currentPage-1)*$PeoplePerPages; 
        $users= $usersModel->filterByAge($age1, $age2, $firstEntry, $PeoplePerPages);

        $post = [];

        if(!empty($_POST))
        {
            $post = array_map('trim', array_map('strip_tags', $_POST));
            $search = $post['search'];
            $users = $usersModel->searchPeoples($search);
            // var_dump($usersModel->searchPeoples($search));
            // die(var_dump($users));
        }
        
        // die(var_dump($users));
        $params = [
        'users' => $users,
        'nbPages'=> $nbPages,
        'page'  => $page,
        'age1'  => $age1,
        'age2'  => $age2,
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

        $roles = ['admin'];
        $this->allowTo($roles);

        //Connexion à la base pour l'update et pour remplissage du formulaire
        $up = new users(); 
        $suscribe = new suscribe();

        $sList = $suscribe->suscribeTo($id);
        $suscribeList = [];
        foreach ($sList as $key => $value) 
        {
           $suscribeList[] = $value['activity'];
        }
          
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

            if(isset($_POST['activity']))
            {
                $activitySelected = array_map('trim', array_map('strip_tags', $_POST['activity']));
                unset($_POST['activity']);
            }

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

            (!preg_match("#[0-9]{7}#", $post['caf'])) ? 'Le numéro de caf doit faire 7 chiffres' : null,

            (!v::notEmpty()->date('Y-m-d')->validate($post['birthday'])) ? 'Veuillez selectionner une date de naissance correcte' : null,

            (!in_array($post['role'], $listRoles)) ? 'Le role reçu semble avoir un probème' : null,

            ];
            
            $errors = array_filter($err);
            if(!empty($activitySelected))
            {
                foreach ($activitySelected as $key => $value) 
                {
                    if(!in_array($value, $listActivity))
                    {
                        $errors[] = 'Une des activités sélectionnée n\'est pas reconnue';
                    }
                }
            }
            else
            {
                $errors[] = 'Aucune activité sélectionnée';
            }
            if(count($errors) === 0){
                
                $datas = [
                // colonne sql => valeur à insérer
                'firstname'=> $post['firstname'],
                'lastname' => $post['lastname'],
                'email'    => $post['email'],
                'phone'    => $post['phone'],
                'role'     => $post['role'],
                'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                'caf'      => $post['caf'],
                'birthday' => $post['birthday']
                ];
                
                
                //Met à jour les donnés dans la base
                $up->update($datas,$id);
                $suscribe->deleteTo($id);
                foreach ($activitySelected as $key => $value) 
                {
                    $data = "";
                    $data = $value;
                    $suscribe->updateTo($data, $id);
                }
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
        'suscribed'   => $suscribeList,
        ];
        
        $this->show('users/update_users', $params);
    }
    
    //Suppression users

    public function delUsers($id){
        $roles = ['admin'];
        $this->allowTo($roles);

        $success = false;
        $del = new users();
        $suscribe = new suscribe();
        $del -> delete($id);
        $suscribe->deleteTo($id);
    }   

    public function showSuscribeTo($id)
    {
        $roles = ['admin'];
        $this->allowTo($roles);

        $suscribe = new suscribe();
        $list = $suscribe->suscribeTo($id);
        $this->showJson($list);
    }
    
}
