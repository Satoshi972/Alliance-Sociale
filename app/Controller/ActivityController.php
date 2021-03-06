<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ActivityModel as Activity;
use Respect\Validation\Validator as v;

class ActivityController extends MasterController
{

	public function addActivity()
	{	
        $roles = ['admin'];
        $this->allowTo($roles);

        $newActivity = new Activity();

        $errors = [];
        $post = [];
        $result = null;
        $maxSize = (1024 * 1000) * 2;

        $uploadDir = 'assets/img/activity/'; // Répertoire d'upload
        $uploadDirDoc = 'assets/form/'; // Répertoire d'upload
        $mimeTypeAvailable = ['image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'];
        $mimeTypeDoc = ['application/pdf', 'application/word', 'application/msword'];

		if(!empty($_POST)) {
            
            $post = array_map('trim', array_map('strip_tags', $_POST));
            
            $err = [
            //On vérifie que lastname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alNum('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 30)->validate($post['name'])) ? 'Le nom pour l\'activité doit faire entre 2 et 30 caractères' : null,
            
            //On vérifie que firstname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alNum('-?!")(\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 600)->validate($post['content'])) ? 'Le descriptif de l\'activité doit faire entre 2 et 600 caractères' : null,

            ];
            
            $errors = array_filter($err);

			if(isset($_FILES['picture']) && $_FILES['picture']['error'] === 0){

                $finfo = new \finfo();
                $mimeType = $finfo->file($_FILES['picture']['tmp_name'], FILEINFO_MIME_TYPE);

                $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

                if(in_array($mimeType, $mimeTypeAvailable)){

                    if($_FILES['picture']['size'] <= $maxSize){

                        if(!is_dir($uploadDir)){
                            mkdir($uploadDir, 0755);
                        }

                        $newPictureName = uniqid('img_').'.'.$extension;

                        if(!move_uploaded_file($_FILES['picture']['tmp_name'], $uploadDir.$newPictureName)){
                            $errors[] = 'Erreur lors de l\'upload de la photo';
                        }
                        else
                        {
                            $post['picture'] = $uploadDir.$newPictureName;
                        }
                    }
                    else {
                        $errors[] = 'La taille du fichier excède 2 Mo';
                    }

                }
                else {
                    $errors[] = 'Le fichier n\'est pas une image valide';
                }
            }
            else {
                $errors[] = 'Aucune photo sélectionnée';
            }

            if(isset($_FILES['form']) && $_FILES['form']['error'] === 0){
                
                // Il faut mettre l'anti slash devant finfo pour qu'il voit que c'est une fonction php et non une méthode Controller
                $finfo = new \finfo();
                $mimeType = $finfo->file($_FILES['form']['tmp_name'], FILEINFO_MIME_TYPE);
                
                $extension = pathinfo($_FILES['form']['name'], PATHINFO_EXTENSION);
                
                if(in_array($mimeType, $mimeTypeDoc)){
                    
                    if($_FILES['form']['size'] <= $maxSize){
                        
                        if(!is_dir($uploadDirDoc)){
                            mkdir($uploadDirDoc, 0755);
                        }
                        
                        $formUrl = $_FILES['form']['name'].'.'.$extension;
                        
                        if(!move_uploaded_file($_FILES['form']['tmp_name'], $uploadDirDoc.$formUrl)){
                            $errors[] = 'Erreur lors de l\'upload du formulaire';
                        }
                        else
                        {
                            $form = $uploadDirDoc.$formUrl;
                        }
                    }
                    else {
                        $errors[] = 'La taille du fichier excède 2 Mo';
                    }
                    
                }
                else {
                    $errors[] = 'Le fichier n\'est pas un document valide; PDF, doc, docx accepté';
                }
            }
            else
            {
                $errors[] = 'Aucun formulaire reçu';
            }



            
            if(count($errors) === 0){
                
                $datas = [
                // colonne sql => valeur à insérer
                'name'       => $post['name'],
                'content'    => $post['content'],
                'picture'    => $post['picture'],
                'form'       => $form
                ];
                
                //Intègre les donnés dans la base
                $newActivity->insert($datas);
                
                $result = "success";
            }
            else
            {
                $result = implode('<br>', $errors);
            }
            
        }
        else
        {
            // Les variables que l'on transmet à la vue. Les clés du tableau ci-dessous deviendront les variables qu'on utilisera dans la vue.
            
            $params = [];
            
            $this->show('activite/add_activity', $params);
        }
        echo $result;
	}

    public function listActivity()
    {
        $roles = ['admin'];
        $this->allowTo($roles);

        $newActivity = new Activity();
        $activity = $newActivity->findAll();

        $params = [
        'activity' => $activity,
        ];

        $this->show('activite/list_activity', $params);
    }

