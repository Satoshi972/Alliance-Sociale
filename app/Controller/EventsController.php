<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ContactsModel;
use Model\EventsModel as events;
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


	#Big event

	public function jsonEvent()
	{
		$events = new events();
		$list = $events->findAll();
		$this->showJson($list);
	}

	public function viewEvent($id)
	{
		$infos = events::find($id);
		$this->show('events/viewEvent',[
			'infos' => $infos,
		]);
	}
	
	public function addEvent()
	{
		$this->show('events/addEvent');
	}

	public function updateEvent($id)
	{
		$infos = events::find($id);
		$this->show('events/viewEvent',[
			'infos' => $infos,
		]);
	}

	public function deleteEvent($id)
	{
		events::delete($id);
		$this->show('events/list');
	}
}
?>