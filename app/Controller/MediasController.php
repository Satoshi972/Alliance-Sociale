<?php

namespace Controller;

use \W\Controller\Controller;
use Controller\MasterController as Master;
use \Model\MediasModel;
use Respect\Validation\Validator as v;
use Intervention\Image\ImageManagerStatic as i;

class MediasController extends MasterController
{
	public function addMedias()
	{
		$medias 	= new MediasModel();
		$errors 	= [];
		$success 	= false;


		$check = new Master();		
		//var_dump($_FILES);
		// var_dump($_FILES['picture']['error']);
		//var_dump($_FILES).'<br>';

		
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{		
	        if(!empty($_FILES))
	        {
	        	//die(var_dump($this->checkMedia($_FILES['medias'])));
	        	$tabMdedias = $check->checkMedia($_FILES['medias']);
	        	var_dump($tabMdedias);

			    if($tabMdedias)
			    {
			    	for($i=0; $i<count($tabMdedias);$i++)
			    	{
			    		$datas = ['url' => $tabMdedias[$i]];
			    		$medias->insert($datas);
			        	$success = true;
			    	}
			    }
			    else
			    {
			    	$errors[] = 'Erreur, aucun médias correct détecté...';
			    }

		    }			    
		    else
		    {
		    	$errors[] = 'Erreur, aucun médias envoyé...';
		    }
		}

			$params = [
			'success' => $success,
			'errors'  => $errors,
			];

	$this->show('medias/add_medias',$params);

	}

	public function listMedias()
	{
		# doc https://zestedesavoir.com/tutoriels/351/paginer-avec-php-et-mysql/
		// On instancie le model qui permet d'effectuer un findAll() 
		$medias = new MediasModel();
		//$images = $medias->findAll();
		$MediasPerPages  = 12; //Nous allons afficher 5 messages par pages
		$nbMedias		 = $medias->nbMedias(); 
		$nbPages = ceil($nbMedias/$MediasPerPages); //Permet d'obtenir un chiffre rond, pour mon nombre de pages
 
		if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
		{
		     $currentPage=intval($_GET['page']);
		 
		     if($currentPage>$nbPages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
		     {
		          $currentPage=$nbPages;
		     }
		}
		else // Sinon
		{
		     $currentPage=1; // La page actuelle est la n°1    
		}
 
		$firstEntry=($currentPage-1)*$nbPages; // On calcul la première entrée à lire
 
		// La requête sql pour récupérer les messages de la page actuelle.
		$retour_messages= $medias->listPageMedias($firstEntry, $MediasPerPages);
 

		$params = [
			//'images' => $images,
			'medias'	  => $retour_messages,
			'nbPages'	  => $nbPages,
			'currentPage' => $currentPage,
		];
		$this->show('medias/list_medias', $params);
	}

}