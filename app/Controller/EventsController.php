<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ContactsModel;
use Model\EventsModel as events;
use Model\ActivityModel as activity;
use Respect\Validation\Validator as v;
use Intervention\Image\ImageManagerStatic as i;

class EventsController extends MasterController
{
	public function listEvents()
	{
		 $roles = ['admin','editor'];
   		 $this->allowTo($roles);
		$this->show('events/list');
	}

	public function jsonEvent()
	{
		$events = new events();
		$list = $events->findAll();
		$this->showJson($list);
	}

	public function viewEvent($id)
	{
		 $roles = ['admin','editor'];
    	$this->allowTo($roles);
		$event = new events();
		$infos = $event->find($id);
		$activiy = $event->selectAct();
		$this->show('events/viewEvent',[
			'infos'    => $infos,
			'activity' => $activiy,
		]);
	}

	public function viewEventFront($id)
	{
		 $roles = ['admin','editor'];
    	$this->allowTo($roles);

		$event = new events();
		$infos = $event->find($id);
		$activiy = $event->selectAct();
		$this->show('events/viewEventFront',[
			'infos'    => $infos,
			'activity' => $activiy,
		]);
	}
	
	public function addEvent()
	{
		$roles = ['admin','editor'];
    	$this->allowTo($roles);

		$activity = new activity();
		$infos = $activity->findAll();
		$event = new events();
		$post = [];
		$errors = [];
		$uploadDir = 'assets/medias/';
		$start = true; //Permet de vérifier plus tard que la date de début soit bonne
        
		if(!empty($_POST))
		{

			$post = array_map('trim', array_map('strip_tags', $_POST));
            
			if(!v::notEmpty()->alNum('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2,50)->validate($post['title']))
			{
				$errors[] = 'Votre title doit faire entre 2 et 50 caractères';
			}

			if(!v::notEmpty()->alNum('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2,600)->validate($post['content']))
			{
				$errors[] = 'Votre contenu doit faire entre 2 et 600 caractères';
			}

			if(!v::notEmpty()->date('Y-m-d')->validate($post['start']))
			{
				$start = false;
				$errors[] = 'Une erreur est survenue au niveau de la date de début, faites y attention...';
			}

			#s'il n'y a pas d'erreur sur la date de début ET que l'utilisateur a bien rentré une date de fin
			if($start && !empty($post['end']))
			{
				#Je vérifie le bon format de date (pour mysql), soit année, mois, jours, puis je vérifie que la seconde dae soit compris dans une fourchette : entre la date de début et 3 plus tard (car un event qui commence aujourd'hui et c'est fini hier n'as pas de sens....)

				$start = strtotime(($post['start']));

				if(!v::date('Y-m-d')->validate($post['end']))
				{
					$errors[] = 'Une erreur est survenue au niveau de la date de fin, faites y attention...';
				}
				elseif($start > strtotime($post['end']))
				{
					$errors[] = 'La date de fin ne peut etre inférieure a celle de début';
				}				
			}

			if(!v::intVal()->validate($post['quota']))
			{
				$errors[] = 'Veuillez saisir un chiffre';
			}

			if(isset($_FILES['picture']) && $_FILES['picture']['error'] === 0)
			{

				$img = i::make($_FILES['picture']['tmp_name']);
				$size = $img->filesize();
				$mimetype = $img->mime();
				$ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
				$newName = uniqid('img_').'.'.$ext;
				$maxSize = (1024 * 1000) * 2;
				if($maxSize < $size)
				{
					$errors[] = 'fichier trop gros, il doit faire 2 mo max';
				}
				else
				{
					if(!v::image()->validate($_FILES['picture']['tmp_name']))
					{
						$errors[] = 'Le fichier n\'est pas une image valide';
					}
					else
					{
						if(!is_dir($uploadDir))
						{
							mkdir($uploadDir, 0755);
						}

						if(!$img->save($uploadDir.$newName))
						{
							$errors[] = 'Erreur lors de l\'envoi de l\'image';
						}
						else
						{
							#ligne pour que mon image soit envoyée dans la base !!!!!!
							$post['picture'] = $uploadDir.$newName;
							
						}
					}
				}
			}
			else
			{
				$errors[] = 'Erreur lors de la réception de l\'image';
			}

			if(count($errors)>0)
			{
				$textError = implode('<br>', $errors);
				$result = '<p class="alert alert-danger">'.$textError.'</p>';
			}
			else
			{
				if(!empty($post['end']))
				{
					$datas = [
						'title' 	  => $post['title'],
						'content' 	  => $post['content'],
						'start' 	  => $post['start'],
						'end' 		  => $post['end'],
						'quota'   	  => $post['quota'],
	                    'id_activity' => $post['activity'],
	                    'picture'     => $post['picture'],
					];
				}
				else
				{
					$datas = [
						'title' 	  => $post['title'],
						'content' 	  => $post['content'],
						'start' 	  => $post['start'],
						'quota'   	  => $post['quota'],
	                    'id_activity' => $post['activity'],
	                    'picture'     => $post['picture'],
					];
				}

				if($event->insert($datas))
				{
                    $result = '<p class="alert alert-success">Evenement bien enregistré </p>';
				}
				
			}
		}
		else
		{
      
		$this->show('events/addEvent',[
			'infos'  => $infos,
			]);
		}

		echo $result;
	}

	public function updateEvent($id)
	{	
		$roles = ['admin','editor'];
    	$this->allowTo($roles);

		$event = new events();
		$activity = new activity();

		$infos = $event->find($id);
		$list  = $activity->findAll();

		$picture = $infos['picture'];
		$uploadDir = 'assets/medias/';
		$start = true; //Permet de vérifier plus tard que la date de début soit bonne

		$post = [];
		$error = [];

		if(!empty($_POST))
		{

			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(!v::notEmpty()->alpha('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2,50)->validate($post['title']))
			{
				$errors[] = 'Votre title doit faire entre 2 et 50 caractères';
			}

			if(!v::notEmpty()->alpha('-?!\'*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2,600)->validate($post['content']))
			{
				$errors[] = 'Votre contenu doit faire entre 2 et 600 caractères';
			}

			if(!v::notEmpty()->date('Y-m-d')->validate($post['start']))
			{
				$start = false;
				$errors[] = 'Une erreur est surevenue au niveau de la date de début, faites y attention...';
			}
			
			#s'il n'y a pas d'erreur sur la date de début ET que l'utilisateur a bien rentré une date de fin
			if($start && !empty($post['end']))
			{
				#Je vérifie le bon format de date (pour mysql), soit année, mois, jours, puis je vérifie que la seconde dae soit compris dans une fourchette : entre la date de début et 3 plus tard (car un event qui commence aujourd'hui et c'est fini hier n'as pas de sens....)

				$start = strtotime(($post['start']));

				if(!v::date('Y-m-d')->validate($post['end']))
				{
					$errors[] = 'Une erreur est survenue au niveau de la date de fin, faites y attention...';
				}
				elseif($start > strtotime($post['end']))
				{
					$errors[] = 'La date de fin ne peut etre inférieure a celle de début';
				}				
			}


			if(isset($_FILES['picture']) && $_FILES['picture']['error'] === 0)
			{

				$img = i::make($_FILES['picture']['tmp_name']);
				$size = $img->filesize();
				$mimetype = $img->mime();
				$ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
				$newName = uniqid('img_').'.'.$ext;
				$maxSize = (1024 * 1000) * 2;

				if($maxSize<$size)
				{
					$errors[] = 'fichier trop gros, il doit faire 2 mo max';
				}
				else
				{
					if(!v::image()->validate($_FILES['picture']['tmp_name']))
					{
						$errors[] = 'Le fichier n\'est pas une image valide';
					}
					else
					{
						if(!is_dir($uploadDir))
						{
							mkdir($uploadDir, 0755);
						}

						if(!$img->save($uploadDir.$newName))
						{
							$errors[] = 'Erreur lors de l\'envoi de l\'image';
						}
						else
						{
							#ligne pour que mon image soit envoyée dans la base !!!!!!
							$post['picture'] = $uploadDir.$newName;
							
						}
					}
				}
			}
			else
			{
				//var_dump($_FILES['picture']['error']);
				$errors[] = 'Erreur lors de la réception de l\'image';
			}

			if(count($error)>0)
			{
				$textError = implode('<br>', $error);
				$results = '<p class="alert alert-danger">'.$textError.'</p>';
			}
			else
			{
				if(!empty($post['end']))
				{
					$datas = [
						'title' 	  => $post['title'],
						'content' 	  => $post['content'],
						'start' 	  => $post['start'],
						'end' 		  => $post['end'],
						'quota'   	  => $post['quota'],
	                    'id_activity' => $post['activity'],
	                    'picture'     => $post['picture'],
					];
				}
				else
				{
					$datas = [
						'title' 	  => $post['title'],
						'content' 	  => $post['content'],
						'start' 	  => $post['start'],
						'quota'   	  => $post['quota'],
	                    'id_activity' => $post['activity'],
	                    'picture'     => $post['picture'],
					];
				}

				if($event->update($datas,$id))
				{
					$result = '<p class="alert alert-success">Evenement bien enregistré </p>';
					$this->show('events/list');
				}				
			}

		}
		else
		{
			$this->show('events/updateEvent',[
				'infos' => $infos,
				'list'  => $list,
			]);
		}

			 echo $result;
	}

	public function deleteEvent($id)
	{
		$roles = ['admin','editor'];
    	$this->allowTo($roles);
    	
		$event = new events();

		$event->delete($id);
		$this->show('events/list');
	}
    
    public function listPresent()
	{
		date_default_timezone_set('America/Martinique');
        
        $find = new events();
        $infospres =$find->findAllEventsPres($orderBy = 'end', $orderDir = 'ASC', $limit = null, $offset = null);
        
        
        $params = [
                   "infospres" => $infospres,
                   
                  
                  ];
		$this->show('events/listPresent', $params);
	}
    
    public function listPast()
	{
		date_default_timezone_set('America/Martinique');
               
        $find = new events();
        $infospas =$find->findAllEventsPas($orderBy = 'end', $orderDir = 'ASC', $limit = null, $offset = null);
        
        $params = [
                   "infospas" => $infospas,
                  
                  ];
		$this->show('events/listPast', $params);
	}
}
?>