<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\PartnersModel;
use Respect\Validation\Validator as v;

class PartnersController extends Controller
{
    //Affichage des partenaires
    public function partners()
    {
        $roles = ['admin','editor'];
        $this->allowTo($roles);

        $partnersModel = new PartnersModel();
        $partners = $partnersModel->findAll();
        
        $params = [
        'partners' => $partners
        ];
        $this->show('partners/list_partners', $params);
    }
    
    //Ajout de partenaires
    public function addPartners(){
        $roles = ['admin','editor'];
        $this->allowTo($roles);

        $enter = new PartnersModel();
        $errors = [];
        $post = [];
		$success = false;
        $newPictureName = '';
        $maxSize = (1024 * 1000) * 2; // Taille maximum du fichier
        
        // $_SERVER['DOCUMENT_ROOT'] La racine sous laquelle le script courant est exécuté, comme défini dans la configuration du serveur.
        // $_SERVER['W_BASE'] Le chemin de mon projet
        // debug($_SERVER); Affiche les information de la globale $_SERVER
        
        $uploadDir = '/assets/img/partners/'; // Répertoire d'upload
        $mimeTypeAvailable = ['image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'];
        
        
        if(!empty($_POST)) {
            $post = array_map('trim', array_map('strip_tags', $_POST));
            
            // 5 Caractères minimum pour le titre
            if(strlen($post['name']) < 2) {
                $errors[] = "Le champ partenaire doit avoir au minimum 2 caractères";
            }
                        
            // Vérification sur la photo
            if(isset($_FILES['url']) && $_FILES['url']['error'] === 0){
                
                // Il faut mettre l'anti slash devant finfo pour qu'il voit que c'est une fonction php et non une méthode Controller
                $finfo = new \finfo();
                $mimeType = $finfo->file($_FILES['url']['tmp_name'], FILEINFO_MIME_TYPE);
                
                $extension = pathinfo($_FILES['url']['name'], PATHINFO_EXTENSION);
                
                if(in_array($mimeType, $mimeTypeAvailable)){
                    
                    if($_FILES['url']['size'] <= $maxSize){
                        
                        if(!is_dir($uploadDir)){
                            mkdir($uploadDir, 0755);
                        }
                        
                        $newPictureName = $post['name'].'.'.$extension;
                        
                        if(!move_uploaded_file($_FILES['url']['tmp_name'], $uploadDir.$newPictureName)){
                            $errors[] = 'Erreur lors de l\'upload de la photo';
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
            
            if(count($errors) === 0){
                
                $datas = [
                // colonne sql => valeur à insérer
                'name'	=> $post['name'],
                'url'   => '/img/partners/'.$newPictureName,
                ];
                $enter = new PartnersModel();
                $enter->insert($datas);
				$success = true;
            }
            else
            {
                $textErrors = implode('<br>', $errors);
            }
            
        }
		 $params = [
        'success' => $success,
        'errors'  => $errors,
        ];
        
        $this->show('partners/add_partners',$params);
    }
    
        
    //Modification des partenaires
    public function updatePartners($id){
        $roles = ['admin','editor'];
        $this->allowTo($roles);

        $enter = new PartnersModel();
        $errors = [];
        $post = [];
		$success = false;
        $newPictureName = '';
        $maxSize = (1024 * 1000) * 2; // Taille maximum du fichier
        
        // $_SERVER['DOCUMENT_ROOT'] La racine sous laquelle le script courant est exécuté, comme défini dans la configuration du serveur.
        // $_SERVER['W_BASE'] Le chemin de mon projet
        // debug($_SERVER); Affiche les information de la globale $_SERVER
        
        $uploadDir = '/assets/img/partners/'; // Répertoire d'upload
        $mimeTypeAvailable = ['image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'];
        
        
        if(!empty($_POST)) {
            $post = array_map('trim', array_map('strip_tags', $_POST));
            
            // 5 Caractères minimum pour le titre
            if(strlen($post['name']) < 2) {
                $errors[] = "Le champ partenaire doit avoir au minimum 2 caractères";
            }
                        
            // Vérification sur la photo
            if(isset($_FILES['url']) && $_FILES['url']['error'] === 0){
                
                // Il faut mettre l'anti slash devant finfo pour qu'il voit que c'est une fonction php et non une méthode Controller
                $finfo = new \finfo();
                $mimeType = $finfo->file($_FILES['url']['tmp_name'], FILEINFO_MIME_TYPE);
                
                $extension = pathinfo($_FILES['url']['name'], PATHINFO_EXTENSION);
                
                if(in_array($mimeType, $mimeTypeAvailable)){
                    
                    if($_FILES['url']['size'] <= $maxSize){
                        
                        if(!is_dir($uploadDir)){
                            mkdir($uploadDir, 0755);
                        }
                        
                        $newPictureName = $post['name'].'.'.$extension;
                        
                        if(!move_uploaded_file($_FILES['url']['tmp_name'], $uploadDir.$newPictureName)){
                            $errors[] = 'Erreur lors de l\'upload de la photo';
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
            
            if(count($errors) === 0){
                
                $datas = [
                // colonne sql => valeur à insérer
                'name'	=> $post['name'],
                'url'   => '/img/partners/'.$newPictureName,
                ];

                
                $enter->update($datas,$id);
				 
				 $success = true;

            }
            else
            {
                $textErrors = implode('<br>', $errors);
            }
            
        }
		 $detailid  = $enter->find($id);

		 $params = [
        'success' => $success,
        'errors'  => $errors,
        'id' => $detailid,
        ];
        
        $this->show('partners/update_partners', $params);
    }
    
    
    //Suppression des partenaires
    public function delPartners($id){
        $roles = ['admin','editor'];
        $this->allowTo($roles);

        $del = new PartnersModel();
        $remove = $del -> delete($id);

        if ($remove){
            $success = true;
        }

        $this->show('partners/del_partners',[
        'affiche'=> $remove,
        'success'=> $success,
        ]);
    }

}