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
	public function home()
	{
		$this->show('events/home');
	}
	public function listEvents()
	{
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
		$event = new events();
		$infos = $event->find($id);
		$activiy = $event->selectAct();
		$this->show('events/viewEvent',[
			'infos'    => $infos,
			'activity' => $activiy,
		]);
	}
	
	public function addEvent()
	{
		$activity = new activity();
		$infos = $activity->findAll();
		$event = new events();
		$post = [];
		$error = [];
		if(!empty($_POST))
		{
			date('Y-m-d',strtotime($_POST['start']));
			date('Y-m-d',strtotime($_POST['end']));
			$post = array_map('trim', array_map('strip_tags', $_POST));
			if(!v::notEmpty()->alpha('_-?!.')->length(2,50)->validate($post['title']))
			{
				$errors[] = 'Votre title doit faire entre 2 et 50 caractères';
			}
			if(!v::notEmpty()->alpha('_-?!.')->length(2,600)->validate($post['content']))
			{
				$errors[] = 'Votre contenu doit faire entre 2 et 600 caractères';
			}
			if(!v::notEmpty()->date('Y-m-d')->validate($post['start']))
			{
				$errors[] = 'Une erreur est surevenue au niveau de la date de début, faites y attention...';
			}
			if(!isset($error['start']) || !empty($post['end']))
			{
				if(!v::date('Y-m-d')->between($post['start'], date('Y')+3)->validate($post['end']))
				{
					$errors[] = 'Une erreur est surevenue au niveau de la date de fin, faites y attention...';
				}				
			}
			else
			{
				$post['end'] = NULL;
			}
			if(isset($_FILES['picture']) && $_FILES['picture']['error'] === 0)
			{
				$img = i::make($_FILES['picture']['tmp_name']);
				$size = $img->filesize();
				$mimetype = $img->mime();
				$ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
				$newName = uniqid('img_').'.'.$ext;
				
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
				var_dump($_FILES['picture']['error']);
				$errors[] = 'Erreur lors de la réception de l\'image';
			}
			if(count($error)>0)
			{
				$textError = implode('<br>', $error);
				$result = '<p class="alert alert-danger">'.$textError.'</p>';
			}
			else
			{
				$datas = [
					'title' 	=> $post['title'],
					'picture' 	=> $post['picture'],
					'content' 	=> $post['content'],
					'start' 	=> $post['start'],
					'end' 		=> $post['end'],
					'act_id' 	=> $post['activity'],
					'quota' 	=> $post['quota'],
				];
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
		$event = new events();
		$activity = new activity();
		$infos = $event->find($id);
		$list  = $activity->findAll();
		$picture = $infos['picture'];
		$post = [];
		$error = [];
		if(!empty($_POST))
		{
			var_dump($_FILES).'<br>';
			date('Y-m-d',strtotime($_POST['start'])); //pour avoir le bon format de onnée dans ma bdd
			date('Y-m-d',strtotime($_POST['end']));
			var_dump($_POST).'<br>';
			$post = array_map('trim', array_map('strip_tags', $_POST));
			if(!v::notEmpty()->alpha('_-?!.')->length(2,50)->validate($post['title']))
			{
				$errors[] = 'Votre title doit faire entre 2 et 50 caractères';
			}
			if(!v::notEmpty()->alpha('_-?!.')->length(2,600)->validate($post['content']))
			{
				$errors[] = 'Votre contenu doit faire entre 2 et 600 caractères';
			}
			if(!v::notEmpty()->date('Y-m-d')->validate($post['start']))
			{
				$errors[] = 'Une erreur est surevenue au niveau de la date de début, faites y attention...';
			}
			if(!isset($error['start']) || !empty($post['end']))
			{
				if(!v::date('Y-m-d')->between($post['start'], date('Y')+3)->validate($post['end']))
				{
					$errors[] = 'Une erreur est surevenue au niveau de la date de fin, faites y attention...';
				}				
			}
			else
			{
				$post['end'] = NULL;
			}
			if(isset($_FILES['picture']) && $_FILES['picture']['error'] === 0)
			{
				$img = i::make($_FILES['picture']['tmp_name']);
				$size = $img->filesize();
				$mimetype = $img->mime();
				$ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
				$newName = uniqid('img_').'.'.$ext;
				
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
							$picture = $uploadDir.$newName;
							
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
				$datas = [
					'title' 		=> $post['title'],
					'picture' 		=> $picture,
					'content' 		=> $post['content'],
					'start' 		=> $post['start'],
					'end' 			=> $post['end'],
					'id_activity' 	=> $post['activity'],
					'quota' 		=> $post['quota'],
				];
				if($event->update($datas,$id))
				{
					$result = '<p class="alert alert-success">Evenement bien enregistré </p>';
				}
				else
				{
					var_dump($event->update($datas,$id));
				}
				
			}
		}
			$this->show('events/updateEvent',[
				'infos' => $infos,
				'list'  => $list,
			]);
	}
	public function deleteEvent($id)
	{
		$event = new events();
		$events->delete($id);
		$this->show('events/list');
	}
}
?>