    public function detailsActivity($id)
    {
        $newActivity = new Activity();
        $detailactivity = $newActivity->find($id);

        $this->show('activite/details_Activity',[
            'infos' => $detailactivity
            ]);
    }


    public function updateActivity($id)
   {
        $roles = ['admin'];
        $this->allowTo($roles);

        $upActivity = new Activity();

        $detail = $upActivity->find($id);

        $picture = $detail['picture'];
        $formUrl = $detail['form'];

        $errors = [];
        $post = [];
        $success = false;
        $maxSize = (1024 * 1000) * 2;

        $uploadDir = 'assets/img/activity/'; // Répertoire d'upload
        $mimeTypeAvailable = ['image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'];
        $uploadDirDoc = 'assets/form/'; // Répertoire d'upload
        $mimeTypeDoc = ['application/pdf', 'application/word', 'application/msword'];



        if(!empty($_POST)) {
            $post = array_map('trim', array_map('strip_tags', $_POST));
            
            $err = [
            (!v::notEmpty()->alpha('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 30)->validate($post['name'])) ? 'L\'Activité est invalide' : null,
            
            (!v::notEmpty()->alnum('-?!")(\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 900)->validate($post['content'])) ? 'La description est invalide' : null,
            ];
            
            $errors = array_filter($err);

            if(isset($_FILES['picture']) && $_FILES['picture']['error'] === 0){

                $finfo = new \finfo();
                $mimeType = $finfo->file($_FILES['picture']['tmp_name'], FILEINFO_MIME_TYPE);

                $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

                if(in_array($mimeType, $mimeTypeAvailable)){

                    if($_FILES['picture']['size'] <= $maxSize){

                        if(!is_dir($uploadDir)){
                            mkdir($uploadDir, 0755);
                        }

                        $newPictureName = uniqid('picture_').'.'.$extension;

                        if(!move_uploaded_file($_FILES['picture']['tmp_name'], $uploadDir.$newPictureName)){
                            $errors[] = 'Erreur lors de l\'upload de la photo';
                        }
                        else
                        {
                            $picture = $uploadDir.$newPictureName;
                        }
                    }
                    else {
                        $errors[] = 'La taille du fichier excède 2 Mo';
                    }

                }
                else {
                    $errors[] = 'Le fichier n\'est pas une image valide';
                }
            }

            if(isset($_FILES['form']) && $_FILES['form']['error'] === 0){
                
                // Il faut mettre l'anti slash devant finfo pour qu'il voit que c'est une fonction php et non une méthode Controller
                $finfo = new \finfo();
                $mimeType = $finfo->file($_FILES['form']['tmp_name'], FILEINFO_MIME_TYPE);
                
                $extension = pathinfo($_FILES['form']['name'], PATHINFO_EXTENSION);
                
                if(in_array($mimeType, $mimeTypeDoc)){
                    
                    if($_FILES['form']['size'] <= $maxSize){
                        
                        if(!is_dir($uploadDirDoc)){
                            mkdir($uploadDirDoc, 0755);
                        }
                        
                        $formUrl = $_FILES['form']['name'].'.'.$extension;
                        
                        if(!move_uploaded_file($_FILES['form']['tmp_name'], $uploadDirDoc.$formUrl)){
                            $errors[] = 'Erreur lors de l\'upload du formulaire';
                        }
                        else
                        {
                            $form = $uploadDirDoc.$formUrl;
                        }
                    }
                    else {
                        $errors[] = 'La taille du fichier excède 2 Mo';
                    }
                    
                }
                else {
                    $errors[] = 'Le fichier n\'est pas un document valide; PDF, doc, docx accepté';
                }
            }
            else
            {
                $form = $details['form'];
            }

            
            if(count($errors) === 0){
                
                $datas = [
                // colonne sql => valeur à insérer
                'name'       => $post['name'],
                'content'    => $post['content'],
                'picture'    => $picture,
                'form'       => $form

                ];
                
                //Intègre les donnés dans la base
                $upActivity->update($datas,$id);
                
                $success = true;
            }
            else
            {
                $textErrors = implode('<br>', $errors);
            }
            
        }
        // Les variables que l'on transmet à la vue. Les clés du tableau ci-dessous deviendront les variables qu'on utilisera dans la vue.
        
        $params = [
        'success'  => $success,
        'errors'   => $errors,
        'detail'   => $detail
        ];
        
        // $this->show('activite/update_activite', $params);
        $this->show('activite/update_activity', $params);
   }

   public function delActivity($id)
   {
    $roles = ['admin'];
    $this->allowTo($roles);

    $delactivity = new Activity();
    $remove = $delactivity -> delete($id);

    $this->show('activite/del_activity',[
        'affiche' => $remove,
        ]);
   } 

   public function showAllActivities()
   {
        // $roles = ['admin','editor'];
        // $this->allowTo($roles);
        
        $activity = new Activity();
        $list = $activity->findAll();
        $this->showJson($list);
   }
}