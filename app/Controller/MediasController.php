<?php

namespace Controller;

use \W\Controller\Controller;
use Controller\MasterController as Master;
use \Model\MediasModel as medias;
use \Model\ActivityModel as activity;
use \Model\CategoryModel as category;
use \Model\EventsModel as events;
use Respect\Validation\Validator as v;
use Intervention\Image\ImageManagerStatic as i;

class MediasController extends MasterController
{
	public function addMedias()
	{
		$medias 	= new MediasModel();
		$activity   = new activity();
		$list       = $activity->findAll();
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

			    if($tabMdedias)
			    {
			    	for($i=0; $i<count($tabMdedias);$i++)
			    	{
			    		$datas = [
			    			'url' 		=> $tabMdedias[$i],
			    			'id_related'=> $_POST['activity'],
			    			'visible'	=> (isset($_POST['visible'])) ? 1 : 0,
			    			];
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
			'list'	  => $list,
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

	public function listMediasByCat()
	{
		$medias   = new medias();
		$activity = new activity();
		$category = new category();
		$events   = new events();

		$listMedias   = $medias->findAll();
		$listActivity = $activity->findAll();
		$listCategory = $category->findAll();
		$listEvents   = $events->findAll();

		$params = [
			'medias'   => $listMedias,
			'activity' => $listActivity,
			'category' => $listCategory,
			'events'   => $listEvent,
		];

		$this->show('medias/album', $params);
	}

	/*
	logique :
	J'ai ma page ou j'affiche une liste de event
	Au clik sur l'event, via un id, j'affiche TOUT les medias qui appartiennent a cet event.
	Reflexion sur un tri par activité
	*/

}