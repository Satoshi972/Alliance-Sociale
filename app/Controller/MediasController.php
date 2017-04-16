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
		$check 		= new Master();		
		$medias 	= new MediasModel();
		$errors 	= [];
		$success 	= false;

		//var_dump($_FILES);
		//var_dump($_FILES['picture']['error']);
		//var_dump($_FILES).'<br>';

		
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{		
	        if(!empty($_FILES))
	        {
	        	//die(var_dump($this->checkMedia($_FILES['medias'])));
	        	$tabMdedias = $check->checkMedia($_FILES['medias']);
	        	//var_dump($tabMdedias);

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

	public function listMedias($page)
	{
		$medias = new MediasModel();
	
		# doc https://zestedesavoir.com/tutoriels/351/paginer-avec-php-et-mysql/

		$MediasPerPages  = 12; #Nous allons afficher 12 images par pages
		$nbMedias		 = $medias->nbMedias(); //Compte le nombre de médias en bdd 
		$nbPages 		 = ceil($nbMedias/$MediasPerPages); #Permet d'obtenir un chiffre rond, pour mon nombre de pages
		
		if(isset($page)) # Si la variable $_GET['page'] existe...
		{
		     $currentPage=intval($page);
	 
		     if($currentPage>$nbPages) # Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nbPages...
		     {
		          $currentPage=$nbPages;
		     }
		}
		else 
		{
		     $currentPage=1; #La page actuelle est la n°1    
		}
 
		$firstEntry=($currentPage-1)*$nbPages; // On calcul la première entrée à lire
		//var_dump($firstEntry);
 
		#La requête sql pour récupérer les messages de la page actuelle.
		$retour_messages= $medias->listPageMedias($firstEntry, $MediasPerPages);
		
		$params = [
			'medias'	  => $retour_messages,
			'nbPages'	  => $nbPages,
			'currentPage' => $currentPage,
		];
		$this->show('medias/list_medias', $params);
	}

}