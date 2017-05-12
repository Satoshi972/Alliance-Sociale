<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ActivityModel as Activity;
use Respect\Validation\Validator as v;
use Model\categoryModel;

class ActivityController extends MasterController
{

	public function addActivity()
	{	
        $roles = ['admin','editor'];
        $this->allowTo($roles);

		$category = new categoryModel();
        $newActivity = new Activity();

        $list = $category->findAll();
        #permet d'avoir un tableau contenant les noms des catégorie, qu'on utilisera pour les verifications
        $listCat = []; 
        foreach ($list as $key => $value) 
        {
            $listCat[] = $value['name'];
        }

        $errors = [];
        $post = [];
        $result = null;
        $maxSize = (1024 * 1000) * 2;

        $uploadDir = 'assets/img/activity/'; // Répertoire d'upload
        $mimeTypeAvailable = ['image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'];

		if(!empty($_POST)) {
            
            $post = array_map('trim', array_map('strip_tags', $_POST));
            
            $err = [
            //On vérifie que lastname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alpha('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 30)->validate($post['name'])) ? 'L\'Activité est invalide' : null,
            
            //On vérifie que firstname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alpha('-?!")(\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 600)->validate($post['content'])) ? 'Le contenu est invalide' : null,

            (in_array($post['category'], $listCat)) ? 'Une erreur est survenue lors de votre choix' : null,            
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

            
            if(count($errors) === 0){
                
                $datas = [
                // colonne sql => valeur à insérer
                'name'       => $post['name'],
                'category'   => $post['category'],
                'content'    => $post['content'],
                'picture'    => $post['picture'],
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
            
            $params = [
            'category' => $list
            ];
            
            $this->show('activite/add_activity', $params);
        }
        echo $result;
	}

    public function listActivity()
    {
        $roles = ['admin','editor'];
        $this->allowTo($roles);

        $category = new categoryModel();
        $cat = $category->findAll();

        $newActivity = new Activity();
        $activity = $newActivity->findAll();

        $params = [
        'activity' => $activity,
        'cat'      => $cat
        ];

        $this->show('activite/list_activity', $params);
    }


    // public function detailsActivity()
    public function detailsActivity($id)
    {
        $roles = ['admin','editor'];
        $this->allowTo($roles);

        $newActivity = new Activity();
        $detailactivity = $newActivity->find($id);

        // $this->show('activite/detailsActivity',[
        $this->show('activite/details_Activity',[
            'infos' => $detailactivity
            ]);
    }


    public function updateActivity($id)
   {
        $roles = ['admin','editor'];
        $this->allowTo($roles);

        $category = new categoryModel();
        $upActivity = new Activity();

        $detail = $upActivity->find($id);

        $list = $category->findAll();
        #permet d'avoir un tableau contenant les noms des catégorie, qu'on utilisera pour les verifications
        $listCat = []; 
        foreach ($list as $key => $value) 
        {
            $listCat[] = $value['name'];
        }     


        $errors = [];
        $post = [];
        $success = false;
        $maxSize = (1024 * 1000) * 2;

        $uploadDir = 'assets/img/activity/'; // Répertoire d'upload
        $mimeTypeAvailable = ['image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'];


        if(!empty($_POST)) {
            $post = array_map('trim', array_map('strip_tags', $_POST));
            
            $err = [
            (!v::notEmpty()->alpha('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 30)->validate($post['name'])) ? 'L\'Activité est invalide' : null,
            
            (!v::notEmpty()->alnum('-?!\'+*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 900)->validate($post['content'])) ? 'La description est invalide' : null,

            (!in_array($post['category'], $listCat)) ? 'Une erreur est survenue lors de votre choix' : null,
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
            else {
                $picture = $detail['picture']; //on recupere la photo deja en bdd
                // $errors[] = 'Aucune photo sélectionnée';
            }

            
            if(count($errors) === 0){
                
                $datas = [
                // colonne sql => valeur à insérer
                'name'       => $post['name'],
                'category'   => $post['category'],
                'content'    => $post['content'],
                'picture'    => $picture,
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
        'category' => $list,
        'detail'   => $detail
        ];
        
        // $this->show('activite/update_activite', $params);
        $this->show('activite/update_activity', $params);
   }

   public function delActivity($id)
   {
    $roles = ['admin','editor'];
    $this->allowTo($roles);

    $delactivity = new Activity();
    $remove = $delactivity -> delete($id);

    $this->show('activite/del_activity',[
        'affiche' => $remove,
        ]);
   } 

   public function showAllActivities()
   {
        $roles = ['admin','editor'];
        $this->allowTo($roles);
        
        $activity = new Activity();
        $list = $activity->findAll();
        $this->showJson($list);
   }

}